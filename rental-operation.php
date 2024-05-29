<?php 
$full_name = '';
$email = '';
$password = '';
$phone_no = '';
$address = '';
$id_type = '';
$id_photo = '';
$db = new mysqli('localhost', 'root', '', 'aawas');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

function rental_register() {
    global $db;

    if (isset($_POST['rental_register'])) {
        // Validate and sanitize input data
        $full_name = validate($_POST['full_name']);
        $email = validate($_POST['email']);
        $password = validate($_POST['password']);
        $phone_no = validate($_POST['phone_no']);
        $address = validate($_POST['address']);
        $id_type = validate($_POST['id_type']);

        // Encrypt the password
        $password = password_hash($password, PASSWORD_BCRYPT);

        // Handle the file upload
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

        // Prepare the SQL statement to prevent SQL injection
        $stmt = $db->prepare("INSERT INTO rental (full_name, email, password, phone_no, address, id_type, id_photo) VALUES (?, ?, ?, ?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("sssssss", $full_name, $email, $password, $phone_no, $address, $id_type, $id_photo);
            if ($stmt->execute()) {
                header("Location: rental-login.php");
            } else {
                echo "Error: " . $stmt->error;
                header("Location: rental-register.php");
            }
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $db->error;
        }
    }
}

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

rental_register();
?> 
