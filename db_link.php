<?php
$host="localhost";
$login="root";
$password = "";
$db_name= "course";
$link = mysqli_connect($host,$login,$password,$db_name) or die(mysqli_error($link));
mysqli_query($link,"SET NAME 'utf8'");
?>
