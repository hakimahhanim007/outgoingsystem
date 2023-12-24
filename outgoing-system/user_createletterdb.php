<?php

	require_once("include/connection.php");
	if(isset($_POST['submitletter'])){

        // Get form data
    $Title = mysqli_real_escape_string($conn,$_POST['letter_title']);
    $date = mysqli_real_escape_string($conn,$_POST['letter_date']);
    $email = mysqli_real_escape_string($conn,$_POST['letter_email']);
    $reference = mysqli_real_escape_string($conn,$_POST['letter_ref']);
    $from_person = mysqli_real_escape_string($conn,$_POST['letter_from']);
    $to_person = mysqli_real_escape_string($conn,$_POST['letter_to']);
    //$pnc= isset($_POST['privateAndConfidential']) ? 1 : 0;
    
    // Add the generateRunningNumber function here
    function generateRunningNumber($from_person, $reference, $type, $year, $runningNumber) {
        $constantPrefix = "THBM/HQ";
        $formattedRunningNumber = sprintf("%s-%s/%s/%s/%s-%03d", $constantPrefix, $from_person, $to_person, $type, $year, $runningNumber);
        return $formattedRunningNumber;
    }

    // Generate running number (you may need to fetch the actual running number from the database)
    $runningNumber = 1; // Replace with actual logic to get the running number from the database
    $generatedRunningNumber = generateRunningNumber($from_person, $to_person, $type, date("Y"), $runningNumber);

    // Insert data into the "letter" table
    $sql = "INSERT INTO letter (Title, date, email, reference, from_person, to_person) VALUES (?, ?, ?, ?, ?, ?)"; //privateAndConfidential
    
    $stmt = $conn->prepare($sql);
     //$pnc 
    $stmt->bind_param("ssssss", $Title, $date, $email, $reference, $from_person, $to_person);

   
    if ($stmt->execute()) {
        echo "letter successfully submitted";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>


	