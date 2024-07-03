<?php 
        session_start();
    
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aawas.com</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body, html {
            top: 20px;
            height: 100%;
            margin: 0;
            font-family: 'poppins', Helvetica, sans-serif;
        }

        .bg {
            background-image: url("images/carousel.png");
            height: 60%;
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

        footer {
            background-color: #192f6a;
            color: white;
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
            background-color:  #192f6a;
            padding: 10px 0;
        }

        .bottom-bar p {
            font-size: 1rem;
            margin: 0;
            text-align: center;
        }

        .filter-section {
            display: flex;
            align-items: center;
            justify-content: center;
            background-size: cover;
            padding: 10px;
            border-radius: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            flex-wrap: wrap;
        }

        input, select, option {
            font-size: larger;
            background-color: aliceblue;
            padding: 10px;
            margin: 15px;
            border-radius: 15px;
            border-color: blue;
        }

        #search-button {
            font-size: larger;
            background-color:#9448d2;
            border: none;
            padding: 10px 20px;
            margin-left: 125px;
            border-radius: 25px;
            color: white;
            cursor: pointer;
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

        .loadmore {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px 0;
        }

        #load {
            font-weight:bolder;
            background-color: #9448d2;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            color: white;
            cursor: pointer;
        }
        #load:hover{
            scale: 1.05;
            background-color: #b16bea;
        }

        @media (max-width: 768px) {
            .filter-section {
                flex-direction: column;
            }

            #search-button {
                margin-left: 0;
                margin-top: 10px;
            }

            .col-md-4 {
                flex: 0 0 100%;
                margin-right: 0;
            }

            .grid-container {
                grid-template-columns: 1fr;
            }
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
  font-size: 2rem;
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
/* Style the dropdown button */
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 12px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

/* Dropdown button on hover & focus */
.dropbtn:hover, .dropbtn:focus {
    background-color: #3e8e41;
}

/* Style the dropdown content (hidden by default) */
.dropdown-menu {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-menu a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-menu a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-menu {
    display: block;
}

/* Style the dropdown button when the dropdown is active */
.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}


    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
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
                <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> My Profile
            <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="profile.php">Profile</a></li>
            <li><a href="booked-property.php">Booked Property</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>



            </div>
   </div>
    </header>

    <div class="bg"></div><br><br><br>

    <div class="filter-section">
        <form action="search-property.php" method="POST">
            <input type="text" name="search-title" id="search-title" placeholder="Search By City">
            <input type="text" name="search-location" id="search-location" placeholder="Search For Specific Area">
            <select name="property-type" id="property-type">
                <option value="">Property type</option>
                <option value="Full House Rent">Full House rent</option>
                <option value="Flat rent">Flat Rent</option>
                <option value="Room Rent">Room Rent</option>
            </select>
            <select name="price-range" id="price-range">
                <option value="">Price Ranges</option>
                <option value="1000-5000">1000-5000</option>
                <option value="5000-10000">5000-10000</option>
                <option value="10000-20000">10000-20000</option>
                <option value="10000-30000">10000-30000</option>
            </select>
            <button id="search-button" type="submit">Search</button>
        </form>
    </div>
    <br>

    <?php
    global $db;
    $db = mysqli_connect('localhost', 'root', '', 'aawas');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        $_SESSION["db"] = $db;
    }

    $sql = "SELECT * FROM add_property WHERE booked='No' ORDER BY property_id ASC LIMIT 20";
    $query = mysqli_query($db, $sql);

    if (mysqli_num_rows($query) > 0) {
        echo '<div class="grid-container">';
        while ($rows = mysqli_fetch_assoc($query)) {
            $property_id = $rows['property_id'];
            ?>
            <div class="card">
                <?php
                $sql2 = "SELECT * FROM property_photo WHERE property_id='$property_id'";
                $query2 = mysqli_query($db, $sql2);

                if (mysqli_num_rows($query2) > 0) {
                    $row = mysqli_fetch_assoc($query2);
                    $photo = $row['p_photo'];
                    echo '<img class="image" src="owner/' . $photo . '">';
                }
                ?>
                <h4><b><?php echo $rows['property_type']; ?></b></h4>
                <p><?php echo $rows['Area'] ?> | <?php echo $rows['city'] ?></p>
                <p>Rs. <?php echo $rows['estimated_price'] ?>/Month</p>
                <p><?php echo '<a href="view-property.php?property_id=' . $rows['property_id'] . '" class="btn-lg btn-primary btn-block">View Property</a><br>'; ?></p><br>
            </div>
            <?php
        }
        echo '</div>';
    }
    ?>
    <br><br>
    <div class="loadmore">
        <!-- <input type="submit" href="#" value="Load More" id="load"> -->
        <button id="load"><a href="#" style="Color:white">Load More</a></button>
    </div>


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
