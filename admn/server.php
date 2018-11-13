<?php

class dbconnect {
	private $server = "localhost";
	private $dbname = "phpdb";
	private $username = "root";
	private $password = "";
	public $conn;
	
	public function __construct() {
		try {
			$this->conn = new PDO("mysql:host=$this->server;dbname=$this->dbname", $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}
	
	public function __destruct() {
		$this->conn = null;
	}
}

?>