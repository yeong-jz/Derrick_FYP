<?php
session_start();
require_once('dbconfig/config.php');
$query='SELECT bio FROM accounts_info WHERE username="'.$_GET['username'].'"';
$result=mysqli_query($con,$query);
$row=mysqli_fetch_array($result);
echo"
<div style='margin-top:10px; width:100%;'>
<label>Bio: </label>
<textarea style='border-radius: 5px; width:100%; height:300px; margin:10px; border: 2px solid 	#808080;' readonly>".$row['bio']."</textarea>
</div>
";
?>
