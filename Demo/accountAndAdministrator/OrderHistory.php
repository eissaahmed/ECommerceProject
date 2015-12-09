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
	
	$search_sql="SELECT * FROM OS_Order WHERE User_ID = '".$_SESSION['username']."';";
	$search_query=mysql_query($search_sql);	
	$search_rs=mysql_fetch_assoc($search_query);
	}
	else
	{
		$mas = 'Please sign in to get order history.';
	}
 	




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Order History</title>
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
	top: 200px;
	width: 850px;
	height: 560px;
	background-color: #ffffff;
	border: 1px solid #a1a1a1;
	padding: 10px 40px;
	border-radius: 5px;
}
#Contiune {
	position: absolute;
	left: 1000px;
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
	color: #29a329;
}
#text1 {
	font: normal bold 15px Georgia, serif;
	text-align: center;
	color: #0000cc;
}
#block1MP {
	position: absolute;
	left: 300px;
	top: 200px;
	width: 800px;
	height: 550px;
	background-color: #ffffff;
	/*border: 2px solid #a1a1a1;
	border-radius: 15px;*/
	padding: 20px 30px 30px 30px;
	overflow-y: scroll;
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
    </tr>
    <tr>
      <td width = "220" align="center" ><span id="welcome">We Come, We Love</span></td>
      <td></td>
     <td align="right" id='nameU'><?php echo $_SESSION['username'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td><a class = 'lo' href="OrderHistory.php?logOut=y">Log out</a></td>
    </tr>
  </table>
  <div id="bar"> </div>
</div>
<div id= "siginIn" > <br />
  <br />
  <br />
  <form action="SignInOrRegister.php">
    <input  type="image" src="picture/S.png" alt="Sign in or Register" width="190"/>
  </form>
  <br />
  <br />
  <br />
  <form action="MyProfile.php">
    <input  type="image" src="picture/P.png" alt="My Profile" width="190"/>
  </form>
  <br />
  <br />
  <br />
  <form action="UpdateProfile.php">
    <input  type="image" src="picture/U.png" alt="Update Profile" width="190"/>
  </form>
  <br />
  <br />
  <br />
  <input  type="image" src="picture/o1.png" alt="Order History" width="190"/>
</div>
<!--<div id= "register" ><span id="welcomeC">Order History</span><br /> 


<table border="0" width="850">
<tr><td>Oder history will go here......</td></tr>
  </table>

</div>-->

<div id= "block1MP"><span id="welcomeC">Order History&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><?php echo $mas;?> <br />
  <br />
  <hr class="hr2">
  <table border="0" width="95%" align="center">
  
  <?php  if(mysql_num_rows($search_query) != 0) {
	  				
				do
				{
					 ?>
  
  
  
    <tr>
      <td><b>Order ID:</b><?php echo $search_rs['Order_ID'];?></td>
      <td><b>Username:</b> <?php echo $search_rs['User_ID'];?><br />
       <b> Total Price:</b> $<?php echo $search_rs['Total_Price'];?><br />
        <b>Date:</b><?php echo $search_rs['Order_Date'];?>
        </td>
        
        
        
      <td>
      <table>
      <?php 	
	  
	  $search_sql1="SELECT * FROM OS_Order_Detail WHERE Order_ID = '". $search_rs['Order_ID']."';";
	$search_query1=mysql_query($search_sql1);	
	$search_rs1=mysql_fetch_assoc($search_query1);
	
	if(mysql_num_rows($search_query1) != 0) {
	  				
				do
				{ ?>
	
	
      
      
      <tr>     
      <td><br />
       	<b>Product ID:</b><?php echo $search_rs1['Product_ID'];?><br />
       <b> Product Name:</b><?php 
		
		  $search_sql2="SELECT * FROM OS_Product WHERE Product_ID = '".$search_rs1['Product_ID']."';";
			$search_query2=mysql_query($search_sql2);	
			$search_rs2=mysql_fetch_assoc($search_query2);	
		echo $search_rs2['Name'];?><br />
       <b> Price:</b><?php echo $search_rs2['Sale_Price'];?><br />
        <b>Quantity:</b><?php echo $search_rs1['Quantity'];?><br /></td>
      </tr>
      
        
         <?php
	
				}while($search_rs1=mysql_fetch_assoc($search_query1));}?>
        
       
     </table>
        
        </td>
            
    </tr>
    <tr><td colspan="3"> <hr class="hr2"></td></tr>
    <?php
	
				}while($search_rs=mysql_fetch_assoc($search_query));}?>
    
    
    
    
    
    
  </table>
</div>
<div id="footer">© COSC631 Project Group 6 </div>
<div id="pic"><img  src ="picture/leaf.png"/> </div>
<div id="Contiune"><a  href="http://db2.emich.edu/~201501_cosc471_group12/Demo/index.php">Continue Shopping</a></div>
</body>
</html>
