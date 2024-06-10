<?php 

$full_name = '';
$email = '';
$password = '';
$phone_no = '';
$address = '';
$id_type = '';
$id_photo = '';
$errors = array();

$db = new mysqli('localhost', 'root', '', 'aawas');

if ($db->connect_error) {
    echo "Error connecting database";
    exit();
}

if (isset($_POST['rental_register'])) {
    rental_register();
}

if (isset($_POST['rental_login'])) {
    rental_login();
}

if (isset($_POST['rental_update'])) {
    rental_update();
}

function rental_register() {
    global $db;
    $full_name = validate($_POST['full_name']);
    $email= validate($_POST['email']);
    $password = validate($_POST['password']);
    $phone_no = validate($_POST['phone_no']);
    $address = validate($_POST['address']);
    $id_type = validate($_POST['id_type']);
    
    if (isset($_FILES['id_photo'])) {
        $id_photo = 'owner-photo/' . $_FILES['id_photo']['name'];
        $path = "rental_photo/" . basename($_FILES['id_photo']['name']);
        if (move_uploaded_file($_FILES['id_photo']['tmp_name'], $path)) {
            echo "The file " . basename($_FILES['id_photo']['name']) . " has been uploaded";
        } else {
            echo "There was an error uploading the file, please try again!";
        }
    }

    $password = md5($password);
    $sql = "INSERT INTO rental(full_name, email, password, phone_no, address, id_type, id_photo) VALUES ('$full_name', '$email', '$password', '$phone_no', '$address', '$id_type', '$path')";
    if ($db->query($sql) === TRUE) {
        header("Location: rental-login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}

function rental_login() {
    global $db;
    $email =$_POST['email'];
    $password =$_POST['password'];
    $password = md5($password);
    $sql = "SELECT * FROM rental WHERE email='$email' AND password='$password' LIMIT 5";
    $result = $db->query($sql);
    if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();
        session_start();
        $_SESSION['email'] = $data['email'];
        header('Location:index2.php');
        echo"login vayo ????????????????????";
    } else {
        echo"login vayo ????????????????????";
        session_start();
        $_SESSION['login_error'] = "Incorrect Email/Password or not registered.";
        header('Location: rental-login.php');
    }
}


function rental_update() {
    global $rental_id, $full_name, $email, $phone_no, $address, $id_type, $password, $errors, $db;

    $rental_id = validate($_POST['rental_id']);
    $full_name = validate($_POST['full_name']);
    $email = validate($_POST['email']);
    $phone_no = validate($_POST['phone_no']);
    $address = validate($_POST['address']);
    $id_type = validate($_POST['id_type']);

    $sql = "UPDATE rental SET full_name = '$full_name', email = '$email', phone_no = '$phone_no', address = '$address', id_type = '$id_type' WHERE rental_id = '$rental_id'";
    $query = mysqli_query($db, $sql);

    if (!empty($query)) {
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
<?php
}} 
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>