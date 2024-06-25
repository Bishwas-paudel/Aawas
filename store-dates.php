

<?php 
include('connection/connection.php');
include('navbar.php');
include('review-engine.php');
include('booking-engine.php');
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $startDate = $_POST['start-date'];
    $endDate = $_POST['end-date'];
    $propertyId = $_POST['property_id'];
	$ownerId=$_POST['owner_id'];

   

    // Insert the start date, end date, and property ID into the database
    $sql = "INSERT INTO rent_requests (start_date, end_date, property_id,owner_id) VALUES ('$startDate', '$endDate', '$propertyId','$ownerId')";

    

 if ($db->query($sql) === TRUE) {
        // Display successful alert
        echo "<script>alert('Dates stored successfully.');</script>";
        // Redirect to view_property.php with property ID using GET
       $redirectUrl = "view-property.php?property_id=" . urlencode($propertyId);

        echo "<script>window.location.href = '$redirectUrl';</script>";
        exit;
    } else {
        echo "Error storing dates: " . $db->error;
    }
}
?>
