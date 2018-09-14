<?php
require("dbconnect.php");
$conn = mysqli_connect($server, $uname, $pass, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$route_no=$_POST['route_no'];
$from=$_POST['from'];
$to=$_POST['to'];
$distance=$_POST['distance'];
$time=$_POST['time'];
$time+="Min.";

$sql = "SELECT DISTINCT route_no FROM routes WHERE route_no LIKE '%" . $_POST["route_no"] . "%' ";


$res=mysqli_query($conn,$sql);

if ($res->num_rows > 0) {

$sql1="UPDATE routes SET fromPlace='$from', toPlace='$to', distance='$distance', time='$time' WHERE route_no='$route_no'";
$res1=mysqli_query($conn,$sql1);

echo "<div class='jumbotron'><h1>Successfully Updated Routes Database</h1></div>";
}else
{

	$sql2="INSERT INTO routes (route_no,distance,fromPlace,toPlace,time) VALUES ('$route_no','$distance','$from','$to','$time')";
	$res2=mysqli_query($conn,$sql2);	
	
	 
if (!$res2)
  {
  die('Error: ' . mysql_error());
  echo "<div class='jumbotron'><h1>Failed to Insert Record into Routes Database</h1></div>";
  }else{
	
	echo "<div class='jumbotron'><h1>Successfully Updated Routes Database</h1></div>";
	}


}

?>