<!DOCTYPE html>
<html lang="en">
<?php 
	session_start();
	
	if(isset($_SESSION['username'])){
		$username = $_SESSION['username'];
		$id = $_SESSION['id'];
		$firstName = $_SESSION['first_name'];
		$lastName = $_SESSION['last_name'];;
		$expert = $_SESSION['expert'];
		$primaryEmail = $_SESSION['email'];
	}
?>
  <head>
    <title>Birds</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/style.css"/>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.js"></script>
    <script src="assets/script.js"></script>
    <script src="JavaScript/login.js"></script>
    <script src="JavaScript/logout.js"></script>
   

    <!-- Owl stylesheet -->
    <link rel="stylesheet" href="assets/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/owl-carousel/owl.theme.css">
    <script src="assets/owl-carousel/owl.carousel.js"></script>
    <!-- Owl stylesheet -->
    <!-- slitslider -->
    <link rel="stylesheet" type="text/css" href="assets/slitslider/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/slitslider/css/custom.css" />
    <script type="text/javascript" src="assets/slitslider/js/modernizr.custom.79639.js"></script>
    <script type="text/javascript" src="assets/slitslider/js/jquery.ba-cond.min.js"></script>
    <script type="text/javascript" src="assets/slitslider/js/jquery.slitslider.js"></script>
    <!-- slitslider -->
  </head>
  <body>
    <!-- Header Starts -->
    <div class="navbar-wrapper">
      <div class="navbar-inverse" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
          </div>
          <!-- Nav Starts -->
          <div class="navbar-collapse  collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="index.php">Home</a></li>
              <li><a href="contact.php">Contact an admin</a></li>
              <li><a href="about.php">About</a></li>
            </ul>
          </div>
          <!-- #Nav Ends -->
        </div>
      </div>
    </div>
    <!-- #Header Starts -->
    <div class="container">
      <!-- Header Starts -->
      <div class="header">
        <ul class="pull-right">
          <!-- Public buttons -->
			  <li><button id="search_users" style="display:none" class="btn btn-info" onclick="window.location.href='search_users.php'">Find A User</button></li>
			  <li><button id="search_stuff" style="display:none" class="btn btn-info" onclick="window.location.href='search-specie.php'">Find A Species</button></li>  
			  <li><button id="search_gallery" style="display:none" class="btn btn-info" onclick="window.location.href='gallery_species.php'">Search Gallery</button></li>
			  <li><button id="daily registrations" style="display:none" class="btn btn-info" onclick="window.location.href='dailyregistrations.php'">Daily Registrations</button></li>
              <li><button id="stats" style="display:none" class="btn btn-info" onclick="window.location.href='Statistics.php'"> Statistics</button></li>
              <li><button id="my_account" style="display:none" class="btn btn-info" onclick="window.location.href='myAccount.php'">My account</button></li>
              <li><button id="catalog" style="display:none" class="btn btn-info" onclick="window.location.href='manage-catalog.php'">Manage Catalogs</button></li>
              <li><button id="my_registrations" style="display:none" class="btn btn-info" onclick="window.location.href='mySpecies.php'">My Registered Species</button></li> 
			  <li><button id="add" style="display:none" class="btn btn-info" onclick="window.location.href='register-specie.php'">Add A Species</button></li>
			  <li><button id="logout" style="display:none" id="logout" class="btn btn-info">Logout</button></li>
			  <li><button id="login"  class="btn btn-info" data-toggle="modal" data-target="#loginpop">Login</button></li>
			  <li><button id="register" class="btn btn-info" onclick="window.location.href='register.php'">Register</button></li>
        </ul>
        <!-- #Header Starts -->
      </div>
    </div>