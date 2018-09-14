<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Bootstrap 3 Control Panel</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
	</head>
	<body>
<?php
require("dbconnect.php");

$conn = mysqli_connect($server, $uname, $pass, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id=$_REQUEST['id'];

$sql="SELECT * FROM persons WHERE id='$id'";
$res=mysqli_query($conn,$sql);

if($res->num_rows>0){
	while($row=mysqli_fetch_array($res)){
		
		echo "<div class='container'><div class='jumbotron'><h3>".$row['name']."</h3><br/><h4>".$row['mess']."</h4></div></div>";
	}

} else{
echo "<div class='container'><div class='jumbotron'><h3>Oops No Records</h3></div></div>";
}

?>
