<?php
//checks if user logged in or not
session_start();
include "connect_db.php";
if (!isset($_SESSION['user'])) {
	header("Location: ../html/login.php");
}
//checks if username and password field is empty or not
if (isset($_POST['username']) && isset($_POST['password'])) {
	//stores entered username and password in variables
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	//query to select all data having given username and password
	$query = "SELECT * FROM user where username = '$username' AND password = '$password'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_num_rows($result);
	//checks if entered data is in database or not
	if ($row === 1) {
		$user_data = mysqli_fetch_array($result);
		$_SESSION['user'] = $_POST['username'];
		//checks if password is changed by user or not
		if (trim($user_data['password']) != '1234') {
			//checks if user's role is admin or traffic
			if (trim($user_data['role']) == 'admin') {
				header("Location: ../html/Dashboard.php");
				exit();
			} else {
				header("Location: ../html/traffic_panel.php");
				exit();
			}
		} else {
			header("Location: ../html/change_password.php");
			exit();
		}
	} else {
		header("Location: ../html/login.php?error=Invalid username or password");
		exit();
	}
} else {
	header("Location: ../html/login.php?error=Invalid username or password");
	exit();
}
