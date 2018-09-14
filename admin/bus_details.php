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
//To select country name
function selectBusroute(val) {
$("#search").val(val);
$("#search-suggest").hide();
}
		</script>
	</head>
<body>
<div class="col-md-2">
			  <div class="well">Bus details </div>
			  
              <form action="updateroutes.php" method="post">
			  <div style="position:left;">
			  <input type="text" class="form-control" placeholder="Search for route_no" id="search" name="route_no" style="display:inline;" /><div id="search-suggest" style="position:absolute;width:100%"></div>
			  <div id="search-result" ></div>
			  </div>
				<input type="text" class="form-control" placeholder="From Bus stop Location" name="from"/>
				<input type="text" class="form-control" placeholder="To Bus stop Location" name="to"/>
				<input type="text" class="form-control" placeholder="Distance from Source to Destination" name="distance"/>
				<input type="text" class="form-control" placeholder="Time takes to complete trip" name="time"/>
				<button type="submit" class="btn btn-info">Submit</button>
			  </form>
              <hr>
              
              
          	</div><!--/col-->
			
			
</body>
</html>