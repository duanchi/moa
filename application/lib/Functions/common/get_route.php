<?php
function get_route($request_uri = NULL) {
	$request_uri == NULL || $request_uri == '' ? $request_uri = $_SERVER['REQUEST_URI'] : $request_uri;
	$retval = array_slice(explode('/', $request_uri),1);
	$result = [
		'module'	=>	'index',
		'controller'	=>	'index',
		'action'	=>	'index'
	];
	if (count($retval) > 2) {
		$result['module'] = $retval[0];
		$result['controller'] = $retval[1];
		$result['action'] = $retval[2];
	} else {
		$result['module'] = 'index';
		$result['controller'] = $retval[0];
		$result['action'] = (isset($retval[2]) && !empty($retval[2])) ? $retval[2] : 'index';
	}
	return $result;
}