
<?php

 	require_once("include/connection.php");
	$id = mysqli_real_escape_string($conn,$_GET['id']);
	mysqli_query($conn,"DELETE FROM admin_login WHERE id='$id'")or die(mysql_error());

?>