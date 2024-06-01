
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Rent House Project</title>
    <link rel="stylesheet" href="style.css">
    <!-- Box Icons -site ma use hune icons haru ko lagi -->
    <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <!-- Navbar section -->
    <header>
        <div class="nav container">
            <!-- Logo ko lagi -->
            <a href="index.html" class="logo"><i class='bx bx-home'></i>AAWAS</a>
            <!-- Menu Icon -->
            <input type="checkbox" name="" id="menu">
            <label for="menu" <i class='bx bx-menu' id="menu-icon"></i></label>
            <!-- Navbar ko name haru -->
            <ul class="navbar">
                <li><a href="#home">Home</a></li>
                <li><a href="aboutus .php">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Properties</a></li>
            </ul>
            <!-- Login button  -->
            <a href="rental-login.php" class="btn">Log In</a>
        </div>

    </header>
    <!-- Home section  -->
    <section class="home container" id="home">
        <div class="home-text">
            <h1>Find Your Next <br>Perfect Place To <br>Live.</h1>
            <a href="#" class="btn">Sign Up</a>
        </div>
    </section>
    <!-- Sales -->
    <section class="sales container" id="sales">
        <!-- Box 1 -->
        <div class="box">
            <i class='bx bx-user' ></i>
            <h3>Make Your Dream True</h3>
            <p>Find Your Dream Room</p>
        </div>
        <!-- Box 2 -->
        <div class="box">
            <i class='bx bx-desktop' ></i>
            <h3>Start Searching Here</h3>
            <p>Start to Search For Flats/Rooms/House Here</p>
        </div>
        <!-- Box 1 -->
        <div class="box">
            <i class='bx bx-home-alt' ></i>
            <h3>Enjoy Your New Home</h3>
            <p>Book Property without going Anywhere</p>
        </div>
    </section>
    <!-- Properties -->
    <section class="properties container" id="properties">
        <div class="heading">
            <span>Recent</span>
            <h2>Our Featured Properties</h2>
            <p> <br> Here are Some Homes Available For Rent</p>
        </div>
        <div class="properties-container container">
            <!-- Box 1 -->
            <div class="box">
                <img src="images/home1.jpg" alt="">
                <h3> NPR 8000 / Month</h3>
                <div class="content">
                    <div class="text">
                        <h3>Room Rent</h3>
                        <p>Birauta,Pokhara</p>
                    </div>
                    <div class="icon">
                        <i class='bx bx-bed' ><span>1</span></i>
                        <i class='bx bx-bath' ><span>1</span></i>
                    </div>
                </div>
            </div>
            <!-- Box 2 -->
            <div class="box">
                <img src="images/house1.jpg" alt="">
                <h3>13,999</h3>
                <div class="content">
                    <div class="text">
                        <h3>Flat For Rent</h3>
                        <p>Nadipur,Pokhara</p>
                    </div>
                    <div class="icon">
                        <i class='bx bx-bed' ><span>2</span></i>
                        <i class='bx bx-bath' ><span>1</span></i>
                    </div>
                </div>
            </div>
            <!-- Box 3 -->
            <div class="box">
                <img src="images/home2.jpg" alt="">
                <h3> 4,999</h3>
                <div class="content">
                    <div class="text">
                        <h3> Flat For Rent</h3>
                        <p>Ratnachok,Pokhara</p>
                    </div>
                    <div class="icon">
                        <i class='bx bx-bed' ><span>3</span></i>
                        <i class='bx bx-bath' ><span>1</span></i>
                    </div>
                </div>
            </div>
            <!-- Box 4 -->
            <div class="box">
                <img src="images/house4.jpg" alt="">
                <h3> NPR 5,999</h3>
                <div class="content">
                    <div class="text">
                        <h3>Room For Rent</h3>
                        <p>Chorepatan,pokhara</p>
                    </div>
                    <div class="icon">
                        <i class='bx bx-bed' ><span>2</span></i>
                        <i class='bx bx-bath' ><span>1</span></i>
                    </div>
                </div>
            </div>
            <!-- Box 5 -->
            <div class="box">
                <img src="images/house4.jpg" alt="">
                <h3>NPR 6,999/MONTH</h3>
                <div class="content">
                    <div class="text">
                        <h3>ROOM </h3>
                        <p>POKHARA</p>
                    </div>
                    <div class="icon">
                        <i class='bx bx-bed' ><span>5</span></i>
                        <i class='bx bx-bath' ><span>2</span></i>
                    </div>
                </div>
            </div>
            <!-- Box 6 -->
            <div class="box">
                <img src="images/house2.jpg" alt="">
                <h3>NPR 20,999</h3>
                <div class="content">
                    <div class="text">
                        <h3>House For Rent</h3>
                        <p>Simalchur,Pokhara</p>
                    </div>
                    <div class="icon">
                        <i class='bx bx-bed' ><span>5</span></i>
                        <i class='bx bx-bath' ><span>2</span></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                <a href="#">info@aawas.com.np</a>
                <div class="social">
                    <a href="#"><i class='bx bxl-facebook' ></i></a>
                    <a href="#"><i class='bx bxl-twitter' ></i></a>
                    <a href="#"><i class='bx bxl-instagram' ></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- Copyright -->
    <div class="copyright">
        <p>&#169;AAWAS All Right Reserved</p>
    </div>

    
</body>
</html>