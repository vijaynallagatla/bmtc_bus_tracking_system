<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['password'])){


?>
<!DOCTYPE html>
<html>
	<head>
		<script>
			  function busRoute() {
					var fromPlace = document.getElementById("search").value;
					var toPlace = document.getElementById("toPlace").value;
					if (window.XMLHttpRequest) {
							// code for IE7+, Firefox, Chrome, Opera, Safari
													xmlhttp = new XMLHttpRequest();
						} else {
            // code for IE6, IE5
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("busRoute").innerHTML = xmlhttp.responseText;
            }
        }
	 var queryString = "?from=" + fromPlace ;
		queryString +=  "&from=" + fromPlace + "&to=" + toPlace;
        xmlhttp.open("GET","getroutedetails.php"+queryString,true);
        xmlhttp.send();
    }
		</script>
	
	</head>
	<body>
		<form action="search_record.php" action="POST">
		<input type="search" name="search" />
		<select multiple>
  <option name="busstop" value="busstop">Bus stops</option>
  <option name="routes" value="routes">Routes</option>
  <option name="routestops" value="bus_routes">Route Stops</option>
  <option name="gps" value="gps">GPS Database</option>
</select>
		<input type="submit" value="Submit"/>
		</form>
		<div name="database"></div>
		
	</body>
</html>
<?php
}
else
{
header("location:index.html");
}
?>