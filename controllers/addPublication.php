<?php
session_start();

try {
    require "../config/db.php";

    if (isset($_POST['create'])) {
        $publicationDate = $_POST['PublicationDate'];
        $publicationTitle = $_POST['PublicationTitle'];
        $userID = $_SESSION['user_id']; // Assuming you have the user ID stored in the $_SESSION['user_id'] variable

        $stmt = $conn->prepare("INSERT INTO publication (PublicationDate, PublicationTitle, UserID) VALUES (:publicationDate, :publicationTitle, :userID)");
        $stmt->bindParam(':publicationDate', $publicationDate);
        $stmt->bindParam(':publicationTitle', $publicationTitle);
        $stmt->bindParam(':userID', $userID);
        $stmt->execute();
        header("location: ../publication_list.php");
    }
} catch (PDOException $e) {
    // Handle any database errors
    echo "Error: " . $e->getMessage();
}
