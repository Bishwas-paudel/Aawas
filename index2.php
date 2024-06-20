<?php 
session_start();
 ?>
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> AAWAS</title>
    <!-- LInk To CSS -->
    <link rel="stylesheet" href="rentalcss.css">
    <!-- Box Icons -->
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <style>
    
    #myInput, #myInput2, #myInput3, #myInput4 {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
    
    </style>
</head>
<div class="navv">
<?php 
include("navbar.php");

 ?>
 </div>
    <!-- Home -->
    <section class="home container" id="home">
        <div class="home-text">
            <h1>Find Your Next <br>Perfect Place To <br>Live.</h1>
            
        </div>
    </section>
<div style="height: 50;"></div>
    <!-- About -->
    <section class="about container" id="about">
        <div class="about-img">
            <img src="images/about.jpg" alt="">
        </div>
        <div class="about-text">
            <span>AD SECTION</span>
            <h2>We Provide The Best <br>Web services to you!</h2>
          

<p>Our mission is to provide you with a secure web paltform  </p>
            <a href="#" class="btn">Learn More</a>
        </div>
    </section>
    

    <input type="text" id="myInput4" onkeyup="myFunction4()" placeholder="Search..." title="Type in a name">

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
        <p>Our mission is to provide you with a comfortable and enjoyable living experience in a home that you can truly call your own. We understand the importance of finding the perfect place to live, and we are committed to helping you make the most of your time with us.</p>
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
<script>
function myFunction4() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput4");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable4");
  tr = table.getElementsByTagName("tr");
  th = table.getElementsByTagName("th");
  for (i = 1; i < tr.length; i++) {
    tr[i].style.display = "none";
      for(var j=0; j<th.length; j++){
        td = tr[i].getElementsByTagName("td")[j];      
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter.toUpperCase()) > -1)
          {
            tr[i].style.display = "";
            break;
           }
        }
      }
  }
}
</script>