<?php

try {
    require "./config/db.php";
    $userID = $_SESSION['user_id'];

    $stmt = $conn->prepare("SELECT * FROM user WHERE UserID = :userID");
    $stmt->bindParam(':userID', $userID);
    $stmt->execute();

    $userData = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
} finally {
    $conn = null;
}
