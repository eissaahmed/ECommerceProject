function purchase(cart_ID, total_cost) {
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4) {
		if (xmlhttp.status == 200) {
			alert("Thanks for shopping with us!!!");
			window.location = "index.php";
		} else {
			alert("ERROR");		
		}
            }
        };
	var url = "purchase.php?cart_ID=" + cart_ID + "&total_cost=" + total_cost;
	xmlhttp.open("GET", url, true);
        xmlhttp.send();
}
