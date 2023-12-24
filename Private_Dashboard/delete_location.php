
<?php
 	require_once("include/connection.php");
	$id_location = mysqli_real_escape_string($conn,$_GET['id_location']);
	mysqli_query($conn,"DELETE FROM location WHERE id_location ='$id_location'")or die(mysql_error());
	echo "<script type='text/javascript'>alert('Location Deleted!');document.location='view_location.php'</script>";
?>

