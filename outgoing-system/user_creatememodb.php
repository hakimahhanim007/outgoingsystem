<?php

	require_once("include/connection.php");
	if(isset($_POST['submitmemo'])){

        // Get form data
    $Title = mysqli_real_escape_string($conn,$_POST['memo_title']);
    $date = mysqli_real_escape_string($conn,$_POST['memo_date']);
    $email = mysqli_real_escape_string($conn,$_POST['memo_email']);
    $reference = mysqli_real_escape_string($conn,$_POST['memo_ref']);
    $from_person = mysqli_real_escape_string($conn,$_POST['memo_from']);
    $to_person = mysqli_real_escape_string($conn,$_POST['memo_to']);
    
    //$pnc= isset($_POST['privateAndConfidential']) ? 1 : 0;

    // Insert data into the "memo" table
    $sql = "INSERT INTO memo (Title, date, email, reference, from_person, to_person) VALUES (?, ?, ?, ?, ?, ?)"; //privateAndConfidential
    
    $stmt = $conn->prepare($sql);
     //$pnc
    $stmt->bind_param("ssssss", $Title, $date, $email, $reference, $from_person, $to_person);

   
    if ($stmt->execute()) {
        echo "Memo successfully submitted";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>


	