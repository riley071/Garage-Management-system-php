<?php error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php require_once 'includes/header.php'; ?>
<?php 	

$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "sinventoryphp";
$store_url = "http://localhost/SimpleInventorySystem-PHP/";
// db connection
$connect = new mysqli($localhost, $username, $password, $dbname);
// check connection
if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  // echo "Successfully connected";
}

?>
<!-- Breadcrumbs -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">  Maintainace Schedule</a>
  </li>
  <li class="breadcrumb-item active">View</li>
</ol>

<!-- Bookings -->
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i>
   Maintainace List
   
  </div>
 
  <div class="card-body">
    
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Client Name</th>
          
            <th>Vehicle Type</th>
            <th>Vehicle Reg No</th>
            <th>Booking date</th>
            <th>Status</th>
            <th>Action</th>
            <th>Mail</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $ret = "SELECT * FROM tms_user WHERE u_car_book_status = 'Approved' OR u_car_book_status = 'Pending'";
          $stmt = $connect->prepare($ret); // Corrected $mysqli to $connect
          $stmt->execute();
          $res = $stmt->get_result();
          $cnt = 1;
          while ($row = $res->fetch_object()) {
          ?>
            <tr>
              <td><?php echo $cnt; ?></td>
              <td><?php echo $row->u_fname . ' ' . $row->u_lname; ?></td>
            
              <td><?php echo $row->u_car_type; ?></td>
              <td><?php echo $row->u_car_regno; ?></td>
              <td><?php echo $row->u_car_bookdate; ?></td>
              <td>
                <?php if ($row->u_car_book_status == "Pending") {
                  echo '<span class="btn btn-warning">' . $row->u_car_book_status . '</span>';
                } else {
                  echo '<span class="btn btn-success">' . $row->u_car_book_status . '</span>';
                } ?>
              </td>
              <td>
                <a href="admin-approve-booking.php?u_id=<?php echo $row->u_id; ?>" class="btn btn-primary"><i class="fa fa-check"></i> Approve</a>
                <a href="admin-pending-booking.php?u_id=<?php echo $row->u_id; ?>" class="btn btn-warning"><i class="fa fa-check"></i> Pending</a>
                <a href="admin-delete-booking.php?u_id=<?php echo $row->u_id; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
              </td>
              <td>
              <button class="btn btn-primary" data-toggle="modal" data-target="#sendEmailModal"><i class="glyphicon glyphicon-envelope"></i> Send Email</button>
     </td>
            </tr>
          <?php
            $cnt = $cnt + 1;
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


<!-- send email modal -->
<div class="modal fade" id="sendEmailModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Send Email</h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <!-- Input field for recipient email -->
                <div class="form-group">
                    <label for="recipientEmail">Recipient's Email:</label>
                    <input type="email" class="form-control" id="recipientEmail" name="recipientEmail">
                </div>
                <!-- Text area for message -->
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea class="form-control" id="message" placeholder="add message" name="message" rows="5"></textarea>
                </div>
                <!-- Button to trigger email sending -->
                <button type="button" class="btn btn-primary" id="sendEmailBtn">Send Email</button>
            </div>
        </div>
    </div>
</div>
<script>
// Function to handle sending email
function sendEmail() {
    // Get the recipient's email and message from the input fields
    var recipientEmail = $('#recipientEmail').val();
    var message = $('#message').val();
    
    // Check if the recipient's email is not empty
    if (recipientEmail.trim() === '') {
        alert('Please enter a valid email address.');
        return;
    }

    // Execute AJAX request to send email
    $.ajax({
        url: 'sendemail.php', // Path to your PHP script
        method: 'POST',
        data: { recipientEmail: recipientEmail, message: message }, // Pass email and message to PHP script
        success: function(response) {
            // Display success message or handle response
            alert('Email sent successfully!');
        },
        error: function(xhr, status, error) {
            // Display error message or handle error
            alert('Error: Email could not be sent.');
            console.error(xhr.responseText);
        }
    });
}

// Bind function to button click event
$(document).ready(function() {
    $('#sendEmailBtn').click(sendEmail);
});
</script>

<?php require_once 'includes/footer.php'; ?>
