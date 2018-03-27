<?php
/*For My LocalPC*/
// 1. Create a database connection
$con=mysqli_connect("http://localhost/phpmyadmin/index.php", "root", "");
if (!$con) {
    die("Database connection failed: " . mysqli_error());
}

// 2. Select a database to use
$db_select = mysqli_select_db($con,'fyp2');
if (!$db_select) {
    die("Database selection failed: " . mysqli_error());
}
?>
