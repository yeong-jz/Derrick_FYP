<?php
session_start();
require_once('dbconfig/config.php');

$insert="INSERT INTO review (username,provider,stars,review) VALUES ('".$_SESSION['username']."','".$_SESSION['pusername']."','".$_GET['stars']."','".$_GET['review']."')";
mysqli_query($con,$insert);

$update= "UPDATE parttime_deal SET rate='rated' WHERE id='".$_SESSION['productid']."'";
mysqli_query($con,$update);

unset($_SESSION['pusername']);
unset($_SESSION['productid']);
?>
