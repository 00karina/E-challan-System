<?php
	$db_host = "localhost";
	$db_name = "e-challan";
	$db_username = "root";
	$db_password = "";
	//connecting database
	$conn = mysqli_connect($db_host,$db_username,$db_password, $db_name);
	//checking if database is connected or not
	if (!$conn) {
		die("Databse connection failed!!");
	}