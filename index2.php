<?php 
session_start();
include("navbar.php");
 ?>
 <head>
 <style>
body, html {
  height: 100%;
  margin: 0;
}

.bg {
  /* The image used */
  background-image: url("images/carousel.png");
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
    <title> Aawas.com</title>
    <!-- LInk To CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Box Icons -->
    <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>

<div class="bg"></div><br>
<div class="container active-cyan-4 mb-4 inline">
	<form method="POST" action="search-property.php">
  <input class="form-control" type="text" placeholder="Enter location to search house." name="search_property" aria-label="Search">
  </form>
</div>
<br><br>
    <!-- Home -->
    <section class="home container" id="home">
        <div class="home-text">
            <h1>Find Your Next <br>Perfect Place To <br>Live.</h1>
            
        </div>
    </section>
    <div class="blank-div"></div>
    


<?php
global $db;
$db = mysqli_connect('localhost', 'root', '', 'aawas');
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    $_SESSION["db"] = $db;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">   
<link rel="stylesheet" href="style.css">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

header {
  background: #333;
  color: #fff;
  padding: 10px 0;
  position: fixed;
  width: 100%;
  top: 0;
  z-index: 1000;
  background-color: #fff;
}

.grid-container {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 10px;
  padding: 10px;
  margin: 100px 20px 20px; /* Adjusted top margin for fixed navbar */
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  text-align: center;
  font-family: arial;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
  opacity: 0.8;
}

.container {
  padding: 2px 16px;
}



.image {
  display: block;
  margin: auto;
  width: 250px;
  height: 250px;
}
</style>
</head>
<body>
<?php 
$sql="SELECT * FROM add_property";
$query=mysqli_query($db,$sql);

if(mysqli_num_rows($query)>0) {
    echo '<div class="grid-container">';
    while ($rows=mysqli_fetch_assoc($query)) {
        $property_id=$rows['property_id'];
?>
<div class="card">
<?php
//fetching photos
$sql2="SELECT * FROM property_photo where property_id='$property_id'";
$query2=mysqli_query($db,$sql2);

if(mysqli_num_rows($query2)>0) {
    $row=mysqli_fetch_assoc($query2); 
    $photo=$row['p_photo'];
    echo  '<img class="image" src="owner/'.$photo.'">'; 
}
?>
  <h4><b><?php echo $rows['property_type']; ?></b></h4> 
  <p><?php echo $rows['city'] ?></p> 
  <p><?php echo '<a href="view-property.php?property_id='.$rows['property_id'].'"  class="btn-lg btn-primary btn-block" >View Property </a><br>'; ?></p><br>
</div>
<?php 
    }
    echo '</div>';
}
?>

</body>
</html>


 ?>
 <br><br>

<p></p>
<div>
</div>
  <!-- Sales -->
    <div class="blank-div"></div>

    <footer>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h3>About Us</h3>
        <p>Our mission is to provide you with a comfortable and enjoyable living experience in a home that you can truly call your own. We understand the importance of finding the perfect place to live, and we are committed to helping you make the most of your time with us.

</p>
      </div>
      <div class="col-md-4">
        <h3>Quick Links</h3>
        <ul>
          <li><a href="">Home</a></li>
          <li><a href="">Rooms</a></li>
          <li><a href="">About Us</a></li>
          <li><a href="">Contact Us</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h3>Get In Touch</h3>
        <ul>
          <li><i class="fas fa-map-marker-alt"></i>Pokhara Nepal</li>
          <li><i class="fas fa-phone"></i>061-152112</li>
          <li><i class="fas fa-envelope"></i> info@Aawas.com</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="bottom-bar">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p>&copy; 2024 Aawas All Rights Reserved.</p>
        </div>
      </div>
    </div>
  </div>
</footer>
