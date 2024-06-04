<?php 
session_start();
$full_name = '';
$email = '';
$password = '';
$phone_no = '';
$address = '';
$id_type = '';
$id_photo = '';
include("connection.php");

function rental_register() {
    global $db;

    if (isset($_POST['rental_register'])) {

        $full_name = $_POST['full_name'];
        $email =    $_POST['email'];
        $password = $_POST['password'];
        $phone_no = $_POST['phone_no'];
        $address = $_POST['address'];
        $id_type = $_POST['id_type'];
        $id_photo='';
        $password = password_hash($password, PASSWORD_BCRYPT);

        if (isset($_FILES['id_photo']) && $_FILES['id_photo']['error'] == UPLOAD_ERR_OK) {
            $id_photo = 'rentel_photo/' . basename($_FILES['id_photo']['name']);
            if (!move_uploaded_file($_FILES['id_photo']['tmp_name'], $id_photo)) {
                echo "There was an error uploading the file, please try again!";
                return;
            }
        } else {
            echo "No file was uploaded or there was an upload error.";
            return;
        
            $sql1 = "SELECT email FROM rental WHERE email='$email'";
            $result = mysqli_query($db, $sql1);
        
            if (mysqli_num_rows($result) == 0) {          
                // Insert into database
                $sql = "INSERT INTO rental (full_name, email, password, phone_no, address, id_type, id_photo) VALUES ('$full_name', '$email', '$password', '$phone_no', '$address', '$id_type', '$id_photo')";
        
                if (mysqli_query($db, $sql)) {
                    header("Location: rental-login.php");
                } else {
                    echo "Error: " . mysqli_error($db);
                    header("Location: rental-register.php");
                }
            } else {
                $_SESSION['error_msg'] = "* This Email is already used";
                header("Location: rental-register.php");
            }
        
            mysqli_close($db);
    }
}

// function $data) {
//     $data = trim($data);
//     $data = stripslashes($data);
//     $data = htmlspecialchars($data);
//     return $data;
// }
}

rental_register();

function rental_login(){
    if (isset($_POST['rental_login'])) {
        global $email,$db;
        $email=$_POST['email'];
        $password=$_POST['password'];
    
            $password = md5($password); 
            $sql = "SELECT * FROM rental where email='$email' AND password='$password'";
            $result = mysqli_query($db,$sql);
            if(mysqli_num_rows($result)==1){
                $data = mysqli_fetch_assoc($result);
                $logged_user = $data['email'];
                session_start();
                $_SESSION['email']=$email;
                header('owner_index.php');
        
    
            }
            else{   
                
    header("Location:rental-login.php");
    
    
    }}
}
?>
