<?php
/**
 * @name DispatchController
 * @author duanChi <http://weibo.com/shijingye>
 * @desc 派单控制器
 * @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */
class DispatchController extends Yaf\Controller_Abstract {
	/** 
     * 默认动作
     * Yaf支持直接把Yaf_Request_Abstract::getParam()得到的同名参数作为Action的形参
     * 对于如下的例子, 当访问http://yourhost/dashboard/index/index/index/name/duanChi <http://weibo.com/shijingye> 的时候, 你就会发现不同
     */
	public function IndexAction() {
		//@todo 需要按照用户权限跳转不同action
		$this->redirect('/support/dispatch/support');
		return FALSE;
	}
	public function supportAction() {
		return TRUE;
	}
	public function pendingAction() {
		$_RESULT = [];
		$_RESULT['dispatch'] = \privateClass\Dispatch\Dispatcher::getInstance()->get_list(0,'pending');
		$this->getView()->assign('_RESULT',$_RESULT);
		return TRUE;
	}
}