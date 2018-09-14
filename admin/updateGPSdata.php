<?php
require("dbconnect.php");
$conn = mysqli_connect($server, $uname, $pass, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$route_no=$_POST['route_no'];
$address=$_POST['address'];
$lat=$_POST['lat'];
$lon=$_POST['lon'];

$sql = "SELECT DISTINCT route_no FROM gps WHERE route_no = '$route_no' ";


$res=mysqli_query($conn,$sql);

if ($res->num_rows > 0) {

$sql1="UPDATE gps SET address='$address', lat='$lat', lng='$lon' WHERE route_no='$route_no'";
$res1=mysqli_query($conn,$sql1);
if (!$res1)
  {
  die('Error: ' . mysql_error());
  echo "<div class='jumbotron'><h1>Failed to Update Record into Routes Database</h1></div>";
  }else{
	echo "<div class='jumbotron'><h1>Successfully Updated gps Database</h1></div>";

	}


}else
{

	$sql2="INSERT INTO gps (route_no,address,lat,lng) VALUES ('$route_no','$address','$lat','$lon')";
	$res2=mysqli_query($conn,$sql2);	
	
	 
if (!$res2)
  {
  die('Error: ' . mysql_error());
  echo "<div class='jumbotron'><h1>Failed to Insert Record into Routes Database</h1></div>";
  }else{
	
	echo "<div class='jumbotron'><h1>Successfully Inserted into gps Database</h1></div>";
	}


}

?>