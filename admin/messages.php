<!DOCTYPE html>
<html>
<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Bootstrap 3 Control Panel</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="bootstrap.min.css" rel="stylesheet">
		<script src="jquery.min.js"></script>
		<script src="bootstrap.min.js"></script>
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="styles.css" rel="stylesheet">
	</head>
<body>
<div class="col-md-7">
			  <div class="well">Number of Visitors <span class="badge pull-right"><?php 
			  require("dbconnect.php");

$conn = mysqli_connect($server, $uname, $pass, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT visitor_count from visitors where id='1'";


$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);
$count=$row['visitor_count'];

echo $count;

?>          
          	</div><!--/col-->
<div class="col-md-7">
			  <div class="well">Messages Inbox <span class="badge pull-right"><?php 
			  require("dbconnect.php");

$conn = mysqli_connect($server, $uname, $pass, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT count(*) from persons";


$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);
$count=$row[0];
echo $count;
echo "</div>";

	?>
		<div class="container">
           
            <div class="row">
                <table class="table table-stripped table-bordered">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email </th>
                      <th>Phone </th>
					  <th>Message </th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php
				  
						$sql1="SELECT * FROM persons";
								$res1=mysqli_query($conn,$sql1);
							if($res->num_rows>0){
								while($row=mysqli_fetch_array($res1)){
					    echo '<tr>';
                            echo '<td>'. $row['name'] . '</td>';
                            echo '<td>'. $row['email'] . '</td>';
                            echo '<td>'. $row['phone'] . '</td>';
							echo '<td width=250>';
							 echo '<a class="btn btn-success" href="read.php?id='.$row['id'].'">Read</a>';
                                echo ' ';
							 echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
                                echo '</td>';
                            echo '</tr>';
							

				  
				  	}
					}else{
							echo "No messages";
									}
				  ?>
<?php


?>          
          	<!--/col-->
			
			
</body>
</html>