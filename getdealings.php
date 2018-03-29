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
    $query="SELECT tuition.id, tuition.title, tuition_deal.buyer,accounts_info.Fullname  FROM `tuition_deal` INNER JOIN tuition ON tuition_deal.id=tuition.id INNER JOIN accounts_info ON tuition_deal.buyer=accounts_info.Username WHERE tuition.username='".$_SESSION['username']."' AND tuition_deal.status='Unconfirmed'";
    $result=mysqli_query($con,$query);
    $x=1;
    while($row=mysqli_fetch_array($result)){
      $id=$row['id'];
      echo "
      <form>
        <div class='col-sm-8'>
          ".$row['Fullname']." is interested in ".$row['title']."
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

    <?php
    $query="SELECT music.id, music.title, music_deal.buyer,accounts_info.Fullname  FROM `music_deal` INNER JOIN music ON music_deal.id=music.id INNER JOIN accounts_info ON music_deal.buyer=accounts_info.Username WHERE music.username='".$_SESSION['username']."' AND music_deal.status='Unconfirmed'";
    $result=mysqli_query($con,$query);
    $x=1;
    while($row=mysqli_fetch_array($result)){
      $id=$row['id'];
      echo "
      <form>
        <div class='col-sm-8'>
          ".$row['Fullname']." is interested in ".$row['title']."
        </div></br>
        <div class='col-sm-2'>
          <input type='button' onclick=\"acceptdeal_music('$id')\" value='Accept' style='background-color:#2ECC71;border-radius:25px; color:white;'/>
        </div>
        <div class='col-sm-2'>
          <input type='button'  onclick=\"reject_music('$id')\" value='Decline' style='background-color:#F03434; border-radius:25px; color:white;'/>
        </div>
      </form>
      ";
      $x++;
    }
    ?>

    <?php
    $query="SELECT parttime.id, parttime.title, parttime_deal.buyer,accounts_info.Fullname  FROM `parttime_deal` INNER JOIN parttime ON parttime_deal.id=parttime.id INNER JOIN accounts_info ON parttime_deal.buyer=accounts_info.Username WHERE parttime.username='".$_SESSION['username']."' AND parttime_deal.status='Unconfirmed'";
    $result=mysqli_query($con,$query);
    $x=1;
    while($row=mysqli_fetch_array($result)){
      $id=$row['id'];
      echo "
      <form>
        <div class='col-sm-8'>
          ".$row['Fullname']." is interested in ".$row['title']."
        </div></br>
        <div class='col-sm-2'>
          <input type='button' onclick=\"acceptdeal_parttime('$id')\" value='Accept' style='background-color:#2ECC71;border-radius:25px; color:white;'/>
        </div>
        <div class='col-sm-2'>
          <input type='button'  onclick=\"reject_parttime('$id')\" value='Decline' style='background-color:#F03434; border-radius:25px; color:white;'/>
        </div>
      </form>
      ";
      $x++;
    }
    ?>

    <?php
    $query="SELECT deliver.id, deliver.title, deliver_deal.buyer,accounts_info.Fullname  FROM `deliver_deal` INNER JOIN deliver ON deliver_deal.id=deliver.id INNER JOIN accounts_info ON deliver_deal.buyer=accounts_info.Username WHERE deliver.username='".$_SESSION['username']."' AND deliver_deal.status='Unconfirmed'";
    $result=mysqli_query($con,$query);
    $x=1;
    while($row=mysqli_fetch_array($result)){
      $id=$row['id'];
      echo "
      <form>
        <div class='col-sm-8'>
          ".$row['Fullname']." is interested in ".$row['title']."
        </div></br>
        <div class='col-sm-2'>
          <input type='button' onclick=\"acceptdeal_deliver('$id')\" value='Accept' style='background-color:#2ECC71;border-radius:25px; color:white;'/>
        </div>
        <div class='col-sm-2'>
          <input type='button'  onclick=\"reject_deliver('$id')\" value='Decline' style='background-color:#F03434; border-radius:25px; color:white;'/>
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
    $query="SELECT tuition.id, tuition.title, tuition.username, tuition_deal.buyer,accounts_info.Fullname  FROM `tuition_deal` INNER JOIN tuition ON tuition_deal.id=tuition.id INNER JOIN accounts_info ON tuition.username=accounts_info.Username WHERE tuition_deal.buyer='".$_SESSION['username']."' AND tuition_deal.status='Accept' AND tuition_deal.rate IS NULL";
    $result=mysqli_query($con,$query);
    $x=1;
    while($row=mysqli_fetch_array($result)){
      $id=$row['id'];
      $provider=$row['username'];
      echo "
      <form>
        <div class='col-sm-8'>
          ".$row['Fullname']." has confirmed your deal for ".$row['title']."
        </div></br>
        <div class='col-sm-2'>
          <input type='button' onclick=\"rating('$provider','$id')\" data-toggle='modal' data-target='#myModal3' value='Rate' style='background-color:#F89406;border-radius:25px; color:white;'/>
        </div>
      </form>
      ";
      $x++;
    }
    ?>

    <?php
    $query="SELECT music.id, music.title, music.username, music_deal.buyer,accounts_info.Fullname  FROM `music_deal` INNER JOIN music ON music_deal.id=music.id INNER JOIN accounts_info ON music.username=accounts_info.Username WHERE music_deal.buyer='".$_SESSION['username']."' AND music_deal.status='Accept' AND music_deal.rate IS NULL";
    $result=mysqli_query($con,$query);
    $x=1;
    while($row=mysqli_fetch_array($result)){
      $id=$row['id'];
      $provider=$row['username'];
      echo "
      <form>
        <div class='col-sm-8'>
          ".$row['Fullname']." has confirmed your deal for ".$row['title']."
        </div></br>
        <div class='col-sm-2'>
          <input type='button' onclick=\"rating_music('$provider','$id')\" data-toggle='modal' data-target='#myModal3' value='Rate' style='background-color:#F89406;border-radius:25px; color:white;'/>
        </div>
      </form>
      ";
      $x++;
    }
    ?>

    <?php
    $query="SELECT parttime.id, parttime.title, parttime.username, parttime_deal.buyer,accounts_info.Fullname  FROM `parttime_deal` INNER JOIN parttime ON parttime_deal.id=parttime.id INNER JOIN accounts_info ON parttime.username=accounts_info.Username WHERE parttime_deal.buyer='".$_SESSION['username']."' AND parttime_deal.status='Accept' AND parttime_deal.rate IS NULL";
    $result=mysqli_query($con,$query);
    $x=1;
    while($row=mysqli_fetch_array($result)){
      $id=$row['id'];
      $provider=$row['username'];
      echo "
      <form>
        <div class='col-sm-8'>
          ".$row['Fullname']." has confirmed your deal for ".$row['title']."
        </div></br>
        <div class='col-sm-2'>
          <input type='button' onclick=\"rating_parttime('$provider','$id')\" data-toggle='modal' data-target='#myModal3' value='Rate' style='background-color:#F89406;border-radius:25px; color:white;'/>
        </div>
      </form>
      ";
      $x++;
    }
    ?>

    <?php
    $query="SELECT deliver.id, deliver.title, deliver.username, deliver_deal.buyer,accounts_info.Fullname  FROM `deliver_deal` INNER JOIN deliver ON deliver_deal.id=deliver.id INNER JOIN accounts_info ON deliver.username=accounts_info.Username WHERE deliver_deal.buyer='".$_SESSION['username']."' AND deliver_deal.status='Accept' AND deliver_deal.rate IS NULL";
    $result=mysqli_query($con,$query);
    $x=1;
    while($row=mysqli_fetch_array($result)){
      $id=$row['id'];
      $provider=$row['username'];
      echo "
      <form>
        <div class='col-sm-8'>
          ".$row['Fullname']." has confirmed your deal for ".$row['title']."
        </div></br>
        <div class='col-sm-2'>
          <input type='button' onclick=\"rating_deliver('$provider','$id')\" data-toggle='modal' data-target='#myModal3' value='Rate' style='background-color:#F89406;border-radius:25px; color:white;'/>
        </div>
      </form>
      ";
      $x++;
    }
    ?>
  </div>
</body>
</html>
