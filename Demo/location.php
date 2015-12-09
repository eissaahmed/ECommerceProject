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
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta charset="utf-8">
<title>Loaction</title>
<style>
html, body {
	height: 100%;
	margin: 0;
	padding: 0;
}
#map {
	height: 100%;
}
.underlined1 {
	border-bottom: 4px solid black;
	font-size: 150%;
}
.underlined2 {
	border-bottom: 1px solid green;
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
a.wel:link, a.wel:visited {
	color: #ffffff;
	background-color: transparent;
	text-decoration: none;
	font: normal bold 20px Georgia, serif;
}
  /*********************************************/
</style>
<link rel="stylesheet" type="text/css" href="css/common.css">
<link rel="stylesheet" type="text/css" href="stylesheet.css" />
<link rel="stylesheet" href="footerAndHeader.css" />
</head>
<body background="background.PNG">
<table width="100%" bgcolor="#00b8e6">
  <tr>
    <td width = "220" align="center" ><img src = "Logo.png" height="70" width="130" /></td>
    <td width = "180"></td>
    <td><a class='wel' href="http://db2.emich.edu/~201501_cosc471_group12/Demo/index.php"><span id="title">Welcome to Fresh Food!</span></a></td>
    <td></td>
  </tr>
  <tr>
    <td width = "220" align="center" ><span id="welcome">We Come, We Love</span></td>
    <td></td>
    <td align="right" id='nameU'><?php echo $_SESSION['username'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td><a class='lo' href="location.php?logOut=y">Log out</a></td>
  </tr>
</table>
<!--<div id="location">-->
<table style="width:100%" height="75%">
  <tr height="80%">
    <td style="width: 75%;"><div id="map"></div></td>
    <td style="width: 25%;" valign="top"><div class="underlined1">Location/Address</div>
      <br>
      <div class="underlined2"> California<br>
        2039 El Camino Real<br>
        Santa Clara,California 95050<br>
        t:408.261.3555<br>
        f:408.261.3545<br>
        santaclara@patelbros.com<br>
        <a href="javascript:changeMap(42.251729, -83.627124);">Show Map</a><br>
        <br>
      </div>
      <br>
      <div class="underlined2"> Connecticut<br>
        171 E. Spencer Street<br>
        Manchester,Connecticut 06040<br>
        t:860.645.6100<br>
        f:860.643.9322<br>
        connecticut@patelbros.com<br>
        <a href="javascript:changeMap(41.9782722, -87.84333649999996);">Show Map</a><br>
        <br>
      </div></td>
  </tr>
</table>
<!--</div>--> 
<script>
var map;
var marker;

function initMap() {
  var myLatLng = {lat: 41.9782722, lng: -87.84333649999996};

  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 14,
    center: myLatLng
  });

  marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: 'Location 1 !'
  });
}

function changeMap(latitude, longitude) {
  	 map.setCenter({
		lat : latitude,
		lng : longitude
	 });
	marker.setPosition({
		lat : latitude,
		lng : longitude
	 });
}

</script> 
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnuTwGjXUEjrMI0P9rPX9LZL601_Q0MFE&signed_in=true&callback=initMap"></script> 
<br>
<br>
<div id="pic"><img  src ="leaf.png"/> </div>
<p style="height:230px;"></p>
<div id="footer">© COSC631 Project Group 6 </div>
</body>
</html>
