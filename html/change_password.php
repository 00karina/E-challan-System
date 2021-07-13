<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: ../html/login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <!--Connecting with CSS- --> 
  <link rel="stylesheet" href="../css/login.css">
   <!--Important links are imported --> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
  <!--This container is main div for login page --> 

  <div class="container ">
    <div class="row">
      <!--Dividing container into 3 equal column  --> 
      <div class="col-sm-4 ">
      </div>
       <!--Adding  blue border  --> 
      <div class="col-sm-4 border border-info">
        <img src="../images/logo1.png" class="img-circle" alt="logo" width="80%">
        <!--Connecting with PHP --> 
        <form action="../backend/backend_change_password.php" method="post">
          <!--displays error message if required-->
          <?php if (isset($_GET['error'])) { ?>
            <p class="error" style="color:red; text-align: center;"><?php echo $_GET['error']; ?></p>
          <?php } ?>
            <!-- Making form group--> 
          <div class=" form-group">
            <label for="text"><strong>Enter new Password</strong></label>
            <input type="password" class="form-control" id="pwd" placeholder="New password" name="password" required>
          </div>

          <div class="form-group">
            <label for="pwd"><strong>Re-enter new password</strong></label>
            <input type="password" class="form-control" id="pwd" placeholder="Confirm password" name="re_password" required>
          </div>
          <!--Adding container for button--> 
          <div class="container text-center">
            <!--Adding button with the help of bootstrap --> 
            <button type="login" class="btn btn-info "><strong>Save</strong></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>