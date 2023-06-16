<?php
require '../config/db.php';

try {
    session_start();

    if(isset($_POST['post'])){
        $complaint_description = $_POST['complaint_description'];
        $complaint_status = 'In Investigation';
        $feedback_id = $_POST['feedback_id'];
        $complaint_type = $_POST['complaint_type'];

        if(isset($_FILES['fileToUpload'])){
            $file = $_FILES['fileToUpload'];
            $fileName = $_FILES['fileToUpload']['name'];
            $fileTmpName = $_FILES['fileToUpload']['tmp_name'];
            $fileSize = $_FILES['fileToUpload']['size'];
            $fileError = $_FILES['fileToUpload']['error'];
            $fileExt = pathinfo($fileName, PATHINFO_EXTENSION); // Get the file extension using pathinfo
            $allowed = array('jpg', 'jpeg', 'png');

            if(in_array($fileExt, $allowed)){
                if($fileError === 0){
                    if($fileSize < 1000000){
                        $fileNameNew = uniqid('', true) . "." . $fileExt;
                        $fileDestination = '../uploads/' . $fileNameNew;

                        // Check if the destination directory exists, if not create it
                        if(!is_dir('../uploads')){
                            mkdir('../uploads', 0777, true);
                        }

                        if(move_uploaded_file($fileTmpName, $fileDestination)){
                            $stmt = $conn->prepare('INSERT INTO complaint (UserID, FeedbackID, ComplaintDescription, ComplaintStatus, ComplaintType, ComplaintPhoto) VALUES (:user_id, :feedback_id, :complaint_description, :complaint_status, :complaint_type, :complaint_photo)');

                            $stmt->bindParam(':user_id', $_SESSION['user_id']);
                            $stmt->bindParam(':feedback_id', $feedback_id);
                            $stmt->bindParam(':complaint_description', $complaint_description);
                            $stmt->bindParam(':complaint_status', $complaint_status);
                            $stmt->bindParam(':complaint_type', $complaint_type);
                            $stmt->bindParam(':complaint_photo', $fileNameNew);
                            $stmt->execute();
                        } else {
                            echo "Failed to move the uploaded file.";
                        }
                    } else{
                        echo "Your file is too big!";
                    }
                } else{
                    echo "There was an error uploading your file!";
                }
            } else{
                echo "You cannot upload files of this type!";
            }
        } else {
            $stmt = $conn->prepare('INSERT INTO complaint (UserID, FeedbackID, ComplaintDescription, ComplaintStatus, ComplaintType) VALUES (:user_id, :feedback_id, :complaint_description, :complaint_status, :complaint_type)');

            $stmt->bindParam(':user_id', $_SESSION['user_id']);
            $stmt->bindParam(':feedback_id', $feedback_id);
            $stmt->bindParam(':complaint_description', $complaint_description);
            $stmt->bindParam(':complaint_status', $complaint_status);
            $stmt->bindParam(':complaint_type', $complaint_type);
            $stmt->execute();
        }

        $_SESSION['posted'] = 'You have created a complaint successfully!';
        header('location: ../');
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

$conn = null;
?>

