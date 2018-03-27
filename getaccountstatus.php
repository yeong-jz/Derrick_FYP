<?php
session_start();
require_once('dbconfig/config.php');
$query='SELECT Fullname, Gender, email, dob FROM accounts_info WHERE username="'.$_GET['username'].'"';
$result=mysqli_query($con,$query);
$row=mysqli_fetch_array($result);
echo "
  <div style='margin-top:10px;'>
  <label> Full Name: </label>
  <input type=text value='".$row['Fullname']."' style='border-radius: 25px; border: 2px solid 	#808080'; readonly>
  </div>
  <div style='margin-top:10px;'>
  <label> Gender: </label>
  <input type=text value='".$row['Gender']."' style='border-radius: 25px; border: 2px solid 	#808080'; readonly>
  </div>
  <div style='margin-top:10px;'>
  <label> Email Address: </label>
  <input type=text value='".$row['email']."' style='border-radius: 25px; border: 2px solid 	#808080'; readonly>
  </div>
  <div style='margin-top:10px;'>
  <label> Date of Birth: </label>
  <input type=text value='".$row['dob']."' style='border-radius: 25px; border: 2px solid 	#808080'; readonly>
  </div>
";
?>
