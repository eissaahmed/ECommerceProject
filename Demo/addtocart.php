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
$user_ID = $_REQUEST["user_ID"];
//$user_ID = 300;
$product_ID = $_REQUEST["product_ID"];
$quantity = $_REQUEST["quantity"];

$select_shopping_cart_id_query = "Select * from OS_Shopping_Cart where User_ID = '" . $user_ID . "' AND Active = 1";
$insert_shopping_cart_query = "INSERT INTO OS_Shopping_Cart(User_ID, Active, Create_Date) VALUES ('" . $user_ID . "',1,now())";

$result = mysql_query($select_shopping_cart_id_query);

if (mysql_num_rows($result) <= 0) {
	mysql_query($insert_shopping_cart_query);
	$result = mysql_query($select_shopping_cart_id_query);
}

$shopping_cart = mysql_fetch_assoc($result);
$shopping_cart_ID = $shopping_cart['Shopping_Cart_ID'];

$insert_item_query = "INSERT INTO OS_Shopping_Cart_Details(Shopping_Cart_ID, Product_ID, Quantity, Create_Date) VALUES (" . $shopping_cart_ID . "," . $product_ID . "," . $quantity . ",now())";
mysql_query($insert_item_query);

$get_all_items_query = "SELECT * FROM OS_Shopping_Cart_Details WHERE Shopping_Cart_ID = " . $shopping_cart_ID;
$all_items = mysql_query($get_all_items_query);
$no_of_items = mysql_num_rows($all_items);

echo $no_of_items;
?>
