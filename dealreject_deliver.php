<?php
require_once('dbconfig/config.php');
$query="UPDATE deliver_deal SET status = 'Reject' WHERE id='".$_GET['id']."'";
mysqli_query($con,$query);
?>
