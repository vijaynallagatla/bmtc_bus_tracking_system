<!DOCTYPE html>
<html>
<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Control Panel</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="bootstrap.min.css" rel="stylesheet">
		<script src="jquery.min.js"></script>
		<script src="bootstrap.min.js"></script>
	
		<link href="styles.css" rel="stylesheet">
		<style>
			input,button{
				margin-top:10px;
			}
		</style>
		<script>
		function selectBusroute(val) {
$("#search").val(val);
$("#search-suggest").hide();
}
$(document).ready(function(){
	$("#busstop").keyup(function(){
		$.ajax({
		type: "POST",
		url: "getbusstop.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#busstop").css("background","#FFF url(LoaderIcon.gif) no-repeat 240px");
		},
		success: function(data){
			$("#place-suggest").show();
			$("#place-suggest").html(data);
			$("#busstop").css("background","#FFF");
		}
		});
	});
});

function selectBusstop(val) {
$("#busstop").val(val);
$("#place-suggest").hide();
}
		</script>
		
	</head>
<body>
<div class="col-md-2">
			  <div class="well">Bus Stop details </div>
              <form action="updatebusstop.php" method="post">
				<input type="text" id="busstop" class="form-control" placeholder="Name of the bus stop" name="name"/>
				<div id="place-suggest" style="position:absolute;background-color:white;"></div>
				<input type="text" class="form-control" placeholder="Latitude of the place" name="lat"/>
				<input type="text" class="form-control" placeholder="Longitude of the place" name="lon"/>
				
				<button type="submit" class="btn btn-info">Submit</button>
			  </form>
              <hr>
              
              
          	</div><!--/col-->
			
			
</body>
</html>