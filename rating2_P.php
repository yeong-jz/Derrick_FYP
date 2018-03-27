<?php
session_start();
require_once('dbconfig/config.php');
$query="SELECT * FROM review WHERE username='".$_SESSION['username']."' AND provider='".$_SESSION['pusername']."'";
$result=mysqli_query($con,$query);
$count=mysqli_num_rows($result);
if($count==1){
 echo "hi";
}
else{
$insert="INSERT INTO review (username,provider,stars,review) VALUES ('".$_SESSION['username']."','".$_SESSION['pusername']."','".$_GET['stars']."','".$_GET['review']."')";
mysqli_query($con,$insert);
}
unset($_SESSION['pusername']);
?>
