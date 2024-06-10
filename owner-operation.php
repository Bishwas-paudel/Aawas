<?php
session_start();

include("connection/connection.php");

if (isset($_POST['owner_register'])) {
    owner_register();
}
if (isset($_POST['owner_login'])) {
    owner_login();
}

function owner_register() {
    global $db;
    $owner_id = validate($_POST['owner_id']);
    $full_name = validate($_POST['full_name']);
    $email= validate($_POST['email']);
    $password = validate($_POST['password']);
    $phone_no = validate($_POST['phone_no']);
    $address = validate($_POST['address']);
    $id_type = validate($_POST['id_type']);
    
    if (isset($_FILES['id_photo'])) {
        $id_photo = 'owner-photo/' . $_FILES['id_photo']['name'];
        $path = "owner-photo/" . basename($_FILES['id_photo']['name']);
        if (move_uploaded_file($_FILES['id_photo']['tmp_name'], $path)) {
            echo "The file " . basename($_FILES['id_photo']['name']) . " has been uploaded";
        } else {
            echo "There was an error uploading the file, please try again!";
        }
    }

    $password = md5($password);
    $sql = "INSERT INTO owner(owner_id, full_name, email, password, phone_no, address, id_type, id_photo) VALUES ('$owner_id', '$full_name', '$email', '$password', '$phone_no', '$address', '$id_type', '$path')";
    if ($db->query($sql) === TRUE) {
        header("Location: owner-login.php");
    }
}

function owner_login() {
    global $db;
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $password = md5($password);
    $sql = "SELECT * FROM owner WHERE email='$email' AND password='$password' LIMIT 1";
    $result = $db->query($sql);
    if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();
        session_start();
        $_SESSION['email'] = $data['email'];
        header('Location: owner/owner-index.php');
    } else {
        session_start();
        $_SESSION['login_error'] = "Incorrect Email/Password or not registered.";
        header('Location: owner-login.php');
    }
}

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
