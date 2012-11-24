<?php

namespace privateClass\Auth;

class Accounter {
	static private $__instance = null;
	
	static public function init() {
		self::$__instance = new Account();
	}
	
	static public function getInstance() {
		return self::$__instance;
	}
}

?>