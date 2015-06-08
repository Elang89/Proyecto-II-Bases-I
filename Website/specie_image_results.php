<?php
		
		$conn = new mysqli('localhost','DBadmin','dbadmin','BirdDatabase');

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error); 
			echo "-1"; 
			return false; 
		}  		 
	
	$specie =  $_GET['specie'];  
	$finalResult = '';	
	$sqlVariableGetAllSpecies = 'CALL image_retrieve_specie_images(?)'; 
	$stmt = $conn->prepare($sqlVariableGetAllSpecies);
	$stmt->bind_param('s', $specie);
	
	$stmt->execute();
	 $result = $stmt->get_result(); 
	 if($result->num_rows == null){
	 	$finalResult = "<h2>No results found<h2>";	
	 }
	 while ($row = $result->fetch_assoc()){
	 		$finalResult = $finalResult.'<div class="col-lg-4 col-sm-6">
													<div class="properties">
													<h5>'.$row['Image_Name'].'</h5>
													<h5>'.$row['Image_Location'].'</h5>  
													<h5>'.$row['username'].'</h5> 
													<div class="image-holder"><img src="'.$row['Image'].'"class="img-responsive" alt="properties"/></div>
													<input class="form-control" type="text" style="display: none" readonly name="p_id" value="'.$row['User_Id'].'"/>
													<input class="form-control" type="text" style="display: none" readonly name="username" value="'.$row['Image'].'"/>
												</div>
										   </div>';
	 	}
	 	echo $finalResult;
	 	$conn->close();

		?>  