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
    <!-- <link rel="stylesheet" href="style2.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <style>
        /* Google Fonts */
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

/* Navbar section css */
* {
  font-family: "Poppins", sans-serif;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  scroll-behavior: smooth;
  scroll-padding-top: 3rem;
  list-style: none;
  text-decoration: none;
}
:root {
  --main-color:  #9448d2;
  --second-color: #192f6a;
  --text-color: #314862;
  --bg-color: #ffffff;
  --box-shadow: 2px 2px 18px rgb(14 52 54 / 15%);
}
img {
  width: 100%;
}
body {
  background-color: #faf5ff;
  color: var(--text-color);
}
section {
  padding: 4.5rem 0 3rem;
}
.container {
  max-width: 1068px;
  margin-left: auto;
  margin-right: auto;
}


/* nav section css */
header {
  position: relative;
  padding: 0;
}

/* nav links css */
ul li {
  list-style: none;
}

ul li a {
  text-decoration: none;
  color: #313638;
  font-size: 1rem;
  font-weight: bolder;
}

ul li a:hover {
  color: #9448d2;
}

.navbar {
  width: 100%;
  /* background-color: rgb(246, 210, 241); */
  height: 80px;
  max-width: 1800px;
  margin: 0;
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.navbar .logo img {
  margin: 30px 15px 5px -15px;
  height: 100px;
  width: 100px;
  position: relative;
}

/* HEADER */


.navbar .links {
  display: flex;
  gap: 2rem;
}

.navbar .Btns {
  display: flex;
  gap: 2rem;
  border: 0.5px;
  border-radius: 3px;
}

/* Action buttons */
.action_btn {
  background-color: #9448d2;
  color: #fff;
  border: none;
  outline: none;
  border-radius: 20px;
  font-size: 0.8rem;
  font-weight: bold;
  cursor: pointer;
  margin: 10px;
  padding: 0.5rem 1rem;
}

.action_btn:hover {
  scale: 1.05;
  background-color: #b16bea;
}

.action_btn:active {
  scale: 0.95;
}

/* css for alert */
        .alert {
            padding: 20px;
            background-color: red;
            color: white;
        }

        /* Css for close btn */
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
/* Log IN */
.login {
  display: grid;
  grid-template-columns: 0.4fr 1fr;
  align-items: center;
  min-height: 100vh;
  margin-top: 2rem;
}
.login-container {
  display: flex;
  flex-direction: column;
  row-gap: 1rem;
}
.login-container h2 {
  font-size: 1.4rem;
}
.login-container p {
  font-size: 0.9rem;
}
.login-container form {
  display: flex;
  flex-direction: column;
}
.login-container form span {
  font-size: 0.9rem;
  color: #8a8a8a;
  margin-bottom: 4px;
}
.login-container form input {
  border: 1px solid #8a8a8a;
  outline: none;
  padding: 10px;
  margin-bottom: 1rem;
  background: var(--bg-color);
}
.login-container form .buttom {
  outline: none;
  border: none;
  background: var(--main-color);
  color: var(--bg-color);
  font-size: 0.85rem;
  font-weight: 500;
}
.login-container form .buttom:hover {
  background: #3492fd;
}
.login-container form a {
  font-size: 0.9rem;
  text-align: right;
}
.login-container .btn {
  border-radius: 0;
  text-align: center;
}
/* Register Btn */
.btn {
  padding: 8px 22px;
  background: var(--main-color);
  color: var(--bg-color);
  border-radius: 5rem;
}
.btn:hover {
  background: #b16bea;
}



/* footer section css */
.footer {
  position: relative;
  height: 60vh;
  background: var(--main-color);
  color: var(--bg-color);
  border-radius: 5rem 5rem 0 0;
}
.footer-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(240px, auto));
  gap: 2rem;
}
.footer-container .footerLogo img{
  position: relative;
  top:-25%;
  left:20%;
  width: 50%;
}
.footer-container h2 {
    position: relative;
    top: -50%;
    left: 25%;
    font-size: 1.7rem;
    font-weight: 800;
}
.footer-box {
  margin-top: 15px;
  display: flex;
  flex-direction: column;
  gap: 0.2rem;
}
.footer-box h3 {
  margin-bottom: 1rem;
  font-size: 1.5rem;
  font-weight: bolder;
  text-align: left;
}
.footer-box a {
  font-size: 0.9rem;
  color: var(--bg-color);
  font-weight: 400;
  margin-bottom: 0.5rem;
}
.footer-box a:hover {
  color: var(--second-color);
}
.social a {
  font-size: 30px;
  margin-right: 1rem;
}
.social a:hover {
  color: var(--second-color);
}
.copyright {
  padding: 20px;
  text-align: center;
  color: var(--bg-color);
  background: var(--main-color);
}
    </style>
</head>
<body>
<header>
    <div class="navbar">
        <div class="logo"><a href="index.php"> <img src="images/AawasLogo2.png" alt="Logo"></a></div>
            <ul class="links">
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutus.php">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="contactus.php">Contact</a></li>
                <li><a href="#">Blog</a></li>
                </ul>
                 <!--register Button in Navbar  -->
                <a href="register.php" class="action_btn">Register</a>
            </div>
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

            <form method="POST" action="login-operation.php">
                <span>Enter your email address</span>
                <input type="email" name="email" placeholder="Enter Email" required>
                <span>Enter your password</span>
                <input type="password" name="password" placeholder="Password" required><br>
                <input type="submit" name="owner_login" value="Login" class="button" style="border-radius: 10px;">
            </form>
            <a href="register.php" class="btn">Register now</a>
            <a href="forgot/index.php">Forgot Password ?</a>
        </div>
        <div class="login-image" style="margin-left: 200px;">
            <video loop height="500px" width="500px" " autoplay>
                <source src="video/Red and Blue Modern YouTube Intro Video .mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </div>
    
   <!-- Footer -->
   <section class="footer">
        <div class="footer-container">
            <div class="footerLogo">
            <a href="index.php"><img src="images/AawasLogoWhite.png" alt="Logo"></a>
            <h2>Thank You For Visiting Us!</h2>
            </div>
            <div class="footer-box">
                <h3>Quick Links</h3>
                <a href="aboutus.php">About Us</a>
                <a href="contactus.php">Contact Us</a>
                <a href="#">Rates</a>
            </div>
            <div class="footer-box">
                <h3>Locations</h3>
                <a href="#">Birauta</a>
                <a href="#">Lamachour</a>
                <a href="#">Bagar</a>
                <a href="#">Lakeside</a>
            </div>
            <div class="footer-box">
                <h3>Contact</h3>
                <a href="tel:9866317885">9866317885</a>
                <a href="mailto:info@aawas.com.np">info@aawas.com.np</a>
                <div class="social">
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-twitter'></i></a>
                    <a href="#"><i class='bx bxl-instagram'></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- Copyright -->
    <div class="copyright">
        <p>&#169; 2024 Aawas All Right Reserved</p>
    </div>
</body>
</html>
