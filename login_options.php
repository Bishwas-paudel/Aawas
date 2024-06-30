<?php
session_start();
if(isset($_SESSION['Email'])){
 header("location:index.php");
}
include("navbar.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <!-- Link To CSS -->
    <link rel="stylesheet" href="CSS/loginStyle.css">
    <!-- Box Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>

    <section class="container-fluid sign-in-form-section">
        <div class="sign-up" style="text-align: center;">
            <h3 style="font-weight: bold;">How do you want to Login?</h3>
            <hr>
            <p>If you want to sign in as a rental, click on the rental login button. Otherwise, click on the owner login button.</p><br><br>
            <a href="rental-login.php"><button type="submit" class="btn btn-info">Rental Login</button></a>
            <a href='owner-login.php'><button type="submit" class="btn btn-info">Owner Login</button></a>
            <a href="admin-login.php"><button type="submit" class="btn btn-info">Admin Login</button></a>
        </div>
    </section>

    <section class="footer">
        <div class="footer-container container">
            <h2>Thanks For Visiting us</h2>
            <br>
            <div class="footer-box">
                <h3>Quick Links</h3>
                <a href="#">Home</a>
                <a href="#">About Us</a>
            </div>
            <div class="footer-box">
                <h3>Locations</h3>
                <a href="#">Birauta</a>
                <a href="#">Lakeside</a>
                <a href="#">Simalchaur</a>
            </div>
            <div class="footer-box">
                <h3>Contact</h3>
                <a href="#">+9866317885</a>
                <a href="#">info@aawas.com.np</a>
                <br>
           
            </div>
        </div>
    </section>
</body>
</html>
