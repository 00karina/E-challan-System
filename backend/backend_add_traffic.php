<?php
//checks if user logged in or not
session_start();
include "connect_db.php";
if (!isset($_SESSION['user'])) {
	header("Location: ../html/login.php");
}
//checks if user pressed Create button
if (isset($_POST['create'])) {
	//takes all entered values and stores in variables
	$username = trim($_POST['username']);
	$address = $_POST['address'];
	$first_name = trim($_POST['first_name']);
	$middle_name = trim($_POST['middle_name']);
	$last_name = trim($_POST['last_name']);
	$phone_no = trim($_POST['phone_no']);
	$postt = trim($_POST['postt']);
	$gender = trim($_POST['gender']);
	$password = "1234";
	$role = "traffic";
	//database query to select all data from table user with given username
	$query = "SELECT * FROM user where username = '$username'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_num_rows($result);
	//checks if given username is valid or not
	if ($row > 0) {
		//changes url if username is not valid 
		header("Location: ../html/addtraffic.php?error=Username already taken");
		exit();
	} else {
		//validates name
		if (preg_match("/^[a-zA-z]+$/", $first_name) && preg_match("/^[a-zA-z]+$/", $last_name)) {
			//checks validation of phone number
			if (preg_match("/^[9]+[7-8]+\d{8}$/", $phone_no)) { 
				//database query to add data in table
				$query_add = "INSERT INTO user(first_name, middle_name, last_name, username, password, address, phone_no, role, gender, post) VALUES ('$first_name','$middle_name','$last_name','$username','$password','$address','$phone_no','$role','$gender','$postt')";
				//inserts data
				if (mysqli_query($conn, $query_add)) {
					header("Location: ../html/addtraffic.php?success=User added successfully");
					exit();
				} else {
					header("Location: ../html/addtraffic.php?error=Error while adding user");
					exit();
				}
			} else {
				header("Location: ../html/addtraffic.php?error=Invalid phone number");
				exit();
			}
		} else {
			header("Location: ../html/addtraffic.php?error=Invalid Name");
			exit();
		}
	}
} else {
	echo '<script>alert("Error while adding user!")</script>';
}
