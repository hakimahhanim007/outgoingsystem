<?php 

require_once("include/connection.php");

if (isset($_GET['file_id'])) {
    $id = mysqli_real_escape_string($conn,$_GET['file_id']);

    // fetch file to download from database
    $sql = "SELECT * FROM  upload_files WHERE id=$id";
    $results = mysqli_query($conn, $sql);
    $file = mysqli_fetch_assoc($results);
    $filepath = '../uploads/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../uploads/' . $file['name']));
        readfile('../uploads/' . $file['name']);
        // Now update downloads count
        $newCount = $file['download'] + 1;
        $updateQuery = "UPDATE upload_files SET download=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }

}


?>