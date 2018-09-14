<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Bootstrap 3 Control Panel</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="styles.css" rel="stylesheet">
	</head>
	<body>
<!-- Header -->
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-toggle"></span>
      </button>
      <a class="navbar-brand" href="#">Control Panel</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
          <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#">
            Admin <span class="caret"></span></a>
          <ul id="g-account-menu" class="dropdown-menu" role="menu">
            <li><a href="#">My Profile</a></li>
            <li><a href="logout.php"> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div><!-- /container -->
</div>
<!-- /Header -->

<!-- Main -->
<div class="container">
  
  <!-- upper section -->
  <div class="row">
	<div class="col-sm-3">
      <!-- left -->
      <h3>Operations</h3>
      <hr>
      
      <ul class="nav nav-stacked">
        <li><a href="messages.php" target="frame"> Home </a></li>
        <li><a href="bus_details.php" target="frame"> Bus Details</a></li>
        <li><a href="busstops.php" target="frame"> BusStops</a></li>
        <li><a href="gpsdatabase.php" target="frame"> GPS Database</a></li>
        <li><a href="images.php" target="frame"> News and Updates</a></li>

      </ul>
      
      <hr>
      
  	</div><!-- /span-3 -->
      	
      <!-- column 2 -->	
       <h3>BMTC GPS Tracking</h3>  
            
       <hr>
      
	   <div class="row">
            <!-- center left-->	
         	<iframe src="messages.php" name="frame" style="border:none" width="70%" height="500px"></iframe>
         </div>
            <!--center-right-->
        


  
	<!-- script references -->
		<script src="jquery.min.js"></script>
		<script src="bootstrap.min.js"></script>
	</body>
</html>