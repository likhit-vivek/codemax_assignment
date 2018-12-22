<?php

class Database 
{	
	private $host = "localhost";
	private $user = "root";
	private $pwd = "";
	private $db_name = "codemax_assignment";
	public $conn;
	
	public function __construct()
	{
		$this->conn = new mysqli($host, $user, $pwd, $db_name);
	}
	
	public function executeQuery($query) {
		return $mysqli->query($query);
	}
}

?>