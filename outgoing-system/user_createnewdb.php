<?php

if (isset($_POST['submitnew'])) {

    //$reference = strtoupper($_POST['new_reference']);

    $type = strtoupper($_POST['new_type']);
    $privateAndConfidential = $type === "" ? 1 : 0; // Check if Private and Confidential is selected

    $reference = $type === "" ? "" : strtoupper($_POST['new_reference']);
    $title = $type === "" ? "PNC" : strtoupper($_POST['new_title']);
    $from_person = $type === "" ? "PNC" : strtoupper($_POST['new_from']);
    $to_person = $type === "" ? "PNC" : strtoupper($_POST['new_to']);    
    $date = $_POST['new_date'];
    $email = strtoupper($_POST['new_email']);

           
    include_once("include/connection.php");

    // Insert data into the "summary" table without reference number
    $insertQuery = "INSERT INTO summary (title, date, email, from_person, to_person, type, reference, privateAndConfidential) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmtInsert = $conn->prepare($insertQuery);
    $stmtInsert->bind_param("sssssssi", $title, $date, $email, $from_person, $to_person, $type, $reference, $privateAndConfidential);

    if ($stmtInsert->execute()) {
        // Get the last inserted ID
        //$lastInsertedID = $conn->insert_id;
        $lastInsertedID = sprintf("%03d", $conn->insert_id);

        // Extract the first 2 characters from $from_person
        $shortFromPerson = strtoupper(substr($from_person, 0, 2));

        // Create running number
        $thbmhq = "THBM/HQ";
        $dash = "-";
        $year = date('Y');
        $slash = "/";
        $pncType = "";
        $type = $privateAndConfidential ? $pncType : $type; // get "" for type in database
        $runningNumber = $thbmhq . $dash . $shortFromPerson . $slash . $reference . $slash . $type . $slash . $year . $dash . $lastInsertedID;
        //$ref_num= $runningNumber;
        $ref_num = $privateAndConfidential ? $lastInsertedID : $runningNumber;

        // Update the record with the generated reference number in the 'ref_num' column
        $updateQuery = "UPDATE summary SET ref_num = ? WHERE from_person = ? AND to_person = ? AND reference = ? AND type = ?";
        $stmtUpdate = $conn->prepare($updateQuery);
        $stmtUpdate->bind_param("sssss", $ref_num, $from_person, $to_person, $reference, $type);
        $stmtUpdate->execute();


        echo "Record added successfully";
        echo $ref_num;
        echo $runningNumber;
        header("Location: user_dashboard.php"); // Redirect to user_dashboard.php
        exit(); // Ensure that no other code is executed after the header
    } else {
        echo "Error: " . $insertQuery . "<br>" . $stmtInsert->error;
    }

    // Close statements and connection
    $stmtInsert->close();
    $stmtUpdate->close();
    $conn->close();
}
?>
