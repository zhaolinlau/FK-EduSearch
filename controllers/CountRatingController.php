<?php

require './config/db.php';

try {
    $userId = $_SESSION['user_id'];

    $query = "SELECT SUM(UserRating) AS TotalRating, COUNT(UserRating) AS RatingCount FROM rating WHERE ExpertID IN (SELECT ExpertID FROM user WHERE UserID = :userId)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':userId', $userId);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $totalRating = $result['TotalRating'];
    $ratingCount = $result['RatingCount'];

    $query = "SELECT COUNT(*) AS TotalRows FROM rating WHERE ExpertID IN (SELECT ExpertID FROM user WHERE UserID = :userId)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':userId', $userId);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $totalRows = $result['TotalRows'];

    $averageRating = ($ratingCount > 0) ? $totalRating / $totalRows : 0;

    $totalRatingsCount = $ratingCount;
    $averageUserRating = number_format($averageRating, 2);
    $totalDataRows = $totalRows;

    echo $averageRating;
} catch (PDOException $e) {
    echo "Database Error: " . $e->getMessage();
}
