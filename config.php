<?php
	//Hide errors
	//error_reporting(0);
	//ini_set('display_errors', 0); 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "ico2invest_DB";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
?>