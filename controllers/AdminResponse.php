<?php
session_start();
require "../config/db.php";

if (isset($_POST['post'])) {
    $complaint_responses = $_POST['complaint_response'];
    $ComplaintIDs = $_POST['complaint_ids'];

    try {
        $stmt = $conn->prepare('UPDATE complaint SET ComplaintResponse = :complaintResponse WHERE ComplaintID = :complaintID');
        $stmt->bindParam(':complaintResponse', $complaint_responses);
        
        foreach ($ComplaintIDs as $complaintID) {
            $stmt->bindParam(':complaintID', $complaintID);
            $stmt->execute();
        }

        $_SESSION['success_message'] = 'The response has been recorded.';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

$conn = null;
?>
