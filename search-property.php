<?php 
session_start();
isset($_SESSION["email"]);
include("navbar.php");
include("connection/connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 100%;
  min-width: 100%;
  margin: auto;
  text-align: center;
  font-family: arial;
  display: inline;
}
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
  opacity: 0.8;
}
.container {
  padding: 2px 16px;
}
.btn {
  width: 100%;
}
.image {
  min-width: 100%;
  min-height: 200px;
  max-width: 100%;
  max-height:200px;
}
</style>
</head>
<body>
<?php
$searchTitle = isset($_POST['search-title']) ? mysqli_real_escape_string($db, $_POST['search-title']) : '';
$searchLocation = isset($_POST['search-location']) ? mysqli_real_escape_string($db, $_POST['search-location']) : '';
$propertyType = isset($_POST['property-type']) ? mysqli_real_escape_string($db, $_POST['property-type']) : '';
$priceRange = isset($_POST['price-range']) ? mysqli_real_escape_string($db, $_POST['price-range']) : '';
$queryParts = [];
if (!empty($searchTitle)) {
    $queryParts[] = "city LIKE '%$searchTitle%'";
}
if (!empty($searchLocation)) {
    $queryParts[] = "Area LIKE '%$searchLocation%'";
}
if (!empty($propertyType)) {
    $queryParts[] = "property_type = '$propertyType'";
}
if (!empty($priceRange)) {
    list($minPrice, $maxPrice) = explode('-', $priceRange);
    $queryParts[] = "estimated_price BETWEEN $minPrice AND $maxPrice";
}
$queryString = implode(' AND ', $queryParts);
$sql = "SELECT * FROM add_property";
if (!empty($queryString)) {
    $sql .= " WHERE $queryString";
}

$query = mysqli_query($db, $sql);

if (!$query) {
    die('SQL Error: ' . mysqli_error($db));
}
echo '<center><h1>Searched Properties</h1></center>';
if (mysqli_num_rows($query) > 0) {
    while ($rows = mysqli_fetch_assoc($query)) {
        $property_id = $rows['property_id'];
?>

<div class="col-sm-2">
<div class="card">
<?php
        $sql2 = "SELECT * FROM property_photo WHERE property_id='$property_id'";
        $query2 = mysqli_query($db, $sql2);

        if (!$query2) {
            die('SQL Error: ' . mysqli_error($db));
        }

        if (mysqli_num_rows($query2) > 0) {
            $row = mysqli_fetch_assoc($query2); 
            $photo = $row['p_photo'];
            echo '<img class="image" src="owner/'.$photo.'">';
        }
?>

  <h4><b><?php echo $rows['property_type']; ?></b></h4> 
  <p><?php echo '<a href="view-property.php?property_id='.$rows['property_id'].'" class="btn btn-lg btn-primary btn-block">View Property</a><br>'; ?></p><br>
</div>
</div>
<?php 
    }
} else {
    echo "<center><h3>Searched Property not found...</h3></center>";
}
?>
</body>
</html>
