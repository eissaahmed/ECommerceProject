<?php

include("DBconnect.php");
session_start();
date_default_timezone_set('America/Detroit');
$salt = "asdsafahshgsajk";

if($_GET['logOut'] == 'y')
{
	session_start();
	session_regenerate_id();
	session_destroy();
	header('Location: http://db2.emich.edu/~201501_cosc471_group12/Demo/index.php');
}





$emialS = trim($_POST['emailS']);
$pinS = trim($_POST['pinS']);

if($_GET['clicked'] == 'S' and $_POST['emailS'] and $_POST['pinS'] and $emialS != '' and $pinS != '')
{
	
	$search_sql="SELECT * FROM OS_User WHERE Email = '".$emialS."';";
	$search_query=mysql_query($search_sql);	
	$search_rs=mysql_fetch_assoc($search_query);
	if(mysql_num_rows($search_query) == 0)
	{
		$messageS2 = "This account does not exist";
	}
	else if(strcmp($search_rs['Password'],crypt($pinS, $salt)))
	
	{
		echo crypt($pinS, $salt);
		
		echo '****'.$search_rs['Password'];
		$messageS2 ="Password is wrong";
	}
	else if($search_rs['Active'] == 0)
	{
		$messageS2 ="Your account has be disabled";
	}
	else if($search_rs['Is_Admin'] == 1)
	{
		header('Location: Administrator.php');
	}
	else
	{
		$_SESSION['Firstname'] = $search_rs['First_Name'];
		$_SESSION['username'] = $emialS;
		header('Location: http://db2.emich.edu/~201501_cosc471_group12/Demo/index.php');
	}
}
else
{
	$messageS = "Please enter all required information";
}


	$Fname = trim($_POST['Fname'] );
	$addressS = trim($_POST['address']);
	$city = trim($_POST['city']);
	$Lname = trim($_POST['Lname']);
	$Mname = trim($_POST['Mname']);
	$state = trim($_POST['state']);
	$emailR = trim($_POST['emailR']);
	$country = trim($_POST['country']);
	$pin = trim($_POST['pin']);
	$zip = trim($_POST['zip']);
	$pinC = trim($_POST['pinC']);
	$dateU = date("Y-m-d");

	if($_GET['clicked'] == 'R' and $_POST['Fname'] and $_POST['address'] and $_POST['city'] and $_POST['Lname'] and $_POST['state'] and $_POST['emailR'] and $_POST['country'] and $_POST['pin'] and $_POST['zip'] and $_POST['pinC'] and !($Fname == '' or $addressS == '' or $city == '' or $Lname == '' or $state == '' or $emailR == '' or $country == '' or $pin == '' or $zip  == '' or $pinC == ''))
	{
		if(strlen($emailR) > 60 or !validEmail($emailR))
		{
			$massage2 ="Please enter a valid email address";
		}
				
				else if($pin != $pinC )
			  {
				  $massage2="Password and confirm password have different values";
			  }
			  else if(!preg_match ('/^[0-9]{5}$/', $zip)
)
			  {
				  $massage2 ="Please enter a valid zip code";
			  }
			  else
			  {
				  $search_sql = "INSERT INTO OS_User VALUES ('0', '".$Fname."', '".$Mname."', '".$Lname."', '".$addressS."', '".$city."', '".$state."', '".$zip."', '".$country."', '".$emailR."', '','".crypt($pin, $salt)."', '1', '".$dateU."', '".$dateU."');";
				  
				  $search_query=mysql_query($search_sql);
				  
				  
				  if($search_query)
			{
				$_SESSION['Firstname'] = $Fname;
				$_SESSION['username'] = $emailR;
				  header('Location: http://db2.emich.edu/~201501_cosc471_group12/Demo/index.php');
			}
			else
			{
				$massage2 = "Email address already exist";
			}
				  
			  }
	
	}
	
	else
	{
		$massage="Please enter all required information";
	}
	
	
function validEmail($email)
{
    $isValid = true;
    $atIndex = strrpos($email, "@");
    if (is_bool($atIndex) && !$atIndex)
    {
        $isValid = false;
    }
    else
    {
        $domain = substr($email, $atIndex+1);
        $local = substr($email, 0, $atIndex);
        $localLen = strlen($local);
        $domainLen = strlen($domain);
        if ($localLen < 1 || $localLen > 64)
        {
            $isValid = false;
        }
        else if ($domainLen < 1 || $domainLen > 255)
        {
            $isValid = false;
        }
        else if ($local[0] == '.' || $local[$localLen-1] == '.')
        {
            $isValid = false;
        }
        else if (preg_match('/\\.\\./', $local))
        {
            $isValid = false;
        }
        else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain))
        {
            $isValid = false;
        }
        else if (preg_match('/\\.\\./', $domain))
        {
            $isValid = false;
        }
        else if
        (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/',
            str_replace("\\\\","",$local)))
        {
            if (!preg_match('/^"(\\\\"|[^"])+"$/',
                str_replace("\\\\","",$local)))
            {
                $isValid = false;
            }
        }
        if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A")))
      {
          $isValid = false;
      }
   }
    return $isValid;
}	
	
	
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign in or Register</title>
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
	left: 100px;
	top: 190px;
	width: 320px;
	height: 520px;
	background-color: #ffffff;
	border: 2px solid #a1a1a1;
	padding: 10px 40px;
	border-radius: 25px;
}
#register {
	position: absolute;
	left: 560px;
	top: 190px;
	width: 600px;
	height: 520px;
	background-color: #ffffff;
	border: 2px solid #a1a1a1;
	padding: 10px 40px;
	border-radius: 25px;
}
#sign1 {
	font: normal bold 30px Georgia, serif;
	width: 130px;
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
	padding: 15px;
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
#title1 {
	position: absolute;
	width: 100%;
}
a:link, a:visited{
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
</style>
</head>

<body background="picture/background.PNG">
<div id="title1">
  <table width="100%" bgcolor="#00b8e6" border="0">
    <tr>
      <td width = "220" align="center" ><img src = "picture/Logo.png" height="70" width="130"></td>
      <td  width = "180"></td>
      <td><span id="title">Sign in/Register</span></td>
      <td></td>
    </tr>
    <tr>
      <td width = "220" align="center" ><span id="welcome">We Come, We Love</span></td>
<td></td>
      <td align="right"><a href="http://db2.emich.edu/~201501_cosc471_group12/Demo/index.php">Continue Shopping</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id='nameU'><?php echo $_SESSION['username'];?></span></td>
      
      <td align="center"><a href="SignInOrRegister.php?logOut=y">Log out</a></td>
    </tr>
  </table>
  <div id="bar"> </div>
</div>
<div id= "siginIn" >
  <form action="SignInOrRegister.php?clicked=S" method = "post">
    <table border="0" width="320">
      <tr>
        <td id="sign1">Sign In</td>
      </tr>
      <tr>
        <td><?php echo $messageS;?></td>
      </tr>
      <tr>
        <td ><br />
          <br />
          Email Address<span id="redStar">*</span>:</td>
      </tr>
      <tr>
        <td ><input id="signInfor" type="text" name="emailS" value = "<?php echo $_POST['emailS'];?>"/></td>
      </tr>
      <tr>
        <td ><br />
          <br />
          Password<span id="redStar">*</span>:</td>
      </tr>
      <tr>
        <td><input id="signInfor" type="password" name="pinS" value ="<?php echo $_POST['pinS'];?>"/></td>
      </tr>
      <tr>
        <td align="right"><br />
          <br />
          <button id="btn1">Sign In</button></td>
      </tr>
      <tr>
        <td><br />
          <span id="redStar"><?php echo $messageS2?></span></td>
      </tr>
    </table>
  </form>
</div>
<div id= "register" >
  <form action="SignInOrRegister.php?clicked=R" method = "post">
    <table border="0" width="575">
      <tr>
        <td id="sign1">Register</td>
        <td><span id="redStar"><?php echo $massage2?></span></td>
      </tr>
      <tr>
        <td colspan="2"><?php echo $massage?></td>
      </tr>
      <tr>
        <td><br />
          First Name<span id="redStar">*</span>:<br />
          <input id="registerInfor" type="text" name="Fname"  value="<?php echo $_POST['Fname'];?>"/></td>
        <td><br />
          <br />
          Address Street<span id="redStar">*</span>:<br />
          <input id="registerInfor" type="text" name="address" value="<?php echo $_POST['address'];?>"/></td>
      </tr>
      <tr>
        <td width="320"><br />
          Middle Name:<br />
          <input id="registerInfor" type="text" name="Mname" value="<?php echo $_POST['Mname'];?>"/></td>
        <td><br />
          City<span id="redStar">*</span>:<br />
          <input id="registerInfor" type="text" name="city" value="<?php echo $_POST['city'];?>"/></td>
      </tr>
      <tr>
        <td><br />
          Last Name<span id="redStar">*</span>:<br />
          <input id="registerInfor" type="text" name="Lname" value="<?php echo $_POST['Lname'];?>"/></td>
        <td><br />
          State<span id="redStar">*</span>:<br />
          <input id="registerInfor" type="text" name="state" value="<?php echo $_POST['state'];?>"/></td>
      </tr>
      <tr>
        <td><br />
          Email Address<span id="redStar">*</span>:<br />
          <input id="registerInfor" type="text" name="emailR" value="<?php echo $_POST['emailR'];?>"/></td>
        <td><br />
          Country<span id="redStar">*</span>:<br />
          <input id="registerInfor" type="text" name="country" value="<?php echo $_POST['country'];?>"/></td>
      </tr>
      <tr>
        <td><br />
          Password<span id="redStar">*</span>:<br />
          <input id="registerInfor" type="password" name="pin" value="<?php echo $_POST['pin'];?>"/></td>
        <td><br />
          Zip<span id="redStar">*</span>:<br />
          <input id="registerInfor" type="text" name="zip" value="<?php echo $_POST['zip'];?>"/></td>
      </tr>
      <tr>
        <td><br />
          Confirm Password<span id="redStar">*</span>:<br />
          <input id="registerInfor" type="password" name="pinC" value="<?php echo $_POST['pinC'];?>"/></td>
        <td align="right"><br />
          
          <!-- <button id="btn1" onclick="register();">Register</button>-->
          
          <input id="btn1" type="submit" value="Register" id="" name="register"></td>
      </tr>
    </table>
  </form>
</div>
<div id="bar"> </div>
<div id="footer">© COSC631 Project Group 6 </div>
<div id="pic"><img  src ="picture/vegtable.png" width ="" height=""/> </div>
</body>
</html>
<?php  mysql_close($link);?>