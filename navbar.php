<!DOCTYPE html>
<html lang="en">
<head>
  <title>RentHouse</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-light justify-content-between" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="navbar-header" href="<?php echo (isset($_SESSION['email']) && !empty($_SESSION['email'])) ? 'index2.php' : 'index.php'; ?>">
      <img src="images/logo.png" alt="logo" style="height:70px;">
    </a>
    
    <!-- Links -->
    <ul class="nav navbar-nav" style="font-size:20px;">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo (isset($_SESSION['email']) && !empty($_SESSION['email'])) ? 'index2.php' : 'index.php'; ?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">Contact Us</a>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <?php 
      if(isset($_SESSION["email"]) && !empty($_SESSION['email'])){
      ?>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> My Profile
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="profile.php">Profile</a></li>
          <li><a href="booked-property.php">Booked Property</a></li>
          <li><a href="logout.php">Logout</a></li>
          <li><a href="chagepassword.php">Change Password</a></li>
        </ul>
      </li>
      <?php
      } else {?>
      <li><a href="register_options.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
      <li><a href="login_options.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      <?php } ?>
    </ul>
  </div>
</nav>

</body>
</html>
