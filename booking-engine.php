<?php 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

include("connection/connection.php");

if(isset($_POST['book_property'])){
	
  if(isset($_SESSION["email"])){
    global $db, $property_id;
    $u_email=$_SESSION["email"];

    if (isset($_GET['property_id'])) {
      $property_id = $_GET['property_id'];
    } else {
      echo "Error: Property ID is missing in the URL";
      exit;
    }
    
    $sql="SELECT * FROM rental where email='$u_email'";
    $query=mysqli_query($db,$sql);

    if(mysqli_num_rows($query)>0) {
      while ($rows=mysqli_fetch_assoc($query)) {
        $rental_id=$rows['Rental_id'];

        $sql1="UPDATE add_property SET booked='Yes' WHERE property_id='$property_id'";
        $query1=mysqli_query($db,$sql1);

        $sql2="INSERT INTO booking(property_id,rental_id) VALUES ('$property_id','$rental_id')";
        $query2=mysqli_query($db,$sql2);

        if($query2) {
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
              <?php  
                header("Location:view-property.php");
              ?>
              <!-- <center><strong>Thank you for booking this property.</strong></center> -->
            <script>
              alert("property booked sucessfully");
            </script>
            </div>
          </div>

          <?php
        }
      }
    }
  }
}
?>```
