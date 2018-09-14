<?php

$handle = opendir(dirname(realpath(__FILE__)).'/img/');
        while($file = readdir($handle)){
            if($file !== '.' && $file !== '..'){
                echo '<img src="img/'.$file.'" border="0" />';
            }
        }
?>