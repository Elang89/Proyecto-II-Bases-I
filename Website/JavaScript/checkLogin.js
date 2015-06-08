document.addEventListener("DOMContentLoaded",checkLoginStatus());


function checkLoginStatus(){
	var XMLHttp;
	var userType;
	var serverResponse;
	var code;
	
	XMLHttp = new XMLHttpRequest();
	  XMLHttp.onreadystatechange = function() {
		    if (XMLHttp.readyState == 4 && XMLHttp.status == 200) {
		    	serverResponse = XMLHttp.responseText;
		    	code = parseInt(serverResponse);
		    	if(code == 1){
		    		document.getElementById("search_users").style.display = "inline";
		    		document.getElementById("search_stuff").style.display = "inline"; 
					document.getElementById("search_gallery").style.display = "inline"; 
		    		document.getElementById("stats").style.display = "inline";
		    		document.getElementById("my_account").style.display = "inline";
		    		document.getElementById("my_registrations").style.display = "inline";
		    		document.getElementById("catalog").style.display = "inline";
		    		document.getElementById("add").style.display = "inline";
		    		document.getElementById("login").style.display = "none";
		    		document.getElementById("logout").style.display = "inline";
		    		document.getElementById("register").style.display = "none";
		    	} else if(code == 0){
		    		document.getElementById("search_users").style.display = "inline";
		    		document.getElementById("search_stuff").style.display = "inline"; 
					document.getElementById("search_gallery").style.display = "inline"; 
		    		document.getElementById("my_account").style.display = "inline";
		    		document.getElementById("my_registrations").style.display = "inline";
		    		document.getElementById("add").style.display = "inline";
		    		document.getElementById("login").style.display = "none";
		    		document.getElementById("logout").style.display = "inline";
		    		document.getElementById("register").style.display = "none";
		    	}
		    }
		  }
	  XMLHttp.open("GET", "PHP/returnLoginStatus.php", true);
	  XMLHttp.send();
}