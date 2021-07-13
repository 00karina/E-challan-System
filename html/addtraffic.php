<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: ../html/login.php");
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>E-Challan System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!--Important links are imported --> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!--Connecting with CSS- --> 
  <link rel="stylesheet" href="../css/addUser.css">
</head>

<body>
  <!--Connecting with PHP --> 
  <form action="../backend/backend_add_traffic.php" method="post">
    <div class="container border border-success">
      <div class="row">
         <!--Here row is divided into 5 and 4 column -->
        <div class="col-sm-5">
        </div>
        <div class="col-sm-4">
          <!--Adding logo of echallan system -->
          <img src="../images/logo1.png" width="50%" height="100%">

        </div>
      </div>
      <!--displays error message if required-->
      <?php if (isset($_GET['error'])) { ?>
        <p class="error" style="color:red; text-align: center;"><?php echo $_GET['error']; ?></p>
      <?php } ?>
      <!--displays success message if required-->
      <?php if (isset($_GET['success'])) { ?>
        <p class="error" style="color:green; text-align: center;"><?php echo $_GET['success']; ?></p>
      <?php } ?>
      <div class="form-row">
         <!--Here each row is further divided into 3 equal part- --> 
        <div class="form-group col-md-4">
          <label for="inputEmail4"><strong>First Name</strong><span style="color: red">*</span></label>
          <input type="text" class="form-control" placeholder="" name="first_name" required>
        </div>

        <div class="form-group col-md-4">
          <label for="inputEmail4"><strong>Middle Name</strong></label>
          <input type="text" class="form-control" placeholder="" name="middle_name">
        </div>

        <div class="form-group col-md-4">
          <label for="inputPassword4"><strong>Last Name</strong><span style="color: red">*</span></label>
          <input type="text" class="form-control" placeholder="" name="last_name" required>
        </div>
      </div>

      <div class="form-row">
         <!--Here each row is further divided into 2 equal part- --> 
        <div class="form-group col-md-4">
          <label for="inputState"><strong>Gender</strong><span style="color: red">*</span></label>
          <select id="inputState" class="form-control" name="gender" required>
            <option selected>Male</option>
            <option>Female</option>
          </select>
        </div>


        <div class="form-group col-md-4">
          <label for="inputAddress"><strong>UserName</strong><span style="color: red">*</span></label>
          <input type="text" class="form-control" placeholder="" name="username" required>
        </div>
      </div>

      <div class="form-row">
         <!--Here each row is further divided into 3 equal part- --> 
        <div class="form-group col-md-4">
          <label for="inputAddress2"><strong>Address</strong><span style="color: red">*</span> </label>
          <input type="text" class="form-control" placeholder="" name="address">
        </div>
        <div class="form-group col-md-4">
          <label for="inputAddress2"><strong>Phone No.</strong><span style="color: red">*</span></label>
          <input type="text" class="form-control" placeholder="" name="phone_no" required>
        </div>
        <div class="form-group col-md-4">
          <label for="inputAddress2"><strong>Post</strong><span style="color: red">*</span></label>
          <input type="text" class="form-control" placeholder="" name="postt" required>
        </div>
      </div>




      <div class="container text-center">
        <!--Adding Create  button with the help of bootstrap --> 
     

        <button type="login" class="btn btn-success" name="create"><strong>Create</strong></button>
      </div>

     <!--Adding container for button--> 
      <div class="container text-left">

           <!--Adding go back to dashboard button with the help of bootstrap --> 
        <a href="Dashboard.php" class="btn btn-info" role="button">Go back to Dashboard</a>
      </div>
    </div>
  </form>
</body>

</html>