<?php
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

$shopping_cart_query = "Select * from OS_Shopping_Cart where Shopping_Cart_ID=" . $shopping_cart_ID;
$shopping_cart_response = mysql_query($shopping_cart_query);
$shopping_cart = mysql_fetch_assoc($shopping_cart_response);

$get_all_items_query = "SELECT * FROM OS_Shopping_Cart_Details WHERE Shopping_Cart_ID = " . $shopping_cart_ID;
$all_items = mysql_query($get_all_items_query);

$add_order_query = "INSERT INTO OS_Order(User_ID, Order_Date, Total_Price, ifProcessed) VALUES ('" . $shopping_cart['User_ID'] . "',now()," . $total_cost . ",0)";
$order_response = mysql_query($add_order_query);
$order_ID = mysql_insert_id();

	while($each_items=mysql_fetch_assoc($all_items)) {
		$product_ID = $each_items['Product_ID'];
		$quantity = $each_items['Quantity'];
		$insert_order_detail = "INSERT INTO OS_Order_Detail(Order_ID, Product_ID, Quantity) VALUES (" . $order_ID . "," . $product_ID . "," . $quantity . ")";
		echo $insert_order_detail;
		mysql_query($insert_order_detail);
	}

$update_shopping_cart_query = "UPDATE OS_Shopping_Cart SET Active=0 WHERE Shopping_Cart_ID=" . $shopping_cart_ID;
mysql_query($update_shopping_cart_query);
?>

