<?php

function connect()
{
	$conn = new mysqli("localhost","root","","agriculture");
	if($conn->connect_errno){
		die("Connection failed due to " .$conn->connect_error);
	}

	return $conn;
}



?>