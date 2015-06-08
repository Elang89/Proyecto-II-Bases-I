<?php include'header.php';?>
<!-- banner -->
<script src="JavaScript/userSearch.js"></script>
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="index.php">Home</a> / Find A User</span>
    <h2>Find A User</h2>
  </div>
</div>
<!-- banner -->
<div class="container">
  <div class="properties-listing spacer">
    <div class="row">
      <div class="col-lg-3 col-sm-4 ">
        <div class="search-form"><h4><span class=glyphicon glyphicon-search"></span>Search for a user</h4>
			<input id="search-parameter" type="text" class="form-control" placeholder="Find Username" required maxlength="45"/>
	        <button id="find-users" class="btn btn-primary">Find Now</button>
      	</div> 
    </div> 
		<div class="col-lg-9 col-sm-8" id = "user-search">
	     
	    </div>
  </div>
</div>
</div>
<?php include'footer.php';?>