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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AAWAS.COM</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">     
</head>
<body>
    <!-- Navbar section -->
    <header>
        <div class="nav container">
            <a href="index.php" class="logo"><i class='bx bx-home'></i>AAWAS</a>
            <input type="checkbox" id="menu">
            <label for="menu"><i class='bx bx-menu' id="menu-icon"></i></label>
            <ul class="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
                <li><a href="property-list.php">Properties</a></li>
            </ul>
            <a href="login_options.php" class="btn">Log In</a>
        </div>
    </header>
    <!-- Home section -->
    <section class="home container" id="home">
        <div class="home-text">
            <h1>Find Your Next <br>Perfect Place To <br>Live.</h1>
            <a href="register_options.php" class="btn">Sign Up</a>
        </div>
    </section>
    <!-- Sales -->
    <section class="sales container" id="sales">
        <div class="box">
            <i class='bx bx-user'></i>
            <h3>Make Your Dream True</h3>
            <p>Find Your Dream Room</p>
        </div>
        <div class="box">
            <i class='bx bx-desktop'></i>
            <h3>Start Searching Here</h3>
            <p>Start to Search For Flats/Rooms/House Here</p>
        </div>
        <div class="box">
            <i class='bx bx-home-alt'></i>
            <h3>Enjoy Your New Home</h3>
            <p>Book Property without going Anywhere</p>
        </div>
    </section>

    <section class="properties container" id="properties">
        <div class="heading" >
            <span>Recent</span>
            <h2>Our Featured Properties</h2>
            <p><br> Here are Some Homes Available For Rent</p>
        </div>
        <div class="properties-container container">
            <?php
            // Database connection
            $db = new mysqli('localhost', 'root', '', 'aawas');
            if ($db->connect_error) {
                die("Connection failed: " . $db->connect_error);
            }

            $sql = "SELECT * FROM add_property ORDER BY property_id DESC LIMIT 6";

            $result = $db->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $property_id = $row['property_id'];
                    $sql2 = "SELECT * FROM property_photo WHERE property_id='$property_id'";
                    $result2 = $db->query($sql2);
                    $photo = $result2->fetch_assoc()['p_photo'];

                    echo "<div class='box'>
                            <a href='view-property.php?property_id={$row['property_id']}'>
                                <img src='owner/{$photo}' alt='Property Photo'>
                                <h3> NPR {$row['estimated_price']} / Month</h3>
                            <div class='content'>
                                    <div class='text'>
                                        <h3>{$row['property_type']}</h3>
                                        <p>{$row['city']}, {$row['Area']}</p>
                                    </div>
                                    <div class='icon'>
                                        <i class='bx bx-bed'><span>{$row['bedroom']}</span></i>
                                    </div>
                                </div>
                            </a>
                        </div>";
                }
            } else {
                echo "No properties found.";
            }

            $db->close();
            ?>
        </div>
        <!-- <div class="btn-seemore"  >
            <a href="property-list.php"  id="seemore" >See More</a>
        </div> -->
    </section>
    <div>
        <button  id="btn-see"> <a href="property-list.php" >See More</a></button>
        </div>
    <!-- Newsletter -->
    <section class="newsletter container">
        <h2>Have Question in mind? <br>Let us help you</h2>
        <form action="">
            <input type="text" name="" id="email-box" placeholder="Feel Free To Ask !" required>
            <input type="submit" value="Send" class="btn">
        </form>
    </section>
    <!-- Footer -->
    <section class="footer">
        <div class="footer-container container">
            <h2>Thank You for Visiting us </h2>
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
        <p>&#169; AAWAS All Right Reserved</p>
    </div>
</body>
</html>
