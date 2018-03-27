
<!DOCTYPE html>
<html>
<head>
<?php
session_start();
include ($_SERVER['DOCUMENT_ROOT']."/fyp2/navbar_P.php");
require_once('dbconfig/config.php');
if($_SESSION['username']==NULL){
	die('Unable to Connect');
	session_destroy();
}
?>
<style>
body {
	background:white;
}
</style>
</head>
<div class="input-group add-on col-sm-offset-4 col-sm-4">
      <input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
      </div>
    </div>
<body>
		  <div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
			  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			  <li data-target="#myCarousel" data-slide-to="1"></li>
			  <li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides -->

			<div class="carousel-inner" >
			  <div class="item active col-sm-offset-4 col-sm-4 col-xs-12">
				<img src="imgs/teaching.jpg" alt="Tuition" style="width:100%;">
			  </div>

			  <div class="item col-sm-offset-4 col-sm-4 col-xs-12">
				<img src="imgs/music.jpg" alt="Music" style="width:100%;">
			  </div>

			  <div class="item col-sm-offset-4 col-sm-4 col-xs-12">
				<img src="imgs/part.jpg" alt="Part-time" style="width:100%;">
			  </div>

			   <div class="item col-sm-offset-4 col-sm-4 col-xs-12">
				<img src="imgs/delivery.jpg" alt="Delivery" style="width:100%;">
			  </div>
			</div>

			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
			  <span class="glyphicon glyphicon-chevron-left"></span>
			  <span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
			  <span class="glyphicon glyphicon-chevron-right"></span>
			  <span class="sr-only">Next</span>
			</a>
		  </div>
	<div class="container-fluid">
			<div class="col-sm-offset-1 col-sm-4 col-xs-5">
					<div class="row">
					<div class="row">
					<a href="tuition.php">
					<img border="0" style="float:right; margin-top:30px; border-radius: 20%;" alt="W3Schools" src="imgs/tuition1.pnG" width="150" height="150">
					</a>
					</div>
					</div>
					<hr>
			</div>

			<div class="col-sm-offset-2 col-sm-4 col-xs-offset-2 col-xs-5">
					<div class="row">
					<div class="row">
					<a href="index.php">
					<img border="0" style="margin-top:30px; border-radius: 20%;" alt="W3Schools" src="imgs/part1.PNG" width="150" height="150">
					</a>
					</div>
					</div>
					<hr>
			</div>

			<div class="col-sm-offset-1 col-sm-4 col-xs-5">
			<div class="row">
			<div class="row">
					<a href="index.php">
					<img border="0" style="float:right; margin-top:30px; border-radius: 20%;" alt="W3Schools" src="imgs/music1.pnG" width="150" height="150">
					</a>
			</div>
			</div><hr>
			</div>
			<div class="col-sm-offset-2 col-sm-4 col-xs-offset-2 col-xs-5">
					<div class="row">
					<div class="row">
					<a href="index.php">
					<img border="0" style="margin-top:30px; border-radius: 20%;" alt="W3Schools" src="imgs/deliver1.PNG" width="150" height="150">
					</a>
					</div>
					</div><hr>
			</div>
		</div>
</div>
</body>
</html>
