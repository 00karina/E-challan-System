<?php
session_start();
include "connect_db.php";
if (!isset($_SESSION['user'])) {
	header("Location: ../html/login.php");
}
require_once '../dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

if (!isset($_SESSION['user'])) {
    header("Location: ../html/login.php");
} else {
    // getting id from url
    $id = $_GET['id'];
    //query to select data from challan table having specific id
    $query = "SELECT * FROM challan WHERE challan_id = $id";

    //runing query and storing data
    $result = mysqli_query($conn, $query);
    $user_data = $result->fetch_assoc();
    $dompdf = new Dompdf();
?>
<!--html code of challan receipt fromat  -->
    <!DOCTYPE html>
    <html>

    <head>
        <title>E-Challan System</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="http://localhost/e-challan/css/pdf.css">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
        <div class="container text-center">
 <img src="http://localhost/e-challan/images/logo1.png" alt="E-CHALLAN Logo" width="40%">
 <h1>CHALLAN RECEIPT</h1>
    </head>

    <body>
        <div class="container border border-success">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Full Name</th>
                        <td><?php echo $user_data["name"]; ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Place</th>
                        <td><?php echo $user_data["place"]; ?></td>
                    </tr>

                    <tr>
                        <th scope="col">License No.</th>
                        <td><?php echo $user_data["license_no"]; ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Vehicle Type</th>
                        <td><?php echo $user_data["vehicle_type"]; ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Vehicle No.</th>
                        <td><?php echo $user_data["vehicle_no"]; ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Phone No.</th>
                        <td><?php echo $user_data["phone_no"]; ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Fine (in Rs.)</th>
                        <td><?php echo $user_data["fine_amount"]; ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Description</th>
                        <td><?php echo $user_data["challan_desc"]; ?></td>
                    </tr>
                </thead>

            </table>
        </div>
    </body>

    </html>

<?php
    // takes all the html code from same file
    $html = ob_get_clean();
    //enabling different options
    $options = new Options();
    $options->set('isRemoteEnabled', TRUE);
    $options->set('isHtml5ParserEnabled', TRUE);
    $options->setIsRemoteEnabled(true);

    //sets paper sie and orientation 
    $dompdf = new Dompdf($options);
    $dompdf->setPaper('a4', 'landscape');

    //loading html code 
    $dompdf->loadHtml($html, 'UTF-8');
    //rendering loaded html codes
    $dompdf->render();

    //display pdf in browser tab
    $dompdf->stream("challan-receipt-" . $user_data["license_no"], array("Attachment" => 0));
}
?>