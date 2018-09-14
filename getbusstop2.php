<?php
require("dbconnect.php");
$conn = mysqli_connect($server, $uname, $pass, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT DISTINCT busstop FROM bus_route WHERE busstop LIKE '%" . $_POST["keyword"] . "%' ORDER BY busstop LIMIT 0,4";


$res=mysqli_query($conn,$sql);

    // output data of each row
	
    ?>  

<table class="table table-stripped table-hover">
<?php
$i=0;
    while($row = mysqli_fetch_array($res)) {
?>
<tr>
<td onClick="selectBusstopTo('<?php echo $row["busstop"]; ?>');"><?php echo $row["busstop"]; ?></td></tr>
<?php } ?>
</table><?php  mysqli_close($conn); ?>
	 


