    <?php require_once 'includes/header.php'; ?>
    
    <?php
require_once 'db_connect.php'; // Include the database connection file

// Your feedback.php code goes here...

if(isset($_POST['editFeedbackBtn'])) {
    $feedbackId = $_POST['feedbackId'];
    $feedbackContent = $_POST['editFeedbackContent'];
    $feedbackStatus = $_POST['editFeedbackStatus'];
    
    $query = "UPDATE tms_feedback SET f_content = ?, f_status = ? WHERE f_id = ?";
    $stmt = $mysqli->prepare($query);
    
    if ($stmt) {
        $stmt->bind_param('ssi', $feedbackContent, $feedbackStatus, $feedbackId);
        $stmt->execute();
        
        if ($stmt->affected_rows > 0) {
            $valid['success'] = true;
            $valid['messages'] = "Successfully Updated";
        } else {
            $valid['success'] = false;
            $valid['messages'] = "Error while updating the feedback";
        }
    } else {
        $valid['success'] = false;
        $valid['messages'] = "Failed to prepare statement";
    }
    
    $stmt->close();
    
    echo json_encode($valid);
    exit(); // Stop further execution
}
?>

<?php require_once 'includes/header.php'; ?>

<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
            <li><a href="dashboard.php">Home</a></li>          
            <li class="active">Feedback</li>
        </ol>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Feedback</div>
            </div> <!-- /panel-heading -->
            <div class="panel-body">
                <div class="remove-messages"></div>
                <table class="table table-hover table-striped table-bordered" id="manageFeedbackTable">
                    <thead>
                        <tr>                            
                            <th>User Name</th>
                            <th>Content</th>
                            <th>Status</th>
                            <th style="width:15%;">Options</th>
                        </tr>
                    </thead>
                </table>
                <!-- /table -->
            </div> <!-- /panel-body -->
        </div> <!-- /panel -->       
    </div> <!-- /col-md-12 -->
</div> <!-- /row -->

<div class="modal fade" id="editFeedbackModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" id="editFeedbackForm" action="" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Feedback</h4>
                </div>
                <div class="modal-body">
                    <div id="edit-feedback-messages"></div>
                    <div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
                        <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="edit-feedback-result">
                        <div class="form-group">
                            <label for="editFeedbackContent" class="col-sm-3 control-label">Content: </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="editFeedbackContent" name="editFeedbackContent" placeholder="Feedback Content" rows="5"></textarea>
                            </div>
                        </div> <!-- /form-group-->
                        <div class="form-group">
                            <label for="editFeedbackStatus" class="col-sm-3 control-label">Status: </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <select class="form-control" id="editFeedbackStatus" name="editFeedbackStatus">
                                    <option value="">~~SELECT~~</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Resolved">Read</option>
                                </select>
                            </div>
                        </div> <!-- /form-group-->
                    </div>  
                    <!-- /edit feedback result -->
                </div> <!-- /modal-body -->
                <div class="modal-footer editFeedbackFooter">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
                    <button type="submit" class="btn btn-success" id="editFeedbackBtn" name="editFeedbackBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
                    <!-- Hidden input field to store feedback ID -->
                    <input type="hidden" id="editFeedbackId" name="feedbackId">
                </div>
                <!-- /modal-footer -->
            </form>
            <!-- /.form -->
        </div>
        <!-- /modal-content -->
    </div>
    <!-- /modal-dialog -->
</div>
<!-- / edit feedback modal -->

<script>
$(document).ready(function(){
    // Fetch feedback data and populate the table
    fetchFeedbackData();

    function fetchFeedbackData() {
        $.ajax({
            url: 'php_action/fetchFeedback.php',
            type: 'post',
            dataType: 'json',
            success:function(response) {
                $('#manageFeedbackTable').DataTable({
                    data: response.data,
                    destroy: true,
                    columns: [
                        { data: '0' }, // User Name
                        { data: '1' }, // Content
                        { data: '2' }, // Status
                        { data: '3' }  // Options
                    ]
                });
            }
        });
    }

    // Edit feedback
    $('#editFeedbackModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var feedbackContent = button.closest('tr').find('td:eq(1)').text(); // Content of the feedback
        var feedbackId = button.closest('tr').find('td:eq(0)').text(); // Feedback ID
        console.log("Feedback ID:", feedbackId); // Log the feedbackId value
        var modal = $(this);
        modal.find('.modal-body #editFeedbackContent').val(feedbackContent);
        modal.find('.modal-footer #editFeedbackId').val(feedbackId); // Set feedback ID in hidden input
    });
});
</script>

<?php require_once 'includes/footer.php'; ?>
