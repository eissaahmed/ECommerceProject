<?php
include("DBconnect.php");
session_start();
date_default_timezone_set('America/Detroit');
if($_GET['logOut'] == 'y')
{
	session_start();
	session_regenerate_id();
	session_destroy();
	header('Location: http://db2.emich.edu/~201501_cosc471_group12/Demo/index.php');
}

if($_GET['step']  == 'p')
{
$_SESSION['productId'] = trim($_POST['idP']);
$_SESSION['catrgoryId'] = trim($_POST['idC']);
$_SESSION['nameP']= trim($_POST['Pname']);
$_SESSION['Quantity'] = trim($_POST['Qua']);
$_SESSION['Oprice'] = trim($_POST['orinP']);

$_SESSION['cost'] = trim($_POST['cost']);
$_SESSION['price'] = trim($_POST['sellP']);
$_SESSION['url'] = trim($_POST['url']);
$_SESSION['description'] = trim($_POST['description']);
$_SESSION['dateU'] = date("Y-m-d");





if($_POST['idP'] and $_POST['idC'] and $_POST['Pname'] and $_POST['Qua'] and $_POST['orinP'] and  $_POST['cost'] and $_POST['sellP'] and $_SESSION['productId'] != '' and $_SESSION['catrgoryId'] != '' and $_SESSION['nameP'] != '' and $_SESSION['Quantity'] != '' and $_SESSION['cost'] != ''and $_SESSION['price'] != '' and $_SESSION['Oprice'] != '')
{
	
	
	 $search_sql = "INSERT INTO OS_Product VALUES ('".$_SESSION['productId']."', '".$_SESSION['catrgoryId']."', '".$_SESSION['nameP']."', '".$_SESSION['description']."', '".$_SESSION['Oprice']."', '".$_SESSION['price']."', ".$_SESSION['cost'].", '".$_SESSION['Quantity']."', '', '".$_SESSION['url']."', '1', '".$_SESSION['dateU']."', '".$_SESSION['dateU']."');";
				  
				  $search_query=mysql_query($search_sql);
				  
				  if($search_query)
			{

			header('Location: addProduct.php');

			}
			else
			{
				$message="Fail to add new product.";
			}
	}
	else
			{
				$message="Fail to add new product.";
			}
		
}

if($_GET['step']  == 'c')
{
	
$_SESSION['catrgoryIdc'] = trim($_POST['Cid']);
$_SESSION['namec'] = trim($_POST['Cname']);
$_SESSION['dateU'] = date("Y-m-d");

if($_POST['Cid'] and $_POST['Cname'] and $_SESSION['catrgoryIdc'] != '' and  $_SESSION['namec'] != '')
{	
	
	
	 $search_sql = "INSERT INTO OS_Category VALUES ('".$_SESSION['catrgoryIdc']."', '".$_SESSION['namec']."', '1', '".$_SESSION['dateU']."', '".$_SESSION['dateU']."');";
				  
				  $search_query=mysql_query($search_sql);
				  
				  if($search_query)
			{

			header('Location: addCategory.php');

			}
			else
			{
				$message2="Fail to add new category.";
			}
	
}
else
{
		$message2="Fail to add new category.";
}	
}








	
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Products</title>
<style>
#welcome {
	font: normal bold 20px Georgia, serif;
	color: #ff0000;
}
#title {
	font: normal bold 30px Georgia, serif;
	color: #ffffff;
}
/*#signInfor {
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
}*/
#block1MP {
	position: absolute;
	left: 330px;
	top: 170px;
	width: 450px;
	height: 520px;
	background-color: #ffffff;
	/*border: 2px solid #a1a1a1;
	border-radius: 15px;*/
	padding: 20px 30px 30px 30px;/*overflow-y: scroll;*/
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
/*#block2{
	position: absolute;
	left: 670px;
	top: 170px;
	width: 200px;
	height: 280px;
	background-color: #ffffff;
	border: 2px solid #a1a1a1;
	border-radius: 15px;
	padding: 20px 30px 30px 30px;
}
#block3{
	position: absolute;
	left: 350px;
	top: 560px;
	width: 200px;
	height: 280px;
	background-color: #ffffff;
	border: 2px solid #a1a1a1;
	border-radius: 15px;
	padding: 20px 30px 30px 30px;
	
}
#block4{
	position: absolute;
	left: 670px;
	top: 560px;
	width: 200px;
	height: 280px;
	background-color: #ffffff;
	border: 2px solid #a1a1a1;
	border-radius: 15px;
	padding: 20px 30px 30px 30px;
}*/
/*#sign1 {
	font: normal bold 30px Georgia, serif;
	width: 130px;
}
#redStar {
	color: red;
}
*/
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
/*#pic {
	position: absolute;
	top: 850px;
	width: 100%;
	height: 300px;
	padding: 15px;
	text-align: center;
}*/
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
#registerInfor,  #pro1{
	border-radius: 5px;
	height: 25px;
	width: 230px;
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
hr {
	border: 0;
	height: 0;
	box-shadow: 0 0 4px 0.5px grey;
	width: 80%;
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
#Category {
	position: absolute;
	left: 870px;
	top: 200px;
	width: 300px;
	height: 480px;
	border-left: 2px solid #a1a1a1;/*	text-align: right;
	padding-top: 70px;
	padding-left: 20px;
	text-align: center;*/
}
#cateegoryI {
	position: absolute;
	left: 30px;
	top: 30px;
	width: 300px;
	height: 320px;
	background-color: #ffffff;
	padding: 20px 30px 30px 30px;
}
#nameU
{
	font: normal bold 20px Georgia, serif;
	color: #404040;
}
</style>
<script>
function deleteP()
{
	var id = document.getElementById("pro1").value;
	if(id.trim() != ''){
	document.location.href="deleteProduct.php?id=" + id;
	}
}

function updateP()
{
	var id = document.getElementById("pro1").value;
	if(id.trim() != ''){
	document.location.href="updateProduct.php?id=" + id;
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
      <td><span id="title">Manage Products</span></td>
      <td></td>
    </tr>
    <tr>
      <td width = "220" align="center" ><span id="welcome">We Come, We Love</span></td>
      <td></td>
     <td align="right" id='nameU'><?php echo $_SESSION['username'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td><a href="ManageProduct.php?logOut=y">Log out</a></td>
    </tr>
  </table>
  <div id="bar"> </div>
</div>
<div id= "listMP" >
  <table border="0">
    <tr>
      <td><br />
        <br />
        Enter Product ID:<br />
        <input id="pro1" type="text" name="pidm" /></td>
    </tr>
    <tr>
      <td align="right"><br />
        <button id="btn3" onclick="deleteP();"> Delete</button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button id="btn2" onclick = "updateP();"> Update</button></td>
    </tr>
    <tr>
      <td><br />
        <br /><br />
        <br />
        <hr></td>
    </tr>
    <tr>
      <td align="center"><br /><br />
        <br />
        <img  src ="picture/adminH.png" width ="100" height=""/><br />
        <a  href="Administrator.php">Admin Homepage</a></td>
    </tr>
  </table>
</div>
<div id= "block1MP"><span id="welcomeC">Add new Product</span>
  <form action="ManageProduct.php?step=p" method = "post">
    <table border="0">
      <tr>
        <td><br />
          Product ID<span id="redStar">*</span>:</td>
        <td><br />
          <input id="registerInfor" type="text" name="idP" value="<?php echo $_POST['idP'];?>"/></td>
      </tr>
      <tr>
        <td> Category ID<span id="redStar">*</span>:</td>
        <td><input id="registerInfor" type="text" name="idC" value="<?php echo $_POST['idC'];?>"/></td>
      </tr>
      <tr>
        <td> Product Name<span id="redStar">*</span>:</td>
        <td><input id="registerInfor" type="text" name="Pname" value="<?php echo $_POST['Pname'];?>"/></td>
      </tr>
      <tr>
        <td> Quantity<span id="redStar">*</span>:</td>
        <td><input id="registerInfor" type="text" name="Qua" value="<?php echo $_POST['Qua'];?>"/></td>
      </tr>
      <tr>
        <td> Original price<span id="redStar">*</span>:</td>
        <td><input id="registerInfor" type="text" name="orinP" value="<?php echo $_POST['orinP'];?>"/></td>
      </tr>
      <tr>
        <td> Selling Price<span id="redStar">*</span>:</td>
        <td><input id="registerInfor" type="text" name="sellP" value="<?php echo $_POST['sellP'];?>"/></td>
      </tr>
        <tr>
        <td> Cost<span id="redStar">*</span>:</td>
        <td><input id="registerInfor" type="text" name="cost" value="<?php echo $_POST['cost'];?>"/></td>
      </tr>
      <tr>
        <td> Image URL:</td>
        <td><input id="registerInfor" type="text" name="url" value="<?php echo $_POST['url'];?>"/></td>
      </tr>
      <tr>
        <td><br />
          Description:<br /></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="2"><textarea id="desP" name="description" rows="6" cols="52"><?php echo $_POST['description'];?></textarea></td>
      </tr>
      <tr>
        <td  colspan="2" align="center" id="mes"><span id="redStar"> <?php echo $message;?></span></td>
      </tr>
      <tr>
        <td  colspan="2" align="center"><br />
          <br />
          <input id="btn2" type="submit" value = "Add" /></td>
      </tr>
    </table>
  </form>
</div>
<div id="Category">
  <div id="cateegoryI"><span id="welcomeC">Add new Category</span><br  />
    <br  />
    <br  />
    <form action="ManageProduct.php?step=c" method = "post">
      <table border="0">
        <tr>
          <td> Category ID<span id="redStar">*</span>:</td>
        </tr>
        <tr>
          <td><input id="registerInfor" type="text" name="Cid" /></td>
        </tr>
        <tr>
          <td><br  />
            Category Name<span id="redStar">*</span>:</td>
        </tr>
        <tr>
          <td><input id="registerInfor" type="text" name="Cname" /></td>
        </tr>
              <tr>
        <td  colspan="2" align="center" id="mes"><span id="redStar"> <?php echo $message2;?></span></td>
      </tr>
        <tr>
          <td  colspan="2" align="center"><br />
            <br />
            <input id="btn2" type="submit" value = "Add" /></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<div id="footer">© COSC631 Project Group 6 </div>
<div id="picMP"><img  src ="picture/admin1.png" width ="200" height=""/> </div>
</body>
</html>
<?php  mysql_close($link);?>