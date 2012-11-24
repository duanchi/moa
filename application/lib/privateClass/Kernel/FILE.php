<?php
/**
 *@name		FILE.kernel
 *@author	duanchi
 *@version	1.0.1
 *@since	2012-02-22
 **/

class FILE {
	/**
	 *
	 * 配置文件操作
	 * root_directory	可操作的根目录
	 * status			是否初始化 若非初始化则后面的各个函数需默认初始化
	 *
	 */
	private static $_config = array('root_directory' => '','status' => FALSE);

	/**
	 *
	 * 初始化文件类库配置(如不初始化则默认操作根路径为当前路径或者写绝对路径进行操作)
	 * @see 如果使用init 可以自动建立不存在的文件夹
	 *
	 * @param string $root_directory
	 * @return bool
	 */
	public static function init($root_directory = NULL) {
		FILE::$_config['root_directory'] = ($root_directory == NULL) ? '' : $root_directory;
		FILE::$_config['status'] = TRUE;
		return true;
	}

	/**
	 *
	 * 获取文件内容(文件路径可以加根目录中的逐级子目录)
	 *
	 * @param string $file_path
	 * @return string
	 */
	public static function get($file_path) {
		try{
			if (empty($file_path)||$file_path == '') throw('NO_FILE_PATH');
			return (FILE::$_config['status'] == TRUE) ? file_get_contents(FILE::$_config['root_directory'].DIRECTORY_SEPARATOR.$file_path) : file_get_contents($file_path);
		} catch (Exception $e) {
			return false;
		}
	}

	/**
	 *
	 * 写文件内容
	 *
	 * @param string $file_path
	 * @param string $content
	 * @param string $type (默认为a追加内容, w为覆盖写文件)
	 * @return boolean
	 */
	public static function put($file_path, $content = NULL, $type = NULL) {
		try {
			if (empty($file_path)||$file_path == NULL) throw('NO_FILE_PATH');
			else return (FILE::$_config['status'] == TRUE) ? file_put_contents(FILE::$_config['root_directory'].DIRECTORY_SEPARATOR.$file_path, $content ,($type == NULL) ? FILE_APPEND : 0) : file_put_contents($file_path, $content ,($type == NULL) ? FILE_APPEND : 0);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public static function delete($file_path) {
		return unlink((FILE::$_config['status'] == TRUE) ? FILE::$_config['root_directory'].DIRECTORY_SEPARATOR.$file_path : $file_path);
	}

}