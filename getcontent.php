<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.speech-bubble {
 position: relative;
 border-radius: .4em;
}

.flex-container {
  display: flex;
  flex-wrap: nowrap;
}

.flex-container>p {
  text-align: center;
  line-height: 20px;
  max-width:500px;
  margin: auto;
  padding:2px;
  word-wrap: break-word;
}

</style>
</head>
<body>
<?php
require_once('dbconfig/config.php');
$id=md5($_GET['username'].$_GET['contact']);
$id2=md5($_GET['contact'].$_GET['username']);
$retrievemsg="SELECT * FROM privatemsg WHERE id='".$id."' OR id='".$id2."' ORDER BY timestamp ASC";
$result=mysqli_query($con, $retrievemsg);
while($row = mysqli_fetch_array($result)){
 if($row['username']==$_GET['username']){
  echo "
   <div class='speech-bubble flex-container' style='clear: both; float: right; display: block; background: #4ddbff; margin-bottom: 10px;'>
  ";
  echo $row['message'];
  echo "
   </div>
  ";
 }
 else{
  echo "
   <div class='speech-bubble flex-container' style='clear: both; float: left; display: block; background: #FF8C00; margin-bottom: 10px;'>
  ";
  echo $row['message'];
  echo "
   </div>
  ";
 }
}
$readquery="UPDATE privatemsg SET provideread='read' WHERE id='".$id2."'";
mysqli_query($con, $readquery);
?>
</body>
</html>
