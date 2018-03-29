<?php
require_once('dbconfig/config.php');
$query="SELECT description FROM parttime WHERE id='".$_GET['id']."'";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_array($result);
echo $row['description'];

?>
