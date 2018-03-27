@import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);

html{
  background:#3498db;
}

#feedback-page{
	text-align:center;
}

#text-feedback{
	width: 80%;
	padding-left: 10%;
	padding-right: 10%;
	background-color:white;
	text-align:center;
}

#form-main{
	width:100%;
  height:100%;
	float:left;
	padding-top:0px;
}

#form-div {
	background-color:#3c3c3c;
	padding-left:35px;
	padding-right:35px;
	padding-top:35px;
	padding-bottom:50px;
	width: 450px;
	float: left;
	left: 50%;
	position: absolute;
	margin-left: -260px;
}

.feedback-input {
	opacity:0.9;
	color:#0493bd;
	font-family: 'Montserrat', Helvetica, Arial, sans-serif;
  font-weight:400;
	font-size: 18px;
	border-radius: 0;
	line-height: 22px;
	background-color: #fbfbfb;
  border: 3px solid #fbfbfb;
	padding: 13px 13px 13px 54px;
	margin-bottom: 10px;
	width:100%;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	-ms-box-sizing: border-box;
	box-sizing: border-box;
}

.feedback-input:focus{
	background: #fff;
	box-shadow: 0;
	border: 3px solid #3498db;
	color: #3498db;
	outline: none;
  padding: 13px 13px 13px 54px;
}

.focused{
	color:#30aed6;
	border:#30aed6 solid 3px;
}

/* Icons ---------------------------------- */
#name{
	background-image: url(http://rexkirby.com/kirbyandson/images/name.svg);
	background-size: 30px 30px;
	background-position: 11px 8px;
	background-repeat: no-repeat;
}

#name:focus{
	background-image: url(http://rexkirby.com/kirbyandson/images/name.svg);
	background-size: 30px 30px;
	background-position: 8px 5px;
  background-position: 11px 8px;
	background-repeat: no-repeat;
}

#email{
	background-image: url(http://rexkirby.com/kirbyandson/images/email.svg);
	background-size: 30px 30px;
	background-position: 11px 8px;
	background-repeat: no-repeat;
}

#email:focus{
	background-image: url(http://rexkirby.com/kirbyandson/images/email.svg);
	background-size: 30px 30px;
  background-position: 11px 8px;
	background-repeat: no-repeat;
}

#comment{
	background-image: url(http://rexkirby.com/kirbyandson/images/comment.svg);
	background-size: 30px 30px;
	background-position: 11px 8px;
	background-repeat: no-repeat;
}

textarea {
	width: 100%;
	height: 150px;
	line-height: 150%;
}

input:hover, textarea:hover,
input:focus, textarea:focus {
	background-color:white;
}

#button-blue{
	font-family: 'Montserrat', Helvetica, Arial,  sans-serif;
	float:left;
	width: 100%;
	border: #fbfbfb solid 4px;
	cursor:pointer;
	background-color: #3498db;
	color:white;
	font-size:24px;
	padding-top:22px;
	padding-bottom:22px;
	-webkit-transition: all 0.3s;
	-moz-transition: all 0.3s;
	transition: all 0.3s;
}

#button-blue:hover{
	background-color: rgba(0,0,0,0);
	color: #0493bd;
}

.submit:hover {
	color: #3498db;
}

.ease {
  border-top:3px #3c3c3c solid;
	width: 0px;
	height: 76px;
	background-color: #fbfbfb;
	-webkit-transition: .3s ease;
	-moz-transition: .3s ease;
	-o-transition: .3s ease;
	-ms-transition: .3s ease;
	transition: .3s ease;
}

.submit:hover .ease{
  width:100%;
  background-color:white;
}

@media only screen and (max-width: 580px) {
	#form-div{
		left: 3%;
		margin-right: 3%;
		width: 88%;
		margin-left: 0;
		padding-left: 3%;
		padding-right: 3%;
	}
}
