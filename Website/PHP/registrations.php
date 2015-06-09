<?php
	
	$dbconnection = new mysqli('localhost','DBadmin','dbadmin','BirdDatabase');
	$finalResult = '';
	
	if ($dbconnection->connect_error) {
		die("Connection failed: " . $dbconnection->connect_error);
		echo "-1";
		return false;
	}
	
	$SqlVariableRegistrations = 'CALL display_daily_registrations();';
	$stmt =$dbconnection->prepare($SqlVariableRegistrations);
	$stmt->execute();
	$result = $stmt->get_result();
	
	if($result->num_rows == 0){
		$finalResult = "<h2>No registrations<h2>";
	}
	
	while ($row = $result->fetch_assoc()){
		$finalResult = $finalResult.'<div class="col-lg-4 col-sm-6">
												<div class="properties">
													<h5>'.$row['Species_Name'].' </h5>
													<h5>'.$row['Registration_Date'].'</h5>
												</div>
										   </div>';
	}
	echo $finalResult;
	$dbconnection->close();

?>