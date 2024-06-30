<?php 
session_start();
if(isset($_SESSION["email"])){
  header(".php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        /* Root Variables */
        :root {
            --primary-color: #007bff;
            --secondary-color: #192f6a;
            --text-color: #314862;
            --background-color: #f5f5f5;
            --button-hover-color: #0056b3;
            --button-gradient: linear-gradient(45deg, #2288ff, #0056b3);
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 70px auto 0 auto;
            padding: 20px;
        }

        .sign-in-form-section {
            background-color: var(--background-color);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 40px;
            text-align: center;
        }

        .sign-in-form-section h3 {
            font-size: 2rem;
            color: var(--secondary-color);
            margin-bottom: 20px;
        }

        .sign-in-form-section p {
            font-size: 1.1rem;
            color: var(--text-color);
            margin-bottom: 40px;
        }

        .btn {
 background:#192f6a;
 color:azure;
 border: none;
 border-radius: 30px;
 padding: 12px 30px;
 margin: 10px;
 cursor: pointer;
 transition: background 0.3s, transform 0.3s, box-shadow 0.3s;
 width: 200px;
 font-size: 16px;
 box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
 display: inline-block;
}


.btn:hover {
 background: var(--button-hover-bg);
 transform: translateY(-3px);
 box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
}

.btn:active {
 transform: translateY(1px);
}

        footer {
            background-color:var(--secondary-color);
            color: var(--footer-text-color);
            padding: 20px 0;
            margin-top:100px ;
                    }

        .footer-container {
            max-width: 1000px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: flex-start;
        }

        .footer-box {
            flex: 1;
            padding: 20px;
            min-width: 200px;
        }

        .footer-box h3 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: var(--footer-text-color);
        }

        .footer-box p, .footer-box a {
            color: var(--footer-text-color);
            margin-bottom: 10px;
        }

        .footer-box a {
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-box a:hover {
            color: var(--primary-color);
        }

        .copywrite_section {
            background-color: var(--secondary-color);
            color: var(--footer-text-color);
            text-align: center;
            padding: 10px 0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sign-in-form-section {
                padding: 20px;
            }

            .footer-container {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (max-width: 576px) {
            .btn {
                width: 100%;
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>
    <?php include('navbar.php'); ?>
    <section class="container">
        <div class="sign-in-form-section">
            <h2>How do you want to Register?</h2>
            <hr>
            <p style="font-size: 18px;">If you want to register as a Rental click on Rental register button otherwise click on owner register button.</p>
            <a href="rental-register.php">
                <button type="submit" class="btn">Rental Register</button>
            </a>
            <a href="owner-register.php">
                <button type="submit" class="btn">Owner Register</button>
            </a>
        </div>
    </section>
    <footer>
        <div class="container footer-container">
            <div class="footer-box">
                <h3>About Us</h3>
                <p>Our mission is to provide you with a comfortable and enjoyable living experience in a home that you can truly call your own. We understand the importance of finding the perfect place to live, and we are committed to helping you make the most of your time with us.</p>
            </div>
            <div class="footer-box">
                <h3>Quick Links</h3>
                <a href="index.php">Home</a>
                <a href="#">Rooms</a>
                <a href="aboutus.php">About Us</a>
                <a href="contactus.php">Contact Us</a>
            </div>
            <div class="footer-box">
                <h3>Get In Touch</h3>
                <p><i class="fas fa-map-marker-alt"></i> Simalchaur Pokhara</p>
                <p><i class="fas fa-phone"></i> 9866317885</p>
                <p><i class="fas fa-envelope"></i> info@aawas.com.np</p>
            </div>
        </div>
        <div class="copywrite_section">
            <p>&copy; 2024 Aawas All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
