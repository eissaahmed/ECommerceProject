
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


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Product</title>
<style>
#welcome {
	font: normal bold 20px Georgia, serif;
	color: #ff0000;
}
#title {
	font: normal bold 30px Georgia, serif;
	color: #ffffff;
}

#block1MC {
	position: absolute;
	left: 330px;
	top: 250px;
	width: 700px;
	height: 400px;
	background-color: #ffffff;
	padding: 20px 30px 30px 30px;
}
#block2MC {
	position: absolute;
	left: 850px;
	top: 320px;
	width: 150px;
	height: 180px;
	background-color: #ffffff;
	padding: 20px 30px 30px 30px;
}
#listMP {
	position: absolute;
	left: auto;
	top: 150px;
	width: 250px;
	height: 620px;
	background-color: #ffffff;
	border-right: 5px solid #a1a1a1;
	padding: 10px 20px;
}

#redStar {
	color: red;
}
#bar {
	background-color: #002b80;
	color: white;
	clear: both;
	padding: 15px;
	text-align: center;
}

#btn2 {
	font-size: 20px;
	color: #FFFFFF;
	border-radius: 5px;
	width: 100px;
	height: 35px;
	background-color: #29a329;
	cursor: pointer;
}
#btn3 {
	font-size: 20px;
	color: #FFFFFF;
	border-radius: 5px;
	width: 100px;
	height: 35px;
	background-color: #ff6600;
	cursor: pointer;
}
#customerId {
	border-radius: 5px;
	height: 25px;
	width: 400px;
	border-style: solid;
	border-width: 2px;
	border-color: #C9C9C9;
}
#desP {
	/*border-radius: 5px;*/
	border: 0px solid #C9C9C9;
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
a.log:link, a.log:visited {
	color: #808080;
	background-color: transparent;
	text-decoration: none;
	font: normal bold 20px Georgia, serif;
}

a.mes:link, a.mes:visited{
    color:red;
    background-color: transparent;
	text-decoration: none;
	font: normal bold 20px Georgia, serif;
}
hr.hr1 {
	border: 0;
	height: 0;
	box-shadow: 0 0 4px 0.5px grey;
	width: 80%;
}
hr.hr2 {
	border: 0;
	border-bottom: 1px dashed #ccc;
	background: #999;
}
#welcomeC {
	font: normal bold 20px Georgia, serif;
}
#picMP {
	position: absolute;
	top: 850px;
	width: 100%;
	padding: 15px;
	text-align: center;
}
#sign1 {
	font: normal bold 20px Georgia, serif;
	width: 130px;
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
      <td><a class = 'mes' href="ManageProduct.php"><span id="title">Manage Products</span></a></td>
      <td></td>
    </tr>
    <tr>
      <td width = "220" align="center" ><span id="welcome">We Come, We Love</span></td>
      <td></td>
     <td align="right" id='nameU'><?php echo $_SESSION['username'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td><a class="log" href="addProduct.php?logOut=y">Log out</a></td>
    </tr>
  </table>
  <div id="bar"> </div>
</div>
<div id= "listMP" >
  <table border="0">
    <tr>
      <td align="center"><br />
        <br />
        <img  src ="picture/adminH.png" width ="100" height=""/><br />
        <a  href="Administrator.php">Admin Homepage</a></td>
    </tr>
  </table>
</div>
<div id= "block1MC">
  
   <table border="0" width="65%">
   <tr><td colspan="2" id="sign1">Added product information:</td></tr>
    <tr>
      <td width="100"><br />
        Product ID:</td>
      <td><br /><?php echo $_SESSION['productId'];?>
        </td>
    </tr>
    <tr>
      <td> Category ID:</td>
      <td><?php echo $_SESSION['catrgoryId'];?></td>
    </tr>
    <tr>
      <td>Name:</td>
      <td><?php echo $_SESSION['nameP'];?></td>
    </tr>
    <tr>
      <td> Quantity:</td>
      <td><?php echo $_SESSION['Quantity'];?></td>
    </tr>
    <tr>
      <td> Cost: </td>
      <td>$<?php echo $_SESSION['cost'];?></td>
    </tr>
    <tr>
      <td> Selling Price: </td>
      <td>$<?php echo $_SESSION['price'];?></td>
    </tr>
        <tr>
      <td>Price: </td>
      <td>$<?php echo $_SESSION['Oprice'];?></td>
    </tr>
    <tr>
      <td>
        Description:<br /></td>
      <td><?php echo $_SESSION['description'];?></td>
    </tr>
    <tr>
      <td colspan="2"><textarea id="desP" name="description" rows="6" cols="52"></textarea></td>
    </tr>
    <tr>
      <td  colspan="2" align="right"><br />
        <br />
        <button id="btn2" onclick = "window.location.href = 'ManageProduct.php'">Confirm</button></td>
    </tr>
  </table>
  
</div>

<div id="block2MC"><table><tr><td><img  src ="<?php echo $_SESSION['url'];?>" width ="150" height="150"/></td></tr><tr><td align="center"> <br />Product Image</td></tr></table></div>


<div id="footer">© COSC631 Project Group 6 </div>
<div id="picMP"><img  src ="picture/admin1.png" width ="200" height=""/> </div>
</body>
</html>
<?php  mysql_close($link);?>