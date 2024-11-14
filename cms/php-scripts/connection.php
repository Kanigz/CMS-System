<?php

class Database {
	private $_connection;
	private static $_instance;
	private $_server = "localhost";
	private $_username = "root";
	private $_password = "";
	private $_database = "cms";

	public static function getInstance() {
		if(!self::$_instance) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	private function __construct() {
		$this->_connection = new mysqli($this->_server, $this->_username, 
			$this->_password, $this->_database);
	
		if(mysqli_connect_error()) {
			trigger_error("Błąd połączenia MySQL: " . mysql_connect_error(),
				 E_USER_ERROR);
		}
	}

	private function __clone() { }

	public function getConnection() {
		return $this->_connection;
	}
}

?>