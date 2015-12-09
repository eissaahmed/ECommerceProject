




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign in or Register</title>
<style>
#welcome {
	font: normal bold 20px Georgia, serif;
	color: #ff0000;
}
#title {
	font: normal bold 30px Georgia, serif;
	color: #ffffff;
}
#signInfor {
	border-radius: 7px;
	height: 35px;
	width: 300px;
	border-style: solid;
	border-width: 2px;
	border-color: #C9C9C9;
}
#registerInfor {
	border-radius: 5px;
	height: 25px;
	width: 230px;
	border-style: solid;
	border-width: 2px;
	border-color: #C9C9C9;
}
#siginIn {
	position: absolute;
	left: 100px;
	top: 190px;
	width: 320px;
	height: 520px;
	background-color: #ffffff;
	border: 2px solid #a1a1a1;
	padding: 10px 40px;
	border-radius: 25px;
}
#register {
	position: absolute;
	left: 560px;
	top: 190px;
	width: 600px;
	height: 520px;
	background-color: #ffffff;
	border: 2px solid #a1a1a1;
	padding: 10px 40px;
	border-radius: 25px;
}
#sign1 {
	font: normal bold 30px Georgia, serif;
	width: 130px;
}
#redStar {
	color: red;
}
#btn1 {
	font-size: 20px;
	color: #FFFFFF;
	border-radius: 10px;
	width: 150px;
	height: 50px;
	background-color: #29a329;
	cursor: pointer;
}
#bar {
	background-color: #002b80;
	color: white;
	clear: both;
	padding: 15px;
	text-align: center;

}
#pic {
	position: absolute;
	top: 800px;
	width: 100%;
	height: 300px;
	padding: 15px;
	text-align: center;
}
#footer {
	position: absolute;
	top: 1100px;
	width: 100%;
	background-color: #00b8e6;
	text-align: center;
	padding-top: 20px;
	padding-bottom: 20px;
}
#title1
{
	position: absolute;
	width: 100%;
	
}
</style>
<script>

function register()
{
	<?php echo "jjjffffffffffffffffffffffffffffffffffj" ?>
}

</script>
</head>

<body background="picture/background.PNG">
<div id="title1">
<table width="100%" bgcolor="#00b8e6" border="0">
  <tr>
    <td width = "220" align="center" ><img src = "picture/Logo.png" height="70" width="130"></td>
    <td  width = "180"></td>
    <td><span id="title">Sign in/Register</span></td>
  </tr>
  <tr>
    <td width = "220" align="center" ><span id="welcome">We Come, We Love</span></td>
  </tr>
</table>  <div id="bar"> </div></div>
<div id= "siginIn" >
  <table border="0" width="320">
    <tr>
      <td id="sign1">Sign In</td>
    </tr>
    <tr>
      <td ><br />
        <br />
        <br />
        Email Address<span id="redStar">*</span>:</td>
    </tr>
    <tr>
      <td ><input id="signInfor" type="text" name="email" /></td>
    </tr>
    <tr>
      <td ><br />
        <br />
        Password<span id="redStar">*</span>:</td>
    </tr>
    <tr>
      <td><input id="signInfor" type="password" name="pin" /></td>
    </tr>
    <tr>
      <td align="right"><br />
        <br />
        <button id="btn1">Sign In</button></td>
    </tr>
  </table>
</div>
<div id= "register" >
  <table border="0" width="575">
    <tr>
      <td id="sign1">Register</td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td><br />
        First Name<span id="redStar">*</span>:<br />
        <input id="registerInfor" type="text" name="Fname" /></td>
      <td><br />
        <br />
        Address Street<span id="redStar">*</span>:<br />
        <input id="registerInfor" type="text" name="address" /></td>
    </tr>
    <tr>
      <td width="320"><br />
        Middle Name:<br />
        <input id="registerInfor" type="text" name="Mname" /></td>
      <td><br />
        City<span id="redStar">*</span>:<br />
        <input id="registerInfor" type="text" name="city" /></td>
    </tr>
    <tr>
      <td><br />
        Last Name<span id="redStar">*</span>:<br />
        <input id="registerInfor" type="text" name="Lname" /></td>
      <td><br />
        State<span id="redStar">*</span>:<br />
        <input id="registerInfor" type="text" name="state" /></td>
    </tr>
    <tr>
      <td><br />
        Email Address<span id="redStar">*</span>:<br />
        <input id="registerInfor" type="text" name="emailR" /></td>
      <td><br />
        Country<span id="redStar">*</span>:<br />
        <input id="registerInfor" type="text" name="country" /></td>
    </tr>
    <tr>
      <td><br />
        Password<span id="redStar">*</span>:<br />
        <input id="registerInfor" type="text" name="username" /></td>
      <td><br />
        Zip<span id="redStar">*</span>:<br />
        <input id="registerInfor" type="text" name="username" /></td>
    </tr>
    <tr>
      <td><br />
        Confirm Password<span id="redStar">*</span>:<br />
        <input id="registerInfor" type="text" name="username" /></td>
      <td align="right"><br />
        <button id="btn1" onclick="register();">Register</button></td>
    </tr>
  </table>
</div>
<div id="bar"> </div>
<div id="footer">© COSC631 Project Group 6 </div>
<div id="pic"><img  src ="picture/vegtable.png" width ="" height=""/> </div>
</body>
</html>
