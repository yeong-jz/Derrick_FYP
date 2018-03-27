<?php
session_start();
require_once('dbconfig/config.php');
$query='SELECT bio FROM accounts_info WHERE username="'.$_GET['username'].'"';
$result=mysqli_query($con,$query);
$row=mysqli_fetch_array($result);
echo"
<div style='margin-top:10px;'>
<label>Bio: </label>
<input type=textarea value='".$row['bio']."' style='border-radius: 25px; border: 2px solid 	#808080'; readonly>
</div>
";
?>
