<?php

namespace privateClass\Dispatch;

class Dispatcher {
	static private $__instance = null;
	
	static public function init() {
		self::$__instance = new Dispatch();
	}
	
	static public function getInstance() {
		return self::$__instance;
	}
}