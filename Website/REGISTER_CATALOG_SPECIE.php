
 <?php 
 //  PHP that inserts a new pet to the database  
 
		$conn = new mysqli('localhost','DBadmin','dbadmin','BirdDatabase');

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error); 
			echo "-1"; 
			return false; 
		}    
			echo "hola"; 
			$new_name = $_POST['new_name'];
			$gender = $_POST['Gender'];  
			$size = $_POST['Size']; 
			$habitat = $_POST['Habitat'];  
			$beak = $_POST['Beak'];  
			$color = $_POST['Color']; 
			$offspring = $_POST['Offspring'];  
			$science = $_POST['scientific_name'];  
			 $sqlVariableUser = 'SELECT insert_species(?, ?, ?, ?, ?, ?, ?, ?);'; 
			 
			if(!$stmt = $conn->prepare($sqlVariableUser)){
				exit($conn->error);
				return false;
			} else {
				$stmt->bind_param('ssssssss', $new_name, $science, $gender, $size, $habitat, $beak, $color, $offspring);
				$stmt->execute();
				$result= $stmt->get_result()->fetch_row()[0];
				echo ($result);
			}
?> 	 

   <script type="text/javascript">  
	alert("Congratulations, your specie has been registered!"); 
	window.location = "manage-catalog.php"; 	 
	
	</script>


