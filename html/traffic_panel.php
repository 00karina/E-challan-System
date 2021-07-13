<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: ../html/login.php");
}
include "../backend/connect_db.php";
$query = "SELECT * FROM user where username = '{$_SESSION['user']}'";
$result = mysqli_query($conn, $query);
$row = $result->fetch_assoc();;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>E-Challan System</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../css/traffic.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <ul class="list-unstyled components">

                <li class="active">
                    <a href="traffic_panel.php">
                        <i class="fas fa-home "></i>
                        Dash board
                    </a>
                </li>

            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid ">

                    <button type="button" id="sidebarCollapse" class="btn btn-success">
                        <i class="fas fa-align-left"></i>
                        <span></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="../images/logo1.png" width="180" height="120" class="d-inline-block align-top" alt="">
                    </a>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav ml-auto">


                            <li>
                                <a href="../backend/logout.php" name="logout">
                                    <i class="fas fa-sign-out-alt"></i>Sign out</a>
                            </li>
                        </ul>
                    </div>


                </div>
            </nav>

            <div class="container">
                <div class="container text-center" style="font-family: sans-serif;padding: 15px;
                color:green;text-shadow: 1px 1px 1px #000, 
               2px 2px 15px lightgreen;">
                    <h4>Welcome to Traffic Dashboard</h4>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                    </div>
                    <div class="col-sm-4">
                        <img src="../images/traffic.png" width="310px" height="250px">

                    </div>
                </div>
            </div>

            <div class="container ">

                <div class="row">
                    <div class="col-sm-1">
                    </div>
                    <div class="col-sm-4 pop">

                        <a href="addchallan.php" class="btn btn-outline-success" role="button">Create Challan</a>
                    </div>
                    <div class="col-sm-3">

                    </div>
                    <div class="col-sm-4">

                        <a href="viewchallan.php" class="btn btn-outline-success" data-toggle="tooltip" title="Update and Delete Challan" role="button">View Challan</a>

                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-4" style="margin-left:10px;">
                        <?php
                        if (strcmp(trim($row['role']),"admin") == 0) {
                        ?>
                            <a href="Dashboard.php" class="btn btn-success" role="button">Go to admin Dashboard</a>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="col-sm-4">

                    </div>

                </div>
            </div>

        </div>
    </div>

    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });

        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>

</html>