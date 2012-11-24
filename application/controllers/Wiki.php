<?php
/**
 * @name WikiController
* @author duanChi <http://weibo.com/shijingye>
* @desc 登录控制器
* @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
*/
class WikiController extends Yaf\Controller_Abstract {
	/**
	 * 默认动作
	 * Yaf支持直接把Yaf_Request_Abstract::getParam()得到的同名参数作为Action的形参
	 * 对于如下的例子, 当访问http://yourhost/dashboard/index/index/index/name/duanChi <http://weibo.com/shijingye> 的时候, 你就会发现不同
	 */
	public function indexAction() {
		$_RESULT = array('category'=>'index');
		$this->getView()->assign('_RESULT',$_RESULT);
		//4. render by Yaf, 如果这里返回FALSE, Yaf将不会调用自动视图引擎Render模板
		return TRUE;
	}
	
	public function toolsAction() {
		$route = get_route();
		
		$route = (isset($route[2]) && !empty($route[2])) ? $route[2] : 'index';
		$_RESULT = array('category'=>'tools/'.$route);
		$_RESULT['route'] = $route;
		switch($route) {
			case 'exception' :
				$response = _curl(Yaf\Registry::get('config')->api->tools->expection);
				if ($response['status_code'] == '200' || $response['status_code'] == 200) {
					$_RESULT['code_list'] = json_decode($response['response'],TRUE);
				}
				break;
			case 'index' :
			default :
				
				break;
		}
		$this->getView()->assign('_RESULT',$_RESULT);
		return TRUE;
		
	}
	
}
