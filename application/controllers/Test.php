<?php

/**
 * @name TestController
 * @author duanChi <http://weibo.com/shijingye>
 * @desc 默认控制器
 * @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */
class TestController extends Yaf\Controller_Abstract {

	/** 
     * 默认动作
     * Yaf支持直接把Yaf_Request_Abstract::getParam()得到的同名参数作为Action的形参
     * 对于如下的例子, 当访问http://yourhost/dashboard/index/index/index/name/duanChi <http://weibo.com/shijingye> 的时候, 你就会发现不同
     */

	public function constAction() {
		var_dump(get_defined_constants());
		return FALSE;
	}
	
	public function iniAction() {
		var_dump(\privateClass\Kernel\INI::read(dirname(dirname(__DIR__)).'/test.ini'));
		return FALSE;
	}
	
	public function routeAction() {
		$_REQUEST = init_request();
		//$this->setViewPath(_PROJECT_TEMPLATE_ROOT.DIRECTORY_SEPARATOR.'1307261330'.DIRECTORY_SEPARATOR.'www'.DIRECTORY_SEPARATOR);
		//print_r($this->getView()->getScriptpath());
		//print_r($_REQUEST);
		//echo _PROJECT_TEMPLATE_ROOT.DIRECTORY_SEPARATOR.'1307261330'.DIRECTORY_SEPARATOR.$_REQUEST['path'].'.html';
		return TRUE;
	}
}