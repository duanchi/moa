<?php

namespace privateClass\Account;

class SsoAccounter {
	static private $__instance = null;
	
	static public function init() {
		self::$__instance = new SsoAccount();
	}
	
	static public function getInstance() {
		return self::$__instance;
	}
}