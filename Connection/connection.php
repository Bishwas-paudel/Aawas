<?php
global $db;
$db = mysqli_connect ('localhost', 'root', '', 'aawas');
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
    $_SESSION["db"]=$db;
}