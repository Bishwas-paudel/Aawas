<?php
include("connection/connection.php");

function rental_update() {
    global $db, $errors;

    $rental_id = validate($_POST['rental_id']);
    $full_name = validate($_POST['full_name']);
    $email = validate($_POST['email']);
    $phone_no = validate($_POST['phone_no']);
    $address = validate($_POST['address']);
    $password = validate($_POST['password']);

    if (!empty($password)) {
        $password_hashed = md5($password);
        $stmt = $db->prepare("UPDATE rental SET full_name = ?, email = ?, phone_no = ?, address = ?, password = ? WHERE rental_id = ?");
        $stmt->bind_param("sssssi", $full_name, $email, $phone_no, $address, $password_hashed, $rental_id);
    } else {
        $stmt = $db->prepare("UPDATE rental SET full_name = ?, email = ?, phone_no = ?, address = ? WHERE rental_id = ?");
        $stmt->bind_param("ssssi", $full_name, $email, $phone_no, $address, $rental_id);
    }
    
    $query = $stmt->execute();
    
    if ($query) {
        header('Location: profile.php');
    } else {
        echo "<div class='alert'>
                <span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span> 
                <strong>Error!</strong> Update failed.
              </div>";
    }
}

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['rental_update'])) {
    rental_update();
}
?>
