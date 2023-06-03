<?php
try {
    require "../config/db.php";

    // Check if the complaintID parameter exists
    if (isset($_POST['complaintID'])) {
        $complaintID = $_POST['complaintID'];

        // Prepare and execute the DELETE statement
        $stmt = $conn->prepare("DELETE FROM complaint WHERE ComplaintID = :complaintID");
        $stmt->bindParam(':complaintID', $complaintID);
        $stmt->execute();

        // Check the number of affected rows
        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            // Return success message
            echo "The record of the complaint is successfully deleted";
        } else {
            // Return error message if no rows were affected
            echo "Error: Failed to delete the record";
        }
    } else {
        // Return error message if complaintID parameter is missing
        echo "Error: Complaint ID not provided";
    }

    $conn = null;
} catch (PDOException $e) {
    // Return error message if an exception occurs
    echo "Error: " . $e->getMessage();
}
?>