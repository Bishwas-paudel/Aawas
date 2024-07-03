<?php 
session_start();
isset($_SESSION["email"]);
include("connection/connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

header {
            background: #333;
            color: #fff;
            padding: 10px 0;
            position:relative;
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
            .card h4,p{
                position: relative;
                top: 10px;
            }
            .card a{
                border-radius: 5px;
                top: 10px;
                position: relative;
                background-color: #9448d2;
                color: white;
                padding: 4px 30px;
            }
        .container {
            padding: 2px 16px;
            }


        .image {
            display: block;
            margin: auto;
            width: 100%;
            max-width: 250px;
            height: 57%;
            border-radius:10px;
        }
      /* Navbar section css */
        /* Google Fonts */
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
/* nav section css */
header {
  position: relative;
  padding: 0;
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
  top:-5%;
  left:20%;
  width: 50%;
}
.footer-container h2 {
    position: relative;
    top: -25%;
    left: 25%;
    font-size: 1.7rem;
    font-weight: 800;
}
.footer-box {
  margin-top: 100px;
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
                 <!--Logout Button in Navbar  -->
                <a href="logout.php" class="action_btn">Logout</a>
            </div>
   </div>
    </header>
<?php
$searchTitle = isset($_POST['search-title']) ? mysqli_real_escape_string($db, $_POST['search-title']) : '';
$searchLocation = isset($_POST['search-location']) ? mysqli_real_escape_string($db, $_POST['search-location']) : '';
$propertyType = isset($_POST['property-type']) ? mysqli_real_escape_string($db, $_POST['property-type']) : '';
$priceRange = isset($_POST['price-range']) ? mysqli_real_escape_string($db, $_POST['price-range']) : '';
$queryParts = [];
if (!empty($searchTitle)) {
    $queryParts[] = "city LIKE '%$searchTitle%'";
}
if (!empty($searchLocation)) {
    $queryParts[] = "Area LIKE '%$searchLocation%'";
}
if (!empty($propertyType)) {
    $queryParts[] = "property_type = '$propertyType'";
}
if (!empty($priceRange)) {
    list($minPrice, $maxPrice) = explode('-', $priceRange);
    $queryParts[] = "estimated_price BETWEEN $minPrice AND $maxPrice";
}
$queryString = implode(' AND ', $queryParts);
$sql = "SELECT * FROM add_property";
if (!empty($queryString)) {
    $sql .= " WHERE $queryString";
}

$query = mysqli_query($db, $sql);

if (!$query) {
    die('SQL Error: ' . mysqli_error($db));
}
echo '<center><h1>Searched Properties</h1></center>';
if (mysqli_num_rows($query) > 0) {
    while ($rows = mysqli_fetch_assoc($query)) {
        $property_id = $rows['property_id'];
?>

<div class="grid-container">
<div class="card">
<?php
        $sql2 = "SELECT * FROM property_photo WHERE property_id='$property_id'";
        $query2 = mysqli_query($db, $sql2);

        if (!$query2) {
            die('SQL Error: ' . mysqli_error($db));
        }

        if (mysqli_num_rows($query2) > 0) {
            $row = mysqli_fetch_assoc($query2); 
            $photo = $row['p_photo'];
            echo '<img class="image" src="owner/'.$photo.'">';
        }
?>

  <h4><b><?php echo $rows['property_type']; ?></b></h4> 
  <p><?php echo '<a href="view-property.php?property_id='.$rows['property_id'].'" class="btn btn-lg btn-primary btn-block">View Property</a><br>'; ?></p><br>
</div>
</div>
<?php 
    }
} else {
    echo "<center><h3>Searched Property not found...</h3></center>";
}
?>

<!-- Footer section -->
 <!-- footer Section -->
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
