<?php

$property_id = '';
include("../connection/connection.php");

if (isset($_GET['property_id'])) {
    delete_property();
}

function delete_property() {
    global $db, $property_id;

    $property_id = $_GET['property_id'];

    $sql = "DELETE FROM property_photo WHERE property_id='$property_id'";
    $query = mysqli_query($db, $sql);

    if ($query) {
        $sql2 = "DELETE FROM review WHERE property_id='$property_id'";
        $query2 = mysqli_query($db, $sql2);

        $sql3 = "DELETE FROM add_property WHERE property_id='$property_id'";
        $query3 = mysqli_query($db, $sql3);

        if ($query3) {
            // Redirect back to the referring page with success message
            header("Location: " . $_SERVER['HTTP_REFERER'] . "?success=1");
            exit(); // Ensure script execution stops after redirect
        }
    }
}
?>