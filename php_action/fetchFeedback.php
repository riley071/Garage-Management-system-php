<?php 

require_once 'core.php';

$sql = "SELECT f_id, f_uname, f_content, f_status FROM tms_feedback";
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

    while($row = $result->fetch_array()) {
        $feedbackId = $row[0];
        $feedbackStatus = $row[3] == 'Resolved' ? "<label class='label label-success'>".$row[3]."</label>" : "<label class='label label-warning'>".$row[3]."</label>";

        $button = '<!-- Single button -->
        <div class="btn-group">
          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Action <span class="caret"></span>
          </button>
          <ul class="dropdown-menu">
            <li><a type="button" data-toggle="modal" data-target="#editFeedbackModal" onclick="editFeedback('.$feedbackId.')"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
            <li><a type="button" data-toggle="modal" data-target="#removeFeedbackModal" onclick="removeFeedback('.$feedbackId.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>       
          </ul>
        </div>';

        $output['data'][] = array(         
            $row[1], // User Name
            $row[2], // Content
            $feedbackStatus, // Status
            $button // Options
            );      
    } // /while 

} // if num_rows

$connect->close();

echo json_encode($output);
