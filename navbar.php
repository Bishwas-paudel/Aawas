<!DOCTYPE html>
<html lang="en">
<head>
  <title>RentHouse</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* google font importing */
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");
   
   
    :root {
            --primary-color: #007bff;
            --secondary-color: #192f6a;
            --text-color: #314862;
            --background-color: #f5f5f5;
            --button-hover-color: #0056b3;
            --button-gradient: linear-gradient(45deg, #2288ff, #0056b3);
            --footer-background: #333;
            --footer-text-color: #fff;
          }
  
  
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

        /* nav section css */
header {
  position: relative;
  padding: 0;
}

.navbar {
  width: 100%;
  /* background-color: rgb(246, 210, 241); */
  height: 80px;
  max-width: 2000px;
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
ul li {
  list-style: none;
}

ul li a {
  text-decoration: none;
  color: #313638;
  font-size: 2rem;
  font-weight: bolder;
}

ul li a:hover {
  text-decoration:none;
  color: #9448d2;
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
  font-size: 1.2rem;
  font-weight: bold;
  cursor: pointer;
  margin: 10px;
  padding: 0.5rem 1rem;
}

.action_btn:hover {
  text-decoration:none;
  scale: 1.05;
  background-color: #b16bea;
  color:White;
}

.action_btn:active {
  scale: 0.95;
}
.btns{
  display: flex;
}
   
  </style>
</head>
<body>

<header>
    <div class="navbar">
        <div class="logo"><a href="<?php echo (isset($_SESSION['email']) && !empty($_SESSION['email'])) ? 'index2.php' : 'index.php'; ?>"> 
          <img src="images/AawasLogo2.png" alt="Logo">
        </a>
      </div>
      <!-- Links -->
            <ul class="links">
                <li><a href="<?php echo (isset($_SESSION['email']) && !empty($_SESSION['email'])) ? 'index2.php' : 'index.php'; ?>">Home</a></li>
                <li><a href="aboutus.php">About</a></li>
                <li><a href="contactus.php">Contact</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
        <?php if(isset($_SESSION["email"]) && !empty($_SESSION['email'])) { ?>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> My Profile
            <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="profile.php">Profile</a></li>
            <li><a href="booked-property.php">Booked Property</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
        <?php } else { ?>
          <div class="btns">
                 <a href="register.php" class="action_btn">Register</a>
                 <a href="login.php" class="action_btn">Login</a>
                 </div>
        <?php } ?>
      </ul>
               
                
            </div>
   </div>
</header>
  
</body>
</html>
