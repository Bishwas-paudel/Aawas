<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - AAWAS</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'poppins', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #faf5ff;
        }
       
        main {
            height: 500px;
            max-width: 1300px;
            margin: 9px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
        }
        .left-section {
            width: 50%;
            height: 100%;
        }
        .right-section {
            width: 40%;
            padding-left: 20px;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .form-container input, .form-container textarea {
            width: calc(50% - 10px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-right: 10px;
        }
        .form-container input[name="phone"] {
            width: calc(50% - 10px);
        }
        .form-container textarea {
            width: 100%;
        }
        .form-container button {
            background-color: var(--main-color);
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        
        .form-container button:hover {
            scale: 1.05;
            background-color: #b16bea;
        }
        .contact-info {
            margin-top: 20px;
        }
        .contact-info h2 {
            margin-bottom: 20px;
            font-size: 1.5rem;
            color: #333;
        }
        .contact-info h3 {
            margin-bottom: 10px;
            font-size: 1.0rem;
            color: #555;
        }
        .contact-info p {
            margin-bottom: 10px;
            font-size: 0.85rem;
            color: #555;
        }
        .contact-info .icon {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            font-size: 1.5rem;
            color: #555;
        }
        .contact-info .icon i {
            margin-right: 10px;
            color: var(--main-color);
            font-size: 1.5rem;
        }
        footer {
            background-color: dodgerblue;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50px;
            margin-top: 160px;
        }
        footer p {
            font-size: 1.2rem;
            margin: 0;
        }
        .copyright{
                border-radius:5rem 5rem 0 0;
            }
    </style>
</head>
<body>
   <!-- Navbar section -->
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
                 <!--Login Button in Navbar  -->
                 <div class="login">
                <a href="login_options.php" class="action_btn">Login</a>
                <a href="login_options.php" class="action_btn">Register</a>
            </div>
</div>
   </div>
</header>
    <section></section>
    <main>
        <div class="left-section">
            <div class="form-container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input type="text" name="name" placeholder="Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="text" name="phone" placeholder="Phone Number" required>
                    <textarea name="message" placeholder="Message" rows="4"></textarea>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
        <div class="right-section">
            <div class="contact-info">
                <h2>Contact Us</h2>
                <h3>Contact us for any types of problem you face in this pages</h3>
                <div class="icon">
                    <i class='bx bx-phone'></i>
                    <p>+977 9866317885</p>
                </div>
                <div class="icon">
                    <i class='bx bx-envelope'></i>
                    <p>info@aawas.com.np</p>
                </div>
                <div class="icon">
                    <i class='bx bx-map'></i>
                    <p>Simalchaur-08, Pokhara, Nepal</p>
                </div>
            </div>
        </div>
    </main>


    <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $firstName = htmlspecialchars($_POST['first_name']);
                    $lastName = htmlspecialchars($_POST['last_name']);
                    $email = htmlspecialchars($_POST['email']);
                    $message = htmlspecialchars($_POST['message']);

                    $to = "paudelbishwas885@gmail.com";
                    $subject = "Contact Form Submission from $firstName $lastName";
                    $body = "Name: $firstName $lastName\nEmail: $email\n\nMessage:\n$message";

                    $headers = "From: $email";

                    if (mail($to, $subject, $body, $headers)) {
                        echo "<p>Message sent successfully!</p>";
                    } else {
                        echo "<p>Message sending failed!</p>";
                    }
                }
                ?>
   
    <div class="copyright">
        <p>&#169; 2024 Aawas All Right Reserved</p>
        </div>
</body>
</html>
