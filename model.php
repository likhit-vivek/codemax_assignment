<?php

class Model 
{
	private $model, $manufacturer, $color, $mfdYear, $regNum, $note;
	private $db;
	
	public function __construct($model, $manufacturer, $color, $mfdYear, $regNum, $note) 
	{
		$this->model 		= $model;
		$this->manufacturer = $manufacturer;
		$this->color 		= $color;
		$this->mfdYear 		= $mfdYear;
		$this->regNum 		= $regNum;
		$this->note 		= $note;
		$this->db			= new Database();
	}
	
	public function addModel() {
		$query 	= "INSERT INTO models (name, manufacturer, color, mfdyear, regnum, note, sold) VALUES 
					('$this->model', $this->manufacturer, '$this->color', '$this->mfdYear', '$this->regNum', '$this->note', false)";
		$result = $db->executeQuery($query);
	}
}

?>