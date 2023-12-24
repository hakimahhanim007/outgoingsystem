
<?php
 	require_once("include/connection.php");
	$id = mysqli_real_escape_string($conn,$_GET['id']);
	mysqli_query($conn,"DELETE FROM  login_user WHERE id='$id'")or die(mysql_error());
	echo "<script type='text/javascript'>alert('User Deleted!');document.location='view_user.php'</script>";
?>
