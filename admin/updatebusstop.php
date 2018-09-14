<?php
require("dbconnect.php");
$conn = mysqli_connect($server, $uname, $pass, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$name=$_POST['name'];
$lat=$_POST['lat'];
$lon=$_POST['lon'];


$sql = "SELECT DISTINCT name FROM busstop WHERE name LIKE '%" . $_POST["name"] . "%' ";


$res=mysqli_query($conn,$sql);

if ($res->num_rows > 0) {

$sql1="UPDATE busstop lat='$lat' lon='$lon' WHERE name='$name'";
$res1=mysqli_query($conn,$sql1);

echo "<div class='jumbotron'><h1>Successfully Updated Routes Database</h1></div>";
}else
{

	$sql2="INSERT INTO busstop (name,lat,lon) VALUES ('$name','$lat','$lon')";
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