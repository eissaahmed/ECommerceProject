<?php
// Establish Database Connection
$db_host="db2.emich.edu";
$db_username="201501_471_12";
$db_pass="VpiLy1Ra5";
$db_name="db201501_471_g12";


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







$link = mysql_connect($db_host,$db_username,$db_pass);
if(!$link)
{
die("Could not connect MySQL");
}
@mysql_select_db("$db_name") or die("No datebase");

// get the parameter from URL
$user_ID = $_REQUEST["user_ID"];
?>

<!DOCTYPE html>
<html>
<style>
.table-class {
    margin: 60px auto;
}
.zui-table {
    border: solid 1px #DDEEEE;
    border-collapse: collapse;
    border-spacing: 0;
    font: normal 13px Arial, sans-serif;
}
.zui-table thead th {
    background-color: #DDEFEF;
    border: solid 1px #DDEEEE;
    color: #336B6B;
    padding: 10px;
    text-align: left;
    text-shadow: 1px 1px 1px #fff;
}
.zui-table tbody td {
    border: solid 1px #DDEEEE;
    color: #333;
    padding: 10px;
    text-shadow: 1px 1px 1px #fff;
}
.zui-table-highlight tbody tr:hover {
    background-color: #CCE7E7;
}
.zui-table-horizontal tbody td {
    border-left: none;
    border-right: none;
}
/*********************************************/
a.lo:link, a.lo:visited {
	color: #808080;
	background-color: transparent;
	text-decoration: none;
	font: normal bold 20px Georgia, serif;
}
#nameU {
	font: normal bold 20px Georgia, serif;
	color: #404040;
}
  /*********************************************/
</style>
<link rel="stylesheet" type="text/css" href="stylesheet.css" />
<link rel="stylesheet" href="footerAndHeader.css" />

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

<div id="content">
<!--<table class="zui-table zui-table-horizontal zui-table-highlight table-class">
    <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>-->
<?php
$shopping_cart_query = "Select * from OS_Shopping_Cart where User_ID = '" . $user_ID . "' AND Active = 1";
$result = mysql_query($shopping_cart_query);

if (mysql_num_rows($result) > 0) {

	echo '<table class="zui-table zui-table-horizontal zui-table-highlight table-class">' .
	    '<thead>' .
		'<tr>' .
		    '<th></th>' .
		    '<th>Name</th>' .
		    '<th>Quantity</th>' .
		    '<th>Price</th>' .
		    '<th>Total</th>' .
		'</tr>' .
	    '</thead>' .
	    '<tbody>';	

	$shopping_cart = mysql_fetch_assoc($result);
	$shopping_cart_ID = $shopping_cart['Shopping_Cart_ID'];

	$get_all_items_query = "SELECT * FROM OS_Shopping_Cart_Details WHERE Shopping_Cart_ID = " . $shopping_cart_ID;
	$all_items = mysql_query($get_all_items_query);
	$no_of_items = mysql_num_rows($all_items);
	$total_cost = 0;

	while($each_items=mysql_fetch_assoc($all_items)) {
		$product_ID = $each_items['Product_ID'];
		$product_query = "SELECT * FROM OS_Product WHERE Product_ID = " . $product_ID;
		$product_resp = mysql_query($product_query);
		$product = mysql_fetch_assoc($product_resp);
		$total_cost = $product['Price'] + $total_cost; 
		echo "<tr>" . 
				"<td> <img src=images/Products/" . $product['Image_URL'] . " width='150' height='150'> </td>" .
				"<td> "	. $product['Name'] . "</td>" .
				"<td> "	. $each_items['Quantity'] . "</td>" .
				"<td> "	. $product['Price'] . "</td>" .
				"<td> "	. $each_items['Quantity'] * $product['Price'] . "</td>" .
		     "</tr>";
	}

	if ($no_of_items > 0) {
		echo "<tr>" . 
				"<td colspan=4> Total Price: "	. $total_cost . "</td>" .
				"<td> "	. 
					   "<a href=checkout.php?cart_ID=" . $shopping_cart_ID . "&total_cost=" . 						   $total_cost ." ><button> CHECK OUT </button></a>" .
				"</td>" .
		     "</tr>";
	}

	echo '</tbody>' .
	'</table>';

} else {
	echo '<div style="display: block;text-align: center;"><img  src ="images/empty-cart.gif"/></div>';
}


?>

    <!--</tbody>
</table>-->
</div>
<br><br>
<div id="pic"><img  src ="leaf.png"/> </div>
<p style="height:230px;"></p>
<div id="footer">© COSC631 Project Group 6 </div>

</body>
</html>

