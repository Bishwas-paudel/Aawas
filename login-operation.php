<?php
session_start();

include("connection/connection.php");

owner_login();

function owner_login() {
    global $db;
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $password = md5($password);
    $sql = "SELECT * FROM owner WHERE email='$email' AND password='$password' LIMIT 10";
    $result = $db->query($sql);
    if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();
        session_start();
        $_SESSION['email'] = $data['email'];
        header('Location: owner/owner-index.php');
    } else {
         rental_login();
    }
}


function rental_login() {
    global $db;
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $password = md5($password);
    $sql = "SELECT * FROM rental WHERE email='$email' AND password='$password' LIMIT 10";
    $result = $db->query($sql);
    if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();
        session_start();
        $_SESSION['email'] = $data['email'];
        header('Location:index2.php');
  
    } else {
  
      admin_login();
    }
}

function admin_login() {
    global $db;
    $email = validate($_POST['email']);
    $password = $_POST['password'];
    $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password' LIMIT 10";
    $result = $db->query($sql);
    if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();
        session_start();
        $_SESSION['email'] = $data['email'];
        header('Location:admin/admin-index.php');
  
    } else {
  
        session_start();
        $_SESSION['login_error'] = "Incorrect Email/Password or not registered as Rental or Owner.";
        header('Location:login.php');
    }
}
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
