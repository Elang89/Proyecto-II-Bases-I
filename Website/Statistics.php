<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="index.php">Home</a> / Statistics</span>
    <h2>Statistics</h2>
  </div>
</div>
<!-- banner -->



  <?php 
 // This php connects to the dadabatse and inserts new questions on the tables that only an admin can modify  
 // This php is called from manage-applicationForm.pho
 		$conn = new mysqli('localhost','DBadmin','dbadmin','BirdDatabase');

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error); 
			echo "-1"; 
			return false; 
		} 

?> 

    <div class="container">
      <div class="properties-listing spacer">

      <div id="owl-example" class="owl-carousel">
        <div class="properties">
          <div class="image-holder"><img src="images\Birds\one.jpg" class="img-responsive" alt="properties"/></div>

        </div>
        <div class="properties">
          <div class="image-holder"><img src="images\Birds\two.jpg" class="img-responsive" alt="properties"/></div>

        </div>
		<div class="properties">
          <div class="image-holder"><img src="images\Birds\eight.jpg" class="img-responsive" alt="properties"/></div>

        </div>
		<div class="properties">
          <div class="image-holder"><img src="images\Birds\four.jpg" class="img-responsive" alt="properties"/></div>

        </div>
		<div class="properties">
          <div class="image-holder"><img src="images\Birds\seven.jpg" class="img-responsive" alt="properties"/></div>

        </div> 
      </div>
    </div> 

    <div class="spacer">
      <div class="row">
        <div class="col-lg-6 col-sm-9 recent-view">  
		<?php
	$finalResult = '';	
	$sqlVariableGetAllSpecies = 'CALL registered_birds()'; 
	$stmt = $conn->prepare($sqlVariableGetAllSpecies);
	
	$stmt->execute();
	 $result = $stmt->get_result(); 
	 if($result->num_rows == null){
	 	$finalResult = "<h2>No results found<h2>";	
	 }
	 while ($row = $result->fetch_assoc()){ 
	 		$finalResult = $finalResult.'
			<h2> Registered Birds:  '.$row['count(specie_id)'].'</h2>';
	 	}
	 	echo $finalResult;

	 	$conn->close(); 
		?> 
		
		<?php		
		 		$conn = new mysqli('localhost','DBadmin','dbadmin','BirdDatabase');

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error); 
			echo "-1"; 
			return false; 
		}    
		
		$finalResult = '';	
		$sqlVariableGetAllSpecies = 'CALL registered_birds_per_habitat()'; 
		$stmt = $conn->prepare($sqlVariableGetAllSpecies);
		
		$stmt->execute();
		 $result = $stmt->get_result(); 
		 if($result->num_rows == null){
			$finalResult = "<h2>No results found<h2>";	
		 } 
		 echo '<h2> Registered birds per habitat: </h2>';
		 while ($row = $result->fetch_assoc()){ 
				$finalResult = $finalResult.'
				<h4>'.$row['Habitat_Name']. " " .$row['Birds_Per_Habitat']. '</h4>';
			}
			echo $finalResult;
			$conn->close(); 
		
		?>  
		
		<?php		
		 $conn = new mysqli('localhost','DBadmin','dbadmin','BirdDatabase');

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error); 
			echo "-1"; 
			return false; 
		}    
		
		$finalResult = '';	
		$sqlVariableGetAllSpecies = 'CALL registered_birds_per_size()'; 
		$stmt = $conn->prepare($sqlVariableGetAllSpecies);
		
		$stmt->execute();
		 $result = $stmt->get_result(); 
		 if($result->num_rows == null){
			$finalResult = "<h2>No results found<h2>";	
		 } 
		 echo '<h2> Registered birds per Size: </h2>';
		 while ($row = $result->fetch_assoc()){ 
				$finalResult = $finalResult.'
				<h4>'.$row['Size_Name']. " " .$row['Birds_Per_Size']. '</h4>';
			}
			echo $finalResult;
			$conn->close(); 
		
		?>  
		
		<?php		
		 $conn = new mysqli('localhost','DBadmin','dbadmin','BirdDatabase');

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error); 
			echo "-1"; 
			return false; 
		}    
		
		$finalResult = '';	
		$sqlVariableGetAllSpecies = 'CALL Top5_Users_Registered_Birds()'; 
		$stmt = $conn->prepare($sqlVariableGetAllSpecies);
		
		$stmt->execute();
		 $result = $stmt->get_result(); 
		 if($result->num_rows == null){
			$finalResult = "<h2>No results found<h2>";	
		 } 
		 echo '<h2> Top five users with the most registered photos: </h2>';
		 while ($row = $result->fetch_assoc()){ 
				$finalResult = $finalResult.'
				<h4>'.$row['username']. " " .$row['`registered_birds_by_user`(user_id)']. '</h4>';
			}
			echo $finalResult;
			$conn->close(); 
		?> 
        
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include'footer.php';?>