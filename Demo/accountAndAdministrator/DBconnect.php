
<?php 

$db_host="localhost:3036";
$db_username="201501_471_12";
$db_pass="VpiLy1Ra5";
$db_name="db201501_471_g12";



$link = mysql_connect($db_host,$db_username,$db_pass);
if(!$link)
{
die("Could not connect MySQL");
}
@mysql_select_db("$db_name") or die("No datebase");



?>

