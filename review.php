
<html>
<head>
<!-- Font Awesome Icon Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
session_start();
require_once('dbconfig/config.php');
?>
<style>
.checked {
    color: orange;
}

.center {
 width: 68px;
 margin: auto;
}

/* Three column layout */
.side {
    float: left;
    width: 15%;
    margin-top:1px;
}

.middle {
    margin-top:1px;
    float: left;
    width: 70%;
}

/* Place text to the right */
.right {
    text-align: right;
}

/* The bar container */
.bar-container {
    width: 100%;
    background-color: #f1f1f1;
    text-align: center;
    color: white;
}

<?php
$onestar="SELECT stars FROM review WHERE stars='1' AND provider='".$_GET['username']."'";
$oneresult=mysqli_query($con,$onestar);
$onecount=mysqli_num_rows($oneresult);

$twostar="SELECT stars FROM review WHERE stars='2' AND provider='".$_GET['username']."'";
$tworesult=mysqli_query($con,$twostar);
$twocount=mysqli_num_rows($tworesult);

$threestar="SELECT stars FROM review WHERE stars='3' AND provider='".$_GET['username']."'";
$threeresult=mysqli_query($con,$threestar);
$threecount=mysqli_num_rows($threeresult);

$fourstar="SELECT stars FROM review WHERE stars='4' AND provider='".$_GET['username']."'";
$fourresult=mysqli_query($con,$fourstar);
$fourcount=mysqli_num_rows($fourresult);

$fivestar="SELECT stars FROM review WHERE stars='5' AND provider='".$_GET['username']."'";
$fiveresult=mysqli_query($con,$fivestar);
$fivecount=mysqli_num_rows($fiveresult);

$total=$onecount+$twocount+$threecount+$fourcount+$fivecount;
$one=round($onecount/$total*100,2);
$two=round($twocount/$total*100,2);
$three=round($threecount/$total*100,2);
$four=round($fourcount/$total*100,2);
$five=round($fivecount/$total*100,2);
?>
/* Individual bars */
.bar-5 {width: <?php echo $five; ?>%; height: 18px; background-color: #4CAF50;}
.bar-4 {width: <?php echo $four; ?>%; height: 18px; background-color: #2196F3;}
.bar-3 {width: <?php echo $three; ?>%; height: 18px; background-color: #00bcd4;}
.bar-2 {width: <?php echo $two; ?>%; height: 18px; background-color: #ff9800;}
.bar-1 {width: <?php echo $one; ?>%; height: 18px; background-color: #f44336;}

/* Responsive layout - make the columns stack on top of each other instead of next to each other */
@media (max-width: 400px) {
    .side, .middle {
        width: 100%;
    }
}
</style>
</head>
<body>
<div class='row'>
 <div class='col-sm-3'>
  <div class='row'>
   <h1 style='text-align: center;'><strong>
   <?php
   $query="SELECT ROUND(AVG(stars),1) AS stars from review WHERE provider='".$_GET['username']."'";
   $result=mysqli_query($con,$query);
   $row=mysqli_fetch_array($result);
   echo $row['stars'];
   ?>
   </strong></h1>
  </div>
  <div class='row'>
   <div class='center'>
    <?php
    $query2="SELECT ROUND(AVG(stars),0) AS stars from review WHERE provider='".$_GET['username']."'";
    $result2=mysqli_query($con,$query2);
    $row2=mysqli_fetch_array($result2);
    $stars=$row2['stars'];
    for($x=1;$x<=$stars;$x++){
     echo "<span class='fa fa-star checked'></span>";
    }
    $empty=5-$stars;
    for($y=1;$y<=$empty;$y++){
     echo "<span class='fa fa-star'></span>";
    }
    ?>
   </div>
  </div>
  <div class='row'>
   <p style='text-align: center;'>Average Rating</p>
  </div>
 </div>
 <div class='col-sm-9'>
  <div class="row">
    <div class="middle">
   <div class="bar-container">
     <div class="bar-5"></div>
   </div>
    </div>
    <div class="side right">
    <div><?php echo $five."%" ?></div>
    </div>
    <div class="middle">
   <div class="bar-container">
     <div class="bar-4"></div>
   </div>
    </div>
    <div class="side right">
    <div><?php echo $four."%" ?></div>
    </div>
    <div class="middle">
   <div class="bar-container">
     <div class="bar-3"></div>
   </div>
    </div>
    <div class="side right">
    <div><?php echo $three."%" ?></div>
    </div>
    <div class="middle">
   <div class="bar-container">
     <div class="bar-2"></div>
   </div>
    </div>
    <div
class="side right">
    <div><?php echo $two."%" ?></div>
    </div>
    <div class="middle">
   <div class="bar-container">
     <div class="bar-1"></div>
   </div>
    </div>
    <div class="side right">
    <div><?php echo $one."%" ?></div>
    </div>
  </div>
 </div>
 <div class='col-xs-12'>
  <h3 style='text-align: left;'><strong>Reviews</strong></h3>
 </div>
 <?php
  $query3="SELECT review.stars, review.review, accounts_info.Fullname
    FROM review INNER JOIN accounts_info ON review.username = accounts_info.username
    WHERE review.provider='".$_GET['username']."'";
  $result3=mysqli_query($con,$query3);
  while($row3=mysqli_fetch_array($result3)){
  echo "
   <div class='col-xs-12'>
    ";
    $starrating=$row3['stars'];
    for($x=1;$x<=$starrating;$x++){
     echo "<span class='fa fa-star checked'></span>";
    }
    $emptystars=5-$starrating;
    for($y=1;$y<=$emptystars;$y++){
     echo "<span class='fa fa-star'></span>";
    }
    echo "
   </div>
   <div class='col-xs-12' style='margin-bottom: 10px;'>
   ";
    echo $row3['review']." <i>-".$row3['Fullname']."</i>";
   echo "
   </div>
  ";
  }
 ?>
</div>
</body>
</html>
