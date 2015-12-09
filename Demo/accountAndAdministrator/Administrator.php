<?php
session_start();
if($_GET['logOut'] == 'y')
{
	session_start();
	session_regenerate_id();
	session_destroy();
	header('Location: http://db2.emich.edu/~201501_cosc471_group12/Demo/index.php');
}
 ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator</title>
<style>
#welcome {
	font: normal bold 20px Georgia, serif;
	color: #ff0000;
}
#title {
	font: normal bold 30px Georgia, serif;
	color: #ffffff;
}
/*#signInfor {
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
}*/
#block1 {
	position: absolute;
	left: 350px;
	top: 270px;
	width: 200px;
	height: 280px;
	background-color: #ffffff;
	border: 2px solid #a1a1a1;
	border-radius: 15px;
	padding: 20px 30px 30px 30px;
	

}
#block2{
	position: absolute;
	left: 670px;
	top: 270px;
	width: 200px;
	height: 280px;
	background-color: #ffffff;
	border: 2px solid #a1a1a1;
	border-radius: 15px;
	padding: 20px 30px 30px 30px;
}
/*#block3{
	position: absolute;
	left: 350px;
	top: 560px;
	width: 200px;
	height: 280px;
	background-color: #ffffff;
	border: 2px solid #a1a1a1;
	border-radius: 15px;
	padding: 20px 30px 30px 30px;
	
}
#block4{
	position: absolute;
	left: 670px;
	top: 560px;
	width: 200px;
	height: 280px;
	background-color: #ffffff;
	border: 2px solid #a1a1a1;
	border-radius: 15px;
	padding: 20px 30px 30px 30px;
}*/
/*#sign1 {
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
}*/
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
#title1 {
	position: absolute;
	width: 100%;
}

a:link, a:visited{
    color:#808080;
    background-color: transparent;
	text-decoration: none;
	font: normal bold 20px Georgia, serif;
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
      <td><span id="title">Administrator</span></td><td></td>
    </tr>
    <tr>
      <td width = "220" align="center" ><span id="welcome">We Come, We Love</span></td>
      <td></td>
      <td align="right" id='nameU'><?php echo $_SESSION['username'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td><a href="Administrator.php?logOut=y">Log out</a></td>
    </tr>
  </table>
  <div id="bar"> </div>
</div>

<div id= "block1" ><img  src ="picture/admin1.png" width ="200"/><br /><br /><a  href="ManageProduct.php">Manage Products</a></div>
<div id= "block2" ><img  src ="picture/admin3.png" width ="200"/><br /><br /><a  href="ManageCustomers.php">Manage Customers</a></div>
<!--<div id= "block3" ><img  src ="picture/admin2.png" width ="200"/><br /><br /><a  href="ManageOrder.php">Manage Orders</a></div>
<div id= "block4" ><img  src ="picture/admin4.png" width ="200"/><br /><br /><a  href="SalesReport.php">Sales Report</a></div>
-->

<div id="pic"><img  src ="picture/leaf.png"/> </div>
<div id="footer">© COSC631 Project Group 6 </div>
<!--<div id="pic"></div>-->
</body>
</html>
