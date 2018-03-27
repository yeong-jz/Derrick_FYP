<html>
<head>
  <title>I.S.P</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
body {
	margin-top: 70px;
}
  </style>
</head>
<body>
  <?php
  if($_SESSION['username']==null){
   die("Unable to connect");
   session_destroy();
  }
  require_once('dbconfig/config.php');
  $query="SELECT COUNT(*) AS notread FROM privatemsg WHERE sentto='".$_SESSION['username']."' AND provideread IS NULL";
  $result=mysqli_query($con, $query);
  $row = mysqli_fetch_array($result);
  ?>

<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar_P" aria-expanded="false">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="#">
			<img src="/fyp2/imgs/education.png" alt="I.S.P" style="height: 150%;">

		  </a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="navbar_P">
			<ul class="nav navbar-nav">
				<li><a href="home.php"><i class="glyphicon glyphicon-home"></i> Home</a></li>
				<li><a href="privatemsg.php"><span class="glyphicon glyphicon-envelope"></span> Mail <span class="badge"><?php echo $row['notread']; ?></span></a></li>
				<li><a href="profile.php"><i class="glyphicon glyphicon-user"></i> Profile</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			  <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			</ul>
		</div>
	</div>
</nav>
</body>
</html>
