document.addEventListener("DOMContentLoaded",sendRegistrationsRequest());


function sendRegistrationsRequest(){
	var XMLHttp;
	var userType;
	var serverResponse;
	var code;
	
	XMLHttp = new XMLHttpRequest();
	  XMLHttp.onreadystatechange = function() {
		    if (XMLHttp.readyState == 4 && XMLHttp.status == 200) {
		    	serverResponse = XMLHttp.responseText;
		    	document.getElementById("results").innerHTML = serverResponse;
		    }
		  }
	  XMLHttp.open("GET", "PHP/registrations.php", true);
	  XMLHttp.send();
}