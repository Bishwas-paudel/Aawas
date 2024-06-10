<?php
session_start();
if (isset($_SESSION["email"])) {
    header("Location: owner/owner-index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <style>
        .alert {
            padding: 20px;
            background-color: red;
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
</head>
<body>
    <header>
        <div class="nav container">
            <a href="index.php" class="logo"><i class='bx bx-home'></i>AAWAS</a>
            <a href="register_options.php" class="btn">Register</a>
        </div>
    </header>

    <div class="login container">
        <div class="login-container">
            <h2>Login To Continue</h2>
            <p>Welcome Back</p>
            <?php
            if (isset($_SESSION['login_error'])) {
                echo "<div class='alert'>
                    <span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span>
                    <strong>{$_SESSION['login_error']}</strong> Click here to <a href='owner-register.php' style='color: lightblue;'><b>Register</b></a>.
                    </div>";
                unset($_SESSION['login_error']); // Clear the error after displaying it
            }
            ?>

            <form method="POST" action="owner-operation.php">
                <span>Enter your email address</span>
                <input type="email" name="email" placeholder="Enter Email" required>
                <span>Enter your password</span>
                <input type="password" name="password" placeholder="Password" required>
                <input type="submit" name="owner_login" value="Login" class="button" style="border-radius: 10px;">
                <a href="#">Forget Password?</a>
            </form>
            <a href="owner-register.php" class="btn">Register now</a>
        </div>
        <div class="login-image" style="margin-left: 200px;">
            <video loop height="500px" width="500px" " autoplay>
                <source src="video/Red and Blue Modern YouTube Intro Video .mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </div>
    
    <section class="footer">
        <div class="footer-container container">
            <h2>Rent Room</h2>
            <div class="footer-box">
                <h3>Quick Links</h3>
                <a href="index.php">Home</a>
                <a href="aboutus .php">About Us</a>
                <a href="#">Properties</a>
            </div>
            <div class="footer-box">
                <h3>Locations</h3>
                <a href="#">Birauta</a>
                <a href="#">lakeside</a>
                <a href="#">Simalchaur</a>
            </div>
            <div class="footer-box">
                <h3>Contact</h3>
                <a href="#">986617885</a>
                <a href="#">info@aawas.com.np</a>
                <div class="social">
                    <a href="#"><i class='bx bxl-twitter'></i></a>
                    <a href="#"><i class='bx bxl-instagram'></i></a>
                </div>
            </div>
        </div>
    </section>
    <div class="copyright">
        <p>&#169;AAWAS All Right Reserved</p>
    </div>
</body>
</html>
