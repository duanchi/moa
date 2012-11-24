<?php
/**
 * @name ApplicationController
 * @author duanChi <http://weibo.com/shijingye>
 * @desc 应用控制器
 * @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */
class AppController extends Yaf\Controller_Abstract {
	/** 
     * 默认动作
     * 根据传入的模板参数显示页面并加入数据
     */
	public function indexAction() {
		$_REQUEST = ['raw_url'=>init_request()];
		$_VARS = [];
		$conf = \privateClass\Kernel\INI::read(_PROJECT_TEMPLATE_ROOT.DIRECTORY_SEPARATOR.'1307261330'.DIRECTORY_SEPARATOR.'conf'.DIRECTORY_SEPARATOR.'config.ini');
		
		foreach($conf['parse'] as $key => $value) {
			if (preg_match($value['url'], $_REQUEST['raw_url'])) {
				$_REQUEST['path'] = $value['template'];
				$response = _curl($_REQUEST['raw_url']);
				file_put_contents('/Users/duanChi/Projects/moa/cache/curl/1307261330/cache.cache', $response['response']);
				//$html_handler = file_get_html('/Users/duanChi/Projects/moa/cache/curl/1307261330/cache.cache');
				$html_handler = str_get_html($response['response']);
				foreach ($value['vars'] as $k=>$v) {
					$tmp_node = $html_handler->find($v,0);
					if (isset($tmp_node)) $_VARS[$k] = [
						'text'	=>	$tmp_node->innertext,
						'attr'	=>	(array)$tmp_node->attr
					];
					else $_VARS[$k] = [
						'text'	=>	NULL,
						'attr'	=>	NULL
					];
				}
			}
		}
		$_TEMPLATE = [
			'path'	=>	_PROJECT_TEMPLATE_ROOT.DIRECTORY_SEPARATOR.'1307261330'.DIRECTORY_SEPARATOR.'www'.DIRECTORY_SEPARATOR,
			'file'	=>	$_REQUEST['path'].'.html'
		];
		$this->getView()->assign('_TEMPLATE',$_TEMPLATE);
		$this->getView()->assign('_TEMPLATE_FILE_PATH',$_TEMPLATE['path'].$_TEMPLATE['file']);
		$this->getView()->assign('_VARS',$_VARS);
		return TRUE;
	}
}