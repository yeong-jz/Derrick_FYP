<html>
<head>
	<link rel='stylesheet' type='text/css' href='speech.css'>
<?php
include($_SERVER['DOCUMENT_ROOT']."/fyp2/navbar_P.php");

if (isset($_POST['name'])&& isset($_POST['emailaddress'])){
$name = $_POST['name'];
$emailaddress = $_POST['emailaddress'];
$to = 'derricksxr@gmail.com';
$subject = "New Subscriber";
$body = '<html>
			<body>
				<h2>Feedback - example.com</h2>
				<hr>
				<p>Name<br>'.$name.'</p>
				<p>Emailaddress<br>'.$emailaddress.'</p>
			</body>
		 </html>';

				//header
				$headers = "From: ".$name." <".emailaddress.">\r\n";
				$headers .= "Reply-To: ".$emailaddress."\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-type: text/html; charset=utf-8";
				//send
				$send = mail($to,$subject,$body,$header);
				if (send){
					echo '<br>';
					echo 'Thanks for contacting me, will be with you shortly';
				}
				else{
					echo 'error';
				}
			}



?>
</head>
<style>
@import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro);
body {
	  background:#2d3b36 ;
  	-webkit-background-size: cover;
	  -moz-background-size: cover;
	  -o-background-size: cover;
	  background-size: cover;
    padding-top:30px;
}

form {
    margin-left:auto;
    margin-right:auto;
    width: 80%;
    height: 100%;
    padding:30px;
    border: 1px solid rgba(0,0,0,.2);
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    background: rgba(0, 0, 0, 0.5);
    -moz-box-shadow: 0 0 13px 3px rgba(0,0,0,.5);
    -webkit-box-shadow: 0 0 13px 3px rgba(0,0,0,.5);
    box-shadow: 0 0 13px 3px rgba(0,0,0,.5);
    overflow: hidden;
}

textarea{
	  background: rgba(255, 255, 255, 0.4) url(http://luismruiz.com/img/gemicon_message.png) no-repeat scroll 16px 16px;
	  margin: auto;
   width: 100%;
    height: 200px;
    border: 1px solid rgba(255,255,255,.6);
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border-radius: 4px;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    display:block;
    font-size:18px;
    color:#fff;
    padding-left:10px;
    padding-right:20px;
    padding-top:12px;
    margin-bottom:20px;
    overflow:hidden;
}

input {
    width: 100%;
    height: 10%;
	margin: auto;
    border: 1px solid rgba(255,255,255,.4);
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border-radius: 4px;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    display:block;
    font-family: 'Source Sans Pro', sans-serif;
    font-size:18px;
    color:#fff;
    padding-left:20px;
    padding-right:20px;
    margin-bottom:20px;
}

input[type=submit] {
    cursor:pointer;
}

input.name {
	  background: rgba(255, 255, 255, 0.4) url(http://luismruiz.com/img/gemicon_name.png) no-repeat scroll 16px 16px;
	  padding-left:10px;
}

input.email {
	  background: rgba(255, 255, 255, 0.4) url(http://luismruiz.com/img/gemicon_email.png) no-repeat scroll 16px 20px;
	  padding-left:10px;
}

input.message {
	  background: rgba(255, 255, 255, 0.4) url(http://luismruiz.com/img/gemicon_message.png) no-repeat scroll 16px 16px;
	  padding-left:20px;
}

::-webkit-input-placeholder {
	  color: #fff;
}

:-moz-placeholder{
    color: #fff;
}

::-moz-placeholder {
    color: #fff;
}

:-ms-input-placeholder {
	  color: #fff;
}

input:focus, textarea:focus {
	  background-color: rgba(0, 0, 0, 0.2);
    -moz-box-shadow: 0 0 5px 1px rgba(255,255,255,.5);
    -webkit-box-shadow: 0 0 5px 1px rgba(255,255,255,.5);
    box-shadow: 0 0 5px 1px rgba(255,255,255,.5);
	  overflow: hidden;
}

.btn {
	  width: 165px;
	  height: 44px;
	  -moz-border-radius: 4px;
	  -webkit-border-radius: 4px;
	  border-radius: 4px;
	  float:right;

    border: 1px solid #253737;
    background: #416b68;
    background: -webkit-gradient(linear, left top, left bottom, from(#6da5a3), to(#416b68));
    background: -webkit-linear-gradient(top, #6da5a3, #416b68);
    background: -moz-linear-gradient(top, #6da5a3, #416b68);
    background: -ms-linear-gradient(top, #6da5a3, #416b68);
    background: -o-linear-gradient(top, #6da5a3, #416b68);
    background-image: -ms-linear-gradient(top, #6da5a3 0%, #416b68 100%);
    padding: 10.5px 21px;
    -webkit-border-radius: 6px;
    -moz-border-radius: 6px;
    border-radius: 6px;
    -webkit-box-shadow: rgba(255,255,255,0.1) 0 1px 0, inset rgba(255,255,255,0.7) 0 1px 0;
    -moz-box-shadow: rgba(255,255,255,0.1) 0 1px 0, inset rgba(255,255,255,0.7) 0 1px 0;
    box-shadow: rgba(255,255,255,0.1) 0 1px 0, inset rgba(255,255,255,0.7) 0 1px 0;
    text-shadow: #333333 0 1px 0;
    color: #e1e1e1;
}

.btn:hover {
    border: 1px solid #253737;
    text-shadow: #333333 0 1px 0;
    background: #416b68;
    background: -webkit-gradient(linear, left top, left bottom, from(#77b2b0), to(#416b68));
    background: -webkit-linear-gradient(top, #77b2b0, #416b68);
    background: -moz-linear-gradient(top, #77b2b0, #416b68);
    background: -ms-linear-gradient(top, #77b2b0, #416b68);
    background: -o-linear-gradient(top, #77b2b0, #416b68);
    background-image: -ms-linear-gradient(top, #77b2b0 0%, #416b68 100%);
    color: #fff;
 }

.btn:active {
    margin-top:1px;
    text-shadow: #333333 0 -1px 0;
    border: 1px solid #253737;
    background: #6da5a3;
    background: -webkit-gradient(linear, left top, left bottom, from(#416b68), to(#416b68));
    background: -webkit-linear-gradient(top, #416b68, #609391);
    background: -moz-linear-gradient(top, #416b68, #6da5a3);
    background: -ms-linear-gradient(top, #416b68, #6da5a3);
    background: -o-linear-gradient(top, #416b68, #6da5a3);
    background-image: -ms-linear-gradient(top, #416b68 0%, #6da5a3 100%);
    color: #fff;
    -webkit-box-shadow: rgba(255,255,255,0) 0 1px 0, inset rgba(255,255,255,0.7) 0 1px 0;
    -moz-box-shadow: rgba(255,255,255,0) 0 1px 0, inset rgba(255,255,255,0.7) 0 1px 0;
    box-shadow: rgba(255,255,255,0) 0 1px 0, inset rgba(255,255,255,0.7) 0 1px 0;
   }



</style>
<body>
<form>
	<div class="col-xs-12">
		<input name="name" placeholder="Enter name" class="name" required />
	</div>
	<div class="col-xs-12">
		<input name="emailaddress" placeholder="Enter email" class="email" type="email" required />
		</div>
	<div class="col-xs-12">
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
		<div class="right">
		  <button id="start_button" onclick="startButton(event)">
		    <img id="start_img" src="mic.gif" alt="Start"></button>
		</div>
		<div id="results">
		  <span id="final_span" class="final"></span>
		  <span id="interim_span" class="interim"></span>
		  <p>
		</div>
		<div class="center">
		  <div id="div_language">
		    <select id="select_language" onchange="updateCountry()"></select>
		    &nbsp;&nbsp;
		    <select id="select_dialect"></select>
		  </div>
		</div>
    <input name="submit" class="btn" type="submit" value="Send" />
	</div>
</form>
<script src='speech.js'></script>
</body>
</html>
