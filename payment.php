<?php
global $property_id;
// Include Esewa SDK
require 'Esewa.php';
use Xentixar\EsewaSdk\Esewa;
  
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['book_property'])) {
    $amount = 1000; // Amount to be paid

    // Configuration and initializing Esewa
    global $booked;
    $booked= "Yes";
    $success_url = 'http://localhost/aawas-test/view-property.php';
    $failure_url = 'http://localhost/Aawas-test/view-property.php';
    

    // Other configuration parameters like product code, tax, service charge, etc.
    $product_code = 'EPAYTEST';
    $secret_key = '8gBm/:&EnhH.1/q';

    $esewa = new Esewa();
    $esewa->config($success_url, $failure_url, $amount, $product_code, $secret_key);

    // Generate Esewa payment form
    $esewa->init(false); // Set to true for production
} else {
    echo "Invalid request method.";
}
?>
