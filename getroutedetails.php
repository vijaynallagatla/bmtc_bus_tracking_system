<?php
require("dbconnect.php");

$conn = mysqli_connect($server, $uname, $pass, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$fromPlace = $_GET["from"];
$toPlace = $_GET["to"];

$del1 = "DELETE FROM temp1";
$del2 = "DELETE FROM temp2";
$sql = "SELECT DISTINCT route_no FROM bus_route WHERE busstop LIKE '%" . $fromPlace . "%' ";
$sql1 = "SELECT DISTINCT route_no FROM bus_route WHERE busstop LIKE '%" . $toPlace . "%' ";


$result4 = mysqli_query($conn, $del1);
$result5 = mysqli_query($conn, $del2);
$result = mysqli_query($conn, $sql);
$result1 = mysqli_query($conn, $sql1);

$sql2 = "INSERT INTO temp1 (route_no) $sql";
$sql3 = "INSERT INTO temp2 (route_no) $sql1";
$route = "SELECT a.route_no,b.route_no from temp1 a, temp2 b where a.route_no=b.route_no";

$result2 = mysqli_query($conn, $sql2);


$result3 = mysqli_query($conn, $sql3);
$route_no=mysqli_query($conn, $route);

    // output data of each row
	if ($route_no->num_rows > 0) {
	echo "<hr><center><h4>Bus Routes </h3></center><hr>";
    while($row = mysqli_fetch_array($route_no)) {
        print " <input type='submit'  onClick='showBusstop(this.value)' class='btn btn-info btn-xs' style='padding:5px;margin:3px' name='bus' value='".$row['route_no'] ."' />";
		
    }
	}else {	print "<h5 style='color:red'><b>Sorry!!! No Direct Buses available</b></h5>";
}

mysqli_close($conn);
?>