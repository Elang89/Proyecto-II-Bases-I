 <?php 
 // Created by Miuyin 5/24/2015  
 //PHP that inserts a new specie to the database  
 
$conn = new mysqli('localhost','DBadmin','dbadmin','BirdDatabase');

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error); 
	echo "-1"; 
	return false; 
}   
		session_start();  
		
		$specie =  $_POST['specie_combo'];  
		$observation = $_POST['Observations'];
		$image = $_POST['photo'];
		$username = $_SESSION['id']; 
		$firstImage = "First_Image";

		
			$sqlVariableUser = 'SELECT insert_found_specie(?, ?, ?);';
			$sqlVariableInsertImage = 'CALL image_insert_image(?,?,?,?,?);';
			
			$stmt = $conn->prepare($sqlVariableUser);
			$stmt2 = $conn->prepare($sqlVariableInsertImage);
			
			if(!$stmt  || !$stmt2){
				exit($conn->error);
				return false;
			} else {
				$stmt->bind_param('sis', $specie, $username, $observation);
				$stmt->execute();
				$result= $stmt->get_result()->fetch_row()[0];
				if($result == 1){
					$stmt2->bind_param('issss', $username, $specie, $firstImage, $firstImage, $image);
					$stmt2->execute();
				}
				echo ($result);
			}

?> 		

<script type="text/javascript">
		var result = <?php echo $result?>;
		console.log(result);
		if(result == 1){
			alert("Congratulations, your specie has been registered!");
		} else {
			alert("This species, has already been found");	
		}
		window.location = "index.php";
</script>


