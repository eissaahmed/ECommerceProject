<!-------------------------------
Course: COSC471
Project title: 3B Online Bookstore
Group 12: Hui Xu and Omar Ali
Complete date: 4/6/2015
-------------------------------->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="471css1.css" rel="stylesheet" type="text/css">
<title>Search Result - 3-B.com</title>
<?php include("DBconnect.php");
 session_start();
 if(isset($_SESSION['count']))
 {
 $temp = $_SESSION['count'];
		  
$delete = FALSE;
//If delete button clicked
if($_GET['delID'])
{
	$delvalue = $_GET['delID'];
	for($row = 0; $row < $temp; $row++)
	{
	 if($delvalue === $_SESSION['booklist'][$row][0])
	 {
		unset($_SESSION['booklist'][$row]);	
		$delete = TRUE;
	 }
	
		if($row < $temp-1 and $delete)
		{
		 $_SESSION['booklist'][$row] =  $_SESSION['booklist'][$row+1];
		}			
		
	}//for end
	if($delete)
	{
		$temp = $temp-1;
		$_SESSION['count'] = $temp;
	}
	$delete = FALSE;
}
		  		  
if(!$_GET['delID'])	
{	  

//Store the cart information		 
for($row = 0; $row < $temp; $row++)
{
	$pass='name'.$row;
	if($_GET[$pass] and is_numeric($_GET[$pass])){
	$_SESSION['booklist'][$row][4] = $_GET[$pass];
	$_SESSION['booklist'][$row][5] = $_SESSION['booklist'][$row][3] *	$_SESSION['booklist'][$row][4];}
}
}
 }
?>

<body>
<img src="front.png" />
<table  bgcolor = "" width="800" align = "center" height="100">
  <tr>
    <td align="right"><p id='t1'>Shopping Cart-3-B.COM</p></td>
  </tr>
</table>
<table  bgcolor = "#FFFFD1" align = "center" width="800"  height="600">
  <tr>
    <td><table width="703" align = "center">
        <tr  >
          <td><form id="checkout" action="customerRegistration.php" method="get">
              <input type="submit" name="checkout_submit" id="checkout_submit" value="Proceed to Checkout">
            </form></td>
          <td><form id="new_search" action="search.php" method="post">
              <input type="submit" name="search" id="search" value="New Search">
            </form></td>
          <td align = "right"><form id="exit" action="Welcome.php" method="post">
              <input type="submit" name="exit" id="exit" value="EXIT 3-B.com">
            </form></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td></td>
          <td></td>
        </tr>
      </table>
      <form action="shoppingCart.php" method="get">
        <div id="bookdetails" style="overflow:scroll;height:400px;width:800px;border:1px solid black;">
          <table align ="center" width = "780" border="1" bordercolor="#66CCFF">
            <tr bgcolor="#66CCFF">
              <th width="130">Remove</th>
              <th width="428">Book Description</th>
              <th width="72">Quantity</th>
              <th width="122">Price</th>
            </tr>
            <?php		  
		  		  
				  
		  if( isset($temp) and $temp > 0){
			  $_SESSION['total']=0;
				  $totalP= $_SESSION['total'];
			for($row = 0; $row < $temp; $row++)
			{								
					?>
            <tr>
              <td align="center"><button name='delID' id=''  value = '<?php echo $_SESSION['booklist'][$row][0]?>' onClick="window.location.href='shoppingCart.php?delID=<?php echo $_SESSION['booklist'][$row][0]?>'">Delete</button></td>
              <td><b>Title:</b> <?php echo $_SESSION['booklist'][$row][1]?> <br />
                <b>Author:</b> <?php echo $_SESSION['booklist'][$row][2]?> <br />
                <b>Price:</b> <?php echo $_SESSION['booklist'][$row][3]?></td>
              <td align="center"><input type="text" size="4" id="" name="<?php echo 'name'.$row?>" value="<?php echo $_SESSION['booklist'][$row][4]?>" ></td>
              <td align="center">$ <?php echo $_SESSION['booklist'][$row][5]?></td>
            </tr>
            <?php 
		  
		  $totalP = $totalP+ $_SESSION['booklist'][$row][5];

			}
			$_SESSION['total'] =  $totalP ;
			
			}
				else
				{
?>
            <p>Empty Shopping Cart</p>
            <?php }?>
          </table>
        </div>
        <table align="center" width="703">
          <tr>
            <td>&nbsp;</td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td><input type="submit" value="Recalculate Payment" id="" name=""></td>
            <td align="right"><b>Subtotal:</b></td>
            <td align="left">$<?php echo $totalP?></td>
          </tr>
        </table>
      </form></td>
  </tr>
</table>
</body>
</html>
<?php mysql_close($link);?>