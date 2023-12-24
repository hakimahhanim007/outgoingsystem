<?php

if (isset($_POST['submitnew'])) {



    //$from_person = $_POST['new_from'];
    //$to_person = $_POST['new_to'];
    $privateAndConfidential = $type === "" ? 1 : 0; // Check if Private and Confidential is selected
    $reference = $_POST['new_reference'];
    $type = $_POST['new_type'];
    $title = $type === "" ? "PnC" : $_POST['new_title'];
    $from_person = $type === "" ? "PnC" : $_POST['new_from'];
    $to_person = $type === "" ? "PnC" : $_POST['new_to'];

    //$title = $_POST['new_title'];
    $date = $_POST['new_date'];
    $email = $_POST['new_email'];
    $time = $_POST['time'];

    //$privateAndConfidential = isset($_POST['privateAndConfidential']) ? 1 : 0;
       
    include_once("include/connection.php");

    // Insert data into the "summary" table without reference number
    $insertQuery = "INSERT INTO summary (title, date, email, from_person, to_person, type, reference, privateAndConfidential) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmtInsert = $conn->prepare($insertQuery);
    $stmtInsert->bind_param("sssssssi", $title, $date, $email, $from_person, $to_person, $type, $reference, $privateAndConfidential);

    if ($stmtInsert->execute()) {
        // Get the last inserted ID
        $lastInsertedID = $conn->insert_id;

        // Generate a reference number based on user's choice
        if ($type === "PnC") {
            $ref_num = sprintf("%03d", $lastInsertedID); // Format as "%03d"
        } else {
            // Generate reference number without the "%03d" format
            $shortFromPerson = strtoupper(substr($from_person, 0, 2));
            $thbmhq = "THBM/HQ";
            $dash = "-";
            $year = date('Y');
            $slash = "/";
            $runningNumber = $thbmhq . $dash . $shortFromPerson . $slash . $reference . $slash . $type . $slash . $year . $dash . $lastInsertedID;
            $ref_num = $runningNumber;
        }

        // Update the record with the generated reference number in the 'ref_num' column
        $updateQuery = "UPDATE summary SET ref_num = ? WHERE from_person = ? AND to_person = ? AND reference = ? AND type = ?";
        $stmtUpdate = $conn->prepare($updateQuery);
        $stmtUpdate->bind_param("sssss", $ref_num, $from_person, $to_person, $reference, $type);
        $stmtUpdate->execute();

        echo "Record added successfully";
        echo $ref_num;
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

<?php






if (isset($_POST['submitnew'])) {

    //$from_person = $_POST['new_from'];
    //$to_person = $_POST['new_to'];
    $reference = $_POST['new_reference'];
    $type = $_POST['new_type'];
    $privateAndConfidential = $type === "" ? 1 : 0; // Check if Private and Confidential is selected
    $title = $type === "" ? "PnC" : $_POST['new_title'];
    $from_person = $type === "" ? "HR" : $_POST['new_from'];
    $to_person = $type === "" ? "PnC" : $_POST['new_to'];
    $date = $_POST['new_date'];
    $email = $_POST['new_email'];
    //$privateAndConfidential = isset($_POST['privateAndConfidential']) ? 1 : 0;
       
    include_once("include/connection.php");

    // Insert data into the "summary" table without reference number
    $insertQuery = "INSERT INTO summary (title, date, email, from_person, to_person, type, reference, privateAndConfidential) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmtInsert = $conn->prepare($insertQuery);
    $stmtInsert->bind_param("sssssssi", $title, $date, $email, $from_person, $to_person, $type, $reference, $privateAndConfidential);

    if ($stmtInsert->execute()) {
        // Get the last inserted ID
        $lastInsertedID = sprintf("%03d", $conn->insert_id);
        $shortFromPerson = strtoupper(substr($from_person, 0, 3));


        if($type==""){
            $ref_num=$lastInsertedID;
        }else{

        // Create running number
        $thbmhq = "THBM/HQ";
        $dash = "-";
        $year = date('Y');
        $slash = "/";
        $pncType = "";
        $type = $privateAndConfidential ? $pncType : $type; // get "" for type in database
        $runningNumber = $thbmhq . $dash . $shortFromPerson . $slash . $reference . $slash . $type . $slash . $year . $dash . $lastInsertedID;
        $ref_num = $runningNumber;

        }

        
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
