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

<div class="col-sm-offset-3 col-sm-6 col-xs-9">
  <div class="input-group add-on">
        <input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
        </div>
  </div>
</div>

<div class="col-sm-2 col-xs-1"  style="margin-bottom: 20px;">
  <button type="button" class="btn btn-md" style='color: #ffffff; background-color: #009933; border: none;' data-toggle="modal" data-target="#myModal">Provide</button>
</div>
<style>
.spacing{
  margin-bottom:10px;
}

.modal-body {
    height: 410px;
    overflow-y: auto;
}

.shorten {
    height: 210px;
    overflow-y: auto;
}

img {
    display: block;
    margin: 0 auto;
}

.shorten{
	height: auto;
}

.move {
	margin-top:150px;
}

.comment-container {
    padding:10px;
}
.commentA {
    width:100%;
    min-height: 200px;
}

.inputbox {
 border-radius: 5px;
}

.button {
 background: black;
 color: white;
 font-weight: bold;
 font-size: 17px;
 border: black;
 border-radius: 5px;
}

</style>
</head>
<body>
<?php
//Submit private message
if(isset($_POST['submit_message'])){
 $date = date('Y-m-d H:i:s');
 //Variable ID is a hash of parent's username and tutor's username. The arrangement is crucial.
 $id=md5($_SESSION['username'].$_POST['tusername']);
 $query2="INSERT INTO privatemsg (id,username,sentto,message,timestamp,provideread,receiveread) VALUES ('".$id."','".$_SESSION['username']."','".$_POST['tusername']."','".$_POST['message']."','".$date."',NULL,'read')";
 mysqli_query($con, $query2);

 echo '<script type="text/javascript">alert("Message sent. Please check your mail.");</script>';
}

if (isset($_POST['submit'])){
  $id = md5($_SESSION['username'].$_POST['title']);
  $query = "INSERT INTO tuition (id,username,price,description, title) VALUES ('".$id."','".$_SESSION['username']."','".$_POST['price']."','".$_POST['description']."','".$_POST['title']."')";
  mysqli_query($con,$query);
  $image = $_FILES['image']['tmp_name'];
  $target = "C:/wamp64/www/FYP2/tuitionimg/".basename($_FILES['image']['tmp_name']);
  move_uploaded_file($image,$target);
  $picture_insert = "UPDATE tuition SET picture='".basename($_FILES['image']['tmp_name'])."' WHERE id='".$id."'";
  mysqli_query($con, $picture_insert);
}

if(isset($_POST['confirmdeal'])){
	$insertquery="INSERT INTO tuition_deal VALUES ('".$_POST['dealid']."','".$_SESSION['username']."','Unconfirmed')";
	mysqli_query($con,$insertquery);
}

$retrieve="SELECT accounts_info.Username, accounts_info.FullName, accounts_info.Image, tuition.id, tuition.title, tuition.price, tuition.picture FROM accounts_info INNER JOIN tuition ON accounts_info.Username=tuition.username";
$result=mysqli_query($con,$retrieve);
while($row=mysqli_fetch_array($result)){
	$id=$row['id'];
  $tusername=$row['Username'];
	$name=$row['FullName'];
  echo "
          <div class='col-sm-3 col-xs-6'style='margin-bottom: 20px;'>
					<div class='row'>
						<div class='col-xs-3'>
							<img style='width: 35px; height: 35px; border-radius: 50%; margin-right: 60px;' src='/FYP2/accounts_photo/".$row['Image']."'>
						</div>
						<div class='col-xs-8'>
							<h5>".$row['FullName']."</h5>
						</div>
					</div>
            <div class='row'>
              <img style='width: 95%; height: 200px;' onclick=\"description('$id')\" data-toggle='modal' data-target='#myModal2' src='/FYP2/tuitionimg/".$row['picture']."'>
            </div>
						<div class='row'>
            <div class='col-xs-6' style='margin-left: 0px;'>
              <div class='row'>
                <label>Title: </label>
								".$row['title']."
              </div>
              <div class='row'>
                <label>Price: </label>
								".$row['price']."
              </div>
            </div>

						<div class='col-xs-6' style='margin-left: 0px;'>
							<div class='row'>
								<button type='button' onclick=\"privatemsg('$tusername','$name')\" data-toggle='modal' data-target='#message' style='width: 95%; ; background-color: #2F4F4F; color: white; border: none;'>Message</button>
							</div>

							<div class='row'>
								<button type='button' onclick=\"dealing('$id')\" data-toggle='modal' data-target='#deal' style='width: 95%; background-color: #00FF7F; color: black; border: none;'>Deal</button>
							</div>
						</div>
						</div>
          </div>
       ";
}
?>
  <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Provide particulars</h4>
          </div>
          <div class="modal-body">
          <form method="post" action="tuition.php" enctype="multipart/form-data">
            <div class="spacing">
            <label>Title: </label> <input type='text' name='title'>
            </div>
            <div class="spacing">
            <label>Price: </label> <input type='text' name='price' id="price" onchange="checkPrice()" value="$">
            </div>
            <div class="spacing">
            <label>Cover Photo: </label> <input type="file" name="image">
            </div>
            <div class="spacing">
            <label> Description </label><br><textarea name='description' style="width: 100%; height: 300px"></textarea>
            </div>
            <div class="spacing" style="float:right;">
              <input type="submit" name="submit" value="Post">
            </div>
          </div>

          </form>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
		<!-- Modal -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content move">
				<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h3 class="modal-title" style='text-align:center;'><b>Description</b></h3>
      	</div>
        <div class="modal-body shorten">
					<p id='description'></p>
        </div>

      </div>

    </div>
  </div>

	<!--Message box Modal-->
	<div class="modal fade" id="message" role="dialog2">
	    <div class="modal-dialog">
	  <!-- Modal content-->
	  <div class="modal-content">
	   <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal">&times;</button>
	    <h4 class="modal-title">Private Message</h4>
	   </div>
	   <div class="modal-body bg-warning">
	    <form method="POST" action="tuition.php">
	     <input type="hidden" name="tusername" id="tusername" readonly>
	     <div class="col-xs-12">
	      <label><h3>To:&nbsp </h3></label><input type="text" id="tutorname" name="tutorname" class="inputbox" readonly>
	     </div>
	     <div class="col-xs-12">
	      <label><h3>Message:&nbsp </h3></label>
	     </div>
	     <div class="comment-container">
	      <textarea class="commentA inputbox" name="message">May I have your available timeslot?</textarea>
	     </div>
	     <div class="col-xs-12">
	      <input type="submit" class="button" style="width: 100%;" name="submit_message"value="Send">
	     </div>
	    </form>
	   </div>
	   <div class="modal-footer">
	    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	   </div>
	  </div>
	    </div>
	</div>

	<!-- Modal -->
<div id="deal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Confirmation</h4>
      </div>
      <div class="modal-body shorten">
				<form action="tuition.php" method="POST">
					<input type='hidden' id='dealid' name="dealid"/>
	        <p>Are you sure you want to proceed with this dealing?</p>
					<input type="submit" name="confirmdeal" value="Confirm" style="height:5%; width:20%; border-radius:10%; background-color:#800000; border:none; color:#ffffff;"/>
					<button type="button" style="height:5%; width:20%; border-radius:10%; background-color:#ffffff; color:#000000; " class="btn btn-default" data-dismiss="modal">Close</button>
				</form>
      </div>
    </div>
  </div>
</div>

</body>
<script>
function privatemsg(tusername, tutorname){
 document.getElementById("tutorname").value=tutorname;
 document.getElementById("tusername").value=tusername;
}

function dealing(id){
 document.getElementById("dealid").value=id;
}


function checkPrice(){
	var x = document.getElementById('price');
	var patt = /^\$\d+$/;
	if (patt.test(x.value)){

	}
	else {
	  x.value="";
	  alert('Retype!')
	}

}

function description(id){
 if (window.XMLHttpRequest) {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
 }
 else { // code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 }
 xmlhttp.onreadystatechange=function() {
  if (this.readyState==4 && this.status==200) {
   document.getElementById("description").innerHTML=this.responseText;
  }
 }
 xmlhttp.open("GET","getDescription.php?id="+id,true);
 xmlhttp.send();
}
</script>
</html>
