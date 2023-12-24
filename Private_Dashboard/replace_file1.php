<?php

// connect to the database
require_once("include/connection.php");

// Uploads files
if (isset($_POST['update'])) { // if save button on the form is clicked
    // name of the uploaded file

            $id =  $_POST['id'];
            $user = $_POST['email'];
            //$name =  $file['name']; // nama file
            //$size =  $_POST['size']; // size file
            $month = $_POST['month'];
            //$user =  $_POST['email']; // nama yg upload file
            //$uploads =  $_POST['admin_status']; // siapa yang upload file admin/employee
            $timers =  $_POST['timers']; //masa file diupload
            $fileno = $_POST['fileno']; // nombor file
            $location_address = $_POST['location_address'];
            $id_location = $_POST['id_location'];
            $file_department = $_POST['file_department'];
            $filename = $_FILES['myfile']['name'];

    // $Admin = $_FILES['admin']['name'];
    // destination of the file on the server
    $destination = '../uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];


    if (!in_array($extension, ['pdf'])) {
                echo '<script type = "text/javascript">
                            alert("You file extension must be:  .pdf");
                            window.location = "file_update.php";
                    </script>';
    } elseif ($_FILES['myfile']['size'] > 100000000) { // file shouldn't be larger than 1Megabyte
        echo '
               <script type = "text/javascript">
                    alert("Files too large!");
                    window.location = "file_update.php";
                </script>

        ';
    } else{


  $query=mysqli_query($conn,"SELECT * FROM `upload_files` WHERE `name` = '$filename'")or die(mysqli_error($conn));
           $counter=mysqli_num_rows($query);
            
            if ($counter == 1) 
              { 
                   echo '
                <script type = "text/javascript">
                    alert("Files already taken");
                    window.location = "file_update.php";
                </script>


               ';
              } 
      
        date_default_timezone_set("asia/Kuala_Lumpur");
        $timers = date("M-d-Y h:i A",strtotime("+0 HOURS"));
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $query = 'UPDATE upload_files set name="'.$filename.'", email = "'.$user.'", size = "'.$size.'", month = "'.$month.'", admin_status = "Admin", timers = "'.$timers.'", fileno = "'.$fileno.'", location_address = "'.$location_address.'", file_department = "'.$file_department.'" WHERE id ="'.$id.'" ';
            if (mysqli_query($conn, $query)) {
                   echo '<script type = "text/javascript">
                          alert("File Upload");
                          window.location = "view_userfile.php";
                        </script>';

            }
        } else {
             echo "Failed Upload files!";
        }
    
  }
}
?>