<?php 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

include("connection/connection.php");

if(isset($_POST['book_property'])){
  if(isset($_SESSION["email"])){
    global $db, $property_id;
    $u_email=$_SESSION["email"];

    if (isset($_GET['property_id'])) {
      $property_id = $_GET['property_id'];
    } else {
      echo "Error: Property ID is missing in the URL";
      exit;
    }

    $sql="SELECT * FROM rental where email='$u_email'";
    $query=mysqli_query($db,$sql);

    if(mysqli_num_rows($query)>0) {
      while ($rows=mysqli_fetch_assoc($query)) {
        $rental_id=$rows['Rental_id'];
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Book Property</title>
          <script src="https://khalti.com/static/khalti-checkout.js"></script>
        </head>
        <body>
          <button id="payment-button">Pay with Khalti</button>
          <script>
            var config = {
              "publicKey": "YOUR_PUBLIC_KEY",  // Replace with your actual Public Key
              "productIdentity": "<?php echo $property_id; ?>",
              "productName": "Property Booking",
              "productUrl": "http://example.com/property/<?php echo $property_id; ?>",
              "paymentPreference": [
                "KHALTI",
                "EBANKING",
                "MOBILE_BANKING",
                "CONNECT_IPS",
                "SCT",
              ],
              "eventHandler": {
                onSuccess (payload) {
                  // Send payment details to server for verification
                  fetch('/verify-payment.php', {
                    method: 'POST',
                    headers: {
                      'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(payload)
                  }).then(response => {
                    return response.json();
                  }).then(data => {
                    if (data.success) {
                      alert("Payment successful. Booking confirmed.");
                      window.location.href = "view-property.php";
                    } else {
                      alert("Payment verification failed. Please try again.");
                    }
                  }).catch(error => {
                    console.error(error);
                    alert("Payment verification failed. Please try again.");
                  });
                },
                onError (error) {
                  // Handle errors
                  console.log(error);
                },
                onClose () {
                  console.log('widget is closing');
                }
              }
            };

            var checkout = new KhaltiCheckout(config);
            var btn = document.getElementById("payment-button");
            btn.onclick = function () {
              checkout.show({amount: 100000}); // Change the amount as needed
            }
          </script>
        </body>
        </html>

        <?php
      }
    }
  }
}
?>
