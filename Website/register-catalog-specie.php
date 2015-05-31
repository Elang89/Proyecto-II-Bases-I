<?php include'header.php';?>  
<!--  Created by Miuyin 5/28/2015   -->

<!-- banner -->
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="#">Home</a> / Register Catalog Specie</span>
    <h2>Register Catalog Specie</h2>
  </div>
</div>
<!-- banner -->
<div class="container">
  <div class="spacer">
    <div class="row register">
      <div class="col-lg-6"> 
		
	  <form enctype="multipart/form-data" action="REGISTER_CATALOG_SPECIE.php" method="POST" class="register-specie-form" id="register-specie-form">
	   <!-- specie--> 
		<?php  
		$conn = new mysqli('localhost','DBadmin','dbadmin','BirdDatabase');

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error); 
			echo "-1"; 
			return false; 
		}    
					echo "New Name";
					echo '<input id="new_name" type="text" class="form-control" name = "new_name" placeholder="Enter English name" required >';
					echo "Scientific Name";
					echo '<input id="scientific_name" type="text" class="form-control" name = "scientific_name" placeholder="Enter scientific name" required >'; 
					
					echo "Gender";
					$sql = "SELECT Gender_Name FROM Gender";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						 echo '<select name="Gender" id = "Gender" class="form-control">';
						 echo '<option value = "-1">Select Gender:</option>';
						 
						 while($row = $result->fetch_assoc()) {  
							 echo '<option>' . $row['Gender_Name'] . '</option>';
						 } 
						 echo '</select>'; 
					} else {
						 echo "0 results";
					} 

					echo "Size";
					$sql1 = "SELECT Size_Name FROM Size";
					$result1 = $conn->query($sql1); 
					echo '<select name="Size" id = "Size" class="form-control">'; 
					echo '<option value = "-1">Select Size:</option>';
				    while($row = $result1->fetch_assoc()) {  
					     echo '<option>' . $row['Size_Name'] . '</option>';
					} 
					echo '</select>';  
					
					echo "Habitat";
					echo '<select name="Habitat" id = "Habitat" class="form-control">'; 
					echo '<option value = "-1">Select Habitat:</option>';
					$sql2 = "SELECT Habitat_Name FROM Habitat";
					$result2 = $conn->query($sql2);
					 while($row = $result2->fetch_assoc()) {  
						 echo '<option>' . $row['Habitat_Name'] . '</option>';
					} 
					echo '</select>';  
					
					echo "Beak Type";
					echo '<select name="Beak" id = "Beak" class="form-control">'; 
					echo '<option value = "-1">Select Beak Type:</option>';
					$sql = "SELECT Beak_Name FROM Beak_Type";
					$result = $conn->query($sql);
					 while($row = $result->fetch_assoc()) {  
						 echo '<option>' . $row['Beak_Name'] . '</option>';
					} 
					echo '</select>';   
					
					echo "Color";
					echo '<select name="Color" id = "Color" class="form-control">'; 
					echo '<option value = "-1">Select Color:</option>';
					$sql = "SELECT Color_Name FROM Color";
					$result = $conn->query($sql);
					 while($row = $result->fetch_assoc()) {  
						 echo '<option>' . $row['Color_Name'] . '</option>';
					} 
					echo '</select>';  
					
					echo "Offspring Type";
					echo '<select name="Offspring" id = "Offspring" class="form-control">'; 
					echo '<option value = "-1">Select Offspring Quantity:</option>';
					$sql = "SELECT Quantity FROM offspring_quantity";
					$result = $conn->query($sql);
					 while($row = $result->fetch_assoc()) {  
						 echo '<option>' . $row['Quantity'] . '</option>';
					}
					echo '</select>';    
					
					
		?>  
		 <!-- specie -->
  
	

      </div>
    </div>
    <div class="row register">
      <div class="pull-right">
		<input type="submit" value="Register"  class="btn btn-success">
      </div>
    </div>
  </div>
</div> 

<?php include'footer.php';?>  
	</form>

