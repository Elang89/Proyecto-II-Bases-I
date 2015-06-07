<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="userIndex.php">Home</a> / Specie Profile</span>
    <h2>Specie Profile</h2>
  </div>
</div>

		<?php  		
		$specie = $_POST['specie_name'];   
		$size = $_POST['size_name']; 
		$habitat = $_POST['Habitat_name']; 
		$beak = $_POST['beak_name']; 
		$color = $_POST['color']; 
		$quantity = $_POST['quantity']; 
		$gender = $_POST['gender'];  
		$family = $_POST['family']; 
		$suborder = $_POST['suborder']; 
		$order = $_POST['order'];  
		$class = $_POST['class']; 
		$description = $_POST['description']; 
		?> 
<!-- banner -->
<div class="container">
  <div class="properties-listing spacer">
    <div class="row">
      <div class="col-lg-3 col-sm-4 hidden-xs">
        <div class="hot-properties hidden-xs">
          <div class="row">
            <div class="col-lg-4 col-sm-5"><img src="images/Birds/Tucan2.jpg" class="img-responsive img-circle" alt="properties"/></div>
            <div class="col-lg-8 col-sm-7">
              <h5>Toucan</h5>
              <p class="text"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4 col-sm-5"><img src="images/Birds/lechuza-1.jpg" class="img-responsive img-circle" alt="properties"/></div>
            <div class="col-lg-8 col-sm-7">
              <h5>Owl</h5>
              <p class="text"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4 col-sm-5"><img src="images/Birds/Trogones.jpg" class="img-responsive img-circle" alt="properties"/></div>
            <div class="col-lg-8 col-sm-7">
              <h5>Trogon</h5>
              <p class="text"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4 col-sm-5"><img src="images/Birds/colobri2.jpg" class="img-responsive img-circle" alt="properties"/></div>
            <div class="col-lg-8 col-sm-7">
              <h5>Hummingbird</h5>
              <p class="text"></p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-9 col-sm-8 ">
        <h2>Pet Details</h2>
        <div class="row">
          <div class="col-lg-8">
            <div class="property-images">
              <!-- Slider Starts -->
              <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators hidden-xs">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1" class=""></li>
                  <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                  <li data-target="#myCarousel" data-slide-to="3" class=""></li>
                </ol>
                <div class="carousel-inner">
                  <!-- Item 1 -->
                  <div class="item active">
                    <img src="images/Birds/Tucan.jpg" class="properties" alt="properties" />
                  </div>
                  <!-- #Item 1 -->
                  <!-- Item 2 -->
                  <div class="item">
                    <img src="images/Birds/Background.jpg" class="properties" alt="properties" />
                    
                  </div>
                  <!-- #Item 2 -->
                  <!-- Item 3 -->
                  <div class="item">
                    <img src="images/Birds/colibri.jpg" class="properties" alt="properties" />
                  </div>
                  <!-- #Item 3 -->
                  <!-- Item 4 -->
                  <div class="item ">
                    <img src="images/Birds/Trogon.jpg" class="properties" alt="properties" />
                    
                  </div>
                  <!-- # Item 4 -->
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
              </div>
              <!-- #Slider Ends -->
            </div>
			<div class="spacer"><h4><span class="glyphicon glyphicon-star"></span><?php echo $petName?></h4>
				<div class="col-lg-6 col-sm-6">
					<legend>Profile Picture</legend>
					<img src="<?php echo $path ?>" class="img-responsive img-circle" alt="properties"/>
				</div>
					<input id="username" type="text" class="form-control" name="form_name" maxlength="20" readonly value="<?php echo $petName?>">
			</div>
			<div class="col-lg-6 col-sm-6">
				<div class="spacer"><h4><span class="glyphicon glyphicon-asterisk"></span>More Information</h4> 
					<h5>Type of Species</h5>
					<input id="specie" type="text" class="form-control" name="specie" maxlength="16" readonly value="<?php echo $specie;?>">				
					<h5>Size</h5>
					<input id="size" type="text" class="form-control" name="size" maxlength="16" readonly value="<?php echo $size;?>">
					<h5> Habitat</h5>
					<input id="habitat" type="text" class="form-control" name="habitat" maxlength="16" readonly value="<?php echo $habitat;?>"> 
					<h5>Type of Beak</h5>
					<input id="beak" type="text" class="form-control" name="beak" maxlength="30" readonly value="<?php echo $beak;?>"> 
					<h5>Color</h5>
					<input id="color" type="text" class="form-control" name="color" maxlength="8" readonly value="<?php echo $color;?>">  
					<h5>Quantity</h5>
					<input id="quantity type="text" class="form-control" name="quantity" maxlength="30" readonly value="<?php echo $quantity;?>"> 
					<form action="applicationForm.php" method="POST">
						<!--  <input id="EDIT" type="button" class="btn btn-success" onClick = "" value = "Edit" /> If its OWNER OF THE PET -->
				   </form>
				</div>
			</div> 
			
			<div class="col-lg-6 col-sm-6">
				<div class="spacer"><h4><span ></span></h4>
					<h5>Gender</h5>
					<input id="gender" type="text" class="form-control" name="gender" maxlength="30" readonly value="<?php echo $gender;?>">
					<h5>Family</h5>					
					<input id="family" type="text" class="form-control" name="family" maxlength="30" readonly value="<?php echo $family;?>">
					<h5>Sub-Order</h5>	
					<input id="suborder" type="text" class="form-control" name="suborder" maxlength="8" readonly value="<?php echo $suborder;?>">
					<h5>Order</h5>
					<input id="order" type="text" class="form-control" name="order" maxlength="8" readonly value="<?php echo $order;?>">
					<h5>Class</h5>
					<input id="class" type="text" class="form-control" name="class" maxlength="8" readonly value="<?php echo $class;?>">
					<h5>Description</h5> 
					<input id="description" type="text" class="form-control" name="description" maxlength="8" readonly value="<?php echo $description;?>">
				</div>
		 </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
<?php include'footer.php';?>