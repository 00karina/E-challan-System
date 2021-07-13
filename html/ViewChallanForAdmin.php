<?php
//checks if user is logged in or not
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: ../html/login.php");
}
?>
<?php
include "../backend/connect_db.php";
$query = "SELECT * FROM challan";
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
    <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Full Name</th>
          <th scope="col">Place</th>
          <th scope="col">License No.</th>
          <th scope="col">Vehicle Number</th>
          <th scope="col">Vehicle Type</th>
          <th scope="col">Phone Number</th>
          <th scope="col">Fine (in Rs.)</th>
          <th scope="col">Description</th>
          <th scope="col">Created By</th>

        </tr>
      </thead>
      <tbody>
        <?php
        //displays all data avaiable in database in the while loop
        if ($res = $result->num_rows > 0) {
          $a = 0; //counter to count number of data
          while ($row = $result->fetch_assoc()) {
            $a++;
        ?><tr>
              <td><?php print $a ?></td>
              <td><?php echo $row["name"]; ?></td>
              <td><?php echo $row["place"]; ?></td>
              <td><?php echo $row["license_no"]; ?></td>
              <td><?php echo $row["vehicle_no"]; ?></td>
              <td><?php echo $row["vehicle_type"]; ?></td>
              <td><?php echo $row["phone_no"]; ?></td>
              <td><?php echo $row["fine_amount"]; ?></td>
              <td><?php echo $row["challan_desc"]; ?></td>
              <td><?php echo $row["created_by"]; ?></td>
              <td><a href="Editchallan.php?id=<?= $row['challan_id'] ?>" type="button" class="btn btn-outline-info">Edit</a></td>
              <!--Using modal from bootstrap for popout-->
              <td><a href="" type="button" data-target="#deleteModal<?php echo $row['challan_id'] ?>" data-toggle="modal" class="btn btn-outline-danger">Delete</a></td>
              <!--Print button is connected with backend-->
              <td> <a href="../backend/convert_pdf.php?id=<?php echo $row['challan_id'] ?>" target="_blank" type="button" class="btn btn-outline-success">Print</a></td>
               <!--Model is created and passed up to delete button with the help of ID-->
              <div class="modal fade" id="deleteModal<?php echo $row['challan_id'] ?>" role="dialog">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-body">
                      <p>Are you sure you want to permanently delete this record?</p>
                    </div>
                  <!--This is the footer of model-->
                    <div class="modal-footer">
                      <form action="../backend/backend_delete_challan.php?from=admin" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['challan_id'] ?>">
                        <button name="delete_confirm" type="submit" class="btn btn-light">Ok</button>
                      </form>
                      <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    </div>
                  </div>
                </div>
              </div>

            </tr>
        <?php
          }
        } else {
          echo "Challan is not added by the user!! " . $created_by;
        }
        ?>
      </tbody>
    </table>
  </div>
    <!--Adding container for button-->
    <div class="container text-left">
     <!--Adding go back to dashboard button using bootstrap--> 
      <a href="Dashboard.php" class="btn btn-info" role="button">Go back to Dashboard</a>
    </div>
  </div>
  </div>

</body>




</html>