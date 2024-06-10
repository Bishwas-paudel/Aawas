<?php
session_start();
if(isset($_SESSION['Email'])){
 header("location:index.php");
}
include("navbar.php");

?>

<section class="container-fluid sign-in-form-section">

</section>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <!-- LInk To CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Box Icons -->
    <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
 
    
            <div class="row">
                
                <div class="col-md-12 sign-up" style="text-align: center;">
                    <h3 style="font-weight: bold;">How do you want to Login?</h3><hr>
                    <p>If you want to sign in as a rental click on rental login button otherwise click on owner login button.</p><br><br>
                    <a href="rental-login.php"><button type="submit" class="btn btn-info"   style="width:200px;">Rental Login</button></a>
                    <a href='owner-login.php'><button type="submit" class="btn btn-info"   style="width:200px;">Owner Login</button></a>
                   <a href="admin-login.php"> <button type="submit" class="btn btn-info"  style="width:200px;">Admin Login</button></a>
                </div>
                
            </div>
        

    <section class="footer">
        <div class="footer-container container">
            <h2>Rent Room</h2>
            <div class="footer-box">
                <h3>Quick Links</h3>
                <a href="#">Home</a>
                <a href="#">Aboutus</a>
            
               
            </div>
            <div class="footer-box" >
                <h3>Locations</h3>
                <a href="#">Birauta</a>
                <a href="#">Lakeside</a>
                <a href="#">Simalchaur</a>
            </div>
            <div class="footer-box">
                <h3>Contact</h3>
                <a href="#">+9866317885</a>
                <a href="#">info@aawas.com.np</a>
                <div class="social">
                    <a href="#"><i class='bx bxl-facebook' ></i></a>
                    <a href="#"><i class='bx bxl-twitter' ></i></a>
                    <a href="#"><i class='bx bxl-instagram' ></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- Copyright -->
    <div class="copyright">
        <p>&#169; Aawas All Right Reserved</p>
    </div>

    
</body>
</html>

?>