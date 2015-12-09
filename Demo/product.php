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



/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//CONFIGURE
define('DB_SERVER', 'localhost');
//define('DB_SERVER_USERNAME', 'root');
//define('DB_SERVER_PASSWORD', '');
//define('DB_DATABASE', 'OnlineStore');
define('DB_SERVER_USERNAME', '201501_471_12');
define('DB_SERVER_PASSWORD', 'VpiLy1Ra5');
define('DB_DATABASE', 'db201501_471_g12');
  
  
  // include the database class
  require('database/database.php');

// make a connection to the database... now
  $Database = Database::connect(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD);
  $Database->selectDatabase(DB_DATABASE);
  
  
  // include functions
  require('includes/general.php');
  require('includes/html_output.php');
  //require('includes/helper.php');

  //$Helper = Helper::setup('index');
  
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

    <head>

        <meta http-equiv="Content-Type" content="text/html;" />

        <title>Fresh Food | Product</title>
        <!--<base href="http://localhost:85/OnlineStore/" />-->

        <link rel="stylesheet" type="text/css" href="stylesheet.css" />
        <link rel="stylesheet" href="footerAndHeader.css" />

        <script language="javascript" type="text/javascript" src="mootools-yui-compressed.js"></script>
	<script language="javascript" type="text/javascript" src="js/add_to_cart.js"></script>
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
  /*********************************************/
  </style>

    </head>
    <body background="background.PNG">
        
    <div id="title1">
      <table width="100%" bgcolor="#00b8e6">
        <tr>
          <td width = "220" align="center" ><img src = "Logo.png" height="70" width="130" /></td>
          <td width = "180"></td>
          <td><span id="title">Welcome to Fresh Food!</span></td>
          <td></td>
        </tr>
        <tr>
          <td width = "220" align="center" ><span id="welcome">We Come, We Love</span></td>
                                     <td></td>
      <td align="right" id='nameU'><?php echo $_SESSION['username'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td><a class='lo' href="product.php?logOut=y">Log out</a></td>
        </tr>
      </table>
        <div id="content">
        
        
        
        
        
        
        <div id="navigationBar">
            <div id="navigationInner">
                <a href="index.php" style="color:white;font-size:10pt;padding-left:10px">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="AboutUs.php" style="color:white;font-size:10pt;">About Us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="ContactUs.php" style="color:white;font-size:10pt;">Contact Us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="faq.php" style="color:white;font-size:10pt;">FAQ</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="location.php" style="color:white;font-size:10pt;">Locations</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="Policies.php" style="color:white;font-size:10pt;">Policies</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="accountAndAdministrator/MyAccount.php" style="color:white;font-size:10pt;">My Account</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="accountAndAdministrator/SignInOrRegister.php" style="color:white;font-size:10pt;">Sign In/Register</a>
		<!-- Shopping Cart Starts -->
		<?php
			session_start();
			if (isset($_SESSION['username']))
			{
				echo "<a href=cartinfo.php?user_ID=" . $_SESSION['username'] . "><img src='images/shopping_cart.png' style='padding-left:20px' /></a>";
			}
		?>	
		<!--<a href="cartinfo.php?user_ID=1"><img src="images/shopping_cart.png" style="padding-left:20px" />-->
		<font id="shopping_cart" style="color:white;padding-left:3px"></font>
		<!-- Shopping Cart Ends -->
                <!--<font style="color:white;font-size:18pt">International Foods Store</font>-->
                <div style="float: right;width: 306px">
                  <form name="search" action="searchResults.php" method="get">
                      <p class="keywords"><input type="text" name="keywords" id="keywords" maxlength="50" value="Search ..." onfocus="if (this.value == 'Search ...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search ...';}" /></p>
                      <p>
                          <input type="image" src="images/button_quick_find.png" alt="Search" title="Search" id="quickSearch" />
                      </p>
                  </form>
                </div>
            </div>
        </div>
        <?php
        
//        require('DBconnect.php');
//        
//        //$link = mysql_connect($db_host,$db_username,$db_pass);
//        $link = mysqli_connect($db_host,$db_username,$db_pass,$db_name);

//        if(!$link)
//        {
//            die("Could not connect MySQL");
//        }
//        @mysql_select_db($db_name, $link);// or die("No datebase");

            // Check connection
            if (mysqli_connect_errno())
            {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                echo "<br>";
            }
            else
            {
//                echo "Connection established to MySQL";
//                echo "<br>";
            }
        
        
        
            //$con = mysqli_connect("localhost", "root", "", "OnlineStore");
            $con = mysqli_connect(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE);
            
            // Check connection
            if (mysqli_connect_errno())
            {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                echo "<br>";
            }
            else
            {
//                echo "Connection established to MySQL";
//                echo "<br>";
            }
            
            $categoryQuery = " SELECT "
                    . "     C.Category_ID, "
                    . "     C.Name As CategoryName, "
                    . "     (SELECT COUNT(*) FROM OS_Product P WHERE P.Category_ID = C.Category_ID AND P.Active = 1) AS ProductCount "
                    . " FROM "
                    . "     OS_Category C "
                    . " WHERE "
                    . "     C.Active = 1"
                    . " ORDER BY"
                    . "     C.Name";
            
            
            //SELECT Category_ID, Name As CategoryName, (SELECT COUNT(*) FROM OS_Product WHERE OS_Product.Category_ID = OS_Category.Category_ID) AS ProductCount FROM OS_Category WHERE Active = 1
            
            //echo $categoryQuery;
            //echo $link;
            
            $categoryResult = mysqli_query($con, $categoryQuery);
//            $categoryResult = mysqli_query($link, $categoryQuery);
            
//            if (!$result){
//                echo ('Found no results!');
//                echo "<br>";
//            }
//            if ($result){
//                echo ('Found results!');
//                echo "<br>";
//            }
            
            if($categoryResult == false)
            {
                echo 'The query failed.';
                //exit();
            }
            
        echo "<div id=\"pageWrapper\">";
        echo "<div id=\"pageBlockLeft\">";
  
        echo "<div id=\"pageColumnLeft\">";
        echo "<div class=\"boxGroup\">";
            
        echo "<div id=\"boxCategories\" class=\"boxNew\">";
        //echo "<div id=\"boxCategories\">";
        echo "<div class=\"boxTitle\"><a href=\"category.php\">Categories</a></div>";
        //echo "<div>Categories</div>";

        echo "<div class=\"boxContents\">";
        //echo "<div>";
            
?>        
    <script type="text/javascript">
        window.addEvent('domready',function()
        {
          var myMenu = new MenuMatic({ id: "categoriesTree", effect: "slide & fade", duration: 600, orientation:"vertical" });
        });
    </script>
        
<?php
        echo "<ul id=\"categoriesTree\">";
            
            while($categoryRow = mysqli_fetch_assoc($categoryResult))
            {
                echo "<li><a href=\"category.php?categoryID=" . $categoryRow['Category_ID'] . "\">" . $categoryRow['CategoryName'] . " (" . $categoryRow['ProductCount'] . ")</a>";
                
                $productQuery = " SELECT "
                              . "     Product_ID, "
                              . "     Name As ProductName "
                              . " FROM "
                              . "     OS_Product "
                              . " WHERE "
                              . "     Category_ID = " . $categoryRow['Category_ID']
                              . " AND Active = 1"
                              . " ORDER BY "
                              . "     Name";
                
                $productResult = mysqli_query($con, $productQuery);
//                $productResult = mysqli_query($link, $productQuery);
                //$num = mysql_numrows(mysql_query($productQuery));
                $num = mysqli_num_rows($productResult);
                
                //echo "Numbers: " . $num;
                
                
                If ($num > 0)
                {
                    echo "<ul>";

                    while($productRow = mysqli_fetch_assoc($productResult))
                    {
                        echo "<li><a href=\"product.php?productID=" . $productRow['Product_ID'] . "\">" . $productRow['ProductName'] . "</a></li>";
                    }

                    echo "</ul>";
                }
                    
                echo "</li>";
            }

            //mysql_close();
            mysqli_close($con);
        
            echo "</ul>";
            echo "</div>";
            echo "</div>";
            
//            echo "<div class=\"boxNew\">";
//                echo "<div class=\"boxTitle\">Information</div>";
//
//                echo "<div class=\"boxContents\">";
//                    echo "<ul>";
//                        echo "<li><a href=\"index.php\">Home</a></li>";
//                        echo "<li><a href=\"aboutUs.php\">About Us</a></li>";
//                        echo "<li><a href=\"contactUs.php\">Contact Us</a></li>";
//                    echo "</ul>";
//                echo "</div>";
//            echo "</div>";
            echo "</div>";
            echo "</div>";
        ?>
        <div id="pageContent">
            <h1><a href="product.php">Products</a></h1>
            
            
            
            <table border="0" width="100%" cellspacing="0" cellpadding="2">
                <tr>

              <?php
                  //echo "Query String: " . $_SERVER['QUERY_STRING'];
                   
                  $productID = trim(substr($_SERVER['QUERY_STRING'], strpos($_SERVER['QUERY_STRING'],'=') + 1));
                  
                  //echo "Product ID: " . $productID;
              
                  if (isset($productID) && $productID != "")// && strpos($categoryID, '_'))
                  {
                      //echo "True!";
                    $productsQuery = $Database->query('SELECT P.Product_ID, P.Name, P.Description, P.Price, P.Sale_Price, P.Quantity, P.Rating, P.Image_URL FROM OS_Product P WHERE P.Product_ID = :Product_ID and P.Active = 1 order by P.Name');
                    $productsQuery->bindInt(':Product_ID', $productID);
                    $productsQuery->execute();
                  }
                  else
                  {
                      //echo "False!";
                    $productsQuery = $Database->query('select P.Product_ID, P.Name, P.Description, P.Price, P.Sale_Price, P.Quantity, P.Rating, P.Image_URL FROM OS_Product P WHERE P.Active = 1 order by P.Name');
                    $productsQuery->execute();
                  }

                  $number_of_products = $productsQuery->numberOfRows();
                  //echo "Number of products: " . $number_of_products;

                  $rows = 0;
                  define('MAX_DISPLAY_CATEGORIES_PER_ROW', 1);
                  
                  while ($productsQuery->next())
                  {
                    $rows++;
                    $width = (int)(100 / MAX_DISPLAY_CATEGORIES_PER_ROW) . '%';
                    //echo '    <td align="center" class="smallText" width="' . $width . '" valign="top">' . link_object(href_link(FILENAME_DEFAULT, 'categoryID=' . ($categoriesQuery->valueInt('Category_ID'))), osc_image(DIR_WS_IMAGES . 'categories/' . $categoriesQuery->value('categories_image'), $categoriesQuery->value('categories_name')) . '<br />' . $categoriesQuery->value('Name')) . '</td>' . "\n";
                    echo '    <td align="center" width="' . $width . '" valign="top" style="font-size:14px;"><u><a href="product.php?productID=' . $productsQuery->valueInt('Product_ID') . '">' . $productsQuery->value('Name') . '</a></u>';//</td>' . "\n";
                    
//                    $productsQuery = $Database->query('SELECT P.Product_ID, P.Name, P.Description, P.Price, P.Sale_Price, P.Quantity, P.Rating, P.Image_URL FROM OS_Product P WHERE P.Category_ID = :Category_ID and P.Active = 1 order by P.Name');
//                    $productsQuery->bindInt(':Category_ID', $categoriesQuery->valueInt('Category_ID'));
//                    $productsQuery->execute();
//                    
//                    $number_of_products = $productsQuery->numberOfRows();
//                    //echo $number_of_products;
                    
                    If ($number_of_products > 0)
                    {
                        echo '<table border="0" width="100%" cellspacing="3" cellpadding="2" class="productListing">';
                        
                        echo '<tr>';
                        echo '<td style="font-size:12px;" valign="top" width="80px">';

                        //echo '<a href="product.php?productID=' . $productsQuery->valueInt('Product_ID') . '">';

                        If ($productsQuery->value('Image_URL') != "")
                        {
                            echo '<img src="images/Products/' . $productsQuery->value('Image_URL') . '" alt="' . $productsQuery->value('Name') . '" title="' . $productsQuery->value('Name') . '" width="70" height="80" />';
                        }
                        else
                        {
                            echo '<img src="images/No_photo.png" alt="' . $productsQuery->value('Name') . '" title="' . $productsQuery->value('Name') . '" width="70" height="70" /> ';
                        }

                        echo '</td>';

                        echo '<td style="font-size:12px;" valign="top" align="left">';
                        echo '<br><input type="hidden" name="sid" value=' . $productsQuery->valueInt('Product_ID') . ' />';
                        echo $productsQuery->value('Name');
                        echo '</td>';

                        echo '<td style="font-size:12px;" valign="top" align="center">';

                        If ($productsQuery->value('Price') != $productsQuery->value('Sale_Price'))
                        {
                            echo '<br><strike>$' . $productsQuery->value('Price') . '</strike> <font color="red">$' . $productsQuery->value('Sale_Price');
                        }
                        else
                        {
                            echo "<br>$" . $productsQuery->value('Price');
                        }


                        echo '</td>';

                        echo '<td style="font-size:12px;" valign="top" align="right">';
                        echo '<br>Qty: <input type="text" id="qty_' . $productsQuery->valueInt('Product_ID') . '" value="1" size="1" class="qtyField" />';
                        echo "<br>Qty left: " . $productsQuery->value('Quantity');
                        echo '</td>';

                        echo '<td style="font-size:12px;" valign="top" align="center">';
                        //echo '<br><a href="index.php?&product_ID=' . $productsQuery->valueInt('Product_ID') . '&action=cart_add"><img src="images/buttons/button_add_to_cart.png" alt="Buy Now" title="Buy Now" class="ajaxAddToCart" id="ac_productlisting_' . $productsQuery->valueInt('Product_ID') . '" /></a>';
                        //echo '</td>';
            

			/*session_start();
			
			if (isset($_SESSION['username']))
			{
				echo $_SESSION['username'];
			} else {
				echo "NULL";
			}*/	
                        // HARD-CODING User_ID
			echo '<br><a href="javascript:add_to_cart(\'';  
			
				if (isset($_SESSION['username']))
				{
					echo $_SESSION['username'];
				} else {
					echo "NULL";
				}
			
			echo '\', ' . $productsQuery->valueInt('Product_ID') . ', document.getElementById(\'qty_' . $productsQuery->valueInt('Product_ID') . '\').value);"><img src="images/buttons/button_add_to_cart.png" alt="Buy Now" title="Buy Now" class="ajaxAddToCart" id="ac_productlisting_' . $productsQuery->valueInt('Product_ID') . '" /></a>';

                        echo '<br><br></td></tr>';
                        
                        echo '<tr>';
                        echo '<td style="border-bottom-width:1px;border-bottom-style:dotted;font-size:12px;" valign="top">&nbsp;</td>';
                        echo '<td style="border-bottom-width:1px;border-bottom-style:dotted;font-size:12px;" valign="top" colspan="4">';
                        echo $productsQuery->value('Description');

                        echo '<br><br></td></tr>';
                        
                        echo '</table>';
                    }
                    else
                    {
                        echo '<table border="0" width="100%" cellspacing="0" cellpadding="2">';
                        echo '<tr><td style="border-bottom-width:2px;border-bottom-style:solid;font-size:12px;">';
                        echo '(none)';
                        echo '<br><br></td></tr>';
                        echo '</table>';
                    }
                    
                    echo "</td>" . "\n";
                    
                    if ((($rows / MAX_DISPLAY_CATEGORIES_PER_ROW) == floor($rows / MAX_DISPLAY_CATEGORIES_PER_ROW)) && ($rows != $number_of_products))
                    {
                      echo "  </tr>" . "\n";
                      echo "  <tr>" . "\n";
                    }
                  }
              ?>

                </tr>
              </table>
        </div>

            <script language="javascript" type="text/javascript" src="MenuMatic_0.68.3.js"></script>
            
            </div>
        </div>
        <div id="pic"><img  src ="leaf.png"/> </div>
        <p style="height:230px;"></p>
        <div id="footer">© COSC631 Project Group 6 </div>
    </body>
</html>