<?php
/**
 *@name		mysql.kernel.php
 *@author	duanchi
 *@version	2.1.0
 *@since		2012-03-28
 *MySQL数据库操作类支持query|insert|update|delete的query方法
 *@see		MySQL中只有InnoDB和BDB类型的数据表才能支持事务处理！其他的类型是不支持的。默认不use数据库，查询时需要手动指定数据库
 *@link		@断翅v(http://weibo.com/shijingye) @金山(http://weibo.com/kangjinshan)
 **/
namespace privateClass\Kernel;
class MYSQL
{
	private static $db_config = array(
			'hostname'	=>	'',
			'port'		=>	'',
			'charset'	=>	'',
			'username'	=>	'',
			'password'	=>	'',
			'database'	=>	''
	);
	
	private static $_resource;
	/**
	 * @name connect
	 * 连接数据库并进行配置
	 * @param hostname string
	 * @param port string
	 * @param dbname string
	 * @param username string
	 * @param password string
	 * @param charset string
	 * @return 如果连接成功,返回连接id,失败返回FALSE
	 */
	/* static function connect ($username,$password,$hostname = null,$port = null,$charset = null) {
		self::$db_config['hostname'] = empty($hostname) ? 'localhost' : $hostname;
		self::$db_config['port'] = empty($port) ? '3306' : $port;
		self::$db_config['username'] = $username;
		self::$db_config['password'] = $password;
		self::$db_config['charset'] = empty($charset) ? 'UTF8' : $charset;
		if($resource = mysql_connect($hostname.':'.$port, $username, $password)) {
			return $resource;
		} else {
 			throw new ErrorException('数据库连接失败',501,null,__FILE__,__LINE__,null);
			return FALSE;
		}
	} */
	public static function connect ($config = array()) {
		self::$db_config['hostname'] = empty($config['hostname']) ? 'localhost' : $config['hostname'];
		self::$db_config['port'] = empty($config['port']) ? '3306' : $config['port'];
		self::$db_config['username'] = $config['username'];
		self::$db_config['password'] = $config['password'];
		self::$db_config['charset'] = empty($config['charset']) ? 'UTF8' : $config['charset'];
		if($resource = mysql_connect(self::$db_config['hostname'].':'.self::$db_config['port'], self::$db_config['username'], self::$db_config['password'])) {
			self::$_resource = $resource;
			if (!empty($config['database'])) {
				self::$db_config['database'] = $config['database'];
				if (mysql_select_db(self::$db_config['database'])) {
					return $resource;
				}
				else {
					throw new ErrorException('数据库"'.self::$db_config['database'].'"连接失败',552,null,__FILE__,__LINE__,null);
					return FALSE;
				}
			} else return $resource;
		} else {
			throw new ErrorException('数据库服务器连接失败',551,null,__FILE__,__LINE__,null);
			return FALSE;
		}
	}
	
	public static function close (resource $resource = null) {
		if ($resource == null) ;
		else return mysql_close();
	}
	/**
	 * @name get_used_database
	 * 返回数据库使用空间
	 * @param NULL
	 * @return 数据库使用的空间(Byte)
	 */
	public static function get_used_database() {
		$retval = self::query("SELECT CONCAT(round((sum(data_LENGTH)+sum(INDEX_LENGTH))/(1024*1024),2),'MB') AS `data_size` FROM information_schema.tables WHERE table_schema='".self::$db_config['dbname']."'");
		return $retval[0]['data_size'];
	}
	/**
	 * @name version
	 * 返回数据库版本号
	 * @param NULL
	 * @return 数据库的版本号
	 */
	public static function version() {
		$retval = self::query("SELECT VERSION() AS `version`");
		return $retval[0]['version'];
	}
	/**
	 * @name query
	 * 数据库查询
	 * @param sql string
	 * @param sql_type define(QUERY,SHOW,DELETE,UPDATE,INSERT)
	 * @return 数据库查询数组
	 */
	public static function query($sql,$sql_type = _MYSQL_QUERY) {
		file_put_contents(__DIR__.DIRECTORY_SEPARATOR.'logs'.DIRECTORY_SEPARATOR.'mysql-query'.DIRECTORY_SEPARATOR.'sql.log', date('[Y-m-d H:i:s]: ').'['.$sql_type.']'.$sql.'
',FILE_APPEND);
		$resultData = array();
		$retval = mysql_query($sql);
		switch($sql_type)
		{
			case _MYSQL_QUERY:
				while ($rows = mysql_fetch_array($retval, MYSQL_ASSOC)) $resultData[] = $rows;
				return count($resultData) > 0 ? $resultData : FALSE;
				break;
			case _MYSQL_DELETE:
			case _MYSQL_UPDATE:
				//return !empty($retval) ? TRUE : FALSE;
				return TRUE;
				break;
			case _MYSQL_INSERT:
				$id = mysql_insert_id();
				return empty($id) ? TRUE : $id ;
				break;
			default:
				return NULL;
		}
		if (self::error_number()) {
			file_put_contents(__DIR__.DIRECTORY_SEPARATOR.'logs'.DIRECTORY_SEPARATOR.'mysql-query'.DIRECTORY_SEPARATOR.'sql.log', date('[Y-m-d H:i:s][error]: ').'['.$sql_type.']'.$sql.'
',FILE_APPEND);
			return self::error_number();
		}
	}
	/**
	 * @name error_number
	 * 返回mysql错误代码
	 * @param NULL
	 * @return 错误代码,无错误代码返回0
	 */
	private static function error_number() {
		return mysql_error();
		//return mysql_errno();
	}
	/**
	 * @name autocommit
	 * 自动事务
	 * @param bool boolen
	 * @return NULL
	 */
	public static function autocommit($bool = TRUE){
		if (TRUE === $bool){
			self::query("SET AUTOCOMMIT = 1");
		}elseif(FALSE === $bool){
			self::query("SET AUTOCOMMIT = 0");
		}
	}
	/**
	 * @name begin
	 * 开始事务
	 * @param NULL
	 * @return NULL
	 */
	public static function begin(){
		try {
			self::query('START TRANSACTION');
			if (self::error_number()) _throw('500');
		} catch (Exception $e) {
			_catch($e);
		}
	}
	/**
	 * @name rollback
	 * 回滚事务
	 * @param NULL
	 * @return NULL
	 */
	public static function rollback(){
		try {
			self::query('ROLLBACK');
			if (self::error_number()) _throw('500');
		} catch (Exception $e) {
			_catch($e);
		}
	}
	/**
	 * @name commit
	 * 提交事务
	 * @param NULL
	 * @return NULL
	 */
	public static function commit(){
		try {
			self::query('COMMIT');
			if (self::error_number()) _throw('500');
		} catch (Exception $e) {
			_catch($e);
		}
	}
}