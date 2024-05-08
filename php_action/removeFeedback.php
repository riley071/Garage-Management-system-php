<?php 

require_once 'core.php';

$valid['success'] = false;
$valid['messages'] = array();

$feedbackId = $_POST['feedbackId'];

if($feedbackId) { 

    $sql = "DELETE FROM tms_feedback WHERE f_id = {$feedbackId}";

    if($connect->query($sql) === TRUE) {
        $valid['success'] = true;
        $valid['messages'] = "Successfully Removed";      
    } else {
        $valid['success'] = false;
        $valid['messages'] = "Error while removing the feedback";
    }
    
    $connect->close();

    echo json_encode($valid);
 
} // /if $_POST
