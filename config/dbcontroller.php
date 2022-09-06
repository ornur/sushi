<?php

//Defining the variables
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'sushibase');
//Using variables in one variable
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Functions to 
class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "sushibase";
	private $conn;
	
	//Called on an object after it has been created
	function __construct() {
		$this->conn = $this->connectDB();
	}
	//Connect Database
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
	
	// Makes the proper call to query the database
	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	//Returns the number of rows in the resulting selection.
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
}
?>