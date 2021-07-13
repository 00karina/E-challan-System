<?php
//checks if user logged in or not
session_start();
include "connect_db.php";
if (!isset($_SESSION['user'])) {
	header("Location: ../html/login.php");
}

//checks if username and password field is empty or not
if (isset($_POST['password']) && isset($_POST['re_password'])) {
    //stores entered password and re-entred password in variables
    $password = trim($_POST['password']);
    $re_password = trim($_POST['re_password']);
    $username = $_SESSION['user'];
    // query to select all data having given username and password
    $query = "SELECT * FROM user where username = '$username'";
    $result = mysqli_query($conn, $query);
    $row = $result->fetch_assoc();
    //checks if the new password is same as old or not
    if ($password == "1234") {
        header("Location: ../html/change_password.php?error=New Password matched with old password");
    }
    //checks if the re-entered password is matched with password
     elseif ($password != $re_password) {
        header("Location: ../html/change_password.php?error=Password did not match");
    } else {
        //updates password of requested user
        $query_password = "UPDATE user SET password = '$password' WHERE user_id = $row[user_id]";
        if (mysqli_query($conn, $query_password)) {
            header("Location: ../html/login.php?success=Password successfully changed");
        } else {
            header("Location: ../html/change_password.php?error=Error while changing password");
        }
    }
} else {
    header("Location: ../html/change_password.php?error=Password field is empty");
    exit();
}
