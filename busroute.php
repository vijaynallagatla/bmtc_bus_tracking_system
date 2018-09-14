<?php
require("dbconnect.php");

$conn = mysqli_connect($server, $uname, $pass, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$str = $_GET['route'];
	echo "<hr><center><input type='submit' style='float:left' class='btn btn-default btn-sm' onclick='busRoute()' style='display:inline;' value='Back' /><input type='submit' style='margin-left:-10px;' class='btn btn-info btn-sm' value='";echo $str; echo "' /><center>";
$sql1 = "SELECT * from bus_route where route_no='$str'";
$sql2 = "SELECT DISTINCT fromPlace,toPlace,distance from routes where route_no='$str'";
$res1 = mysqli_query($conn, $sql1);

$res3 = mysqli_query($conn, $sql2);

while($row = mysqli_fetch_assoc($res3)) {
		
		echo "<b><u><h5>From</b></u> : " ;
		echo $row["fromPlace"];
		echo "<br/>";
		echo "<b><u>To</b></u> : ";
		echo $row['toPlace'];
		echo "<br/>";
		echo "<b><u>Distance</b></u> : ";
		echo $row['distance'];
		echo "</h5>";
		
	}
 
	$i=1;
	echo "<h5><b><u>Bus Stops</u></b></h5>";
	echo "<table class='table table-stripped table-hover'>";
    while($row = mysqli_fetch_assoc($res1)) {
		echo "<tr><td>";
		echo $i;
		echo "</td><td>";
		echo $row['busstop'];
		echo "</td></tr>";
		$i++;
	}
	echo "</table>";
	mysqli_close($conn);

	

?>