<!DOCTYPE html>
<html lang="en">
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
      body{
        background:#flf3fa;
      }
      .profile{
        margin: 20px 0;
      }
      .profile-sidebar{
        padding:20px 0 10px 0;
        background: #fff;
      }
      .profile-user-pic{
        float:none;
        margin:0 auto;
        width:50%;
        height:50%;
      }
      .profile-user-title{
        text-align:center;
        margin-top:20px;
      }
      .profile-user-name{
        color: #5a73al;
        font-size: 18px;
        font-weight: 600;
        margin-bottom:7px;
      }
      .profile-user-buttons{
        text-align:center;
        margin-top:18px;
      }
      .btn{
        text-transform:uppercase;
        font-size:11px;
        font-weight:600;
        padding:6px 15px;
        margin-right:5px;
      }
      .btn:last-child{
        margin-right:0;
      }
      .profile-user-menu{
        margin-top:30px;

        border-bottom:none; !important;
      }
      .profile-user-menu ul li a{
        color: #93a3b5;
        font-size:14px;
        font-weight:400;
      }
      .profile-user-menu ul li a i{
        margin-right:8px;
        font-size:16px;
      }
      .profile-user-menu ul li a:hover{
        background-color:#fafcfd;
        color:#5babdl;
      }
      li.active a{
        color:#5babdl;
        background-color:#f6fafb;
        border-left:2px solid #5babdl;
        margin-left:-3px;
      }
      li{
        border-bottom:none;
      }
      .profile-content{
        padding:20px;
        background:#fff;
        min-height:460px;
      }
      .highlight{
        color: teal;
        border: none;
        background: #effaff;
        font-size: 15px;
        padding-top:7px;
        padding-bottom:7px;
        width: 100%;
        text-align: left;
      }
      .highlight:hover{
        background: #e6edef;
      }
      .modal-body{
          height: 450px;
       overflow-y: auto;
      }

      .ratingbody{
       height: 300px !important;
      }
    </style>


      <!--bootstrap -->
      <link rel="stylesheet" href="css/style.css">
      <!--HTML5 shim and respond.js IE8 support of HTML5 elements and media queries-->
      <!--warning: respond.js doesnt work if you view the page via vile://-->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <body style='margin-top: 70px;'>
      <input type='hidden' id='username' value='<?php echo $_SESSION['username']; ?>'/>
      <?php
        if(isset($_POST['save'])){

          if(isset($_FILES['image']) && count($_FILES['image']['error']) == 1 && $_FILES['image']['error'][0] > 0){
            //file not selected
           }
           else if($_FILES['image']['tmp_name']!=""){//this is just to check if isset($_FILE). Not required.
            $image = $_FILES['image']['tmp_name'];
            $target = "accounts_photo/".basename($_FILES['image']['tmp_name']);
            move_uploaded_file($image,$target);
            $cert_insert = "UPDATE accounts_info set Image='".basename($_FILES['image']['tmp_name'])."' WHERE username='".$_SESSION['username']."'";
            mysqli_query($con, $cert_insert);
           }

           $query2="UPDATE accounts_info set Fullname='".$_POST['fullname']."', email='".$_POST['email']."', bio='".$_POST['bio']."', dob='".$_POST['dob']."' WHERE Username='".$_SESSION['username']."'";
           mysqli_query($con,$query2);

           if($_POST['password']!=""){
             if($_POST['password']==$_POST['cpassword']){
              $query3="UPDATE accounts set Password='".$_POST['password']."' WHERE Username='".$_SESSION['username']."'";
              mysqli_query($con,$query3);
            }
          }

        }
      ?>
      <div class="col-md-offset-2 col-md-10">
        <div class="row profile">
          <div class="col-sm-9">
            <div class="profile-sidebar">
              <div class="col-xs-12">
                <div class="profile-user-pic">
                <?php
                    $query="SELECT * FROM accounts_info WHERE Username='".$_SESSION['username']."'";
                    $result=mysqli_query($con,$query);
                    $row=mysqli_fetch_array($result);
                ?>
                <img src="/fyp2/accounts_photo/<?php echo $row['Image']; ?>" alt="" class="img-responsive img-circle">
                </div>
              </div>
              <div class="profile-user-title">
                <div class="profile-user-name">
                  <?php echo $row['Fullname']; ?>
                </div>
              </div>
              <div class="profile-user-buttons">
                <button  onclick="review('<?php echo $_SESSION['username']; ?>')" data-toggle='modal' data-target='#myModal4' class="btn btn-success btn-md">Rate</button>
                <button class="btn btn-danger btn-md">Message</button>
                <button class="btn btn-warning btn-md" data-toggle="modal" data-target="#myModal">Edit</button>
              </div>
            <div class="profile-use-menu">
              <ul class="nav">
                <button type='button' style='margin-top:7px;' class='highlight' onclick="overview('<?php echo $_SESSION['username']; ?>')" ><span class="glyphicon glyphicon-home"></span>Overview</button>
                <button type='button' class='highlight' onclick="accountstatus('<?php echo $_SESSION['username']; ?>')" ><span class="glyphicon glyphicon-user"></span>Account status</button>
                <button type='button' class='highlight' onclick="listings('<?php echo $_SESSION['username']; ?>')" ><span class="glyphicon glyphicon-ok"></span>Listings</button>
                <button type='button' class='highlight' onclick="overview('<?php echo $_SESSION['username']; ?>')" ><span class="glyphicon glyphicon-star"></span>Ratings</button>
                <button type='button' class='highlight' onclick="dealing('<?php echo $_SESSION['username']; ?>')" ><span class="glyphicon glyphicon-usd"></span>Dealings</button>
              </ul>
            </div>
          </div>
        </div>
      <div class="col-sm-9">
        <p id='display'></p>
      </div>
  </div>
</div>
  <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Profile</h4>
      </div>
      <div class="modal-body" style='height: 500px'>
        <div class='col-sm-offset-3 col-sm-6'>
          <img src="/fyp2/accounts_photo/<?php echo $row['Image']; ?>" alt="" class="img-responsive img-circle">
        </div>
        <form method='POST' action='profile.php' enctype='multipart/form-data'>
        <div class='col-xs-12' style='margin-bottom:5px;'>
          <label style='text-align: center; display: block;'>Upload photo</label>
        </div>
        <div class='col-xs-12' style='margin-bottom:5px;'>
          <input style='margin: auto;display: block;' type='file' name='image'>
        </div>
        <div class='col-xs-12' style='margin-bottom:5px;'>
          <label>Fullname: </label><br>
          <input type='text' name='fullname' placeholder='Full Name' value='<?php echo $row['Fullname']; ?>' />
        </div>
        <div class='col-xs-12' style='margin-bottom:5px;'>
          <label>Password: </label><br>
          <input type='password' name='password' placeholder='Password'/>
        </div>
        <div class='col-xs-12'style='margin-bottom:5px;'>
          <label>Confirm password: </label><br>
          <input type='password' name='cpassword' placeholder='Confirm Password'/>
        </div>
        <div class='col-xs-12'style='margin-bottom:5px;'>
          <label>Email Address: </label><br>
          <input type='email' name='email' placeholder='Email Address' value='<?php echo $row['email']; ?>'/>
        </div>
        <div class='col-xs-12'style='margin-bottom:5px;'>
          <label>D.O.B: </label><br>
          <input type='date' name='dob' placeholder='Date of Birth' value='<?php echo $row['dob']; ?>'/>
        </div>
        <div class='col-xs-12'style='margin-bottom:5px;'>
          <label>Bio: </label><br>
          <textarea style='width:98%; height: 200px;' name='bio'><?php echo $row['bio']; ?></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type='submit' class="btn btn-success btn-md" style='width:25%;' name='save'>SAVE</button>
        <button type='button' class="btn btn-default" data-dismiss="modal">CANCEL</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!--Rating Modal -->
   <div id="myModal3" class="modal fade" role="dialog">
     <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Your Review</h4>
      </div>
      <div class="modal-body ratingbody">
     <div class='col-xs-12'>

     </div>
     <div class="col-xs-12 lead">
      <div id="stars" class="starrr"></div>
      You gave a rating of <span id="count">0</span> star(s)
      <input type='hidden' id='tusername'/>
     </div>
     <div class='col-xs-12'>
      <textarea style='width: 100%; height: 60%;' id='review' placeholder='Write your review here'></textarea>
     </div>
     <div class='col-xs-12'>
      <button class='button' onclick='rating2()' style='width:100%; margin-top: 10px;'>Submit Review</button>
     </div>
      </div>
      <div class="modal-footer">
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

     </div>
   </div>

   <!--Review Modal -->
   <div id="myModal4" class="modal fade" role="dialog">
     <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Star Rating System.</h4>
      </div>
      <div class="modal-body">
     <p id='reviewsystem'></p>
      </div>
      <div class="modal-footer">
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

     </div>
   </div>
<script src='star.js'></script>
<script>
function overview(x) {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("display").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "getoverview.php?username="+x, true);
  xhttp.send();
}

function review(x){
 if (window.XMLHttpRequest) {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
 }
 else { // code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 }
 xmlhttp.onreadystatechange=function() {
  if (this.readyState==4 && this.status==200) {
   document.getElementById("reviewsystem").innerHTML=this.responseText;
  }
 }
 xmlhttp.open("GET","review.php?username="+x,true);
 xmlhttp.send();
}

function rating(x){
 if (window.XMLHttpRequest) {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
 }
 else { // code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 }
 xmlhttp.open("GET","rating_P.php?username="+x,true);
 xmlhttp.send();
}

function rating2(){
 var x = document.getElementById('count').innerHTML;
 var y = document.getElementById('review').value;
 if (window.XMLHttpRequest) {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
 }
 else { // code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 }
 xmlhttp.open("GET","rating2_P.php?stars="+x+"&review="+y,true);
 xmlhttp.send();
 $('#myModal3').modal('toggle');
}

function dealing(x) {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("display").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "getdealings.php?username="+x, true);
  xhttp.send();
}

function acceptdeal(x) {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.open("GET", "dealaccept.php?id="+x, true);
  xhttp.send();
}

function reject(x) {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.open("GET", "dealreject.php?id="+x, true);
  xhttp.send();
}

function accountstatus(x) {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("display").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "getaccountstatus.php?username="+x, true);
  xhttp.send();
}

function listings(x) {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("display").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "getlistings.php?username="+x, true);
  xhttp.send();
}

function deletelisting(x) {
  var username = document.getElementById('username').value;
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("display").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "deletelisting.php?id="+x, true);
  xhttp.send();
  listings(username);
}

function editlisting(x) {
  var username = document.getElementById('username').value;
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("editlisting").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "editlisting.php?id="+x, true);
  xhttp.send();
}

function updatelisting(x) {
  var username = document.getElementById('username').value;
  var title = document.getElementById('title').value;
  var price = document.getElementById('price').value;
  var description = document.getElementById('description').value;
  xhttp = new XMLHttpRequest();
  xhttp.open("GET", "updatelisting.php?id="+x+"&title="+title+"&price="+price+"&description="+description, true);
  xhttp.send();
  listings(username);
  $("#listing").modal('hide')
}

</script>
</body>
