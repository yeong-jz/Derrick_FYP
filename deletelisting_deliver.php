<?php
require_once('dbconfig/config.php');
$delete="DELETE FROM deliver WHERE id='".$_GET['id']."'";
mysqli_query($con,$delete);
?>
