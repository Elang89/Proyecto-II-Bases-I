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

		
		
		<button class="btn btn-primary">Find Now</button>

      </div> 
	  </form> 

    </div> 

    <div class="col-lg-9 col-sm-8" id = "SpecieSearch">

<!-- pets --> 
<?php
			
	$finalResult = '';	
	$sqlVariableGetAllSpecies = 'CALL image_retrieve_specie_images(-1)'; 
	$stmt = $conn->prepare($sqlVariableGetAllSpecies);

	
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
													<div class="image-holder"><img src="'.$row['Image'].'"class="img-responsive" alt="properties"/></div>
													<input class="form-control" type="text" style="display: none" readonly name="p_id" value="'.$row['User_Id'].'"/>
													<input class="form-control" type="text" style="display: none" readonly name="username" value="'.$row['Image'].'"/>
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
		var Id6 = document.getElementById('specie_combo');
		var specie = Id6.options[Id6.selectedIndex].value;   
	
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
		xmlhttp.open("GET","specie_image_results.php?specie=" + specie, true);
		xmlhttp.send();
	} 

</script>
<?php include'footer.php';?>