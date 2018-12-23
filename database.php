<?php

$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));

class Database 
{	
	private $host 		= $cleardb_url['host'];
	private $user 		= $cleardb_url['user'];
	private $pwd 		= $cleardb_url['pass'];
	private $db_name 	= substr($cleardb_url['path'],1);
	/*private $host = "localhost";
	private $user = "root";
	private $pwd = "";
	private $db_name = "codemax_assignment";*/
	public $conn;
	
	public function __construct()
	{
		if(!isset($this->conn)) {
			$this->conn = new mysqli($this->host, $this->user, $this->pwd, $this->db_name);
		}
	}
	
	public function executeQuery($query) {
		return $this->conn->query($query);
	}
}

?>