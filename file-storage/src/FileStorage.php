<?php

class FileStorage
{
	private $store;
	
	public function __construct($store) {
		$this->store = $store;
	}

	private function getFileLocation($key) {
		$key = md5($key);

		$level_1 = $this->store . DIRECTORY_SEPARATOR . substr($key, 0, 2);
		$level_2 = $level_1 . DIRECTORY_SEPARATOR . substr($key, 2, 2);

		if(!file_exists($level_2)) {
			mkdir($level_2, 0755, true);
		}

		return $level_2 . DIRECTORY_SEPARATOR . $key;
	}

	public function set($key, $value, $time_to_life = 0) {
		$path = $this->getFileLocation($key);

		if(!file_exists($path)) {
			touch($path);
		}

		$resource = fopen($path, 'w');
		fwrite($resource, $value);
		fclose($resource);
	}

	public function get($key) {
		$path = $this->getFileLocation($key);

		if($this->has($key)) {

			$resource = fopen($path, 'r');
			$value = fread($resource, filesize($path));
			fclose($resource);

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