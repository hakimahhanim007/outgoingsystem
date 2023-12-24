
        


<?php

// connect to the database
require_once("include/connection.php");

// Uploads files
if (isset($_POST['update'])) { // if save button on the form is clicked
    // name of the uploaded file

            $id =  $_POST['id'];
            $name_update = $_POST['email'];
            //$name =  $file['name']; // nama file
            $size =  $_POST['size']; // size file
            $month = $_POST['month'];
            //$user =  $_POST['email']; // nama yg upload file
            $uploads =  $_POST['admin_status']; // siapa yang upload file admin/employee
            //$timers =  $_POST['timers']; //masa file diupload
            $fileno = $_POST['fileno']; // nombor file
            $location_address = $_POST['location_address'];
            $file_department = $_POST['file_department'];
            $filename = $_POST['name'];

        date_default_timezone_set("asia/Kuala_Lumpur");
        $timers = date("M-d-Y h:i A",strtotime("+0 HOURS"));
        // move the uploaded (temporary) file to the specified destination
        
            $query = 'UPDATE upload_files set name="'.$filename.'", email= "'.$name_update.'", size = "'.$size.'", month = "'.$month.'", admin_status = "Admin", timers = "'.$timers.'", fileno = "'.$fileno.'", location_address = "'.$location_address.'", file_department = "'.$file_department.'" WHERE id ="'.$id.'" ';
            if (mysqli_query($conn, $query)) {
                   echo '<script type = "text/javascript">
                          alert("Update File Information Success!");
                          window.location = "view_userfile.php";
                        </script>';

            
        } else {
             echo "Update Failed!";
        }


}
?>