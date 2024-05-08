<?php
require_once 'db_connect.php';

if(isset($_POST['editFeedbackContent']) && isset($_POST['editFeedbackStatus']) && isset($_POST['feedbackId'])) {
    $feedbackContent = $_POST['editFeedbackContent'];
    $feedbackStatus = $_POST['editFeedbackStatus'];
    $feedbackId = $_POST['feedbackId'];

    $query = "UPDATE tms_feedback SET f_content = ?, f_status = ? WHERE f_id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ssi', $feedbackContent, $feedbackStatus, $feedbackId);
    $stmt->execute();

    if($stmt->affected_rows > 0) {
        echo json_encode(array('success' => true, 'message' => 'Feedback updated successfully.'));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Error updating feedback.'));
    }

    $stmt->close();
}
?>
