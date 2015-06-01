window.addEventListener("load", function findImageUploadButton (){
	var button = document.getElementById("upload image").addEventListener("click", sendImage);
});

function clearInputs(){
	document.getElementById("image").value = "";
	document.getElementById("name").value = "";
	document.getElementById("location").value = "";
}

function sendImage(){
	var imageName;
	var imageLocation;
	var image;
	var species;
	var selector;
	var value;
	var imageData = [];
	var encodedImage;
	var Json;
	var regex = /^https?:\/\/(?:[a-z\-]+\.)+[a-z]{2,6}(?:\/[^\/#?]+)+\.(?:jpe?g|gif|png)$/;
	var XMLHttp = new XMLHttpRequest();
	var code;
	var serverResponse;
	var reader = new FileReader();
	
	
	image = document.getElementById("image").value;
	imageFile = document.getElementById("image").value;
	imageName = document.getElementById("name").value;
	imageLocation = document.getElementById("location").value;
	selector = document.getElementById("species");
	species = selector.options[selector.selectedIndex].text;
	value = selector.options[selector.selectedIndex].value;
	
	if(image == "" || imageName == "" || imageLocation == "" || !regex.test(image) ||  value == -1){
		alert("You must upload a .gif, .jpg or .png file and you must specify its name and the location, please do so before continuing." +
				" Remember to select a valid species.");
		clearInputs();
		return false;
	}
		
	imageData[0] = imageFile;
	imageData[1] = imageName;
	imageData[2] = imageLocation;
	imageData[3] = species;
		
	Json = JSON.stringify({imageData: imageData});
		
	XMLHttp.onreadystatechange = function() {
	    if (XMLHttp.readyState == 4 && XMLHttp.status == 200) {
	    	serverResponse = XMLHttp.responseText
	    	code =code = parseInt(serverResponse);
	    	if (code == 1){
	    		alert("Image uploaded succesfully");
	    		clearInputs();
	    	} else {
	    		alert("There was an error while uploading the image, please try again.")
	    		clearInputs();
	    	}
	    	
	    }
	    	
	}
	XMLHttp.open("POST", "PHP/insertImage.php", true);
	XMLHttp.setRequestHeader("Content-type","application/json;charset=UTF-8");
	XMLHttp.send(Json);
}