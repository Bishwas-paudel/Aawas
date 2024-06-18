<?php 
session_start();
include('connection/connection.php');
include('navbar.php');
include('review-operation.php');

$property_id = $_GET['property_id'];
$sql = "SELECT * from add_property where property_id='$property_id'";
$query = mysqli_query($db, $sql);

if (mysqli_num_rows($query) > 0) {
    while ($rows = mysqli_fetch_assoc($query)) {
        $sql2 = "SELECT * FROM property_photo where property_id='$property_id'";
        $query2 = mysqli_query($db, $sql2);
        $rowcount = mysqli_num_rows($query2);
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
            <style>
                #mapid { height: 180px; }
                h4 { margin-top: 0; }
                form { margin-top: 20px; }
                label { display: block; margin-bottom: 5px; }
                input[type="date"] { width: 100%; padding: 5px; margin-bottom: 10px; }
                input[type="submit"] { background-color: #4CAF50; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; margin-top: 10px; }
                input[type="submit"]:hover { background-color: #3e8e41; }
            </style>
        </head>
        <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <?php
                            for ($i = 1; $i <= $rowcount; $i++) {
                                $row = mysqli_fetch_array($query2);
                                $photo = $row['p_photo'];
                                ?>
                                <div class="item <?php echo ($i == 1) ? 'active' : ''; ?>">
                                    <img class="d-block img-fluid" src="owner/<?php echo $photo ?>" alt="Slide" width="100%" style="max-height: 600px; min-height: 600px;">
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <center><h2><?php echo $rows['property_type'] ?></h2></center>
                    <div class="row">
                        <div class="col-sm-6">
                            <table>
                                <tr>
                                    <td><h4>City:</h4></td>
                                    <td><h4><?php echo $rows['city']; ?></h4></td>
                                </tr>
                                <tr>
                                    <td><h4>Ward No.:</h4></td>
                                    <td><h4><?php echo $rows['ward_no']; ?></h4></td>
                                </tr>
                                <tr>
                                    <td><h4>Area:</h4></td>
                                    <td><h4><?php echo $rows['Area']; ?></h4></td>
                                </tr>
                                <tr>
                                    <td><h4>Street_NO:</h4></td>
                                    <td><h4><?php echo $rows['Street_No']; ?></h4></td>
                                </tr>
                                <tr>
                                    <td><h4>Contact No.:</h4></td>
                                    <td><h4><?php echo $rows['contact_no']; ?></h4></td>
                                </tr>
                                <tr>
                                    <td><h4>Estimated Price:</h4></td>
                                    <td><h4>Rs.<?php echo $rows['estimated_price']; ?></h4></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <table>
                                <tr>
                                    <td><h4>Total Rooms:</h4></td>
                                    <td><h4><?php echo $rows['total_rooms']; ?></h4></td>
                                </tr>
                                <tr>
                                    <td><h4>Bedrooms:</h4></td>
                                    <td><h4><?php echo $rows['bedroom']; ?></h4></td>
                                </tr>
                                <tr>
                                    <td><h4>Living Room:</h4></td>
                                    <td><h4><?php echo $rows['living_room']; ?></h4></td>
                                </tr>
                                <tr>
                                    <td><h4>Kitchen:</h4></td>
                                    <td><h4><?php echo $rows['kitchen']; ?></h4></td>
                                </tr>
                                <tr>
                                    <td><h4>Booked:</h4></td>
                                    <td><h4><?php echo $rows['booked']; ?></h4></td>
                                </tr>
                                <tr>
                                    <td><h4>Description:</h4></td>
                                    <td><h4><?php echo $rows['description']; ?></h4></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="sidebar">
                <h3>Rent Dates</h3>
                <label for="start-date">Start Date:</label>
                <input type="date" id="start-date" name="start-date">
                <label for="end-date">End Date:</label>
                <input type="date" id="end-date" name="end-date">
                <input type="submit" value="Submit">
            </div>
            <?php
            if (isset($_SESSION["email"]) && !empty($_SESSION['email'])) {
                ?>
                <form method="POST" action="booking-engine.php?property_id=<?php echo $rows['property_id']; ?>">
                    <div class="row">
                        <div class="col-sm-6">
                            <?php
                            $booked = $rows['booked'];
                            if ($booked == 'No') { ?>
                                <input type="hidden" name="property_id" value="<?php echo $rows['property_id']; ?>">
                                <input type="submit" class="btn btn-lg btn-primary" name="book_property" style="width: 100%" value="Book Property">
                            <?php } else { ?>
                                <input type="submit" class="btn btn-lg btn-primary" style="width: 100%" value="Property Booked" disabled>
                            <?php } ?>
                        </div>
                    </form>
                    <form method="POST" action="chatpage.php">
                        <div class="col-sm-6">
                            <input type="hidden" name="owner_id" value="<?php echo $rows['owner_id']; ?>">
                            <input type="submit" class="btn btn-lg btn-success" name="send_message" style="width: 100%" value="Send Message">
                        </div>
                    </form>
                    <?php
                } else {
                    echo "<center><h3>You should login to book property.</h3></center>";
                }
                ?>
                <br>
                <div id="map" style="width: 100%; height: 300px;">
                    <div id="lat"><?php echo $rows['latitude']; ?></div>
                    <div id="lon"><?php echo $rows['longitude']; ?></div>
                </div>
                <br>
            </div>
            <div class="container-fluid">
                <h2>Review Property:</h2>
                <div class="well well-sm">
                    <div class="text-right">
                        <?php
                        if (isset($_SESSION["email"]) && !empty($_SESSION['email'])) {
                            ?>
                            <a class="btn btn-success btn-info" href="#reviews-anchor" style="width: 100%" id="open-review-box">Leave a Review</a>
                        </div>
                        <div class="row" id="post-review-box" style="display:none;">
                            <div class="col-md-12">
                                <form accept-charset="UTF-8" action="review-operation.php" method="post">
                                    <input id="ratings-hidden" name="rating" type="hidden">
                                    <input name="property_id" type="hidden" value="<?php echo $rows['property_id'] ?>">
                                    <textarea class="form-control animated" cols="50" id="new-review" name="comment" placeholder="Enter your review here..." rows="5"></textarea>
                                    <div class="text-right">
                                        <div class="stars starrr" data-rating="0"></div>
                                        <a class="btn btn-danger btn-info" href="#" id="close-review-box" style="display:none; margin-right: 10px;">Cancel</a>
                                        <button class="btn btn-success btn-lg" type="submit">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
                    } else {
                        echo "<center><h3>You should login to review property.</h3></center>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <script src="https://cdn.khalti.com/khalti-checkout-web/dist/khalti-checkout.iframe.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var bookButton = document.querySelector('input[name="book_property"]');
                var propertyId = <?php echo json_encode($rows['property_id']); ?>;
                var estimatedPrice = <?php echo json_encode($rows['estimated_price']); ?>;

                bookButton.addEventListener('click', function(event) {
                    event.preventDefault();

                    var config = {
                        "publicKey": "test_public_key_dc74b13c89cc4fb79222eb597a37553a",
                        "productIdentity": propertyId,
                        "productName": "Property Booking",
                        "productUrl": "http://localhost/view-property.php?property_id=" + propertyId,
                        "eventHandler": {
                            onSuccess(payload) {
                                fetch('verify-payment.php', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json'
                                    },
                                    body: JSON.stringify(payload)
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        alert('Payment Successful!');
                                        window.location.href = 'view-property.php?property_id=' + propertyId;
                                    } else {
                                        alert('Payment Verification Failed!');
                                    }
                                })
                                .catch(error => console.error('Error:', error));
                            },
                            onError(error) {
                                console.error(error);
                            },
                            onClose() {
                                console.log('Widget is closing');
                            }
                        }
                    };

                    var checkout = new KhaltiCheckout(config);
                    checkout.show({amount: estimatedPrice * 100});
                });
            });
        </script>
        </body>
        </html>
        <?php
    }
}
?>
