<html>
<head>
</head>
<body>
  <?php
  session_start();
  require_once('dbconfig/config.php');
  ?>
  <div class="container-fluid">
    <div class="col-xs-12">
      <label>On-going deals</label>
    </div>
    <?php
    $query="SELECT tuition.id, tuition.title, tuition_deal.buyer  FROM `tuition_deal` INNER JOIN tuition ON tuition_deal.id=tuition.id WHERE tuition.username='".$_SESSION['username']."' AND tuition_deal.status='Unconfirmed'";
    $result=mysqli_query($con,$query);
    $x=1;
    while($row=mysqli_fetch_array($result)){
      $id=$row['id'];
      echo "
      <form>
        <div class='col-sm-8'>
          ".$row['buyer']." is interested in ".$row['title']."
        </div></br>
        <div class='col-sm-2'>
          <input type='button' onclick=\"acceptdeal('$id')\" value='Accept' style='background-color:#2ECC71;border-radius:25px; color:white;'/>
        </div>
        <div class='col-sm-2'>
          <input type='button'  onclick=\"reject('$id')\" value='Decline' style='background-color:#F03434; border-radius:25px; color:white;'/>
        </div>
      </form>
      ";
      $x++;
    }
    ?>
    <div class="col-xs-12">
      <label>Confirmed deals</label>
    </div>
    <?php
    $query="SELECT tuition.id, tuition.title, tuition.username, tuition_deal.buyer  FROM `tuition_deal` INNER JOIN tuition ON tuition_deal.id=tuition.id WHERE tuition_deal.buyer='".$_SESSION['username']."' AND tuition_deal.status='Accept'";
    $result=mysqli_query($con,$query);
    $x=1;
    while($row=mysqli_fetch_array($result)){
      $id=$row['id'];
      $provider=$row['username'];
      echo "
      <form>
        <div class='col-sm-8'>
          ".$row['username']." has confirmed your deal for ".$row['title']."
        </div></br>
        <div class='col-sm-2'>
          <input type='button' onclick=\"rating('$provider')\" data-toggle='modal' data-target='#myModal3' value='Rate' style='background-color:#F89406;border-radius:25px; color:white;'/>
        </div>
      </form>
      ";
      $x++;
    }
    ?>
  </div>
</body>
</html>
