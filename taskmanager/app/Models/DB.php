<?php

namespace app\Models;

class DB {
	private $db_settings = [
		'host' => 'localhost',
		'user_name' => 'root',
		'password' => 'password',
		'database' => 'taskmanager'		
	];

	private $db_connections;

	public function __construct($db_settings = null) {
		if(!is_null($db_settings)) {
			$this->db_settings = $db_settings;
		}
	}

	private function connections($db_connections = null) {
		$db_ping = $this->db_settings instanceof \mysqli && $this->db_connections->ping();

		if($db_ping) return true;

		$result = new \mysqli($this->db_settings['host'], 
				      $this->db_settings['user_name'],
				      $this->db_settings['password'],
				      $this->db_settings['database']   			
				     );

		if($result::$errno) throw new \Exception($result::$errno);	
	}
}

