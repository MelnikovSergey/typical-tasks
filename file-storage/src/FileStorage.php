<?php

class FileStorage
{
	private $store;
	
	public function __construct($store) {
		$this->store = $store;
	}

	private function getFileLocation($key) {
		return $this->store . DIRECTORY_SEPARATOR . md5($key);
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