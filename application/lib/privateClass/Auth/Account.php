<?php

namespace privateClass\Auth;

class Account {
	
	public function __construct() {
		if(!isset($_SESSION)) session_start();
		//\Yaf\Session::start();
	}
	
	public function test() {
		return TRUE;
	}
	
	/* 
	 * @todo 完善保存token的操作
	 * TRUE		登录成功
	 * FALSE	未执行操作
	 * -1		无此用户
	 * -2		密码错误
	 * -3		令牌错误
	 * -4		令牌过期
	 */
	public function login($account, $password, $save_token = FALSE, $login_type = _NORMAL_LOGIN) {
		$result = FALSE;
		if ($login_type == _TOKEN_LOGIN) {
			$sql = 'SELECT '.DB__USERS_USERS.'`UID`, `username`, `nickname`, `name`, `enabled`, `expire_time`, `create_time` ,`token_hash` FROM '.DB__USERS__USERS_TOKEN_AUTHORIZATION.' RIGHT JOIN '.DB__USERS_USERS.' ON '.DB__USERS_USERS.'.`UID` = '.DB__USERS__USERS_TOKEN_AUTHORIZATION.'.`UID` WHERE `tonek_hash` = \''.$password.'\' AND `enabled` = 1;';
			//检查用户名和令牌过期时间
			$retval = \privateClass\Kernel\MYSQL::query($sql);
			if ($retval != FALSE) {
				if ($retval[0]['username'] == $account) {
					//检查令牌过期时间和自动续期
				}
			}
		} else {
			$sql = 'SELECT * FROM '.DB__USERS__USERS.' WHERE `username` = \''.$account.'\' LIMIT 1;';
			$retval = \privateClass\Kernel\MYSQL::query($sql);
			if ($retval != FALSE) {
				if (\privateClass\Kernel\ENCRYPT::match($password, $retval[0]['password_hash'], $retval[0]['salt'],null,_ENCRYPT_PBKDF2)) {
					$result = ($_SESSION['UID'] = $retval[0]['UID']);
					if (TRUE === $save_token) {
						$result = $this->save_token($retval[0]['UID'], $retval[0]['password_hash']);
					}
				}
			}
		}
		
		return $result;
	}
	
	private function save_token($uid, $token_raw) {
		$token_raw = \privateClass\Kernel\ENCRYPT::make($token_raw,null,null,_ENCRYPT_SHA1)['hash'].time();
		$encrypt_token = \privateClass\Kernel\ENCRYPT::make($token_raw,null,null,_ENCRYPT_PBKDF2);
		$sql = 'INSERT INTO '.DB__USERS__USERS_TOKEN_AUTHORIZATION.' (`UID`, `token_hash`, `token_raw`, `expire_time`) VALUES ('.$uid.', \''.$encrypt_token['hash'].'\', \''.$token_raw.'\', \''.date('Y-m-d H:i:s',strtotime("next year")).'\');';
		echo $sql;
	}
	
	public function get_account($uid = null) {
		$result = FALSE;
		$sql = 'SELECT * FROM '.DB__USERS__USERS.' WHERE `UID` = '.((null === $uid) ? (isset($_SESSION['UID']) ? $_SESSION['UID'] : 0) : $uid).' LIMIT 1;';
		$retval = \privateClass\Kernel\MYSQL::query($sql);
		if ($retval != FALSE) $result = $retval[0];
		return $result;
	}
	
	public function register($account_array = array()) {
		$result = FALSE;
		if (!empty($account_array) && !empty($account_array['username']) && !empty($account_array['password'])) {
			$password_hash = \privateClass\Kernel\ENCRYPT::make($account_array['password'],null,null,_ENCRYPT_PBKDF2);
			$account_array = array(
				'username'		=>	$account_array['username'],
				'password_hash'	=>	$password_hash['hash'],
				'salt'			=>	$password_hash['salt'],
				'create_time'	=>	date('Y-m-d H:i:s')
			);
			$insert = array('key'=>'','value'=>'');
			foreach ($account_array as $k => $v) {
				$insert['key'] .= ' `'.$k.'`,';
				$insert['value'] .= ' \''.$v.'\',';
			}
			$sql = 'INSERT INTO '.DB__USERS__USERS.' ('.trim($insert['key'],',').') VALUES ('.trim($insert['value'],',').');';
			echo $sql;
			$result = \privateClass\Kernel\MYSQL::query($sql,_MYSQL_INSERT);
		}
		return $result;
	}
	
}

?>