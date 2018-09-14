<?php
require("dbconnect.php");
$conn = mysqli_connect($server, $uname, $pass, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$str = $_POST["route"];

$sql="SELECT lat,lng from gps where route_no LIKE '$str'";
$res=mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($res)){

$list=array('lat'=>$row["lat"],'lon'=>$row["lng"]);

$c=json_encode($list);
 
 echo $c;
 }


?>