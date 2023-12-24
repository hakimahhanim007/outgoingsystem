<?php
  require_once("include/connection.php");
 
  if(ISSET($_POST['save'])){
    $user_name = $_POST['name'];
    $email_address = $_POST['email_address'];
    $user_password = $_POST['user_password'];
    $staffid = $_POST['staffid'];
    $position = $_POST['position'];
    $department = $_POST['department'];
 
    mysqli_query($conn, "INSERT INTO `login_user` VALUES('', '$user_name', '$email_address', '$user_password', 'staffid', 'position', 'department')") or die(mysqli_error());
 
    header("location: view_user.php");
  }
?>