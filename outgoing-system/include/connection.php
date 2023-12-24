<?php 
$conn = mysqli_connect("localhost","root","","file_management");

if(!$conn){
	die("Connection error: " . mysqli_connect_error());	
}

$db = mysqli_connect('localhost', 'root', '') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'file_management' ) or die(mysqli_error($db));
?>
