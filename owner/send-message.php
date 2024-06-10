<?php
session_start();
isset($_SESSION["email"]);
include "../connection/connection.php";
 $u_email=$_SESSION["email"];
	$owner_id=$_GET['owner_id'];
	$rental_id=$_GET['rental_id'];
?>