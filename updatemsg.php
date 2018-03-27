<?php
require_once('dbconfig/config.php');
$id=md5($_GET['username'].$_GET['contact']);
$date = date('Y-m-d H:i:s');
$query="INSERT INTO privatemsg (id, username, sentto, message, timestamp, provideread, receiveread) VALUES ('".$id."','".$_GET['username']."','".$_GET['contact']."','".$_GET['message']."','".$date."',NULL,'read')";
mysqli_query($con, $query);
?>
