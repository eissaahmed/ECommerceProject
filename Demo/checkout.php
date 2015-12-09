<?php


 session_start();
 if($_GET['logOut'] == 'y')
{
	session_start();
	session_regenerate_id();
	session_destroy();
	header('Location: http://db2.emich.edu/~201501_cosc471_group12/Demo/index.php');
}




// Establish Database Connection
$db_host="db2.emich.edu";
$db_username="201501_471_12";
$db_pass="VpiLy1Ra5";
$db_name="db201501_471_g12";



$link = mysql_connect($db_host,$db_username,$db_pass);
if(!$link)
{
die("Could not connect MySQL");
}
@mysql_select_db("$db_name") or die("No datebase");

// get the parameter from URL
$shopping_cart_ID = $_REQUEST["cart_ID"];
$total_cost = $_REQUEST["total_cost"];
?>

<!DOCTYPE html>
<html>
	  <head>
	    <title>Checkout</title>
	  </head>
		<link rel="stylesheet" type="text/css" href="css/common.css">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<link rel="stylesheet" href="footerAndHeader.css" />
		<link rel="stylesheet" href="css/checkout.css">
		<link rel="stylesheet" href="css/style.css">
		<style>
			.btn {
				  background: #3498db;
				  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
				  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
				  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
				  background-image: -o-linear-gradient(top, #3498db, #2980b9);
				  background-image: linear-gradient(to bottom, #3498db, #2980b9);
				  -webkit-border-radius: 8;
				  -moz-border-radius: 8;
				  border-radius: 8px;
				  font-family: Arial;
				  color: #ffffff;
				  font-size: 14px;
				  padding: 6px 11px 7px 13px;
				  text-decoration: none;
			}

			.btn:hover {
				  background: #3cb0fd;
				  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
				  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
				  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
				  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
				  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
				  text-decoration: none;
			}
			
			
	  /*********************************************/
	a.lo:link, a.lo:visited {
	color: #808080;
	background-color: transparent;
	text-decoration: none;
	font: normal bold 20px Georgia, serif;
}
#nameU
{
	font: normal bold 20px Georgia, serif;
	color: #404040;
}
a:link, a:visited{
	color: #ffffff;
	background-color: transparent;
	 text-decoration: none;
	font: normal bold 20px Georgia, serif;
}
  /*********************************************/
			
			
		</style>
  	<body background="background.PNG">

	<table width="100%" bgcolor="#00b8e6">
		<tr>
			<td width = "220" align="center" ><img src = "Logo.png" height="70" width="130" /></td>
			<td width = "180"></td>
			<td><a href="http://db2.emich.edu/~201501_cosc471_group12/Demo/index.php"><span id="title">Welcome to Fresh Food!</span></a></td>
        <td></td>
		</tr>
		<tr>
		  	<td width = "220" align="center" ><span id="welcome">We Come, We Love</span></td>
             <td></td>
      <td align="right" id='nameU'><?php echo $_SESSION['username'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td><a class='lo' href="index.php?logOut=y">Log out</a></td>
		</tr>
	</table>

	<section id="contact">
  		<div class="container">
			<form name="htmlform">
				<input type="text" name="first_name" placeholder="ADDRESS 1" required>
				<input  type="text" name="email" placeholder="ADDRESS 2" required>
				<input  type="text" name="email" placeholder="CITY" required>
				<input  type="text" name="email" placeholder="STATE" required>
				<input  type="text" name="email" placeholder="ZIP" required>
				<input  type="text" name="email" placeholder="COUNTRY" required>
			</form>
	 
		</div>
	</section>

	<script src="js/checkout.js"></script>
	<script language="javascript" type="text/javascript" src="js/purchase.js"></script>
	
	<form class="checkout">
		<div class="checkout-header">
	      		<h1 class="checkout-title">
				Checkout
				<span class="checkout-price"><?php echo "$" . $total_cost ?></span>
	      		</h1>
	    	</div>
	    	<p>
	      		<input type="text" class="checkout-input checkout-name" placeholder="Your name" autofocus>
	      		<input type="text" class="checkout-input checkout-exp" placeholder="MM">
	      		<input type="text" class="checkout-input checkout-exp" placeholder="YY">
	    	</p>
	    	<p>
	      		<input type="text" class="checkout-input checkout-card" placeholder="4111 1111 1111 1111">
	      		<input type="text" class="checkout-input checkout-cvc" placeholder="CVC">
	    	</p>
	    	<p>
	      		<!--<input type="submit" value="Purchase" class="checkout-btn">-->
			<!--<a href="javascript:purchase(4);" class="btn"> Purchase </a>-->
			<?php
				echo '<a href="javascript:purchase(' . $shopping_cart_ID . ', ' . $total_cost . ');" class="btn"> Purchase </a>';
			?>
	    	</p>
	</form>	
	
	<br><br>
	<div id="pic"><img  src ="leaf.png"/> </div>
	<p style="height:230px;"></p>
	<div id="footer">© COSC631 Project Group 6 </div>

	</body>
</html>
