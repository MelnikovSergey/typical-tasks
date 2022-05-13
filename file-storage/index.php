<?php

class FileStorage
{
	private $store;
	
	public function __construct($store) {
		$this->store = $store;
	}
}

$fs1 = new FileStorage('cache');
$fs2 = new FileStorage('user_cache');