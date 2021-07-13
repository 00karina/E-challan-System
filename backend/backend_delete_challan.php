<?php
session_start();
include "connect_db.php";
if (!isset($_SESSION['user'])) {
    header("Location: ../html/login.php");
}
?>
<?php
include "connect_db.php";

$challan_id = $_POST['id'];

// Attempt update query execution
$sql = "DELETE from challan WHERE challan_id=$challan_id";

if ($conn->query($sql) === true) {

    if(isset($_GET['from'])&&$_GET['from']=='admin'){
        header("Location: ../html/ViewChallanForAdmin.php?success=Successfully Deleted");

    }else{
        header("Location: ../html/viewchallan.php?success=Successfully Deleted");

    }

} else {
    if(isset($_GET['from'])&&$_GET['from']=='admin'){
        header("Location: ../html/ViewChallanForAdmin.php?success=Error while deleting challan");

    }else{
        header("Location: ../html/viewchallan.php?error=Error while deleting challan");

    }

}

// Close connection
$conn->close();



