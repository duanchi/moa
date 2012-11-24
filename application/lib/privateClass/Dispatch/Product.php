<?php

namespace privateClass\Dispatch;

class Product {
	function __construct() {
		
	}
	
	public function get_list($parent_id = 0) {
		$result = FALSE;
		$sql = 'SELECT * FROM '.DB__AFTER_SALES_MANAGE__PRODUCTS.' WHERE `parent_id` = '.$parent_id.' AND `enabled` = 1;';
		$retval = \privateClass\Kernel\MYSQL::query($sql,_MYSQL_QUERY);
		if (isset($retval[0])) {
			$result = ['category'=>[],'products'=>[]];
			foreach ($retval as $v) {
				if ($v['is_category'] == '1') {
					unset($v['is_category']);
					unset($v['parent_id']);
					unset($v['enabled']);
					$result['category'][] = array_merge($v,$this->get_list($v['PID']));
				} else {
					unset($v['is_category']);
					unset($v['parent_id']);
					unset($v['enabled']);
					$result['products'][] = $v;
				}
			}
		}
		return $result;
	}
	
	public function get($pid, $_get_all = _GET_ENABLED_ID) {
		$result = FALSE;
		$sql = 'SELECT * FROM '.DB__AFTER_SALES_MANAGE__PRODUCTS.' WHERE `PID` = '.$pid;
		if ($_get_all == _GET_ALL_ID) $sql .= ' AND `enabled` = 1';
		$retval = \privateClass\Kernel\MYSQL::query($sql,_MYSQL_QUERY);
		if (isset($retval[0])) {
			unset($retval[0]['enabled']);
			$result = $retval[0];
		}
		return $result;
	}
}

?>