<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>

<!DOCTYPE html>
<html>
<head>
<?php include 'test.php' ?>
<title>Login Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#2d3b36">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-offset-4  col-sm-4 col-xs-12 bg">

				<center><h2>I.S.P</h2></center>
					<div class="imgcontainer">
					<img src="imgs/student.png" alt="Student" class="student">
						</div>
						<form action="index.php" method="post">

							<div class="inner_container">
							<label><b>Username:</b></label>
							<input type="text" placeholder="Enter Username" name="username" required>
							<label><b>Password:</b></label>
							<input type="password" placeholder="Enter Password" name="password" required><br><br>
							<button class="login_button" name="login" type="submit">Login</button>
							<a href="register.php"><button type="button" class="register_btn">Register</button></a><br><br><br><br>
						</div>
						</form>
			</div>
		</div>
	</div>


		<?php
			if(isset($_POST['login']))
			{
				$username=$_POST['username'];
				$password=$_POST['password'];
				$query = "select * from accounts where username='$username' and password='$password' ";
				//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);

				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
					$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);

					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;

					header( "Location: home.php");
					}
					else
					{
						echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
				}
			}
			else
			{
			}
		?>

	</div>
</body>
</html>
