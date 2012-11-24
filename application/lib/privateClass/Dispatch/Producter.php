<?php

namespace privateClass\Dispatch;

class Producter {
	static private $__instance = null;
	
	static public function init() {
		self::$__instance = new Product();
	}
	
	static public function getInstance() {
		return self::$__instance;
	}
}