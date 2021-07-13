<?php
session_start();
include "connect_db.php";
if (!isset($_SESSION['user'])) {
    header("Location: ../html/login.php");
}
?>
<?php
include "connect_db.php";

$id = $_POST['id'];

// Attempt update query execution
$sql = "DELETE from user WHERE user_id=$id";

if ($conn->query($sql) === true) {
    header("Location: ../html/ViewUser.php?success=Successfully Deleted");

} else {

    header("Location: ../html/ViewUser.php?error=Error while deleting user");
}

// Close connection
$conn->close();


