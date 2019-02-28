<?php

class MySingleton
{
	private static $instance;

	public static function getInstance() {
		if (!self::$instance) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	private function __construct() {}
	private function __clone() {}
}

$a = MySingleton::getInstance();
$a = MySingleton::getInstance();
$a = MySingleton::getInstance();
$a = MySingleton::getInstance();