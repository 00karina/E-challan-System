<?php
//checking if user is logged in or not
session_start();
include "connect_db.php";
if (!isset($_SESSION['user'])) {
	header("Location: ../html/login.php");
}
//destroying the session with its variable
session_destroy();
//returning back to login page
header("Location: ../html/login.php");
echo '<script>alert("You have been Logged out!!")</script>';
