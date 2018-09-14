<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['password'])){


?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>
	
</body>
</html>
<?php
 } else {
header("location:index.html");
}

?>