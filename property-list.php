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
<style>

@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");
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

body {
  margin: 0;
  font-family: 'poppins', Helvetica, sans-serif;
}

/* navsection css */
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
    gap: 15px;
    padding: 10px;
    margin: 150px 20px 20px;
 /* Adjusted top margin for fixed navbar */
}

.card {
  padding: 15px;
    border-radius: 10px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    text-align: center;
    
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
  border-radius: 10px;
}
#BtnProperty{
    top: 10px;
    position: relative;
    background-color: #9448d2;
    padding: 5px 45px;
    color: White;
    border-radius: 5px;
    scale:0.95;
}

#BtnProperty:hover{
  background-color: #b16bea;
  color: White;
  scale:1.05;
}

.BtnBack button {
    color:white;
    background-color: #9448d2;
    border: none;
    outline: none;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: bold;
    cursor: pointer;
    padding: 0.5rem 1rem;
    margin: 0;
    position: relative;
    top: 50%;
    left: 50%;
    right: 50%;
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
}
.BtnBack button:hover {
  background-color: #b16bea;
  color: White;
  scale:1.05;
}
button a{
  color:white;
}

</style>


</head>
<body>
<!-- Nav section -->
<header>
    <div class="navbar">
        <div class="logo"><a href="index.php"> <img src="images/AawasLogo2.png" alt="Logo"></a></div>
            <ul class="links">
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutus.php">About</a></li>
                <li><a href="contactus.php">Contact</a></li>
                <li><a href="property-list.php">Properties</a></li>
                </ul>
                 <!--Login Button in Navbar  -->
                 <div class="btns">
                 <a href="register_options.php" class="action_btn">Register</a>
                 <a href="login_options.php" class="action_btn">Login</a>
                 </div>
            </div>
   </div>
</header>
<?php 
$sql="SELECT * FROM add_property where booked='No'";
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
  <p><?php echo '<a href="view-property.php?property_id='.$rows['property_id'].'" id="BtnProperty"  class="btn-lg btn-primary btn-block">View Property </a><br>'; ?></p><br>
</div>
<?php 
    }
    echo '</div>';
}
?>
<div class="BtnBack">
<Button>
<a href="index.php" class="BtnBack"><i class='bx bx-arrow-back'></i><span>Back</span></a>
</Button>
</div>

</body>
</html>
