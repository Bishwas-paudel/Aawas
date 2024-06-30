<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include("connection/connection.php");
require 'Esewa.php';
use Xentixar\EsewaSdk\Esewa;

global $db, $property_id, $booked;
$booked = "No";

if (isset($_POST['book_property'])) {
    if (isset($_SESSION["email"])) {
        $u_email = $_SESSION["email"];

        if (isset($_GET['property_id'])) {
            $property_id = $_GET['property_id'];
        } else {
            echo "Error: Property ID is missing in the URL";
            exit;
        }

        $sql = "SELECT * FROM rental WHERE email='$u_email'";
        $query = mysqli_query($db, $sql);

        if (mysqli_num_rows($query) > 0) {
            while ($rows = mysqli_fetch_assoc($query)) {
                $rental_id = $rows['Rental_id'];
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $amount = 1000; // Amount to be paid
                    $success_url = 'http://localhost/aawas-test/view-property.php?property_id='.$property_id;
                    $failure_url = 'http://localhost/Aawas-test/view-property.php';
                    $product_code = 'EPAYTEST';
                    $secret_key = '8gBm/:&EnhH.1/q';
                    $esewa = new Esewa();
                    $esewa->config($success_url, $failure_url, $amount, $product_code, $secret_key);
                    $esewa->init(false); 
                    $date=date("D M d Y");
                    $d2=(String)$date;
                    $sql1 = "INSERT INTO booking(property_id, rental_id,Deposit_Amount,Booked_date) VALUES ('$property_id', '$rental_id','1000','$d2')";
                    $query1 = mysqli_query($db, $sql1);
                
                    if ($query1) {
                       
                    $sql2 = "UPDATE add_property SET booked='Yes' WHERE property_id='$property_id'";
                    $query2 = mysqli_query($db, $sql2);
                    }
                } else {
                    echo "Invalid request method.";
                }

                if ($booked == "Yes") {
                    ?>

                    <style>
                        .alert {
                            padding: 20px;
                            background-color: #DC143C;
                            color: white;
                        }

                        .closebtn {
                            margin-left: 15px;
                            color: white;
                            font-weight: bold;
                            float: right;
                            font-size: 22px;
                            line-height: 20px;
                            cursor: pointer;
                            transition: 0.3s;
                        }

                        .closebtn:hover {
                            color: black;
                        }
                    </style>

                    <script>
                        window.setTimeout(function() {
                            $(".alert").fadeTo(1000, 0).slideUp(500, function(){
                                $(this).remove();
                            });
                        }, 2000);
                    </script>

                    <div class="container">
                        <div class="alert" role='alert'>
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                            <center><strong>Thank you for booking this property.</strong></center>
                        </div>
                    </div>

                    <?php
                }
            }
        }
    }
}
?>
