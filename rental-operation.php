<?php 
$full_name = '';
$email = '';
$password = '';
$phone_no = '';
$address = '';
$id_type = '';
$id_photo = '';
$db = new mysqli('localhost', 'root', '', 'aawas');
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

function rental_register() {
    global $db;

    if (isset($_POST['rental_register'])) {

        $full_name = validate($_POST['full_name']);
        $email =    validate($_POST['email']);
        $password = validate($_POST['password']);
        $phone_no = validate($_POST['phone_no']);
        $address = validate($_POST['address']);
        $id_type = validate($_POST['id_type']);

        $password = password_hash($password, PASSWORD_BCRYPT);
//file database ma halne
        if (isset($_FILES['id_photo']) && $_FILES['id_photo']['error'] == UPLOAD_ERR_OK) {
            $id_photo = 'rentel_photo/' . basename($_FILES['id_photo']['name']);
            if (!move_uploaded_file($_FILES['id_photo']['tmp_name'], $id_photo)) {
                echo "There was an error uploading the file, please try again!";
                return;
            }
        } else {
            echo "No file was uploaded or there was an upload error.";
            return;
        }
        //values halne database ma
        $sql="INSERT INTO rental (full_name, email, password, phone_no, address, id_type, id_photo) VALUES ('$full_name', '$email', '$password','$phone_no','$address', '$id_type','$id_photo')";

        if(mysqli_query($db,$sql)){
            header("Location: rental-login.php");
        }
        else {
                            echo "Error: " . mysqli_error();
                            header("Location: rental-register.php");
                        }
                        mysqli_close($db);
                    
 }}

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

rental_register();
?>