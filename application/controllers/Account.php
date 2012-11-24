<?php
/**
 * @name LoginController
 * @author duanChi <http://weibo.com/shijingye>
 * @desc 登录控制器
 * @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */
class AccountController extends Yaf\Controller_Abstract {
	/** 
     * 默认动作
     * Yaf支持直接把Yaf_Request_Abstract::getParam()得到的同名参数作为Action的形参
     * 对于如下的例子, 当访问http://yourhost/dashboard/index/index/index/name/duanChi <http://weibo.com/shijingye> 的时候, 你就会发现不同
     */
	public function ssoLoginAction() {
		$referer = isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !='' ? $_SERVER['HTTP_REFERER'] : '/support/dispatch/support'; 
		$referer = isset($_GET['redirect']) && !empty($_GET['redirect']) ? urldecode($_GET['redirect']) : $referer;
		
		if (\privateClass\Account\SsoAccounter::getInstance()->check_login()) header('Location: '.$referer);
		else \privateClass\Account\SsoAccounter::getInstance()->redirect_sso_login();
        return FALSE;
	}
	
	public function ssoLoginRedirectAction() {
		$redirect = isset($_GET['redirect']) && !empty($_GET['redirect']) ? urldecode($_GET['redirect']) : '/support/dispatch/support';
		isset($_GET['service_token']) ? TRUE : $_GET['service_token'] = '';
		$user = \privateClass\Account\SsoAccounter::getInstance()->get_sso_user($_GET['service_token']);
		if (\privateClass\Account\SsoAccounter::getInstance()->login($user)) header('Location:'.$redirect);
		else header('Location:/account/ssoLogin');
		
		
		
		/* if (($_SERVER['REDIRECT_STATUS'] == '200' || $_SERVER['REDIRECT_STATUS'] == 200) && isset($_COOKIE['username'])) {
			//判断登录结果如果成功则写cookie和session
			$result = \privateClass\Account\SsoAccounter::getInstance()->login($_COOKIE['UID'],$_COOKIE['username'],$_COOKIE['token']);
			header('Location: '.(isset($referer[1]) && $referer[1] != '' ? $referer[1] : '/'));
		} else {
			$time = time()-3600;
			setcookie('username','',$time);
			setcookie('token','',$time);
			setcookie('UID','',$time);
			setcookie('access_secret_key','',$time);
			unset($_SESSION['user']);
			$referer[1] = isset($referer[1]) && $referer[1] != '' ? '?redirect='.$referer[1] : '';
			//header('Location: /account/ssoLogin'.$referer[1]);
		} */
		return FALSE;
	}
	
	public function oauthAction() {
		$referer = explode('&redirect=',isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/');
		if ($referer[0] == \Yaf\Registry::get('config')->api->oauth->authorize.'?|'._API_ACCESS_SECRET_KEY) {
			$response = _curl(\Yaf\Registry::get('config')->api->oauth->token.'?|'._API_ACCESS_SECRET_KEY.'&code='.$_GET['code']);
			if ($response['status_code'] == 200 ||$response['status_code'] == '200') {
				$retval = json_decode($response['response'],TRUE);
				\privateClass\Account\SsoAccounter::getInstance()->put_oauth($retval['access_token']);
				header('Location:'.(isset($_GET['redirect']) || !empty($_GET['redirect']) ? $_GET['redirect'] : '/'));
			}
		}
		return FALSE;
	}
}
