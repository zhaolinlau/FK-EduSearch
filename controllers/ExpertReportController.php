<?php
require './config/db.php';

try {
    $query = "SELECT post.PostID, post.PostTitle, rating.UserRating, feedback.FeedbackCreated
    FROM post
    INNER JOIN user ON post.ExpertID = user.ExpertID
    LEFT JOIN rating ON post.PostID = rating.PostID
    LEFT JOIN feedback ON post.PostID = feedback.PostID
    WHERE user.UserID = :userId
    ORDER BY post.PostID DESC";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':userId', $_SESSION['user_id']);

    $stmt->execute();
    $postData = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Database Error: " . $e->getMessage();
}
