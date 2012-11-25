<?php

namespace privateClass\Auth;

class Auth {
	
	public function __construct() {
		if(!isset($_SESSION)) session_start();
		//\Yaf\Session::start();
	}
	
	public function get_auth() {
		
	}
	
}

?>