<?php
function init_request() {
	$result = FALSE;
	//$request == NULL ? $request = $_GET : FALSE ;
	//$request['template_path'] = '';
	$request = explode('&',$_SERVER['QUERY_STRING'],2);
	//if (isset($request[1])) $result = parse_url($request[1]);
	return $request[1];
}