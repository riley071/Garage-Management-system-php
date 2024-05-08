<?php 	

require_once 'core.php';

$sql = "SELECT u_id, u_fname, u_lname, u_phone, u_email FROM tms_user";

$result = $connect->query($sql);

$output = array('data' => array());

if ($result->num_rows > 0) { 
    while ($row = $result->fetch_array()) {
        $userid = $row['u_id'];
        $username = $row['u_fname'];
        $lastname = $row['u_lname'];
        $phone = $row['u_phone'];
        $email = $row['u_email'];
        

        $button = '<!-- Single button -->
        <div class="btn-group">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Action <span class="caret"></span>
          </button>
          <ul class="dropdown-menu">
            <li><a type="button" data-toggle="modal" id="editUserModalBtn" data-target="#editUserModal" onclick="editUser('.$userid.')"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
            <li><a type="button" data-toggle="modal" data-target="#removeUserModal" id="removeUserModalBtn" onclick="removeUser('.$userid.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>       
          </ul>
        </div>';

        $output['data'][] = array( 
            // name
            $username,
            // phone
            $lastname,

            $phone,

            $email,
            // button
            $button
        ); 
    } // /while 
}// if num_rows

$connect->close();

echo json_encode($output);
?>
