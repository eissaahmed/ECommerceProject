
<?php
include("DBconnect.php");
session_start();
date_default_timezone_set('America/Detroit');
$salt = "asdsafahshgsajk";

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
	
	
	$Fname = $search_rs['First_Name'];
	$addressS = $search_rs['Address1'];
	$city =$search_rs['City'];
	$Lname = $search_rs['Last_Name'];
	$Mname = $search_rs['Middle_Initial'];
	$state =  $search_rs['State'];;
	$country = $search_rs['Country'];
	$pin = $search_rs['Password'];
	$zip = $search_rs['Zip'];
	$pinC = $search_rs['Password'];
	$phone = $search_rs['Cell_Phone'];	
	
	
	
	if($_GET['clicked'] == 'U')
{
	
	$Fname = trim($_POST['Fname']);
	$addressS = trim($_POST['address']);
	$city = trim($_POST['city']);
	$Lname = trim($_POST['Lname']);
	$Mname = trim($_POST['Mname']);
	$state = trim($_POST['state']);
	$country = trim($_POST['country']);
	$pin = trim($_POST['pin']);
	$zip = trim($_POST['zip']);
	$pinC = trim($_POST['pinC']);
	$dateU = date("Y-m-d");
	$phone = trim($_POST['cell']);

	
	if($_POST['Fname'] and $_POST['address'] and $_POST['city'] and $_POST['Lname'] and $_POST['state'] and $_POST['country'] and $_POST['pin'] and $_POST['zip'] and $_POST['pinC'] and !($Fname == '' or $addressS == '' or $city == '' or $Lname == '' or $state == '' or $country == '' or $pin == '' or $zip  == '' or $pinC == ''))
	{

				
				if($pin != $pinC )
			  {
				  $massage2="Password and confirm password have different values";
			  }
			  else if(!preg_match ('/^[0-9]{5}$/', $zip)
)
			  {
				  $massage2 ="Please enter a valid zip code";
			  }
			  
			  else if($_POST['cell'] and (!preg_match('/^([0-9\(\)\/\+ \-]*)$/', $phone) or strlen($phone) != 10) and $phone != '')
			  {
				  $massage2 ="Please enter a valid cell phone";
			  }
			  else
			  {
				 
				  $search_sql = "UPDATE OS_User SET First_Name = '".$Fname."',Middle_Initial='".$Mname."', Last_Name='".$Lname."', Address1='".$addressS."' , City='".$city."',State='".$state."', Zip='".$zip."', Country='".$country."', Cell_Phone='".$phone."', Password='".crypt($pin, $salt)."', Update_Date='".$dateU."' where  Email='".$_SESSION['username']."';";
				  
				  
				 
				  
				  $search_query=mysql_query($search_sql);
				  
				  
				  if($search_query)
			{
				$_SESSION['Firstname'] = $Fname;
				 $success = TRUE;
			}
			else
			{
				$massage2 = "Fail to update";
			}
				  
			  }
	
	}
	
	else
	{
		$massage2="Please enter all required information";
	}	
	
}
		
}
	


?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Profile</title>
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
#registerU {
	position: absolute;
	left: 300px;
	top: 200px;
	width: 650px;
	height: 560px;
	background-color: #ffffff;
	border: 1px solid #a1a1a1;
	padding: 10px 40px;
	border-radius: 5px;
}
#Contiune {
	position: absolute;
	left: 800px;
	top: 150px;
	text-align: right;
	padding-top: 20px;
	padding-left: 20px;
	text-align: center;
}
#sign1 {
	font: normal bold 30px Georgia, serif;
	width: 130px;
}
#title1 {
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
a:link, a:visited {
	color: red;
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
#welcomeC {
	font: normal bold 20px Georgia, serif;
}
#welcomeC1 {
	font: normal bold 20px Georgia, serif;
	color: #29a329;#ff5050
}
#welcomeC2 {
	font: normal bold 15px Georgia, serif;
	color:#0000ff;
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
  </table>
  <div id="bar"> </div>
</div>
<div id= "siginIn" > <br />
  <br />
  <br />
  <form action="SignInOrRegister.php"><input  type="image" src="picture/S.png" alt="Sign in or Register" width="190"/></form>
  <br />
  <br />
  <br />
  <form action="MyProfile.php"><input  type="image" src="picture/P.png" alt="My Profile" width="190"/></form>
  <br />
  <br />
  <br />
  <input  type="image" src="picture/u1.png" alt="Update Profile" width="190"/>
  <br />
  <br />
  <br />
  <form action="OrderHistory.php"><input  type="image" src="picture/O.png" alt="Order History" width="190"/></form>
</div>
<div id= "registerU" >
  <form action="UpdateProfile.php?clicked=U" method = "post">
  <table border="0" width="90%" align="center">
  <tr><td><span id="welcomeC">Update Porfile</span><br /><br /></td><td><span id="welcomeC2"><?php if(!$_SESSION['username']) 
{
	echo "Have not signed in";
}
else if($success)
{
	echo "Update successful";
	$success = FALSE;
}

else
{
	echo $massage2;
}

 ?><br /><br /></span></td></tr>

    <tr>
      <td> First Name<span id="redStar">*</span>:<br />
        <input id="registerInfor" type="text" name="Fname" value="<?php echo $Fname;?>"/></td>
      <td> Address Street<span id="redStar">*</span>:<br />
        <input id="registerInfor" type="text" name="address" value="<?php echo $addressS;?>"/></td>
     
    </tr>
    <tr>
      <td><br />
        Middle Name:<br />
        <input id="registerInfor" type="text" name="Mname" value="<?php echo $Mname;?>"/></td>
      <td><br />
        City<span id="redStar">*</span>:<br />
        <input id="registerInfor" type="text" name="city" value="<?php echo $city;?>"/></td>
      
    </tr>
    <tr>
      <td><br />
        Last Name<span id="redStar">*</span>:<br />
        <input id="registerInfor" type="text" name="Lname" value="<?php echo $Lname;?>"/></td>
      <td><br />
        State<span id="redStar">*</span>:<br />
        <input id="registerInfor" type="text" name="state" value="<?php echo $state;?>"/></td>
     
    </tr>
    <tr>
      <td><br /> Password<span id="redStar">*</span>:<br />
        <input id="registerInfor" type="password" name="pin" value="<?php echo $pin;?>"/>
       </td>
      <td><br />
        Country<span id="redStar">*</span>:<br />
        <input id="registerInfor" type="text" name="country" value="<?php echo $country;?>"/></td>
      
    </tr>
    <tr>
      <td><br />Confirm Password<span id="redStar">*</span>:<br />
        <input id="registerInfor" type="password" name="pinC" value="<?php echo $pinC;?>"/>
       </td>
      <td><br />
        Zip<span id="redStar">*</span>:<br />
        <input id="registerInfor" type="text" name="zip" value="<?php echo $zip;?>"/></td>
     
    </tr>
    <tr>
      <td><br />Cell Phone:<br />
        <input id="registerInfor" type="text" name="cell" value="<?php echo $phone;?>"/>
        </td>
      <td></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><br />
        <button id="btn1">Update</button></td>
    </tr>
  </table>
  </form>
</div>
<div id="footer">© COSC631 Project Group 6 </div>
<div id="pic"><img  src ="picture/leaf.png"/> </div>
<div id="Contiune"><a  href="http://db2.emich.edu/~201501_cosc471_group12/Demo/index.php">Continue Shopping</a></div>
</body>
</html>
