<?php

namespace privateClass\Auth;

class Auther {
	static private $__instance = null;
	
	static public function init() {
		self::$__instance = new Auth();
	}
	
	static public function getInstance() {
		return self::$__instance;
	}
}

?>