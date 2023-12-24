<?php

 require_once("include/connection.php");
   
   if(isset($_POST['reglocation'])){
        
        $location_address = mysqli_real_escape_string($conn,$_POST['location_address']);
        $branch = mysqli_real_escape_string($conn,$_POST['branch']);

        $query=mysqli_query($conn,"SELECT * FROM location WHERE location_address = '$location_address'")or die(mysqli_error($conn));
           $counter=mysqli_num_rows($query);

        	if ($counter == 1) 
        	{
        		echo '
                <script type = "text/javascript">
                    alert("Location already exist");
                    window.location = "view_location.php";
                </script>


               ';
        	}

        	else
        	{

        		$conn->query("INSERT INTO `location` VALUES('','$location_address' , '$branch')") or die(mysqli_error());
			echo '
				<script type = "text/javascript">
					alert("You have successful add new location ");window.location = "view_location.php";
				</script>
			';


        	}

      	




		}

 ?>