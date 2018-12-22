<?php

require_once 'database.php';

/*** 
The code from line 10 to line 16 is used to call appropriate function as required.
Alternative solution: 
Use an intermediate php file which can act as a channel between the AJAX call and the class function below.
***/
$selfObject = new Model();

if($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	$name 			= $_POST['name'];
	$manufacturer 	= $_POST['manufacturer'];
	$color 			= $_POST['color'];
	$year 			= $_POST['year'];
	$regNum 		= $_POST['regNum'];
	$note 			= $_POST['note'];
	if($_POST['functionName'] == 'addModel') echo $selfObject->addModel($name, $manufacturer, $color, $year, $regNum, $note);
}

class Model 
{
	private $db;
	
	public function __construct() 
	{
		$this->db = new Database();
	}
	
	public function addModel($name, $manufacturer, $color, $year, $regNum, $note) 
	{
		if($name == "" || $manufacturer == "" || $color == "" || $year == "" || $regNum == "" || $note == "") {
			return json_encode(['success'=> false, 'msg'=> 'Please enter all values!']);
		}
		
		$query 	= "INSERT INTO models (name, manufacturer, color, mfdyear, regnum, note, sold) VALUES 
					('$name', $manufacturer, '$color', '$year', '$regNum', '$note', false)";
		$result = $this->db->executeQuery($query);
		
		if($result) {
			return json_encode(['success'=> true, 'msg'=> 'success']);
		} else {
			return json_encode(['success'=> false, 'msg'=> 'Unable to add model. Try again.']);
		}
	}
	
	public function getModelsByGroup()
	{
		$query = "SELECT name, manufacturer, COUNT(name) as count FROM models WHERE sold=0 GROUP BY manufacturer, name";
		$result = $this->db->executeQuery($query);
		return $result;
	}
}

?>