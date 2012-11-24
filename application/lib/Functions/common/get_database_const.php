<?php
function get_database_const($config = array()) {
	if (isset($config['PREFIX'])) define('DB_PREFIX', $config['PREFIX']);
	if (isset($config['DB'])) {
		foreach ($config['DB'] as $k => $v) {
			$str_arr = explode('DB_PREFIX', $v);
			if (count($str_arr) > 1) define('DB__'.$k, '`'.DB_PREFIX.array_pop($str_arr).'`');
		}
		foreach ($config as $k => $v) {
			if (defined('DB__'.$k) && ($k != 'DB') && ($k != 'PREFIX')) foreach ($v as $sub_k => $sub_v) define('DB__'.$k.'__'.$sub_k,constant('DB__'.$k).'.`'.$sub_v.'`');
		}
	}
}