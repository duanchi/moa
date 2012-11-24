<?php
use Auth\Account;

/**
 * @name AuthController
 * @author duanChi <http://weibo.com/shijingye>
 * @desc 默认控制器
 * @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */
class AuthController extends Yaf\Controller_Abstract {

	/** 
     * 默认动作
     * Yaf支持直接把Yaf_Request_Abstract::getParam()得到的同名参数作为Action的形参
     * 对于如下的例子, 当访问http://yourhost/dashboard/index/index/index/name/duanChi <http://weibo.com/shijingye> 的时候, 你就会发现不同
     */
	public function indexAction() {
		//1. fetch query
		$get = $this->getRequest()->getParams();

		//2. fetch model
		$handler = new Auth\Account();
		/*$test_result = $handler->register([
			'username' => 'duanchi',
			'password' => 'passowrd'
		]);*/
		$test_result = $handler->login('duanchi','passowrd');
		var_dump($test_result);
		//3. assign
		$this->getView()->assign('get',json_encode($_GET));
		$this->getView()->assign('test',$test_result);
		//4. render by Yaf, 如果这里返回FALSE, Yaf将不会调用自动视图引擎Render模板
        return TRUE;
	}
	public function loginAction() {
		$handler = new \Auth\Account();
		var_dump($handler->login('duanchi', 'passowrd'));
		return TRUE;
	}
}