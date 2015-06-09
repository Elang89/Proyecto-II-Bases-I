<?php include'header.php';?>
<!-- banner -->

<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="userIndex.php">Home</a> / User Profile</span>
    <h2>User Profile</h2>
  </div>
</div>
<!-- banner -->
<script src="JavaScript/insertImage.js"></script>
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
        <h2>User Details</h2>
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
                    <img src="images/Birds/one.jpg" class="properties" alt="properties" />
                  </div>
                  <!-- #Item 1 -->
                  <!-- Item 2 -->
                  <div class="item">
                    <img src="images/Birds/two.jpg" class="properties" alt="properties" />
                    
                  </div>
                  <!-- #Item 2 -->
                  <!-- Item 3 -->
                  <div class="item">
                    <img src="images/Birds/eight.jpg" class="properties" alt="properties" />
                  </div>
                  <!-- #Item 3 -->
                  <!-- Item 4 -->
                  <div class="item ">
                   <img src="images/Birds/three.jpg" class="properties" alt="properties" />
                    
                  </div>
                  <!-- # Item 4 -->
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
              </div>
              <!-- #Slider Ends -->
            </div>
			<div class="spacer"><h4><span class="glyphicon glyphicon-star"></span>Username</h4>
				<input id="username" type="text" class="form-control" name="form_name" maxlength="20" readonly value="<?php echo $username?>">
				<input id="user-type" type="text" class="form-control" name="form_name" maxlength="20" readonly value="<?php echo $expert?>">
			</div>
			<div class="col-lg-6 col-sm-6">
				<div class="spacer"><h4><span class="glyphicon glyphicon-asterisk"></span>Contact Details</h4>
					<input id="user_first_name" type="text" class="form-control" name="form_name" maxlength="20" readonly value="<?php echo $firstName;?>">
					<input id="user_first_lastname" type="text" class="form-control" name="form_name" maxlength="16" readonly value="<?php echo $lastName;?>">
					<input id="user_email" type="text" class="form-control" name="form_email" maxlength="30" readonly value="<?php echo $primaryEmail;?>">
				</div>
			</div>
			<div class="col-lg-6 col-sm-6">
				<div class="spacer"><h4><span class="glyphicon glyphicon-th"></span>Images</h4>
					<select id="species" class="form-control" name="species selection">
						<option value="-1"> Select A Species</option>
						<?php  
							$conn = new mysqli('localhost','DBadmin','dbadmin','BirdDatabase');
					
							if ($conn->connect_error) {
								die("Connection failed: " . $conn->connect_error); 
								echo "-1"; 
								return false; 
							}  
							$sql = "SELECT Species_Found_Name FROM Species_Found";
							$result = $conn->query($sql);
								 while($row = $result->fetch_assoc()) {  
									 echo '<option>' . $row['Species_Found_Name'] . '</option>';
							}
						?>  
					</select>
					<input id="name" type="text" class="form-control" name="image name" placeholder="Image Name"/>
					<input id="location" type="text" class="form-control" name="location" placeholder="Image Location"/>
					<input id="image" type="input" class="form-control" name="image upload" placeholder="Place your URL here"/>
					<button id="upload image" type="button" class="btn btn-primary">Upload Image</button>
				</div>
				<div col-lg-6 col-sm-6>
						<button id="view gallery" type="button" class="btn btn-primary" onclick="window.location.href='gallery.php'">View Gallery</button>
				</div>
		 </div>
		 </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
<?php include'footer.php';?>