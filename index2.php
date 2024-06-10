<?php 
session_start();


 ?>
 <head>
 <style>
body, html {
  height: 100%;
  margin: 0;
}

.bg {
  /* The image used */
  background-image: url("images/house2.jpg");

  /* Full height */
  height: 60%; 

  /* Center and scale the image nicely */
  background-position: bottom;
  background-repeat: no-repeat;
  background-size: cover;
}

.fa {
  padding: 20px;
  font-size: 30px;
  text-align: left;
  text-decoration: none;
  margin: 5px 2px;
}
.fa:hover {
    opacity: 0.7;
}
.fa-facebook {
  background: #3B5998;
  color: white;
}
.fa-linkedin {
  background: #007bb5;
  color: white;
}
.active-cyan-3 input[type=text] {
  border: 1px solid #4dd0e1;
  box-shadow: 0 0 0 1px #4dd0e1;
}
.blank-div {
  height: 100px; /* adjust height as needed */
  width: 100%;
}

footer {
  background-color: #e4f2fd;
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

.col-md-4 {
  flex: 0 0 calc(33.33% - 20px);
  margin-right: 20px;
  margin-bottom: 40px;
}

.col-md-4:last-child {
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

.bottom-bar {
  background-color: #b3e5fc;
  padding: 10px 0;
}

.bottom-bar p {
  font-size: 1rem;
  margin: 0;
  text-align: center;
}
</style>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> AAWAS</title>
    <!-- LInk To CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Box Icons -->
    <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<section></section>
<?php 

include("navbar.php");

 ?>
    <!-- Home -->
    <section class="home container" id="home">
        <div class="home-text">
            <h1>Find Your Next <br>Perfect Place To <br>Live.</h1>
            
        </div>
    </section>

    <!-- About -->
   
    <div class="blank-div"></div>
    

<?php 

include("property-list.php");

 ?>
 <br><br>

<p></p>
<div>
<h1 style="margin-left:550px;">More Details</h1>
</div>
  <!-- Sales -->
    <div class="blank-div"></div>

    <footer>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h3>About Us</h3>
        <p>Our mission is to provide you with a comfortable and enjoyable living experience in a home that you can truly call your own. We understand the importance of finding the perfect place to live, and we are committed to helping you make the most of your time with us.

Our team is dedicated to providing exceptional service and support, from the moment you inquire about one of our properties to the day you move out. We are here to answer your questions, address your concerns, and ensure that you have everything you need to feel at home.</p>
      </div>
      <div class="col-md-4">
        <h3>Quick Links</h3>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="property-list.php">Rooms</a></li>
          <li><a href="aboutus.php">About Us</a></li>
          <li><a href="contactus.php">Contact Us</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h3>Get In Touch</h3>
        <ul>
          <li><i class="fas fa-map-marker-alt"></i>LA Grandee international college</li>
          <li><i class="fas fa-phone"></i>9866317885</li>
          <li><i class="fas fa-envelope"></i> aaawas@gmail.com</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="bottom-bar">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p>&copy; AAWAS. All Rights Reserved.</p>
        </div>
      </div>
    </div>
  </div>
</footer>
