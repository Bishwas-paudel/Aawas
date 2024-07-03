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
                <h3 class="fs-6 fw-normal text-secondary m-0">Enter your new password</h3>
              </div>
            </div>
          </div>
          <form action="reset_password.php" method="POST">
            <div class="row gy-3 gy-md-4 overflow-hidden">
              <div class="col-12">
                <label for="email" class="form-label">New Password <span class="text-danger">*</span></label>
                <?php
                // Retrieve the token from the URL
                $token = isset($_GET['token']) ? $_GET['token'] : '';
                ?>
                <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
                <input type="text" class="form-control" name="password" id="email" placeholder="" required>
              </div>
              <br><br><br><br><br>
              <div class="col-12">
                <div class="d-grid">
                  <button class="btn btn-lg btn-primary" type="submit">Change Password</button>
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

global $db;
$db = mysqli_connect ('localhost', 'root', '', 'aawas');
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
    $_SESSION["db"]=$db;
}
global $token,$new_password;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $token=$_POST['token'];
 $new_password = md5($_POST['password']);
//  echo $token;
//  echo $new_password;

 $result = $db->query("SELECT * FROM password_resets WHERE token='$token' AND expires >= " . date("U"));
 if ($result->num_rows == 0) {
  echo "This token is invalid or has expired.";
  exit;
}
$row=mysqli_fetch_assoc($result);
$role= $row['role'];
 echo $role;
$email = $row['email'];
// echo $email;

$db->query("UPDATE $role SET password='$new_password' WHERE email='$email'");

// Delete the token
$db->query("DELETE FROM password_resets WHERE token='$token'");
exit;



}




?>