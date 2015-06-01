<?php
	
	$dbconnection = new mysqli('localhost','DBadmin','dbadmin','BirdDatabase');
	session_start();
	$json = file_get_contents('php://input');
	$json = json_decode($json,true);
	$userId = $_SESSION['id'];
	$speciesId = 1;
	$imageFile = $json['imageData'][0]; 
	$imageName = $json['imageData'][1];
	$imageLocation = $json['imageData'][2];
	$species = $json['imageData'][3];
	
	if ($dbconnection->connect_error) {
		die("Connection failed: " . $dbconnection->connect_error);
		echo "-1";
		return false;
	}
	
	$sqlVariableImageInsertion = 'CALL image_insert_image(?,?,?,?,?);';
	$stmt = $dbconnection->prepare($sqlVariableImageInsertion);
	
	if(!$stmt){
		exit('0');
	}
	
	$stmt->bind_param('issss',$userId,$species,$imageName,$imageLocation,$imageFile);
	$stmt->execute();
	if($stmt->error){
		echo $stmt->error;
		exit('0');
	}
	$dbconnection->close();
	exit('1');
	
	
?>