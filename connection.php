<?php

function Connect()
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "CarRentalSystem";

	//Create Connection
	$conn = new mysqli($servername, $username, $password, $dbname); 
	// Check connection
	if($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	  }
    
	return $conn;
}
?>