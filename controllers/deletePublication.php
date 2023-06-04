<?php
try {
    require "../config/db.php";

    // Retrieve the PublicationID from the URL parameter
    $publicationID = $_GET['PublicationID'];

    $stmt = $conn->prepare("DELETE FROM publication WHERE PublicationID=:publicationID");
    $stmt->bindParam(':publicationID', $publicationID);
    $stmt->execute();

    echo "<script>alert('The publication has been deleted successfully.'); window.location.href='../publication_list.php';</script>";
} catch (PDOException $e) {
    echo $e->getMessage();
}
