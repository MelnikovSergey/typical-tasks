<?php

class FileStorage
{
	private $store;
	
	public function __construct($store) {
		$this->store = $store;
	}

	private function getFileLocation($key) {
		return $this->store . DIRECTORY_SEPARATOR . $key;
	}

	public function set($key, $value, $time_to_life = 0) {
		$path = $this->getFileLocation($key);
		# var_dump($path);

		if(!file_exists($path)) {
			touch($path);
		}

		file_put_contents($path, $value);
	}

	public function get($key) {
		$path = $this->getFileLocation($key);

		if($this->has($key)) {
			$value = file_get_contents($path);

			return $value;
		} else {
			return null;
		}
	}

	public function has($key) {
		$path = $this->getFileLocation($key);
		
		return file_exists($path);
	}

	public function update($key, $value) {
		//..
	}

	public function delete($key) {
		$path = $this->getFileLocation($key);

		if($this->has($key)) {
			unlink($path);
		} else {
			return null;
		}
	}
}