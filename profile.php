<?php 
session_start();
if(!isset($_SESSION["email"])){
  header("location:rental-login.php");
}
include('navbar.php');
?>
<style>
    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 300px;
        margin: auto;
        text-align: center;
        font-family: arial;
    }
    button {
        border: none;
        outline: 0;
        display: inline-block;
        padding: 8px;
        color: white;
        background-color: #000;
        text-align: center;
        cursor: pointer;
        width: 100%;
        font-size: 18px;
    }
    button:hover, a:hover {
        opacity: 0.7;
    }
    .form-group {
        text-align: left;
    }
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

<center><h3>Rental Profile</h3></center>
<div class="container">
<?php 
    include("connection/connection.php");
    $u_email = $_SESSION["email"];
    
    // Prepared statement to prevent SQL injection
    $stmt = $db->prepare("SELECT * FROM rental WHERE email=?");
    $stmt->bind_param("s", $u_email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($rows = $result->fetch_assoc()) {
            $rental_id = $rows['Rental_id'];
?>
    <div class="card">
        <img src="images/avatar.png" alt="John" style="height:200px; width: 100%">
        <h1><?php echo htmlspecialchars($rows['full_name']); ?></h1>
        <p class="title"><?php echo htmlspecialchars($rows['email']); ?></p>
        <p><b>Phone No.: </b><?php echo htmlspecialchars($rows['phone_no']); ?></p>
        <p><b>Address: </b><?php echo htmlspecialchars($rows['address']); ?></p>
        <p><b>Id Type: </b><?php echo htmlspecialchars($rows['id_type']); ?></p>
        <p><img src="<?php echo htmlspecialchars($rows['id_photo']); ?>" height="100px"></p>
        <p><button type="button" class="btn btn-lg" data-toggle="modal" data-target="#myModal<?php echo $rental_id; ?>">Update Profile</button></p>

        <!-- Modal -->
        <div class="modal fade" id="myModal<?php echo $rental_id; ?>" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update Profile</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="profileupdate.php">
                            <div class="form-group">
                                <label for="full_name">Full Name:</label>
                                <input type="hidden" value="<?php echo $rental_id; ?>" name="rental_id">
                                <input type="text" class="form-control" id="full_name" value="<?php echo htmlspecialchars($rows['full_name']); ?>" name="full_name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" value="<?php echo htmlspecialchars($rows['email']); ?>" name="email" >
                            </div>
                            <div class="form-group">
                                <label for="phone_no">Phone No.:</label>
                                <input type="text" class="form-control" id="phone_no" value="<?php echo htmlspecialchars($rows['phone_no']); ?>" name="phone_no">
                            </div>
                            <div class="form-group">
                                <label for="address">Password</label>
                                <input type="text" class="form-control" id="address" value="<?php echo htmlspecialchars($rows['password']); ?>" name="password">
                            </div>
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" class="form-control" id="address" value="<?php echo htmlspecialchars($rows['address']); ?>" name="address">
                            </div>
                            <div class="form-group">
                                <label for="id_type">Type of ID:</label>
                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($rows['id_type']); ?>" name="id_type" readonly>
                            </div>
                            <div class="form-group">
                                <label>Your Id:</label><br>
                                <img src="<?php echo htmlspecialchars($rows['id_photo']); ?>" id="output_image" height="100px" readonly>
                            </div>
                            <hr>
                            <center><button id="submit" name="rental_update" class="btn btn-primary btn-block">Update</button></center><br>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
        }
    }
?>
</div>
