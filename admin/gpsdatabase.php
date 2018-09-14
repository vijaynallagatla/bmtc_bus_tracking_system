<!DOCTYPE html>
<html>
<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Bootstrap 3 Control Panel</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="bootstrap.min.css" rel="stylesheet">
		<script src="jquery.min.js"></script>
		<script src="bootstrap.min.js"></script>
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="styles.css" rel="stylesheet">
		<style>
			input,button{
				margin-top:10px;
			}
		</style>
		<script>
$(document).ready(function(){
	$("#search").keyup(function(){
		$.ajax({
		type: "POST",
		url: "getroute.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search").css("background","#FFF url(LoaderIcon.gif) no-repeat 265px");
		},
		success: function(data){
			$("#search-suggest").show();
			$("#search-suggest").html(data);
			$("#search").css("background","#FFF");
		}
		});
	});
});

function selectBusroute(val) {
$("#search").val(val);
$("#search-suggest").hide();
}
		</script>
	</head>
<body>
<div class="col-md-2">
			  <div class="well">Bus route GPS Data</div>
              <form action="updateGPSdata.php" method="post">
				<input type="text" id="search" class="form-control" placeholder="Route Number" name="route_no"/>
				<div id="search-suggest" style="position:absolute;background-color:white;"></div>
				<input type="text" class="form-control" placeholder="Address" name="address"/>
				<input type="text" class="form-control" placeholder="Latitude " name="lat"/>
				<input type="text" class="form-control" placeholder="Longitude" name="lon"/>
				<button type="submit" class="btn btn-info">Submit</button>
			  </form>
              <hr>
              
              
          	</div><!--/col-->
			
			
</body>
</html>