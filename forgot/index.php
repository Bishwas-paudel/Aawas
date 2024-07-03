<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .full-height {
            height: 100vh;
        }
    </style>
</head>
<body>
<div class="bg-light py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-12 col-md-11 col-lg-8 col-xl-7 col-xxl-6">
        <div class="bg-white p-4 p-md-5 rounded shadow-sm">
          <div class="row">
            <div class="col-12">
              <div class="mb-5">
                <h2 class="h3">Password Reset</h2>
                <h3 class="fs-6 fw-normal text-secondary m-0">Provide the email address associated with your account to recover your password.</h3>
              </div>
            </div>
          </div>
          <form action="index.php" method="POST">
            <div class="row gy-3 gy-md-4 overflow-hidden">
              <div class="col-12">
                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
              </div>
              <br><br><br><br><br>
              <div class="col-12">
                <div class="d-grid">
                  <button class="btn btn-lg btn-primary" type="submit">Reset Password</button>
                </div>
              </div>
            </div>
          </form>
     
          <div class="row">
            <div class="col-7">
              <hr class="mt-5 mb-4 border-secondary-subtle">
              <div class="d-flex gap-4 justify-content-end">
                <a href="../login.php" class="link-secondary text-decoration-none">Login</a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="../register.php" class="link-secondary text-decoration-none">Register</a>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


</body>
</html>
<?php 
require __DIR__ . '/../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


global $db;
$db = mysqli_connect ('localhost', 'root', '', 'aawas');
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
    $_SESSION["db"]=$db;
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {


  function owner_login() {
      global $db;
      $email = $_POST['email'];
      $sql = "SELECT * FROM owner WHERE email='$email'";
      $result = $db->query($sql);
      if ($result->num_rows == 1) {
        $token = bin2hex(random_bytes(16));

        // Store the token in the database with an expiration time
        $expires = date("U") + 1800; // Token expires in 30 minutes
        $db->query("INSERT INTO password_resets (email, token, expires, role) VALUES ('$email', '$token', '$expires','owner')");
        
        // Send the email
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'paudelbishwas885@gmail.com'; // Replace with your SMTP username
            $mail->Password = 'vavc bidw yhnj jldf'; // Replace with your SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
        
            // Recipients
            $mail->setFrom('paudelbishwas885@gmail.com', 'Aawas');
            $mail->addAddress($email);
        
            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';
            $mail->Body = "Click <a href='http://localhost:80/aawas-test/forgot/reset_password.php?token=$token'>here</a> to reset your password.";
        
            $mail->send();
            echo 'Reset link has been sent to your email.';
          } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        
        $db->close();
      } else {
           rental_login();
      }
  }
  
  
  function rental_login() {
      global $db;
      $email = $_POST['email'];
      $sql = "SELECT * FROM rental WHERE email='$email'";
      $result = $db->query($sql);
      if ($result->num_rows == 1) {
        
        $token = bin2hex(random_bytes(16));

        // Store the token in the database with an expiration time
        $expires = date("U") + 1800; // Token expires in 30 minutes
        $db->query("INSERT INTO password_resets (email, token, expires, role) VALUES ('$email', '$token', '$expires','rental')");
        
        // Send the email
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'paudelbishwas885@gmail.com'; // Replace with your SMTP username
            $mail->Password = 'vavc bidw yhnj jldf'; // Replace with your SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
        
            // Recipients
            $mail->setFrom('paudelbishwas885@gmail.com', 'Aawas');
            $mail->addAddress($email);
        
            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';
            $mail->Body = "Click <a href='http://localhost:80/aawas-test/forgot/reset_password.php?token=$token'>here</a> to reset your password.";
        
            $mail->send();
            echo 'Reset link has been sent to your email.';
          } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        
        $db->close();
      } else {
           rental_login();
      }
  }
  
  function admin_login() {
      global $db;
      $email = $_POST['email'];
     
      $sql = "SELECT * FROM admin WHERE email='$email'";
      $result = $db->query($sql);
      if ($result->num_rows == 1) {
        $token = bin2hex(random_bytes(16));

        // Store the token in the database with an expiration time
        $expires = date("U") + 1800; // Token expires in 30 minutes
        $db->query("INSERT INTO password_resets (email, token, expires, role) VALUES ('$email', '$token', '$expires','admin')");
        
        // Send the email
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'paudelbishwas885@gmail.com'; // Replace with your SMTP username
            $mail->Password = 'vavc bidw yhnj jldf'; // Replace with your SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
        
            // Recipients
            $mail->setFrom('paudelbishwas885@gmail.com', 'Aawas');
            $mail->addAddress($email);
        
            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';
            $mail->Body = "Click <a href='http://localhost:80/aawas-test/forgot/reset_password.php?token=$token'>here</a> to reset your password.";
        
            $mail->send();
            echo 'Reset link has been sent to your email.';
          } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        
        $db->close();
      } else {
      echo "ERROR";
      }
  }




  owner_login();








}


?>