<?php
require("dbconnect.php");

$conn = mysqli_connect($server, $uname, $pass, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name=$_GET['name'];
$email=$_GET['email'];

$phone=$_GET['phone'];

$message=$_GET['message'];
$sql = "INSERT INTO persons (name,email,phone,mess) VALUES('$name','$email','$phone','$message')";


$res=mysqli_query($conn,$sql);

if($res){
	echo "<h4>Message Sent</h4>";
}else{
	echo "<h4>Failed to send message</h4>";
}
    // output data of each row
	
?>  