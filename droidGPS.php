<?php
require("dbconnect.php");

$conn = mysqli_connect($server, $uname, $pass, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$lat=$_POST["lat"];
$lon=$_POST["lon"];

$sql="UPDATE gps lat='12.87783399' , lon='77.58304871' WHERE route_no='215H'";
$res=mysqli_query($sql);
if($res)
{
echo "successfully updated GPS Location";
}
else
echo "Failed to Update Gps Location";

?>