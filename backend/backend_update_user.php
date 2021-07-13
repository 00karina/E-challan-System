<?php
//This is called or when a session auto starts
session_start();
include "connect_db.php";

//Isset function checks whether a variable is set here is a location provided.
if (!isset($_SESSION['user'])) {
    header("Location: ../html/login.php");
}
?>
<?php
//Include database connection on php.
include "connect_db.php";

//Getting data from the id using POST array from submmited form.
$id = $_POST['id'];
$first_name = $_POST['first_name'];
$middle_name = $_POST['middle_name'];
$last_name = $_POST['last_name'];
$password = $_POST['password'];
$address = $_POST['address'];
$phone_no = $_POST['phone_no'];
$role = strtolower($_POST['role']);
$gender = $_POST['gender'];
$post = $_POST['post'];
//validates name
if (preg_match("/^[a-zA-z]+$/", $first_name) && preg_match("/^[a-zA-z]+$/", $last_name)) {
    //checks validation of phone number
    if (preg_match("/^[9]+[7-8]+\d{8}$/", $phone_no)) {
        // Attempt update query execution
        $sql = "UPDATE user SET first_name= '$first_name',middle_name ='$middle_name',last_name='$last_name', password='$password', address = '$address', phone_no = '$phone_no',role = '$role',gender='$gender',post = '$post' WHERE user_id=$id";
        //If connection is right there is a message to display "successfully updated."
        if ($conn->query($sql) === true) {
            header("Location: ../html/EditUser.php?id=$id&success=Successfully Updated");
        } else {

            header("Location: ../html/EditUser.php?id=$id&error=Error while editing user");
        }
    } else {
        header("Location: ../html/addadmin.php?error=Invalid phone number");
        exit();
    }
} else {
    header("Location: ../html/addtraffic.php?error=Invalid Name");
    exit();
}

// Close connection
$conn->close();
