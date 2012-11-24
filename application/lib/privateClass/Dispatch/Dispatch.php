<?php

namespace privateClass\Dispatch;

class Dispatch {
	const _SUPPORT = 0;
	const _CONSULT = 1;
	function __construct() {
	}
	function __destruct() {
	}
	
	/**
	 * 添加工单
	 * @param $type _SUPPORT:售后工单,_CONSULT:咨询工单
	 * @return multitype:boolean
	 */
	public function add($type = self::_SUPPORT) {
		$sql = '';
		$result = FALSE;
		switch($type) {
			case self::_CONSULT :
				
				break;
				
			case self::_SUPPORT :
			default :
				$sql = 'INSERT INTO '.DB__AFTER_SALES_MANAGE__DISPATCHES.' 
						(`PID`, `job_number`, `customer`, `contacts`, `description`, `comments`, `occurrence_time`) VALUES 
						('.$_POST['PID'].',\''.$_POST['job_number'].'\',\''.$_POST['customer'].'\',\''.$_POST['contacts'].'\',\''.$_POST['description'].'\',\''.$_POST['comments'].'\',\''.$_POST['occurrence_time'].'\');';
				$result = \privateClass\Kernel\MYSQL::query($sql,_MYSQL_INSERT);
				break;
		}
		return ['status'=>($result ? TRUE : FALSE)];
	}
	
	public function make_jobnumber() {
		!isset($_GET['pid']) || empty($_GET['pid']) ? $_GET['pid'] = 0 : FALSE ;
		$result = FALSE;
		$sql = 'SELECT * FROM '.DB__AFTER_SALES_MANAGE__DISPATCH_JOBNUMBER_INIT.' WHERE `PID` = '.$_GET['pid'].' LIMIT 1;';
		$retval = \privateClass\Kernel\MYSQL::query($sql,_MYSQL_QUERY);
		if (isset($retval[0])) {
			$date = date('Ymd');
			$sql = '';
			if ($date == $retval[0]['init_date']) {
				$result = $retval[0]['identify'].'-'.$retval[0]['init_date'].str_pad($retval[0]['temp_number'],4,'0',STR_PAD_LEFT);
				$sql = 'UPDATE '.DB__AFTER_SALES_MANAGE__DISPATCH_JOBNUMBER_INIT.'
						SET `temp_number` = '.((int)$retval[0]['temp_number'] + 1).'
						WHERE `INIT_ID` = '.$retval[0]['INIT_ID'].';';
			} else {
				$result = $retval[0]['identify'].'-'.$date.'0001';
				$sql = 'UPDATE '.DB__AFTER_SALES_MANAGE__DISPATCH_JOBNUMBER_INIT.' 
						SET `init_date` = \''.$date.'\', `temp_number` = 1 
						WHERE `INIT_ID` = '.$retval[0]['INIT_ID'].';';
				
			}
			\privateClass\Kernel\MYSQL::query($sql,_MYSQL_UPDATE);
		}
		return $result;
	}
	
	public function get($id, $_get_all = _GET_ENABLED_ID) {
		$result = FALSE;
		!is_numeric($id) ? $id = 0 : FALSE ;
		$sql = 'SELECT * FROM '.DB__AFTER_SALES_MANAGE__DISPATCHES.' 
				WHERE `DISP_ID` = '.$id;
		if ($_get_all == _GET_ALL_ID) $sql .= ' AND `enabled` = 1';
		$sql .= ' LIMIT 1;';
		$retval = \privateClass\Kernel\MYSQL::query($sql,_MYSQL_QUERY);
		if (isset($retval[0])) {
			$result = $retval[0];
			$result['product'] = $this->get_product_name($result['PID']);
		}
		return $result;
	}
	
	public function get_list($pid = 0, $type = 'all', $_get_all = _GET_ENABLED_ID) {
		$result = FALSE;
		$sql = 'SELECT * 
				FROM '.DB__AFTER_SALES_MANAGE__DISPATCHES.' 
				WHERE ';
		$sql .= ($pid != 0) ? '`PID` = '.$pid : '`PID` > 0';
		$status = -2;
		switch ($type) {
			case 'pending' :
				$status = 0;
				break;
			case 'processing' :
				$status = -1;
			case 'finished' :
				$status = 1;
			default:
				$status = -2;
		}
		if ($status != -2) $sql .= ' AND `status` = '.$status;
		if ($_get_all == _GET_ALL_ID) $sql .= ' AND `enabled` = 1';
		$sql .= ' ORDER BY `update_time` DESC;';
		$retval = \privateClass\Kernel\MYSQL::query($sql,_MYSQL_QUERY);
		if (isset($retval[0])) {
			$result = $retval;
			foreach ($result as $k => $v) {
				$result[$k]['product'] =  $this->get_product_name($v['PID']);
			}
		}
		return $result;
	}
	
	public function get_by_jobnumber($jobnumber, $_get_all = _GET_ENABLED_ID) {
		$result = FALSE;
		empty($jobnumber) ? $jobnumber = '' : FALSE ;
		$sql = 'SELECT * FROM '.DB__AFTER_SALES_MANAGE__DISPATCHES.'
				WHERE `job_number` = \''.$jobnumber.'\'';
		if ($_get_all == _GET_ALL_ID) $sql .= ' AND `enabled` = 1';
		$sql .= ' LIMIT 1;';
		$retval = \privateClass\Kernel\MYSQL::query($sql,_MYSQL_QUERY);
		if (isset($retval[0])) {
			$result = $retval[0];
			$result['product'] = $this->get_product_name($result['PID']);
			
		}
		return $result;
	}
	
	
	private function get_product_name($pid) {
		$result = '';
		$prod_handler = new \privateClass\Dispatch\Product();
		$temp = $prod_handler->get($pid);
		if ($temp != FALSE) {
			$result = $temp['name'];
			while ($temp['parent_id'] != '0') {
				$result = $temp['name'].' - '.$result;
				$temp = $prod_handler->get($temp['parent_id']);
			}
		
		}
		return $result;
	}
	
}

?>