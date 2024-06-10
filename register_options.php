<?php 
session_start();
if(isset($_SESSION["email"])){
  header(".php");
}
 ?>
<html>
    <head>
        <style>
footer {
  background-color:dodgerblue;
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

.about_us {
  flex: 0 0 calc(33.33% - 20px);
  margin-right: 20px;
  margin-bottom: 40px;
}

.about_us:last-child {
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
  background-color:dodgerblue;
  padding: 10px 0;
}

.copywrite_section p {
  font-size: 1rem;
  margin: 0;
  text-align: center;
}
.blank-div {
  height: 100px; /* adjust height as needed */
  width: 100%;
}



        </style>
    </head>
</html>
<?php
include("navbar.php");

?>
    <section class="container-fluid sign-in-form-section">
        <div class="container">
            <div class="row">
                
                <div class="col-md-12 sign-up" style="text-align: center;">
                    <h3 style="font-weight: bold;">How do you want to Register?</h3><hr>
                    <p>If you want to register as a Rental click on Rental register button otherwise click on owner register button.</p><br><br>
                   <a href="rental-register.php"> <button type="submit" class="btn btn-info"   style="width:200px; background-color:dodgerblue;border-radius:10%">Rental Register</button></a>
                   <a href="owner-register.php"> <button type="submit" class="btn btn-info"  style="width:200px; background-color:dodgerblue;border-radius:10%">Owner Register</button></a>
                </div>
                
            </div>
        </div>
    </section>

    <div class="blank-div"></div>

    <footer>
  <div class="container">
    <div class="row">
      <div class="about_us">
        <h3 style="color:cornsilk">About Us</h3>
        <p style="color:cornsilk">Our mission is to provide you with a comfortable and enjoyable living experience in a home that you can truly call your own. We understand the importance of finding the perfect place to live, and we are committed to helping you make the most of your time with us.

Our team is dedicated to providing exceptional service and support, from the moment you inquire about one of our properties to the day you move out. We are here to answer your questions, address your concerns, and ensure that you have everything you need to feel at home.</p>
      </div>
      <div class="about_us"  style="color:cornsilk">
        <h3>Quick Links</h3>
        <ul  style="color:cornsilk">
          <li><a href="index.php" style="color:cornsilk">Home</a></li>
          <li><a href="#" style="color:cornsilk">Rooms</a></li>
          <li><a href="aboutus.php" style="color:cornsilk">About Us</a></li>
          <li><a href="contactus.php" style="color:cornsilk">Contact Us</a></li>
        </ul>
      </div>
      <div class="about_us">
        <h3>Get In Touch</h3>
        <ul>
          <li><i class="fas fa-map-marker-alt"></i>Simalchaur Pokhara</li>
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
          <p>&copy; 2024 Aawas All Rights Reserved.</p>
        </div>
      </div>
    </div>
  </div>
</footer>
