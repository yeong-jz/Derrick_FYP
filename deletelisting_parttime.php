<?php
require_once('dbconfig/config.php');
$delete="DELETE FROM parttime WHERE id='".$_GET['id']."'";
mysqli_query($con,$delete);
?>
