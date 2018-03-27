<html>
<head>
<link rel='stylesheet' type='text/css' href='speech.css'>
<link rel='stylesheet' type='text/css' href='privatemsg.css'>
<?php
session_start();
if($_SESSION['username']==null){
 die("Unable to connect");
 session_destroy();
}
include ($_SERVER['DOCUMENT_ROOT']."/fyp2/navbar_P.php");
?>
<style>
.comment-container {
    padding:10px;
}
.commentA {
    width: 100%;
    min-height: 150px;
}
.modal-body{
    height: 410px;
 overflow-y: auto;
}
</style>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-sm-5 col-xs-12"  style="border-bottom: 1px solid grey;">
       <h4><span class="glyphicon glyphicon-inbox"></span> Inbox</h4>
    </div>
    <div class="col-sm-7 col-xs-12"  style="border-bottom: 1px solid grey;">
      <h4 id="to"><span class="glyphicon glyphicon-user"></span>
       <select style="border:0px; outline:0px;" id="selectcontact" onchange="contact();">
         <option value="" style="color: grey">Select a contact</option>
         <?php
         $conn=mysqli_connect('localhost','root','');
         mysqli_select_db($con,"fyp2") or die("connection failed");
         $retrieve="SELECT accounts_info.Username, accounts_info.Fullname FROM accounts_info WHERE accounts_info.username IN (
                    	SELECT DISTINCT privatemsg.username as list
                      FROM privatemsg WHERE privatemsg.sentto='".$_SESSION['username']."'
                      UNION
                      SELECT DISTINCT privatemsg.sentto
                      FROM privatemsg WHERE privatemsg.username='".$_SESSION['username']."'
                      ORDER BY list
                    )";
         $result=mysqli_query($con, $retrieve);
         while($row = mysqli_fetch_array($result)){
         echo " <option value='".$row['Username']."'>".$row['Fullname']."</option>";
         }
         ?>
       </select>
      </h4>
      <!-- Hidden input for AJAX -->
      <input type="hidden" id="username" value="<?php echo $_SESSION['username']; ?>"/>
    </div>
  </div>

  <br>
    <div class="col-xs-12" style="overflow: auto; max-height: 250px;" id="content">
     <p>Message will be displayed here.</p>
    </div>
    <div class="comment-container col-xs-12">
     <!--Speech Recognition-->
     <div id="info">
       <p id="info_speak_now">Speak now.</p>
       <p id="info_no_speech">No speech was detected. You may need to adjust your
      <a href="//support.google.com/chrome/bin/answer.py?hl=en&amp;answer=1407892">
        microphone settings</a>.</p>
       <p id="info_no_microphone" style="display:none">
      No microphone was found. Ensure that a microphone is installed and that
      <a href="//support.google.com/chrome/bin/answer.py?hl=en&amp;answer=1407892">
      microphone settings</a> are configured correctly.</p>
       <p id="info_allow">Click the "Allow" button above to enable your microphone.</p>
       <p id="info_denied">Permission to use microphone was denied.</p>
       <p id="info_blocked">Permission to use microphone is blocked. To change,
      go to chrome://settings/contentExceptions#media-stream</p>
       <p id="info_upgrade">Web Speech API is not supported by this browser.
       Upgrade to <a href="//www.google.com/chrome">Chrome</a>
       version 25 or later.</p>
     </div>

     <div id="results">
       <textarea id="message" class="commentA inputbox final"></textarea>
       <span id="interim_span" class="interim"></span>
       <p>
     </div>

     <div class="right">
       <button id="start_button" onclick="startButton(event)">
      <img id="start_img" src="mic.gif" alt="Start"></button>
     </div>

     <div class="center">
       <div id="div_language">
        <select id="select_language" onchange="updateCountry()"></select>
        &nbsp;&nbsp;
        <select id="select_dialect"></select>
       </div>
     </div>
    </div>
  </div>
  <div class="col-sm-offset-6  col-sm-5 col-xs-12 bg">
  <button type="button" style="float:right; background-color: #7CFC00; border:2px; color:#FFFFFF; width:30%; height:5%" onclick="sendmsg()"><span class="glyphicon glyphicon-send"></span> Send</button>
  </div>
</div>

<!-- AJAX to getcontent.php sending username and contact -->
<script type="text/javascript">
var h1=$('#content').height();

window.setInterval(function(){
  /// call your function here
  contact();
}, 500);

function contact(){
 var x=document.getElementById('selectcontact').value;
 var y=document.getElementById('username').value;
 if(x==""){
  document.getElementById("content").innerHTML = "";
  return;
 }
 if (window.XMLHttpRequest) {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
 }
 else { // code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 }
 xmlhttp.onreadystatechange=function() {
  if (this.readyState==4 && this.status==200) {
   document.getElementById("content").innerHTML=this.responseText;
  }
 }
 xmlhttp.open("GET","getcontent.php?contact="+x+"&username="+y,true);
 xmlhttp.send();
}

function sendmsg(){
 var x=document.getElementById('selectcontact').value;
 var y=document.getElementById('username').value;
 var z=document.getElementById('message').value;
 if(x==""){
  document.getElementById("content").innerHTML = "";
  return;
 }
 if (window.XMLHttpRequest) {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
 }
 else { // code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 }
 xmlhttp.onreadystatechange=function() {
  if (this.readyState==4 && this.status==200) {
   document.getElementById("content").innerHTML=this.responseText;
  }
 }
 xmlhttp.open("GET","updatemsg.php?contact="+x+"&username="+y+"&message="+z,true);
 xmlhttp.send();
 document.getElementById('message').value="";
 contact();
}

</script>
<script src='speech.js'></script>
</body>
</html>
