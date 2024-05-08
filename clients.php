<?php 
require_once 'php_action/db_connect.php';
require_once 'includes/header.php'; 
?>

<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
            <li><a href="dashboard.php">Home</a></li>
            <li class="active">User</li>
        </ol>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="page-heading"><i class="glyphicon glyphicon-edit"></i> Manage Clients</div>
            </div>
            <!-- /panel-heading -->
            <div class="panel-body">
                <div class="remove-messages"></div>
                <div class="div-action pull pull-right" style="padding-bottom:20px;">
                
                <button class="btn btn-success button1" data-toggle="modal" id="addUserModalBtn" data-target="#addUserModal"><i class="glyphicon glyphicon-plus-sign"></i> Add User</button>
                </div>
                <!-- /div-action -->
                <table class="table table-hover table-striped table-bordered" id="manageUserTable">
                    <thead>
                        <tr>
                            <th style="width: 10%;">User Name</th>
                            <th style="width: 10%;">Last Name</th>
                            <th style="width: 10%;">Phone</th>
                            <th style="width: 10%;">Email</th>
                            <th style="width: 15%;">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Your data rows will be populated here -->
                    </tbody>
                </table>
                <!-- /table -->
            </div>
            <!-- /panel-body -->
        </div>
        <!-- /panel -->
    </div>
    <!-- /col-md-12 -->
</div>
<!-- /row -->

<!-- add user modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add User</h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <!-- Form for adding user -->
                <form id="addUserForm" method="post">
                    <!-- Input fields for user information -->
                    <div class="form-group">
                        <label for="userName">User Name:</label>
                        <input type="text" class="form-control" id="userName" name="userName">
                    </div>
                    <div class="form-group">
                        <label for="userLastName">Last Name:</label>
                        <input type="text" class="form-control" id="userLastName" name="userLastName">
                    </div>
                    <div class="form-group">
                        <label for="userPhone">Phone:</label>
                        <input type="text" class="form-control" id="userPhone" name="userPhone">
                    </div>
                    <div class="form-group">
                        <label for="userEmail">Email:</label>
                        <input type="email" class="form-control" id="userEmail" name="userEmail">
                    </div>
                    <!-- Add more input fields as needed -->

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- edit user modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit User</h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <!-- Form for editing user -->
                <form id="editUserForm" method="post">
                    <!-- Input fields for user information -->
                    <div class="form-group">
                        <label for="editUserName">User Name:</label>
                        <input type="text" class="form-control" id="editUserName" name="editUserName">
                    </div>
                    <div class="form-group">
                        <label for="editUserLastName">Last Name:</label>
                        <input type="text" class="form-control" id="editUserLastName" name="editUserLastName">
                    </div>
                    <div class="form-group">
                        <label for="editUserPhone">Phone:</label>
                        <input type="text" class="form-control" id="editUserPhone" name="editUserPhone">
                    </div>
                    <div class="form-group">
                        <label for="editUserEmail">Email:</label>
                        <input type="email" class="form-control" id="editUserEmail" name="editUserEmail">
                    </div>
                    <!-- Add more input fields as needed -->

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- send email modal -->

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
                    <textarea class="form-control" id="message" name="message" rows="5"></textarea>
                </div>
                <!-- Button to trigger email sending -->
                <button type="button" class="btn btn-primary" id="sendEmailBtn">Send Email</button>
            </div>
        </div>
    </div>
</div>



<!-- remove user modal -->
<div class="modal fade" id="removeUserModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Remove User</h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <!-- Display confirmation message -->
                <p>Are you sure you want to remove this user?</p>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <!-- Button to cancel -->
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <!-- Button to confirm removal -->
                <button type="button" class="btn btn-danger">Remove</button>
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

<script src="custom/js/tsuser.js"></script>

<?php require_once 'includes/footer.php'; ?>
