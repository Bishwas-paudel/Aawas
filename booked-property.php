<?php 
session_start();
isset($_SESSION["email"]);
include("navbar.php");
 ?>

 <?php 
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
$u_email=$_SESSION['email'];
        $sql3="SELECT * from rental where email='$u_email'";
        $result3=mysqli_query($db,$sql3);

    echo '<center><h1>Booked Properties</h1></center>';

        if(mysqli_num_rows($result3)>0)
      {
          while($rowss=mysqli_fetch_assoc($result3)){
            $rental_id=$rowss['rental_id'];

$sql1="SELECT * FROM booking where rental_id='$rental_id'";
    $query1=mysqli_query($db,$sql1);
    if(mysqli_num_rows($query1)>0)
    {
      while ($ro=mysqli_fetch_assoc($query1)) {
        $prop_id=$ro['property_id'];

$sql="SELECT * FROM add_property where property_id='$prop_id'";
    $query=mysqli_query($db,$sql);
    if(mysqli_num_rows($query)>0)
    {
      while ($rows=mysqli_fetch_assoc($query)) {
        $property_id=$rows['property_id'];

?>

<div class="col-sm-2">
<div class="card">
<?php


        $sql2="SELECT * FROM property_photo where property_id='$property_id'";
    $query2=mysqli_query($db,$sql2);

    if(mysqli_num_rows($query2)>0)
    {
      $row=mysqli_fetch_assoc($query2); 
        $photo=$row['p_photo'];
        echo  '<img class="image" src="owner/'.$photo.'">'; }?>

  <h4><b><?php echo $rows['property_type']; ?></b></h4> 
  <p><?php echo $rows['city'].', '.$rows['district'] ?></p> 
  <p><?php echo '<a href="view-property.php?property_id='.$rows['property_id'].'"  class="btn btn-lg btn-primary btn-block" >View Property </a><br>'; ?></p><br>
</div>
</div>

</body>
</html> 


<?php 

}
    }

    else{
    	echo "<center><h3>Searched Property not found...</h3></center>";
    }
  }}}}
    ?>