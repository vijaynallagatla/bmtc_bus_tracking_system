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
		<style>
			input,button{
				margin-top:10px;
			}
		</style>
	</head>
<script>

</script>
</head>
<body>
<?php

$handle = opendir(dirname(realpath(__FILE__)).'/img/');
        while($file = readdir($handle)){
            if($file !== '.' && $file !== '..'){
                echo '<div class="container" style="float:left"><img src="img/'.$file.'" border="0" style="min-width:200px;min-height:200px;max-width:200px;max-height:200px;margin:5px;" />';
				echo '<input type="submit" onclick="delete()" class="btn btn-info" name="'.$file.'" id="'.$file.'" style="position:relative;float:bottom;" value="Delete"/></div>';
            }
        }
?>

</body>
</html>