<?php 

require 'database.php';

class Manufacturer
{
	private $name;
	private $db;
	
	public function __construct($name)
	{
		$this->name = $name;
		$this->db 	= new Database();
	}
	
	public function addManufacturer() 
	{
		$query 	= "INSERT INTO manufacturers (name) VALUES ($this->name)";
		$result = $db->executeQuery($query);
	}
}

?>