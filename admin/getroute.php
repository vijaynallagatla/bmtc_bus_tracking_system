<?php
require("dbconnect.php");

$conn = mysqli_connect($server, $uname, $pass, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT DISTINCT route_no FROM routes WHERE route_no LIKE '%" . $_POST["keyword"] . "%' ORDER BY route_no LIMIT 0,4";


$res=mysqli_query($conn,$sql);

    // output data of each row
	
    ?>  
<table class="table table-stripped table-hover" style="width:100%">
<?php
$i=0;
    while($row = mysqli_fetch_array($res)) {
?>
<tr>
<td onClick="selectBusroute('<?php echo $row["route_no"]; ?>');"><?php echo $row["route_no"]; ?></td></tr>
<?php } ?>
</table>
<?php  mysqli_close($conn); ?>
	 

