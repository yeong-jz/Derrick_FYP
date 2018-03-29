<?php
require_once('dbconfig/config.php');
$update="UPDATE music SET title='".$_GET['title']."', price='".$_GET['price']."', description='".$_GET['description']."' WHERE id='".$_GET['id']."'";
mysqli_query($con,$update);
?>
