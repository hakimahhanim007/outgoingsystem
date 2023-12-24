<?php

 require_once("include/connection.php");
   
   if(isset($_POST['reguser'])){
    
        
         $user_name = mysqli_real_escape_string($conn,$_POST['name']);
         $email_address = mysqli_real_escape_string($conn,$_POST['email_address']);
         $user_password = password_hash($_POST['user_password'], PASSWORD_DEFAULT, array('cost' => 12));  //PASSWORD_ARGON2I//PASSWORD_ARGON2ID
         $user_status = mysqli_real_escape_string($conn,$_POST['user_status']);
         $staffid = mysqli_real_escape_string($conn,$_POST['staffid']);
         $department = mysqli_real_escape_string($conn,$_POST['department']);
         $position = mysqli_real_escape_string($conn,$_POST['position']);

			$q_checkadmin = $conn->query("SELECT * FROM `login_user` WHERE `email_address` = '$email_address'") or die(mysqli_error());
				$v_checkadmin = $q_checkadmin->num_rows;

				//id
			$q_checkid = $conn->query("SELECT * FROM `login_user` WHERE `staffid` = '$staffid'") or die(mysqli_error());
				$v_checkid = $q_checkid->num_rows;

				if($v_checkadmin == 1 ){
					echo '
						<script type = "text/javascript">
							alert("Email Address already exist");
							window.location = "view_user.php";
						</script>
					';
				}
				if ($v_checkid == 1) {

					echo '
						<script type = "text/javascript">
							alert("Staff ID already exist");
							window.location = "view_user.php";
						</script>
					';
				
				}else{
					$conn->query("INSERT INTO `login_user` VALUES('','$user_name', '$email_address', '$user_password', '$user_status', '$staffid', '$department', '$position')") or die(mysqli_error());
					echo '
						<script type = "text/javascript">
							alert("Successful register user");window.location = "view_user.php";
						</script>
					';
				}
			}	


 ?>