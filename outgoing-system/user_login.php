<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once("../include/connection.php");

session_start();

if (isset($_POST["logIn"])) {
    date_default_timezone_set("asia/Kuala_lumpur");
    $date = date("M-d-Y h:i A", strtotime("+0 HOURS"));

    $username = mysqli_real_escape_string($conn, $_POST["email_address"]);
    $password = mysqli_real_escape_string($conn, $_POST["user_password"]);

    $query = mysqli_query($conn, "SELECT * FROM login_user WHERE email_address = '$username'") or die(mysqli_error($conn));
    $row = mysqli_fetch_array($query);
    $id = $row['id'];
    $user = $row['email_address'];
    $department = $row['department'];

    $_SESSION["user_no"] = $row["id"];
    $_SESSION["email_address"] = $row["email_address"];

    $counter = mysqli_num_rows($query);

    if ($counter == 0) {
        echo "<script type='text/javascript'>alert('Invalid Email Address or Password,Please try again!'); document.location='index.html'</script>";
    } else {
        if (password_verify($password, $row["user_password"])) {
            $_SESSION['email_address'] = $id;

            if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
                $ip = $_SERVER["HTTP_CLIENT_IP"];
            } elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
                $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
            } else {
                $ip = $_SERVER["REMOTE_ADDR"];
            }

            $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
            $remarks = "Has LoggedIn the system at";
            mysqli_query($conn, "INSERT INTO outgoing_log(id, email_address, action, ip, host, login_time) VALUES('$id','$user','$remarks','$ip','$host','$date')") or die(mysqli_error($conn));

            echo "<script type='text/javascript'>document.location='user_dashboard.php'</script>";
        } else {
            echo "<script type='text/javascript'>alert('Invalid Email Address or Password, Please try again!'); document.location='index.html'</script>";
        }
    }
}
?>
