<?php

namespace privateClass\Account;

class SsoAccount {
	public $_profile = array();
	function __construct() {
		if(!isset($_SESSION)) session_start();
	}
	public function login($user) {
		$result = FALSE;
		if (!empty($user['uid']) && !empty($user['username']) && isset($_COOKIE['PHPSESSID'])) {
			$sql = 'SELECT * FROM '.DB__AFTER_SALES_MANAGE__USERS.' 
					WHERE `UID` = '.$user['uid'].' 
					LIMIT 1';
			$retval = \privateClass\Kernel\MYSQL::query($sql,_MYSQL_QUERY);
			if (!empty($retval)) {
				$sql = 'UPDATE '.DB__AFTER_SALES_MANAGE__USERS.' 
						SET `token` = \''.$_COOKIE['PHPSESSID'].'\' 
						WHERE `UID` = '.$user['uid'].';';
				$result = \privateClass\Kernel\MYSQL::query($sql,_MYSQL_UPDATE);
			} else $result = $this->init_user($user['uid'], $user['username'], $_COOKIE['PHPSESSID']);
		}
		if ($result) $_SESSION['UID'] = $user['uid'];
		return $result;
	}
	
	
	public function check_login() {
		$result = isset($_SESSION['UID']) ? $_SESSION['UID'] : FALSE;
		if ($result && $this->check_user($result)) $result = TRUE;
		else $result = FALSE;
		
		//如果已经登录 则获取用户oauth授权码进行用户profile获取
		/*if ($result != FALSE) $retval = $this->get_user($result);
		else $this->redirect_sso_login();
		
		if (!$retval) {
			unset($_SESSION['UID']);
			$result = FALSE;
			if ($redirect_to_login == TRUE) $this->redirect_sso_login();
		} elseif (empty($retval['access_token'])) $this->get_oauth();//如果access_token为空,跳转oauth授权
		else $result = $retval;*/
		return $result;
	}
	
	private function check_user($uid) {
		$result = FALSE;
		$sql = 'SELECT `token` FROM '.DB__AFTER_SALES_MANAGE__USERS.'
				WHERE `UID` = '.$uid.';';
		$retval = \privateClass\Kernel\MYSQL::query($sql,_MYSQL_QUERY);
		if (isset($retval[0])) $result = $retval[0]['token'];
		return $result;
	}
	
	public function redirect_sso_login($redirect = NULL) {
		header('Location:'.\Yaf\Registry::get('config')->api->sso->login.'?|'._API_ACCESS_SECRET_KEY.($redirect != NULL ? '&redirect='.$redirect : ''));
	}
	
	private function get_oauth() {
		if (!isset($_SESSION['UID']) || empty($_SESSION['UID'])) $this->redirect_to_login();
		else {
			header('Location:'.\Yaf\Registry::get('config')->api->oauth->authorize.'?|'._API_ACCESS_SECRET_KEY);
			exit();
		}
	}
	
	public function put_oauth($access_token) {
		$result = FALSE;
		if (!isset($_SESSION['UID']) || empty($_SESSION['UID'])) $this->redirect_to_login();
		else {
			$sql = 'UPDATE '.DB__AFTER_SALES_MANAGE__USERS.' 
					SET `access_token` = \''.$access_token.'\' 
					WHERE `UID` = '.$_SESSION['UID'];
			$result = \privateClass\Kernel\MYSQL::query($sql,_MYSQL_UPDATE);
		}
		return $result;
	}
	
	public function get_sso_user($service_token) {
		if (!empty($service_token)) {
			$result = _curl(\Yaf\Registry::get('config')->api->sso->verify.'?|'._API_ACCESS_SECRET_KEY.'&service_token='.$service_token);
		}
		try {
			$result = json_decode($result['response'],TRUE);
		} catch (\Exception $e) {
			$result = FALSE;
		}
		
		return $result;
	}
	
	public function get_profile($access_token) {
		$result = FALSE;
		if (!empty($access_token)) {
			$result = _curl(\Yaf\Registry::get('config')->api->user->profile.'?|'._API_ACCESS_SECRET_KEY.'&access_token='.$access_token);
		}
		return $result ? json_decode($result['response'],TRUE) : $result;
	}
	
	public function get_user($uid = NULL) {
		$result = FALSE;
		$puid = ($uid !=NULL ? $uid : (isset($_SESSION['UID']) ? $_SESSION['UID'] : 0));
		$sql = 'SELECT `UID`, `username`, `access_token`
					FROM'.DB__AFTER_SALES_MANAGE__USERS.'
					WHERE `UID` = '.$puid.'
					LIMIT 1;';
		$retval = \privateClass\Kernel\MYSQL::query($sql,_MYSQL_QUERY);
		if (isset($retval[0])) {
			//考虑没有oauth认证的情况
			if($retval[0]['access_token'] == NULL || $retval[0]['access_token'] == 'NULL') {
				if ($uid == NULL) $this->get_oauth();
			} else {
				$retval[0]['profile'] = $this->get_profile($retval[0]['access_token']);
				if ($retval == FALSE && $uid == NULL) $this->get_oauth();
				elseif ($uid == NULL);
				else $result = $retval[0];
			}
		}
		return $result;
	}
	
	/**
	 * 首次登录初始化用户
	 * @param unknown $uid
	 * @param unknown $username
	 * @param unknown $token
	 * @return Ambigous <\privateClass\Kernel\数据库查询数组, NULL, resource, boolean, number, \privateClass\Kernel\错误代码,无错误代码返回0, string, multitype:multitype: >
	 */
	public function init_user($uid, $username, $token) {
		$sql = 'INSERT INTO '.DB__AFTER_SALES_MANAGE__USERS.' 
				(`UID`, `username`, `token`) VALUES 
				('.$uid.',\''.$username.'\',\''.$token.'\');';
		return \privateClass\Kernel\MYSQL::query($sql,_MYSQL_INSERT);
	}
	
	public function get_user_by_pid($pid) {
		$uid = 0;
		$sql = 'SELECT `master_leading`, `slave_leading` FROM '.DB__AFTER_SALES_MANAGE__PRODUCTS.' 
				WHERE `PID` = '.$pid.' AND `enabled` = 1 
				LIMIT 1;';
		$retval = \privateClass\Kernel\MYSQL::query($sql,_MYSQL_QUERY);
		if (isset($retval[0])) {
			if (empty($retval[0]['master_leading']) && !empty($retval[0]['slave_leading'])) {
				$uid = explode(',', $retval[0]['slave_leading'])[0];
			} elseif (!empty($retval[0]['master_leading'])) $uid = $retval[0]['master_leading'];
		}
		return $this->get_user($uid);
	}
	
	function __destruct() {
	}
}