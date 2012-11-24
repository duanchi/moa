<?php
/**
 * @name Bootstrap
 * @author duanChi <http://weibo.com/shijingye>
 * @desc 所有在Bootstrap类中, 以_init开头的方法, 都会被Yaf调用,
 * @see http://www.php.net/manual/en/class.yaf-bootstrap-abstract.php
 * 这些方法, 都接受一个参数:Yaf\Dispatcher $dispatcher
 * 调用的次序, 和申明的次序相同
 */
class Bootstrap extends Yaf\Bootstrap_Abstract{

    public function _initConfig() {
		//把配置保存起来
		$arrConfig = Yaf\Application::app()->getConfig();
		Yaf\Registry::set('config', $arrConfig);
		Yaf\Loader::getInstance()->registerLocalNamespace('privateClass');
	}
	
	public function _initFunction(Yaf\Dispatcher $dispatcher) {
		//初始化自定义全局函数
		$this->_import('Functions');
	}
	
	public function _initConstant(Yaf\Dispatcher $dispatcher) {
		get_constant(Yaf\Registry::get('config')->get('const'));
	}
	
	public function _initRoute(Yaf\Dispatcher $dispatcher) {
		//Yaf\Dispatcher::getInstance()->getRouter()->addConfig(Yaf\Registry::get('config')->routes);
	}
	
	public function _initPlugin(Yaf\Dispatcher $dispatcher) {
		//注册DumpTools插件
		$dispatcher->registerPlugin(new DumpPlugin());
		//$dispatcher->registerPlugin(new SecurityPlugin());
		//$dispatcher->registerPlugin(new MysqlPlugin());
		//$dispatcher->registerPlugin(new AccountPlugin());
		//smarty模板改为在plugin中初始化
		$dispatcher->registerPlugin(new SmartyPlugin());
	}
	
	/*
	public function _initRoute(Yaf\Dispatcher $dispatcher) {
		//在这里注册自己的路由协议,默认使用简单路由
	} */
	

	/*
	 * 初始化数据库操作和数据库和数据库表的常量
	* 数据库访问:DB__DATEBASE
	* 数据库表访问:DB__DATABASE__TABLE
	*/
	public function _initDbConst(Yaf\Dispatcher $dispatcher) {
		get_database_const(Yaf\Registry::get('config')->get('database'));
	}
	
	/**
	 * @name	import
	 * 加载自定义包
	 * @version	1.0.0
	 * @since	2012-03-26
	 * @param	unknown_type $type
	 */
	private function _import ($file_path) {
		$file_path = Yaf\Registry::get('config')->get('application')->library.DIRECTORY_SEPARATOR.$file_path;
		foreach(explode('|',Yaf\Registry::get('config')->get('application')->function->category) as $category) {
			$file_list = glob($file_path.DIRECTORY_SEPARATOR.$category.DIRECTORY_SEPARATOR.'*.php');
			foreach($file_list as $v) Yaf\Loader::import($v);
		}
	}
}
