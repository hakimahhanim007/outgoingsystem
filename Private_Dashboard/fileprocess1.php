<?php
// connect to the database
require_once("include/connection.php");

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file

  $user = $_POST['email'];
  $location_address = $_POST['location_address'];
  $fileno = $_POST['fileno'];
  $filename = $_POST['filename'];
  $file_department = $_POST['file_department'];
  $month = $_POST['month'];
  $link = $_POST['link'];


  $query=mysqli_query($conn,"SELECT * FROM `upload_files` WHERE `fileno` = '$fileno' ")or die(mysqli_error($conn));
  $counter=mysqli_num_rows($query);
            
            if ($counter == 1) 
              { 
                   echo '
                <script type = "text/javascript">
                    alert("File already exist");
                    window.location = "view_userfile.php";
                </script>
               '; 
              } 
              else {
      
        date_default_timezone_set("asia/Kuala_Lumpur");
         $time = date("M-d-Y h:i A",strtotime("+0 HOURS"));

        // move the uploaded (temporary) file to the specified destination
      
            $sql = "INSERT INTO upload_files (name, size, download, timers, admin_status, email, location_address, fileno, month, file_department, link) VALUES ('$filename', 0, 0, '$time', 'Admin', '$user', '$location_address', '$fileno', '$month', '$file_department', '$link')";
            if (mysqli_query($conn, $sql)) {
                   echo '
                     <script type = "text/javascript">
                    alert("You have successful add new file");
                    window.location = "view_userfile.php";
                </script>';

            
        }
        
        else { 
             echo "Failed Upload files!";
        }
      }
    
  }

