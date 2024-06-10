<?php
include("navbar.php")  ?>
 <html>
 <html>
<head>
<link rel="stylesheet" href="style2.css">
<style>
footer {
  background-color: #e3f2fd;
  color: #292929;
  padding: 50px 0;
  font-size: 1.2rem;
}
.container {
  max-width: 1000px;
  margin: 0 auto;
  padding: 0 20px;
}
.row {
  display: flex;
  flex-wrap: wrap;
}
.aboutus_section {
  flex: 0 0 calc(33.33% - 20px);
  margin-right: 20px;
  margin-bottom: 40px;
}
.aboutus_section:last-child {
  margin-right: 0;
}
h3 {
  font-size: 1.8rem;
  margin-bottom: 20px;
}
ul {
  list-style: none;
  margin: 0;
  padding: 0;
}
li {
  margin-bottom: 10px;
}
a {
  color: #292929;
  text-decoration: none;
}
a:hover {
  color: #8C8C8C;
}
.copywrite_section {
  background-color: #b3e5fc;
  padding: 10px 0;
}
.copywrite_section p {
  font-size: 1rem;
  margin: 0;
  text-align: center;
}
.blank-div {
  height: 100px; 
  width: 100%;
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
</head>
<body>
<div class="container">
  <h3 style="font-weight: bold; text-align: center;">Rental Login</h3><hr><br><br>
  <?php if (isset($GLOBALS['login_error'])): ?>
  <div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
    <strong><?php echo $GLOBALS['login_error']; ?></strong> Click here to <a href="rental-register.php" style="color: lightblue;"><b>Register</b></a>.
  </div>
  <?php endif; ?>
  <form method="POST" action="rental-operation.php">
    <div class="form-group" >
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
    </div>
    <div class="form-group">
      <a href="#">Lost your Password ? </a> 
    </div>
    <center><input type="submit" id="submit" name="rental_login" class="btn btn-primary btn-block" value="Login"></center>
  </form>
</div>
<div class="blank-div"></div>
<footer>
  <div class="container">
    <div class="row">
      <div class="aboutus_section">
        <h3>About Us</h3>
        <p>here is our text a</p>
      </div>
      <div class="aboutus_section">
        <h3>Quick Links</h3>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="#">Rooms</a></li>
          <li><a href="aboutus.php">About Us</a></li>
          <li><a href="contactus.php">Contact Us</a></li>
        </ul>
      </div>
      <div class="aboutus_section">
        <h3>Get In Touch</h3>
        <ul>
          <li><i class="fas fa-map-marker-alt"></i>Pokhara Nepal</li>
          <li><i class="fas fa-phone"></i> 9866317885</li>
          <li><i class="fas fa-envelope"></i>info@aawas.com.np</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="copywrite_section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p>&copy; 2024 Aawas. All Rights Reserved.</p>
        </div>
      </div>
    </div>
  </div>
</footer>
</body>
</html>