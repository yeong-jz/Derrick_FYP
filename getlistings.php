<html>
<head>
<?php
session_start();
require_once('dbconfig/config.php');
 ?>
 <style>
 img {
     display: block;
     margin: 0 auto;
 }
 </style>
</head>
<body>
<?php
$retrieve="SELECT accounts_info.FullName, accounts_info.Image, tuition.id, tuition.title, tuition.price, tuition.picture FROM accounts_info INNER JOIN tuition ON accounts_info.Username=tuition.username WHERE accounts_info.Username='".$_SESSION['username']."'";
$result=mysqli_query($con,$retrieve);
while($row=mysqli_fetch_array($result)){
  $id=$row['id'];
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
              <img style='width: 95%; height: 150px;' onclick=\"description('$id')\" data-toggle='modal' data-target='#myModal2' src='/FYP2/tuitionimg/".$row['picture']."'>
            </div>
            <div class='col-xs-12' style='margin-left: 0px;'>
              <div class='row'>
                <label>Title: </label>
                ".$row['title']."
              </div>
              <div class='row'>
                <label>Price: </label>
                ".$row['price']."
              </div>
              <div class='row'>
                <button  onclick=\"editlisting('$id')\"' data-toggle='modal' data-target='#listing' style='width:100%; margin-bottom: 5px; border: none; background-color: blue; color: white; border-radius: 5px;'><b>Update</b></button>
              </div>
              <div class='row'>
                <button  onclick=\"deletelisting('$id')\"' style='width:100%; border: none; background-color: red; color: white; border-radius: 5px;'><b>Delete</b></button>
              </div>
            </div>
          </div>
       ";
  }
?>

<?php
$retrieve="SELECT accounts_info.FullName, accounts_info.Image, music.id, music.title, music.price, music.picture FROM accounts_info INNER JOIN music ON accounts_info.Username=music.username WHERE accounts_info.Username='".$_SESSION['username']."'";
$result=mysqli_query($con,$retrieve);
while($row=mysqli_fetch_array($result)){
  $id=$row['id'];
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
              <img style='width: 95%; height: 150px;' onclick=\"description('$id')\" data-toggle='modal' data-target='#myModal2' src='/FYP2/tuitionimg/".$row['picture']."'>
            </div>
            <div class='col-xs-12' style='margin-left: 0px;'>
              <div class='row'>
                <label>Title: </label>
                ".$row['title']."
              </div>
              <div class='row'>
                <label>Price: </label>
                ".$row['price']."
              </div>
              <div class='row'>
                <button  onclick=\"editlisting_music('$id')\"' data-toggle='modal' data-target='#listing' style='width:100%; margin-bottom: 5px; border: none; background-color: blue; color: white; border-radius: 5px;'><b>Update</b></button>
              </div>
              <div class='row'>
                <button  onclick=\"deletelisting_music('$id')\"' style='width:100%; border: none; background-color: red; color: white; border-radius: 5px;'><b>Delete</b></button>
              </div>
            </div>
          </div>
       ";
  }
?>

<?php
$retrieve="SELECT accounts_info.FullName, accounts_info.Image, parttime.id, parttime.title, parttime.price, parttime.picture FROM accounts_info INNER JOIN parttime ON accounts_info.Username=parttime.username WHERE accounts_info.Username='".$_SESSION['username']."'";
$result=mysqli_query($con,$retrieve);
while($row=mysqli_fetch_array($result)){
  $id=$row['id'];
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
              <img style='width: 95%; height: 150px;' onclick=\"description('$id')\" data-toggle='modal' data-target='#myModal2' src='/FYP2/tuitionimg/".$row['picture']."'>
            </div>
            <div class='col-xs-12' style='margin-left: 0px;'>
              <div class='row'>
                <label>Title: </label>
                ".$row['title']."
              </div>
              <div class='row'>
                <label>Price: </label>
                ".$row['price']."
              </div>
              <div class='row'>
                <button  onclick=\"editlisting_parttime('$id')\"' data-toggle='modal' data-target='#listing' style='width:100%; margin-bottom: 5px; border: none; background-color: blue; color: white; border-radius: 5px;'><b>Update</b></button>
              </div>
              <div class='row'>
                <button  onclick=\"deletelisting_parttime('$id')\"' style='width:100%; border: none; background-color: red; color: white; border-radius: 5px;'><b>Delete</b></button>
              </div>
            </div>
          </div>
       ";
  }
?>

<?php
$retrieve="SELECT accounts_info.FullName, accounts_info.Image, deliver.id, deliver.title, deliver.price, deliver.picture FROM accounts_info INNER JOIN deliver ON accounts_info.Username=deliver.username WHERE accounts_info.Username='".$_SESSION['username']."'";
$result=mysqli_query($con,$retrieve);
while($row=mysqli_fetch_array($result)){
  $id=$row['id'];
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
              <img style='width: 95%; height: 150px;' onclick=\"description('$id')\" data-toggle='modal' data-target='#myModal2' src='/FYP2/tuitionimg/".$row['picture']."'>
            </div>
            <div class='col-xs-12' style='margin-left: 0px;'>
              <div class='row'>
                <label>Title: </label>
                ".$row['title']."
              </div>
              <div class='row'>
                <label>Price: </label>
                ".$row['price']."
              </div>
              <div class='row'>
                <button  onclick=\"editlisting_deliver('$id')\"' data-toggle='modal' data-target='#listing' style='width:100%; margin-bottom: 5px; border: none; background-color: blue; color: white; border-radius: 5px;'><b>Update</b></button>
              </div>
              <div class='row'>
                <button  onclick=\"deletelisting_deliver('$id')\"' style='width:100%; border: none; background-color: red; color: white; border-radius: 5px;'><b>Delete</b></button>
              </div>
            </div>
          </div>
       ";
  }
?>

<!-- Modal -->
<div id="listing" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style='text-align:center;'><b>Update Listing<b></h4>
      </div>
      <div class="modal-body">
        <p id=editlisting></p>
      </div>
    </div>

  </div>
</div>
</body>
</html>
