function add_to_cart(user_ID, product_ID, quantity) {
	if (user_ID === "NULL") {
		window.location = "accountAndAdministrator/SignInOrRegister.php";
	} else {
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4) {
		if (xmlhttp.status == 200) {
			var sc = document.getElementById("shopping_cart");
			sc.innerHTML = xmlhttp.responseText;
		} else {
			alert("ERROR");		
		}
            }
        };
		var url = "addtocart.php?user_ID=" + user_ID + "&product_ID=" + product_ID + "&quantity=" + quantity;
		xmlhttp.open("GET", url, true);
        xmlhttp.send();
	}
}
