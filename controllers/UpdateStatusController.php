<?php
session_start();
require './config/db.php';

try {
    $userId = $_SESSION['user_id'];

    // Retrieve the latest feedback created date
    $query = "SELECT MAX(FeedbackCreated) AS LatestFeedbackDate FROM feedback WHERE ExpertID IN (SELECT ExpertID FROM user WHERE UserID = :userId)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $latestFeedbackDate = $result['LatestFeedbackDate'];

    // Check if the latest feedback date is more than 30 days from the current date
    $currentDate = date('Y-m-d');
    $thirtyDaysAgo = date('Y-m-d', strtotime('-30 days', strtotime($currentDate)));
    if ($latestFeedbackDate < $thirtyDaysAgo) {
        // Update ExpertAccountStatus to '1' for the logged in user
        $updateQuery = "UPDATE user SET ExpertAccountStatus = '1' WHERE UserID = :userId";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bindParam(':userId', $userId);
        $updateStmt->execute();

        http_response_code(200); // Set the response code to 200 (OK)
    } else {
        // No changes if is not required to set inactive & load the page as usual
    }
} catch (PDOException $e) {
    http_response_code(500); // Set the response code to 500 (Internal Server Error)
}
