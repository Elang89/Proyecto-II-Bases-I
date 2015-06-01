<?php
	session_start();
	$dbconnection = new mysqli('localhost','DBadmin','dbadmin','BirdDatabase');
	$id = $_SESSION['id'];
	$result;
	$finalResult = "<h2>No Images<h2>";
	
	if ($dbconnection->connect_error) {
		die("Connection failed: " . $dbconnection->connect_error);
		echo "-1";
		return false;
	}
	
	$sqlVariableImages = 'CALL image_retrieve_images(?)';
	$stmt = $dbconnection->prepare($sqlVariableImages);
	
	if(!$stmt){
		echo $finalResult;
		return false;
	}
	$stmt->bind_param('i', $id);
	$stmt->execute();
	
	if($stmt->error){
		echo $finalResult;
		echo $stmt->error;
		return false;
	}
	$result = $stmt->get_result();
	
	if($result->num_rows == null){
		echo $finalResult;
		return false;
	} else {
		$finalResult = "";
	}
	while ($row = $result->fetch_assoc()){
		$finalResult = $finalResult.'<div class="col-lg-4 col-sm-6">
												<div class="properties">
													<h5>'.$row['Image_Name'].'</h5>
													<h5>'.$row['Image_Location'].'</h5>
													<div class="image-holder"><img src="'.$row['Image'].'"class="img-responsive" alt="properties"/></div>
													<input class="form-control" type="text" style="display: none" readonly name="p_id" value="'.$row['User_Id'].'"/>
													<input class="form-control" type="text" style="display: none" readonly name="username" value="'.$row['Image'].'"/>
												</div>
										   </div>';
	}
	echo $finalResult;
	$dbconnection->close();
?>