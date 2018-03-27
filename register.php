<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>
<!DOCTYPE html>
<html>
<head>
 <?php include 'test.php' ?>
<title>Sign Up Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#2d3b36">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-offset-4  col-sm-4 col-xs-12 bg">
				<center><h2>Sign Up</h2></center>
					<form action="register.php" method="post" enctype="multipart/form-data">
						<div class="imgcontainer">
							<img src="imgs/student.png" alt="Student" class="student">
						</div>
						<div class="inner_container">
							<label><b>Full Name:</b></label><br>
							<input type="text" placeholder="Enter Full Name" name="fullname" required><br>
							<label><b>Username:</b></label><br>
							<input type="text" placeholder="Enter Username" name="username" required><br>
							<label><b>Password:</b></label><br>
							<input type="password" placeholder="Enter Password" name="password" required><br>
							<label><b>Confirm Password:</b></label><br>
							<input type="password" placeholder="Enter Password" name="cpassword" required><br><br>
							<label><b>Gender: </b></label>
							<input type="radio" class="radiobtns" name="gender" value="male" checked required>male
							<input type="radio" class="radiobtns" name="gender" value="female" required>female<br><br>
							<label>Access:</label>
							<select class="access" name="access" required>
								<option disabled selected value> -- select an option -- </option>
								<option value="Student">Student</option>
								<option value="Employer">Employer</option>
							</select><br><br>
							<label><b>Picture:</b></label><br>
							<input type="file" name="image">
							<button name="register" class="sign_up_btn" type="submit">Sign Up</button>
							<a href="index.php"><button type="button" class="back_btn"><< Back to Login</button></a>
						</div>

					</form>
			</div>
		</div>
	</div>

		<?php
			if(isset($_POST['access'])){
				$access=$_POST['access'];
			}
			if(isset($_POST['register']))
			{
				$fullname=$_POST['fullname'];
				$gender=$_POST['gender'];
				$username=$_POST['username'];
				$password=$_POST['password'];
				$cpassword=$_POST['cpassword'];

				if($password==$cpassword)
				{
					$query = "select * from accounts where username='$username'";
					//echo $query;
					$query_run = mysqli_query($con,$query);
					//echo mysql_num_rows($query_run);
				if($query_run)
					{
						if(mysqli_num_rows($query_run)>0)
						{
							//already a user with same username
							echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
						}
						else
						{
							$query11 = "insert into accounts (Username, Password, Access)values('$username','$password','".$_POST['access']."')";
							mysqli_query($con,$query11);

								if($access=='Student')
								{
									$query2 = "insert into accounts_info (Username, Fullname, Gender)values('$username','$fullname','$gender')";
									mysqli_query($con,$query2);
									//Update tutor's photo.
									$image = $_FILES['image']['tmp_name'];
									$target = "accounts_photo/".basename($_FILES['image']['tmp_name']);
									move_uploaded_file($image,$target);
									$picture_insert = "UPDATE accounts_info SET Image='".basename($_FILES['image']['tmp_name'])."' WHERE Username='".$username."'";
									mysqli_query($con, $picture_insert);
								}
								else if($access=='Employer')
								{
									$query1 = "insert into accounts_info (Username, Fullname, Gender)values('$username','$fullname','$gender')";
									mysqli_query($con,$query1);
									//Update tutor's photo.
									$image = $_FILES['image']['tmp_name'];
									$target = "accounts_photo/".basename($_FILES['image']['tmp_name']);
									move_uploaded_file($image,$target);
									$picture_insert = "UPDATE accounts_info SET Image='".basename($_FILES['image']['tmp_name'])."' WHERE Username='".$username."'";
									mysqli_query($con, $picture_insert);
								}


								if($query_run)
								{
								echo '<script type="text/javascript">alert("User Registered.. proceed to login page")</script>';
								$_SESSION['username'] = $username;
								$_SESSION['password'] = $password;
								}
								else
								{
								echo '<p class="bg-danger msg-block">Registration Unsuccessful due to server error. Please try again later</p>';
								}
						}
						}
					else
					{
						echo '<script type="text/javascript">alert("DB error")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
				}

			}




		?>
	</div>
</body>
</html>
