

<?php

require_once("../include/connection.php");

session_start();

if(isset($_POST["userlog"])){


  date_default_timezone_set("asia/Kuala_Lumpur");
  $date = date("M-d-Y h:i A",strtotime("+0 HOURS"));

 $username = mysqli_real_escape_string($conn, $_POST["email_address"]);  
 $password = mysqli_real_escape_string($conn, $_POST["user_password"]);
 $department = mysqli_real_escape_string($conn, $_POST["department"]);  


 $query=mysqli_query($conn,"SELECT * FROM login_user WHERE email_address = '$username'")or die(mysqli_error($conn));
		$row=mysqli_fetch_array($query);
           $id = $row['id'];
           $user = $row['email_address'];
           $_SESSION["email_address"] = $row["email_address"];

	//test
    $query1=mysqli_query($conn,"SELECT * FROM login_user WHERE department = '$department'")or die(mysqli_error($conn));
	$row1=mysqli_fetch_array($query1);
    $_SESSION["department"] = $row["department"];
	
    
           $counter=mysqli_num_rows($query);
            
		  	if ($counter == 0) 
			  {	
				   echo "<script type='text/javascript'>alert('Your email and password do not match');
				  document.location='index.html'</script>";
			  } 
			  else
			  {
			  	if(password_verify($password, $row["user_password"]))  
                     {
				        $_SESSION['email_address']=$id;	

				         if (!empty($_SERVER["HTTP_CLIENT_IP"]))
							{
							 $ip = $_SERVER["HTTP_CLIENT_IP"];
							}
							elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
							{
							 $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
							}
							else
							{
							 $ip = $_SERVER["REMOTE_ADDR"];
							}

							$host = gethostbyaddr($_SERVER['REMOTE_ADDR']);


			
                       $remarks="Has LoggedIn the system at";  
                       mysqli_query($conn,"INSERT INTO history_log(id,email_address,action,ip,host,login_time) VALUES('$id','$user','$remarks','$ip','$host','$date')")or die(mysqli_error($conn));
    
                 
			  	echo "<script type='text/javascript'>document.location='dashboard.php'</script>";  
			 		 }
			 		 else
			 		 {

			 		 	 echo "<script type='text/javascript'>alert('Your email and password do not match');
				  		document.location='index.html'</script>";
				  		
			 		 }

	    }
   }
?>