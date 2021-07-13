<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../html/login.php");
}
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
    <link rel="stylesheet" href="../css/admin.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>
  <!--This is the main div -->
    <div class="wrapper">
        <!-- Sidebar  -->
         <!--THis is sidebar-->
        <nav id="sidebar">

        
            <ul class="list-unstyled components">
            <!--Here link is placed and conneted to trafficRules page-->
                <li class="active">
                    <a href="Dashboard.php">
                         <!-- Adding icon from font-awesome  --> 
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

                    <button type="button" id="sidebarCollapse" class="btn btn-info" >
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
                color:#17A2B8;text-shadow: 1px 1px 1px #000, 
               2px 2px 15px lightblue;">
                    <h4>Welcome to Admin Dashboard</h4>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                    </div>
                    <div class="col-sm-4 " id="image">
                     <!--logo of echallan is added-->
                     <div class="img-fluid">
                        <img src="../images/image.png" width="170%" height="100%">
                     </div>
                    </div>
                </div>
            </div>
               <!-- In this container all button is placed-->
            <div class="container ">
                <div class="row">
                     <!--Here columns are divided into 2,4,3,2 part with help of bootstrap -->
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-4">
                        <a href="addtraffic.php" class="btn btn-outline-info" role="button">Add Traffic</a>
                         
                    </div>
                    <div class="col-sm-3">
                       
                    </div>
                    <div class="col-sm-2">
                       <a href="ViewUser.php" class="btn btn-outline-info " role="button" style="margin-bottom: 20px;">View User</a>
                        


                    </div>
                </div>
            </div>

            <div class="container ">
                <div class="row">
                    <div class="col-sm-2">
                        

                    </div>
                    <div class="col-sm-3">
                    
                      <a href="addadmin.php" class="btn btn-outline-info" role="button" >Add Admin</a>
                    </div>
                    <div class="col-sm-4">
                      <a href="traffic_panel.php" class="btn btn-info " role="button">Go to traffic Dashboard</a>   
                    </div>
                    <div class="col-sm-2">
                      <a href="ViewChallanForAdmin.php" class="btn btn-outline-info " role="button">View Challan</a>
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
        
    </script>
    
</body>

</html>