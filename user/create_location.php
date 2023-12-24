<?php

 require_once("include/connection.php");
   
   if(isset($_POST['reglocation'])){    
        
        $branch = mysqli_real_escape_string($conn,$_POST['branch']);
        $location_address = mysqli_real_escape_string($conn,$_POST['location_address']);
		$conn->query("INSERT INTO location VALUES('','$location_address','$branch')") or die(mysqli_error());
			echo '
				<script type = "text/javascript">
					alert("New location save!");window.location = "view_location.php";
				</script>
			';
		}

 ?>