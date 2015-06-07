<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="index.php">Home</a> / Search for a specie</span>
    <h2>Search for a specie</h2>
  </div>
</div>
<!-- banner -->
<div class="container">
  <div class="properties-listing spacer">
    <div class="row">
      <div class="col-lg-3 col-sm-4 ">
        <div class="search-form"><h4><span class=glyphicon glyphicon-search"></span>Search for a specie</h4>
	
	<form enctype="multipart/form-data" action="javascript:searchSpecie();" method="POST" class="pet-search-form" id="pet-search-form">

		<?php  
		$conn = new mysqli('localhost','DBadmin','dbadmin','BirdDatabase');

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error); 
			echo "-1"; 
			return false; 
		}  
					$sql = "SELECT Class_Name FROM Class";
					$result = $conn->query($sql);
						echo '<select name="Class" id = "Class" class="form-control" method = "POST">';
						 echo '<option value = "-1">Select Class:</option>';
						 
						 while($row = $result->fetch_assoc()) {  
							 echo '<option>' . $row['Class_Name'] . '</option>';
						 } 
						 echo '</select>';  
						 
					$sql = "SELECT Order_Name FROM Orders";
					$result = $conn->query($sql);

						 echo '<select name="Order" id = "Order" class="form-control" method = "POST">';
						 echo '<option value = "-1">Select Order:</option> ';
						 
						 while($row = $result->fetch_assoc()) {  
							 echo '<option>' . $row['Order_Name'] . '</option>';
						 } 
						 echo '</select>';  
						 
					$sql = "SELECT Sub_Order_Name FROM Sub_Order";
					$result = $conn->query($sql);

						 echo '<select name="Sub_Order" id = "Sub_Order" class="form-control" method = "POST">';
						 echo '<option value = "-1">Select Sub_Order:</option>';
						 
						 while($row = $result->fetch_assoc()) {  
							 echo '<option>' . $row['Sub_Order_Name'] . '</option>';
						 } 
						 echo '</select>';  
						 
					$sql = "SELECT Family_Name FROM Family";
					$result = $conn->query($sql);

						 echo '<select name="Family" id = "Family" class="form-control" method = "POST">';
						 echo '<option value = "-1">Select Family:</option>';
						 
						 while($row = $result->fetch_assoc()) {  
							 echo '<option>' . $row['Family_Name'] . '</option>';
						 } 
						 echo '</select>';  
						 
					$sql = "SELECT Gender_Name FROM Gender";
					$result = $conn->query($sql);

						 echo '<select name="Gender" id = "Gender" class="form-control" method = "POST">';
						 echo '<option value = "-1">Select Gender:</option>';
						 
						 while($row = $result->fetch_assoc()) {  
							 echo '<option>' . $row['Gender_Name'] . '</option>';
						 } 
						 echo '</select>';  
		?> 
		
		<select name="specie_combo"   id = "specie_combo" class="form-control" method = "POST">
		<option value = "-1">Select Specie:</option> 
		<?php  
					$sql = "SELECT Specie_Name FROM Specie";
					$result = $conn->query($sql);
						 while($row = $result->fetch_assoc()) {  
							 echo '<option>' . $row['Specie_Name'] . '</option>';
					}

		
		?>   
        </select>	 

		<select name="size_combo"  id = "size_combo" class="form-control" method = "POST">
		<option value = "-1">Select Size:</option> 
		<?php  
		
				$sql = "SELECT Size_Name FROM Size";
				$result = $conn->query($sql);
				    while($row = $result->fetch_assoc()) {  
					     echo '<option>' . $row['Size_Name'] . '</option>';
					}
		?>  
		</select>  

		<select name="Habitat_combo"  id = "Habitat_combo" class="form-control" method = "POST">
		<option value = "-1">Select Habitat:</option> 
		<?php  
		
				$sql = "SELECT Habitat_Name FROM Habitat";
				$result = $conn->query($sql);
					 while($row = $result->fetch_assoc()) {  
						 echo '<option>' . $row['Habitat_Name'] . '</option>';
				}
		?>   
		</select>

		<select name="Beak_combo" id = "Beak_combo" class="form-control" method = "POST">
		<option value = "-1">Select Beak Type:</option> 
		<?php  
		
				$sql = "SELECT Beak_Name FROM Beak_Type";
				$result = $conn->query($sql);
					 while($row = $result->fetch_assoc()) {  
						 echo '<option>' . $row['Beak_Name'] . '</option>';
				}
		?> 
		</select>		

        <select name="Color_combo"  id = "Color_combo" class="form-control" method = "POST">
		<option value = "-1">Select Color:</option> 
		<?php  
		
				$sql = "SELECT Color_Name FROM Color";
				$result = $conn->query($sql);
					 while($row = $result->fetch_assoc()) {  
						 echo '<option>' . $row['Color_Name'] . '</option>';
				}
		?>   
		</select>  

		<select  name="offSpring_combo"  id = "offSpring_combo" class="form-control" method = "POST">
		<option value = "-1">Select Offspring Quantity:</option>
		<?php  
		
				$sql = "SELECT Quantity FROM offspring_quantity";
				$result = $conn->query($sql);
					 while($row = $result->fetch_assoc()) {  
						 echo '<option>' . $row['Quantity'] . '</option>';
				}
		?> 
		</select>		
		
		<button class="btn btn-primary">Find Now</button>

      </div> 
	  </form> 

    </div> 

    <div class="col-lg-9 col-sm-8" id = "SpecieSearch">

<!-- pets --> 
				<?php
			
	$finalResult = '';	
	$sqlVariableGetAllSpecies = 'CALL find_all_species()'; 
	$stmt = $conn->prepare($sqlVariableGetAllSpecies);

	
	$stmt->execute();
	 $result = $stmt->get_result(); 
	 if($result->num_rows == null){
	 	$finalResult = "<h2>No results found<h2>";	
	 }
	 while ($row = $result->fetch_assoc()){
	 		$finalResult = $finalResult.'<div class="col-lg-4 col-sm-6">
												<div class="properties">
													<form action="specie-detail.php" method="POST">
														<h4>'.$row['Specie_Name'].' </h4>
														<h5>'.$row['Size_Name'].'</h5>
														<h5>'.$row['Habitat_Name'].'</h5> 
														<input class="form-control" type="text" style="display: none" readonly name="specie_name" value="'.$row['Specie_Name'].'"/> 
														<input class="form-control" type="text" style="display: none" readonly name="size_name" value="'.$row['Size_Name'].'"/> 
														<input class="form-control" type="text" style="display: none" readonly name="Habitat_name" value="'.$row['Habitat_Name'].'"/>
														<input class="form-control" type="text" style="display: none" readonly name="beak_name" value="'.$row['Beak_Name'].'"/>
														<input class="form-control" type="text" style="display: none" readonly name="color" value="'.$row['Color_Name'].'"/> 
														<input class="form-control" type="text" style="display: none" readonly name="quantity" value="'.$row['Quantity'].'"/> 
														<input class="form-control" type="text" style="display: none" readonly name="gender" value="'.$row['Gender_Name'].'"/>
														<input class="form-control" type="text" style="display: none" readonly name="family" value="'.$row['Family_Name'].'"/>
														<input class="form-control" type="text" style="display: none"  readonly name="suborder" value="'.$row['Sub_Order_Name'].'"/>
														<input class="form-control" type="text" style="display: none"  readonly name="order" value="'.$row['Order_Name'].'"/>
														<input class="form-control" type="text" style="display: none" readonly name="class" value="'.$row['Class_Name'].'"/> 
														<input class="form-control" type="text" style="display: none" readonly name="description" value="'.$row['Description'].'"/>
														<input type="submit" class="btn btn-primary" value="View Details"/>
													</form>
												</div>
										   </div>';
	 	}
	 	echo $finalResult;
	 	$conn->close();

		?>  

<!-- pets -->      
    </div>
  </div>
</div>
</div>

<script type="text/javascript">  
    /*Function to update the  pets  according to the options chosen 
	  AJAX function that calls pet_search_result.php */
	function searchSpecie()
	{     

		var Id1 = document.getElementById("Class");  
		var Class = Id1.options[Id1.selectedIndex].value;  

		var Id2 = document.getElementById('Order'); 
		var Order = Id2.options[Id2.selectedIndex].value; 
		
		var Id3= document.getElementById('Sub_Order'); 
		var suborder = Id3.options[Id3.selectedIndex].value;   
		
		var Id4 = document.getElementById('Family'); 
		var family = Id4.options[Id4.selectedIndex].value;  
		
		var Id5 = document.getElementById('Gender');
		var gender = Id5.options[Id5.selectedIndex].value;   
		
		var Id6 = document.getElementById('specie_combo');
		var specie = Id6.options[Id6.selectedIndex].value;   
		
		var Id7 = document.getElementById('size_combo'); 
		var size = Id7.options[Id7.selectedIndex].value;   
		
		var Id8 = document.getElementById('Habitat_combo'); 
		var habitat = Id8.options[Id8.selectedIndex].value;  
		
		var Id9 = document.getElementById('Beak_combo'); 
		var beak = Id9.options[Id9.selectedIndex].value;  
		
		var Id10 = document.getElementById('Color_combo'); 
		var color = Id10.options[Id10.selectedIndex].value;
		
		var Id11 = document.getElementById('offSpring_combo'); 
		var offspring = Id11.options[Id11.selectedIndex].value;
	
		var xmlhttp;
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		 xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("SpecieSearch").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","specie_search_results.php?Class=" + Class + "&Order=" + Order + "&suborder=" + suborder + "&family=" + family + "&gender=" + gender + "&specie=" + specie + "&size=" + size + "&habitat=" + habitat + "&beak=" + beak + "&color=" + color + "&offspring=" + offspring, true);
		xmlhttp.send();
	} 
function updateBreed(){
		var xmlhttp;
		var Id = document.getElementById( "pet_type_combo");
        var selectedOption = Id.options[Id.selectedIndex].value;    
		
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		 xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("breeds").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","pet_breed_combo_search.php?selectedOption=" + selectedOption ,true);
		xmlhttp.send();  
} 

function month(){
	
		var Id1 = document.getElementById("consultMonths");  
		var month = Id1.options[Id1.selectedIndex].value;  		
	var xmlhttp;
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		 xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("petSearch").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","monthSearch.php?month=" + month, true);
		xmlhttp.send();
} 	
</script>
<?php include'footer.php';?>