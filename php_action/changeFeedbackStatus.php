<?php
require_once 'db_connect.php';

if(isset($_POST['feedbackId']) && isset($_POST['feedbackStatus'])) {
    $feedbackId = $_POST['feedbackId'];
    $feedbackStatus = $_POST['feedbackStatus'];

    $query = "UPDATE tms_feedback SET f_status = ? WHERE f_id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('si', $feedbackStatus, $feedbackId);
    $stmt->execute();

    if($stmt->affected_rows > 0) {
        echo json_encode(array('success' => true, 'message' => 'Feedback status updated successfully.'));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Error updating feedback status.'));
    }

    $stmt->close();
}
?>
