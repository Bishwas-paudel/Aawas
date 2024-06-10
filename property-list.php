<?php
global $db;
$db = mysqli_connect('localhost', 'root', '', 'aawas');
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    $_SESSION["db"] = $db;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">   
<link rel="stylesheet" href="style.css">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

header {
  background: #333;
  color: #fff;
  padding: 10px 0;
  position: fixed;
  width: 100%;
  top: 0;
  z-index: 1000;
  background-color: #fff;
}

.grid-container {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 10px;
  padding: 10px;
  margin: 100px 20px 20px; /* Adjusted top margin for fixed navbar */
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  text-align: center;
  font-family: arial;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
  opacity: 0.8;
}

.container {
  padding: 2px 16px;
}



.image {
  display: block;
  margin: auto;
  width: 250px;
  height: 250px;
}
</style>
</head>
<body>

<header>
        <div class="nav container">
            <a href="index.php" class="logo" ><i class='bx bx-home'></i>AAWAS</a>
            <input type="checkbox" id="menu">
            <label for="menu"><i class='bx bx-menu' id="menu-icon"></i></label>
            <ul class="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
                <li><a href="property-list.php">Properties</a></li>
            </ul>
            <a href="login_options.php" class="btn">Log In</a>
        </div>
    </header>

<?php 
$sql="SELECT * FROM add_property";
$query=mysqli_query($db,$sql);

if(mysqli_num_rows($query)>0) {
    echo '<div class="grid-container">';
    while ($rows=mysqli_fetch_assoc($query)) {
        $property_id=$rows['property_id'];
?>
<div class="card">
<?php
//fetching photos
$sql2="SELECT * FROM property_photo where property_id='$property_id'";
$query2=mysqli_query($db,$sql2);

if(mysqli_num_rows($query2)>0) {
    $row=mysqli_fetch_assoc($query2); 
    $photo=$row['p_photo'];
    echo  '<img class="image" src="owner/'.$photo.'">'; 
}
?>
  <h4><b><?php echo $rows['property_type']; ?></b></h4> 
  <p><?php echo $rows['city'] ?></p> 
  <p><?php echo '<a href="view-property.php?property_id='.$rows['property_id'].'"  class="btn-lg btn-primary btn-block" >View Property </a><br>'; ?></p><br>
</div>
<?php 
    }
    echo '</div>';
}
?>

</body>
</html>
