<?php
//checks if user is logged in or not
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../html/login.php");
}

include "../backend/connect_db.php";
$query = "SELECT * FROM user";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../css/addUser.css">

    <title>E-challan System</title>
</head>

<body>
<div class="container border border-success">

    <?php if (isset($_GET['error'])) { ?>
        <p class="error" style="color:red; text-align: center;"><?php echo $_GET['error']; ?></p>
    <?php } ?>
    <?php if (isset($_GET['success'])) { ?>
        <p class="error" style="color:green; text-align: center;"><?php echo $_GET['success']; ?></p>
    <?php } ?>
    <div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Middle Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Userame</th>
            <th scope="col">Gender</th>
            <th scope="col">Address</th>
            <th scope="col">PhoneNumber</th>
            <th scope="col">Role</th>
            

        </tr>
        </thead>
        <tbody>
        <?php
        //displays all data avaiable in database
        if ($result->num_rows > 0) {
            $a = 0;
            while ($row = $result->fetch_assoc()) {
                $a++;
                ?>
                <tr>
                    <th scope="row"><?php print $a ?></th>
                    <td><?php echo $row["first_name"]; ?></td>
                    <td><?php echo $row["middle_name"]; ?></td>
                    <td><?php echo $row["last_name"]; ?></td>
                    <td><?php echo $row["username"]; ?></td>
                    <td><?php echo $row["gender"]; ?></td>
                    <td><?php echo $row["address"]; ?></td>
                    <td><?php echo $row["phone_no"]; ?></td>
                    <td><?php echo $row["role"]; ?></td>
                    <! --Edit button is connected with backend -->
                    <td><a href="EditUser.php?id=<?= $row['user_id'] ?>" type="button"
                           class="btn btn-outline-info">Edit</a></td>
                           <! --Using modal from bootstrap for popout -->
                    <td><a href="#" type="button" class="btn btn-outline-danger"
                           data-toggle="modal" data-target="#deleteModal<?php echo $row['user_id'] ?>">Delete</a></td>
                   <!-- Model is created and passed tp delete button with help of ID-->
                    <div class="modal fade" id="deleteModal<?php echo $row['user_id'] ?>" role="dialog">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <p>Are you sure you want to permanently delete this record?</p>
                                </div>
                                <!-- This is the footer of model-->
                                <div class="modal-footer">
                                    <form action="../backend/backend_delete.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $row['user_id']?>">
                                        <button name="delete_confirm" type="submit" class="btn btn-light">Ok</button>
                                    </form>
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "<h3>User is not added yet!!</h3>";
        }
        ?>
        </tbody>
    </table>
</div>
    <!--Adding container for button-->
    <div class="container text-left">
        <!--Adding go back to dashboard  button with the help of bootstrap --> 
        <a href="Dashboard.php" class="btn btn-info" role="button">Go back to Dashboard</a>
    </div>
</div>
</div>

</body>


</html>