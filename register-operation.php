<?php 
session_start();
$full_name = '';
$email = '';
$password = '';
$phone_no = '';
$address = '';
$id_type = '';
$role = '';
$id_photo = '';
$errors = array();

$db = new mysqli('localhost', 'root', '', 'aawas');

if ($db->connect_error) {
    die("Error connecting database");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['role'])) {
        $role = validate($_POST['role']);
        
        if ($role == "Owner") {
            owner_register();
        } else {
            rental_register();
        }
    } elseif (isset($_POST['rental_update'])) {
        rental_update();
    }
}

function rental_register() {
    global $db;

    $full_name = validate($_POST['full_name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $phone_no = validate($_POST['phone_no']);
    $address = validate($_POST['address']);
    $id_type = validate($_POST['id_type']);
    $path = '';

    if (isset($_FILES['id_photo']) && $_FILES['id_photo']['error'] == 0) {
        $path = "rental_photo/" . basename($_FILES['id_photo']['name']);
        if (move_uploaded_file($_FILES['id_photo']['tmp_name'], $path)) {
            echo "The file " . basename($_FILES['id_photo']['name']) . " has been uploaded";
        } else {
            echo "There was an error uploading the file, please try again!";
        }
    }

    $password = md5($password);
    $sql = "INSERT INTO rental (full_name, email, password, phone_no, address, id_type, id_photo) VALUES ('$full_name', '$email', '$password', '$phone_no', '$address', '$id_type', '$path')";
    if ($db->query($sql) === TRUE) {
        header("Location:login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}

function owner_register() {
    global $db;

    $full_name = validate($_POST['full_name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $phone_no = validate($_POST['phone_no']);
    $address = validate($_POST['address']);
    $id_type = validate($_POST['id_type']);
    $path = '';

    if (isset($_FILES['id_photo']) && $_FILES['id_photo']['error'] == 0) {
        $path = "owner-photo/" . basename($_FILES['id_photo']['name']);
        if (move_uploaded_file($_FILES['id_photo']['tmp_name'], $path)) {
            echo "The file " . basename($_FILES['id_photo']['name']) . " has been uploaded";
        } else {
            echo "There was an error uploading the file, please try again!";
        }
    }

    $password = md5($password);
    $sql = "INSERT INTO owner (full_name, email, password, phone_no, address, id_type, id_photo) VALUES ('$full_name', '$email', '$password', '$phone_no', '$address', '$id_type', '$path')";
    if ($db->query($sql) === TRUE) {
        header("Location:login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}

function rental_update() {
    global $db, $errors;

    $rental_id = validate($_POST['rental_id']);
    $full_name = validate($_POST['full_name']);
    $email = validate($_POST['email']);
    $phone_no = validate($_POST['phone_no']);
    $address = validate($_POST['address']);
    $id_type = validate($_POST['id_type']);

    $sql = "UPDATE rental SET full_name = '$full_name', email = '$email', phone_no = '$phone_no', address = '$address', id_type = '$id_type' WHERE rental_id = '$rental_id'";
    $query = mysqli_query($db, $sql);
    
    if ($query) {
        header('Location: profile.php');
    } else {
        ?>
        <style>
            .alert {
                padding: 20px;
                background-color: #DC143C;
                color: white;
            }
            .closebtn {
                margin-left: 15px;
                color: white;
                font-weight: bold;
                float: right;
                font-size: 22px;
                line-height: 20px;
                cursor: pointer;
                transition: 0.3s;
            }
            .closebtn:hover {
                color: black;
            }
        </style>
        <div class="alert">
            <span class="closebtn">&times;</span> 
            <strong>Error!</strong> Update failed.
        </div>
        <?php
    }
}

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
