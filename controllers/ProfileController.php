<?php
require_once "./config/db.php";

class ProfileController
{
    public function fetchUserProfileData($userID)
    {
        try {
            global $conn;
            $stmt = $conn->prepare("SELECT * FROM user WHERE UserID = :userID");
            $stmt->bindParam(':userID', $userID);
            $stmt->execute();

            $userData = $stmt->fetch(PDO::FETCH_ASSOC);
            return $userData;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            die();
        }
    }
    public function updateProfileData($userID, $userName, $userEmail, $userSocialMedia, $userResearchArea, $expertAreaOfExpertise, $ResearchTopic)
    {
        try {
            global $conn;
            $stmt = $conn->prepare("UPDATE user SET UserName = :userName, UserEmail = :userEmail, UserSocialMedia = :userSocialMedia, UserResearchArea = :userResearchArea, ExpertAreaOfExpertise = :expertAreaOfExpertise, ResearchTopic = :ResearchTopic WHERE UserID = :userID");
            $stmt->bindParam(':userName', $userName);
            $stmt->bindParam(':userEmail', $userEmail);
            $stmt->bindParam(':userSocialMedia', $userSocialMedia);
            $stmt->bindParam(':ResearchTopic', $ResearchTopic);
            $stmt->bindParam(':userResearchArea', $userResearchArea);
            $stmt->bindParam(':expertAreaOfExpertise', $expertAreaOfExpertise);
            $stmt->bindParam(':userID', $userID);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            die();
        }
    }
}
