document.addEventListener("DOMContentLoaded", getBirds());

function getBirds(){
	var serverResponse;
	var code;
	var XMLHttp = new XMLHttpRequest();
	
	XMLHttp.onreadystatechange = function() {
	    if (XMLHttp.readyState == 4 && XMLHttp.status == 200) {
	    		serverResponse = XMLHttp.responseText;
	    		document.getElementById("my_species").innerHTML =  serverResponse;
	    	}
		}
	XMLHttp.open("GET", "PHP/myBirds.php", true);
	XMLHttp.send();
}