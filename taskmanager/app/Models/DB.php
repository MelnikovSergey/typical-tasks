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

	private function connect($db_connections = null) {

		if($this->db_connections instanceof \mysqli && $this->db_connections->ping()) 
			return true;

		$result = new \mysqli($this->db_settings['host'], 
				      $this->db_settings['user_name'],
				      $this->db_settings['password'],
				      $this->db_settings['database']   			
				     );

		if($result::$errno) throw new \Exception($result::$errno);

		$this->db_settings = $result;
	}

	private function disconnect($db_connections = null) {

		if($this->db_connections instanceof \mysqli && $this->db_connections->ping()) 
			$this->db_connections->close();
	}

	/**
	 * @param $select_table - выбрать нужную таблицу
	 * @param $select_values - данные для записи (в виде массива)  
	 * @param bool|false $disconnect - закрыть создинение с БД (опционально)
	 * @return $this
	 * @throws \Exception	
	 */
	public function insert($select_table, $select_values, $disconnect = false) {

		$this->connect();

		$cols = array_keys($select_values);

		$sql_query = "INSERT INTO " . $select_table . " (" . implode(",", $cols) . ") VALUES ('" . implode("','", $select_values) . "')";

		$query_result = $this->db_connections->query($sql_query);

		if(!$query_result) throw new \Exception($this->db_connections->error);

		if($disconnect) $this->disconnect;

		return $this;
	}

	/**
	 * @param $select_table - выбрать нужную таблицу
	 * @param $select_values - данные для записи (в виде массива) 
	 * @param $select_conditions - указать условия (where)
	 * @param bool|false $disconnect - закрыть создинение с БД (опционально)
	 * @return $this
	 * @throws \Exception	
	 */
	public function update($select_table, $select_values, $select_conditions, $disconnect = false) {

		$this->connect();

		$sql_data = [];

		foreach ($select_values as $key => $value) {
			$sql_data[] = $key . "='" . $value . "'";
			  
		}

		$sql_query = "UPDATE " . $select_table . " SET " . implode(",", $sql_data) . " WHERE " . $select_conditions . ";

		$query_result = $this->db_connections->query($sql_query);

		if(!$query_result) throw new \Exception($this->db_connections->error);

		if($disconnect) $this->disconnect;

		return $this;
	}

	// DELETE

}