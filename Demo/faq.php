
<?php 

 //**********************log out************ 
 session_start();
 if($_GET['logOut'] == 'y')
{
	session_start();
	session_regenerate_id();
	session_destroy();
	header('Location: http://db2.emich.edu/~201501_cosc471_group12/Demo/index.php');
}

 
  //**********************log out************



?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/common.css">
<link rel="stylesheet" type="text/css" href="stylesheet.css" />
<link rel="stylesheet" href="footerAndHeader.css" />
  <style>
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
</head>
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


<div class="center">
<h1> FAQ </h1>
<table border="1" style="width:100%">
 </table>

<p><b>
<p>Q: How does it work?</b></p>
<p>A: Our website works the same way other online shopping websites work. You can browse items through the website and add as many items as you would like. Every time you add or subtract an item, your shopping cart, on the right of the screen, will reflect those changes. After you are finished selecting your items, you can click on “checkout” which is found at the bottom of your shopping cart.
</p>

<p><b>Q: You can checkout in 2 ways.</b></p>
<p>1) Checkout as Member: Initially, you must create an account with patelbrothersusa.com. As a member, your shipping and billing information can be stored if you would like. Also, creating an account will allow you to track your package, your UPS tracking number will be sent to this page.
2) Checkout without Registering: You can also checkout without registering. You simply need to supply us with your shipping and billing information and your order will be placed immediately.
</p>

<p><b>
Q: How do you ship?</b></p>
<p>A: We ship all of our grocery items via UPS. We carefully pack all items making sure they arrive in the best condition possible. However, because it ships in a UPS truck, occasionally items can break and become a bit damaged. We do our very best to ensure that doesn’t happen.
</p> 

<p><b>
Q: How many days does it take to receive the order?</b></p>
<p>A: We use a flat-rate shipping table and therefore only offer UPS ground shipping service. Orders leave our warehouse within 48 hours and often times much sooner. Depending on your shipping destination, orders will take 2-7** days for UPS to deliver it to your door. 
* Except under unavoidable circumstances
** Ground Shipping offers NO GUARANTEE of the date of arrival
Please note that few items may not be in stock that particular day however we replenish items daily. If this is the case, we will contact you with an update and ask if you would like to substitute items or cancel your order. 
</p>

<p><b>
Q: What is the cost of Shipping?</b></p>
<p>A: For domestic U.S. shipping we use a simple flat fee table which is based on the total dollar amount of your order. See the shipping table here. 
Shipping to Alaska & Hawaii is based on the total weight of your order. 
</p>

<p><b>
Q: What is the cost of Shipping?</b></p>

<p>A: For domestic U.S. shipping we use a simple flat fee table which is based on the total dollar amount of your order. See the shipping table here. 
Shipping to Alaska & Hawaii is based on the total weight of your order. 
</p>

<p><b>
Q: What forms of payment do you accept?</b></p>

<p>A: We accept all four major credit cards: Visa, MasterCard, American Express, and Discover.
</p>

<p><b>
Q: Do I need to be home to receive a delivery?</b></p>

<p>A: You do not have to be home to receive your delivery. The UPS delivery driver will leave your package at your doorstep or at a reception desk if that applies. If you would like your order to be sent with a Signature Required delivery, there will be an extra $3 charge. 
</p>

<p><b>
Q: Can I return items purchased online at a brick & mortar retail location? </b></p>

 <p>A: No, all online purchases must be returned to Patelbros.com Please send us an email with your order # and reason for return and we'll send you further instructions. Prior to contacting us please reference our Return Policy here, and ensure your order is still eligible for return. 
</p>

<p><b>
Q: Does it take a long time to place an order?</b></p>

<p>A: The first time you shop at patelbros.com will be much like your first trip to a grocery store; it will take some time finding everything you want to purchase. But you can use our Express Search bar to find items as quickly as possible. Just type in the items you are looking for, and we'll take you right to those items.
</p>
</div>

<br><br>
<div id="pic"><img  src ="leaf.png"/> </div>
<p style="height:230px;"></p>
<div id="footer">© COSC631 Project Group 6 </div>


</body>
</html>















