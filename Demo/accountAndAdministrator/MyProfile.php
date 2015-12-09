<?php
include("DBconnect.php");
session_start();

if($_GET['logOut'] == 'y')
{
	session_start();
	session_regenerate_id();
	session_destroy();
	header('Location: http://db2.emich.edu/~201501_cosc471_group12/Demo/index.php');
}




if($_SESSION['username']) 
{
	$search_sql="SELECT * FROM OS_User WHERE Email = '".$_SESSION['username']."';";
	$search_query=mysql_query($search_sql);	
	$search_rs=mysql_fetch_assoc($search_query);
	
	$name = $search_rs['First_Name']." ".$search_rs['Middle_Initial']." ".$search_rs['Last_Name'];
	$address1 = $search_rs['Address1'];
	$address2 = $search_rs['City']." ".$search_rs['State']." ".$search_rs['Zip']." ".$search_rs['Country'];
	$email = $_SESSION['username'];
	$phone = $search_rs['Cell_Phone'];
	$createDate = $search_rs['Create_Date'];		
}


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Profile</title>
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
	left: auto;
	top: 145px;
	width: 200px;
	height: 620px;
	background-color: #ffffff;
	border-right: 5px solid #a1a1a1;
	padding: 10px 20px;
	text-align: right;
}
#register {
	position: absolute;
	left: 300px;
	top: 250px;
	width: 400px;
	height: 315px;
	background-color: #ffffff;
	border: 1px solid #a1a1a1;
	padding: 10px 40px;
	border-radius: 5px;
	
	
}
#Contiune {
	position: absolute;
	left: 830px;
	top: 200px;
	width: 450px;
	height: 415px;
	border-left: 1px solid #a1a1a1;
	
	text-align: right;
	padding-top: 70px;
	padding-left: 20px;
	text-align: center;
	
}
#sign1 {
	font: normal bold 30px Georgia, serif;
	width: 130px;
}
#title1
{
	position: absolute;
	width: 100%;
	
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
	padding-top: 35px;
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
a:link, a:visited{
    color:red;
    background-color: transparent;
	text-decoration: none;
	font: normal bold 20px Georgia, serif;
}

a.lo:link, a.lo:visited {
	color: #808080;
	background-color: transparent;
	text-decoration: none;
	font: normal bold 20px Georgia, serif;
}
#welcomeC
{
	font: normal bold 20px Georgia, serif;
}
#welcomeC1
{
	font: normal bold 20px Georgia, serif;
	color:#29a329;
}

#disp
{
	font: normal bold 15px Georgia, serif;
	width:100px;

}
#nameU
{
	font: normal bold 20px Georgia, serif;
	color: #404040;
}

</style>
</head>

<body background="picture/background.PNG">
<div id="title1">
<table width="100%" bgcolor="#00b8e6" border="0">
  <tr>
    <td width = "220" align="center" ><img src = "picture/Logo.png" height="70" width="130"></td>
    <td  width = "180"></td>
    <td><a href="MyAccount.php"><span id="title">My Account</span></a></td>
    <td></td>
  </tr>
  <tr>
    <td width = "220" align="center" ><span id="welcome">We Come, We Love</span></td>
     <td></td>
      <td align="right" id='nameU'><?php echo $_SESSION['username'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td><a class='lo' href="UpdateProfile.php?logOut=y">Log out</a></td>
  </tr>
</table><div id="bar"> </div></div>
<div id= "siginIn" >

  <br /><br /><br /><form action="SignInOrRegister.php"><input  type="image" src="picture/S.png" alt="Sign in or Register" width="190"/></form><br /><br /><br />
    <input  type="image" src="picture/p1.png" alt="My Profile" width="190"/><br /><br /><br />
     <form action="UpdateProfile.php"><input  type="image" src="picture/U.png" alt="Update Profile" width="190"/></form><br /><br /><br />
    <form action="OrderHistory.php"> <input  type="image" src="picture/O.png" alt="Order History" width="190"/></form>
 
</div>
<div id= "register" ><span id="welcomeC">Porfile:</span><br /><br /><span id="welcomeC1">

<?php 
if(!$_SESSION['username']) 
{
	echo "Have not signed in";
} 
?></span>
<br />
<table width="90%" align="center" height="200" border="0">
<tr><td id="disp">Name:</td><td><?php echo $name;?></td></tr>
<tr><td id="disp">Address:</td><td><?php echo $address1;?><br /><?php echo $address2;?></td></tr>
<tr><td id="disp">Email:</td><td><?php echo $email;?></td></tr>
<tr><td id="disp">Cell phone:</td><td><?php echo $phone;?></td></tr>
<tr><td id="disp">Create Date:</td><td><?php echo $createDate;?></td></tr>
</table>


 </div>

<div id="footer">© COSC631 Project Group 6 </div>
<div id="pic"><img  src ="picture/leaf.png"/> </div>
<div id="Contiune"><img src ="picture/pic5.jpg"  width ="450" /><br /><br /><a  href="http://db2.emich.edu/~201501_cosc471_group12/Demo/index.php">Continue Shopping</a></div>
</body>
</html>
<?php  mysql_close($link);?>