<!-- Created by Miuyin 5/24/2015--> 
<!-- This is a php to manage all the administrative categories needed when a user wants to register a pet --> 

<?php include'header.php';?> 

<!-- banner -->
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="index.php">Home</a> / Manage catalog</span>
    <h2>Manage catalog</h2>
  </div>
</div> 
<!-- banner --> 

  
<div class="">
  <div class="container">
    <div class="properties-listing spacer">
      <div class="row">
        <div class="col-lg-3 col-sm-4">
          <div class="search-form">
            <div class="row">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-8">
                    <h4><span class="glyphicon glyphicon-th"></span>Select a category</h4>
                  </div>
                  <div class="col-lg-4"> 
                  </div>
                </div> 
                <div class="row">
                  <div class="col-lg-12">
                    <select id = "consultFacts"  name = "consultFacts" onchange = "update();" class="form-control"> 
                      <optgroup label="Categories">
                        <optgroup label="Taxonomy">
                          <option>Class</option>
                          <option>Order</option>
                          <option>Sub-Order</option>
                          <option>Family</option>
                          <option>Genera</option>
                          <option>Species</option>
                        </optgroup>
                        <optgroup label="Species Characteristics">
                          <option>Color</option>
                          <option>Habitat</option>
						   <option>Offspring Quantity</option>
						  <option>Beak Type</option> 
						  <option>Size</option>   						  
                        </optgroup> 
                      </optgroup>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-9 col-sm-8">
          <div class="row">
            <div class="col-lg-12 col-sm-12">
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-sm-12">
              <div class="category-list" id = "categoryList"> 
                <form  id = "Options">  
				 <div class="col-" class="text">Class Options</div>

			<?php

					// Create connection
					$conn = new mysqli('localhost','DBadmin','dbadmin','BirdDatabase');
					// Check connection
					if ($conn->connect_error) {
						 die("Connection failed: " . $conn->connect_error); 
						 echo "-1"; 
						 return false; 
					} 

					$sql = "SELECT * FROM Class";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
									 // output data of each row
									 while($row = $result->fetch_assoc()) {
										 echo "<label>{$row['Class_Name']}</label><input  type = 'radio'  name = 'radio' id = '{$row['Class_Id']}'  value = '{$row['Class_Name']}'/><br /> "  ; 	
									 }
								} else {
									 echo "0 results";
								} 
					
					$conn->close();
					?>
				</form> 
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-sm-12">
             <div class="col-lg-3"><a class="btn btn-primary" data-toggle="modal" data-target="#editCategory">EDIT</a></div> 
                <ul class="pull-right">   
                  <li><button id="delete" class="btn btn-info" data-toggle="modal" data-target="#create_button">NEW!</button></li> <!-- Actual login is in footer.php -->
                </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
  
   <script type="text/javascript">  
    /*Function to update the options to selected according to the option selected 
	  AJAX function that calls settings.php and sends the text of the selected option as text as selectedOption*/
	function update()
	{ 
		var xmlhttp;
		var Id = document.getElementById("consultFacts");
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
			document.getElementById("Options").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","updateOptions.php?selectedOption=" + selectedOption ,true);
		xmlhttp.send();
	}

	
	function checked(){   
	    /*Function to delete  to the option selected 
          calls delete.php and sends the text of the selected option as text as selectedOption*/
			var Id = document.getElementById("consultFacts");
			var selectedOption = Id.options[Id.selectedIndex].value;
			var length = document.getElementById("Options").length; 
			for(var i = 0;  i < 1000 ; i++){ 
				if(document.getElementById(i) != null){
					if(document.getElementById(i).checked){
						var selectedId = i; 
						var selectedValue = document.getElementById(i).value; 
					} 
				}
			}  
		alert(selectedId); 
		window.location.href = "http://localhost/project/delete.php?selectedId=" + selectedId + "&selectedOption=" + selectedOption;
	} 
	
			function edit(){   
			var Id = document.getElementById("consultFacts");
			var selectedOption = Id.options[Id.selectedIndex].value;
			var length = document.getElementById("Options").length; 
			var newName = document.getElementById("inputNewName").value; 
			for(var i = 0;  i < 1000; i++){ 
				if(document.getElementById(i) != null){
					if(document.getElementById(i).checked){           //Este ciclo no funciona porque los id pueden ser mayores q el len
						var selectedId = i; 
						var selectedValue = document.getElementById(i).value; 
					} 
				}
			}   
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
			document.getElementById("categoryList").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","EditCatalog.php?selectedId=" + selectedId + "&selectedOption=" + selectedOption +  "&newName=" + newName ,true);
		xmlhttp.send();  
		alert("Congratulation, the edit was successful !  :)");
		window.location = "manage-catalog.php"; 
		}  
		
	
		function newBreedSelected(){   
		var Id = document.getElementById("newCategory");
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
			document.getElementById("NuevoCampoType").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","new_catalog_name.php?selectedOption=" + selectedOption ,true);
		xmlhttp.send();
		}    
		
	    function newName(){  
	
		var Id = document.getElementById("newCategory");
        var selectedOption = Id.options[Id.selectedIndex].value;   
		var newNameText = document.getElementById("new_name").value; 
		var selectedType = "none";  
	    
		
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
				document.getElementById("Options").innerHTML=xmlhttp.responseText; 

			}
		  }  
		  
		if(selectedOption == "Order" || selectedOption == "Sub-Order" || selectedOption == "Family" || selectedOption == "Genera"){ 
		    var selectedType = document.getElementById("Other").value;   
			xmlhttp.open("GET","Inserts.php?selectedOption=" + selectedOption + "&newNameText=" + newNameText + "&selectedType=" +selectedType ,true);
		}  
		
		else if(selectedOption == "Species"){  
			window.location = "register-catalog-specie.php"; 
		}
		
		else{
			xmlhttp.open("GET","Inserts.php?selectedOption=" + selectedOption + "&newNameText=" + newNameText + "&selectedType=" +selectedType ,true);
		}
	
		xmlhttp.send(); 
		alert("Congratulation, the insertion was successful !  :)");	 
		window.location = "manage-catalog.php";
		} 
  </script>   

  
    
  <!-- Modal  To Edit--> 
   <form enctype="multipart/form-data" action="javascript:edit();" method="POST" class="edit-form" id="edit-form">
  <div id="editCategory" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content" id = "editResult">
        <div class="row">
          <div class="col-sm-6 login">
            <h4>Edit</h4>
            <form class="" role="form">
              <div class="form-group">
                <label class="sr-only" for="inputUsername">Category</label>
                <input id="inputNewName" type="text" class="form-control"  name = "inputNewName" placeholder= "Enter new name" required> 
              </div>
			  <input type="submit" value="Edit Name" class="boton">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>  
  </form>
  <!-- /.modal To Edit -->  
  
  
   <!-- Modal to create new options to register --> 
  <form enctype="multipart/form-data" action="javascript:newName();" method="POST" class="settings-form" id="settings-form">
  <div id="create_button" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="row">
          <div class="col-sm-8 login" id = "AllNew">
            <h2>Create New</h2>
            <form class="" role="form">
              <div class="row">
                  <div class="col-lg-12" id= "newOptions">
                    <select id = "newCategory"  name = "newCategory" onchange = "newBreedSelected();" class="form-control" > 
                      <optgroup label="Categories">
                        <optgroup label="Taxonomy">
                          <option>Class</option>
                          <option>Order</option>
                          <option>Sub-Order</option>
                          <option>Family</option>
                          <option>Genera</option>
                          <option>Species</option>
                        </optgroup>
                        <optgroup label="Species Characteristics">
                          <option>Color</option>
                          <option>Habitat</option>
						   <option>Offspring Quantity</option>
						  <option>Beak Type</option> 
						  <option>Size</option>   						  
                        </optgroup> 
                      </optgroup>
                    </select>
                  </div>
                </div>
              <div class="form-group">  
				<div class="form-group" id = "NuevoCampoType">   
				</div>
                <label class="sr-only" for="inputPassword">Name</label>
                <input id="new_name" type="text" class="form-control" name = "new_name" placeholder="Enter new name" required >
              </div>
              <input type="submit" class="btn btn-info" value="Create New" class="boton"> 
            </form>
          </div>
        </div>
      </div>
    </div>
  </div> 
  </form>
 <!-- Modal to create new options to register --> 
  <?php include'footer.php';?>