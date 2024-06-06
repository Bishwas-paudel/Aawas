<?php 
$property_id='';
$city='';
$ward_no='';
$area='';
$street_No='';
$contact_no='';
$property_type='';
$estimated_price='';
$total_rooms='';
$bedroom='';
$living_room='';
$kitchen='';
$description='';
$latitude='';
$longitude='';
$booked='';
$owner_id='';

$db = new mysqli('localhost', 'root', '', 'Aawas');

if ($db->connect_error) {
    echo "Error connecting database";
}

if (isset($_POST['add_property'])) {
    add_property();
}

if (isset($_POST['owner_update'])) {
    owner_update();
}

function add_property() {
    try {
        global $property_id, $city, $ward_no, $area, $street_No, $contact_no, $property_type, $estimated_price, $total_rooms, $bedroom, $living_room, $kitchen, $description, $latitude, $longitude, $booked, $owner_id, $db;
        
        $city = validate($_POST['city']);
        $ward_no = validate($_POST['ward_no']);
        $area = validate($_POST['Area']);
        $street_No = validate($_POST['Street']);
        $contact_no = validate($_POST['contact_no']);
        $property_type = validate($_POST['property_type']);
        $estimated_price = validate($_POST['estimated_price']);
        $total_rooms = validate($_POST['total_rooms']);
        $bedroom = validate($_POST['bedroom']);
        $living_room = validate($_POST['living_room']);
        $kitchen = validate($_POST['kitchen']);
        $description = validate($_POST['description']);
        $latitude = validate($_POST['latitude']);
        $longitude = validate($_POST['longitude']);
        $booked = 'No';
        $u_email = $_SESSION['email'];
        $sql1 = "SELECT * FROM owner WHERE email='$u_email'";
        $result1 = mysqli_query($db, $sql1);

        if (mysqli_num_rows($result1) > 0) {
            while ($rowss = mysqli_fetch_assoc($result1)) {
                $owner_id = $rowss['owner_id'];

                $sql = "INSERT INTO add_property ( city, ward_no, Area ,Street_No,contact_no, property_type, estimated_price, total_rooms, bedroom, living_room, kitchen,  description, latitude, longitude, booked, owner_id) VALUES ( '$city', '$ward_no', '$area','$street_No' '$contact_no', '$property_type', '$estimated_price', '$total_rooms', '$bedroom', '$living_room', '$kitchen', '$description', '$latitude', '$longitude', '$booked', '$owner_id',)";
                $query = mysqli_query($db, $sql);
                if ($query) {
                    $property_id = mysqli_insert_id($db);
                    $countfiles = count($_FILES['p_photo']['name']);
                    for ($i = 0; $i < $countfiles; $i++) {
                        $paths = $_FILES['p_photo']['tmp_name'][$i];
                        if ($paths != "") {
                            $path = "product-photo/" . $_FILES['p_photo']['name'][$i];
                            if (move_uploaded_file($paths, $path)) {
                                $sql2 = "INSERT INTO property_photo(p_photo, property_id) VALUES ('$path', '$property_id')";
                                mysqli_query($db, $sql2);
                            }
                        }
                    }
                    echo "<div class='container'><div class='alert' role='alert'><span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span><center><strong>Your Product has been uploaded.</strong></center></div></div>";
                } else {
                    echo "Error: " . mysqli_error($db);
                }
            }
        }
    } catch (Exception $e) {
        die($e);
    }
}

function owner_update() {
    global $owner_id, $full_name, $email, $password, $phone_no, $address, $id_type, $db;

    $owner_id = validate($_POST['owner_id']);
    $full_name = validate($_POST['full_name']);
    $email = validate($_POST['email']);
    $phone_no = validate($_POST['phone_no']);
    $address = validate($_POST['address']);
    $id_type = validate($_POST['id_type']);
    $password = md5($password);

    $sql = "UPDATE owner SET full_name='$full_name', email='$email', phone_no='$phone_no', address='$address', id_type='$id_type' WHERE owner_id='$owner_id'";
    $query = mysqli_query($db, $sql);

    if (!empty($query)) {
        echo "<div class='container'><div class='alert' role='alert'><span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span><center><strong>Your Information has been updated.</strong></center></div></div>";
    }
}

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
