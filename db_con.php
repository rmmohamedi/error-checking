<?php 
$connection = mysqli_connect("localhost","root",""); 
if (!$connection) { 
	die('Could not connect to MySQL: ' . mysqli_error()); 
} 
echo 'Connection OK'; 
$db=mysqli_select_db($connection,'tasaf-bmis');
if(!$db){
die("Database not selected");}
?> 