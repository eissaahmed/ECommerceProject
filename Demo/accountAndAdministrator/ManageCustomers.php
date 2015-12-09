

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

if($_GET['option'] == 'd' and $_GET['id'])
{
	$search_sql = "DELETE FROM OS_User WHERE Email = '".$_GET['id']."';";
	$search_query=mysql_query($search_sql);	
	
	if($search_query)
	{
	$alertM ="Delete successful.";
	}
	else
	{
		$alertM ="Unable to delete.";
	}
}
else if($_GET['option'] == 'i' and $_GET['id'])
{
	
	 $search_sql = "UPDATE OS_User SET Active = '0' WHERE Email = '".$_GET['id']."';";
				  
				  
				
				  
				  $search_query=mysql_query($search_sql);
				  
			if($search_query)
			{
				$alertM = "Disable successful.";
				
			}
			else
			{
				$alertM = "Fail to disable this customer.";
			}
}
else if($_GET['option'] == 'e' and $_GET['id'])
{
		 $search_sql = "UPDATE OS_User SET Active = '1' WHERE Email = '".$_GET['id']."';";
				  
				  
				
				  
				  $search_query=mysql_query($search_sql);
				  
			if($search_query)
			{
				$alertM = "Enable successful.";
				
			}
			else
			{
				$alertM = "Fail to enable this customer.";
			}
}

?>








<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Customers</title>
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
	width: 600px;
	height: 400px;
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
	border-radius: 5px;
	border: 2px solid #C9C9C9;
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
a:link, a:visited {
	color: #808080;
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
	/*height: 300px;*/
	padding: 15px;
	text-align: center;
}

#nameU
{
	font: normal bold 20px Georgia, serif;
	color: #404040;
}
</style>
<script>
function deleteC()
{
		var id = document.getElementById("customerId").value;
	if(id.trim() != ''){
	document.location.href="ManageCustomers.php?option=d&id=" + id;
	}
}
function disableC()
{
			var id = document.getElementById("customerId").value;
	if(id.trim() != ''){
	document.location.href="ManageCustomers.php?option=i&id=" + id;
	}
}
function enableC()
{
			var id = document.getElementById("customerId").value;
	if(id.trim() != ''){
	document.location.href="ManageCustomers.php?option=e&id=" + id;
	}
}


</script>







</head>

<body background="picture/background.PNG">
<div id="title1">
  <table width="100%" bgcolor="#00b8e6" border="0">
    <tr>
      <td width = "220" align="center" ><img src = "picture/Logo.png" height="70" width="130"></td>
      <td  width = "180"></td>
      <td><span id="title">Manage Customers</span></td>
      <td></td>
    </tr>
    <tr>
      <td width = "220" align="center" ><span id="welcome">We Come, We Love</span></td>
      <td></td>
     <td align="right" id='nameU'><?php echo $_SESSION['username'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td><a href="ManageCustomers.php?logOut=y">Log out</a></td>
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
        <a  href="Administrator">Admin Homepage</a></td>
    </tr>
  </table>
</div>
<div id= "block1MC">
  <table width="70%" align="center" border="0">
    <tr>
      <td colspan="3"><br />
        <br />
        <br />
         <br />
        <br />
        Enter Customer Username:<br />
        <input id="customerId" type="text" name="" /></td>
    </tr>
    <tr>
      <td><br />
        <button id="btn3"  onclick = "deleteC();"> Delete</button></td>
      <td align="center"><br />
        <button id="btn3" onclick = "disableC();"> Disable</button></td>
      <td align="right"><br />
        <button id="btn3" onclick = "enableC();"> Enable</button></td>
    </tr>
    <tr><td colspan="3"><br /><br /><span id="redStar">  <?php echo $alertM;?></span></td></tr>
  </table>
</div>
<div id="footer">© COSC631 Project Group 6 </div>
<div id="picMP"><img  src ="picture/admin3.png" width ="200" height=""/> </div>
</body>
</html>
