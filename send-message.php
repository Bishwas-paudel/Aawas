<?php
session_start();
isset($_SESSION["email"]);
include "connection/con.php";


  $u_email=$_SESSION["email"];
  $message=$_POST['message'];
	$owner_id=$_POST['owner_id'];
	$rental_id=$_POST['rental_id'];
	
    
	$sql="INSERT INTO chat(message,owner_id,rental_id) VALUES ('$message','$owner_id','$rental_id')";

	$query = mysqli_query($db,$sql);
	if($query)
	{
		header('Location:'. $_SERVER['HTTP_REFERER']);
	}
	else
	{
		echo "Something went wrong";
	}
	
?>