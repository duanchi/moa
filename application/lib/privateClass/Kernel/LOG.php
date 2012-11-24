<?php
/**
 *@name		LOG.kernel
 *@author	duanchi
 *@version	1.0.0
 *@since	2012-03-05
 *
 **/
class LOG {
	/**
	 *
	 * 配置文件操作
	 * root_directory	可操作的根目录
	 * status			是否初始化 若非初始化则后面的各个函数需默认初始化
	 *
	 */
	private static $_config = array('log_name' => 'system','root_directory' => '','status' => FALSE);
	private static $_log_directory = [
			1	=>	['log','LOG'],
			8	=>	['error_log','ERROR'],
			2	=>	['error_log','NOTICE'],
			4	=>	['error_log','WARNING'],
			0	=>	['debug_log','DEBUG']
	];

	/**
	 *
	 * 初始化文件类库配置(如不初始化则默认操作根路径为当前路径或者写绝对路径进行操作)
	 * @see 如果使用init 可以自动建立不存在的文件夹
	 *
	 * @param string $root_directory
	 * @return bool
	 */
	public static function init($log_name = 'system', $root_directory = NULL) {
		LOG::$_config['root_directory'] = ($root_directory == NULL) ? '' : $root_directory;
		LOG::$_config['log_name'] = $log_name;
		LOG::$_config['status'] = TRUE;
		return true;
	}

	private static function put_log ($log_content = '', $log_type = _LOG_STATUS_RECORD, $put_type = 'FILE_ONLY') {
		$display_type = strtolower(($log_type == _LOG_STATUS_RECORD) ? '' : '['.LOG::$_log_directory[$log_type][1].']');
		$log_content = '['.LOG::$_config['log_name'].' - '.date('Y-m-d H:i:s').']'.$display_type.$log_content.'
';
		if ($put_type == 'ALL' || $put_type == 'FILE_ONLY') {
			FILE::put(
				LOG::$_config['root_directory'].DIRECTORY_SEPARATOR.LOG::$_log_directory[$log_type][0].DIRECTORY_SEPARATOR.LOG::$_config['log_name'].'-'.date('Y-m-d').'.log',
				$log_content
			);
		}
		if ($put_type == 'ALL' || $put_type == 'ECHO_ONLY') {
			echo $log_content;
		}
	}

	public static function RECORD ($content = '', $type = 'FILE_ONLY') {
		LOG::put_log($content,_LOG_STATUS_RECORD,$type);
	}
	
	public static function ERROR ($content = '', $type = 'FILE_ONLY') {
		LOG::put_log($content,_LOG_STATUS_ERROR,$type);
	}
	public static function WARNING ($content = '', $type = 'FILE_ONLY') {
		LOG::put_log($content,_LOG_STATUS_WARNING,$type);
	}
	public static function NOTICE ($content = '', $type = 'FILE_ONLY') {
		LOG::put_log($content,_LOG_STATUS_NOTICE,$type);
	}
	public static function DEBUG ($content = '', $type = 'FILE_ONLY') {
		LOG::put_log($content,_LOG_STATUS_DEBUG,$type);
	}
}