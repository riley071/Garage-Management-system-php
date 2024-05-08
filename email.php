<?php 
require_once 'php_action/db_connect.php';
require_once 'includes/header.php'; 
?>

<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
            <li><a href="dashboard.php">Home</a></li>
            <li class="active">Invoices</li>
        </ol>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="page-heading"><i class="glyphicon glyphicon-edit"></i> Send Invoice</div>
            </div>
            <!-- /panel-heading -->
            <div class="panel-body">
                <div class="remove-messages"></div>
                <div class="div-action pull pull-right" style="padding-bottom:20px;">
                <button class="btn btn-primary" data-toggle="modal" data-target="#notifyModal"><i class="glyphicon glyphicon-envelope"></i> Send Invoice</button>
   
                 </div>
                <!-- /div-action -->
                <table class="table table-hover table-striped table-bordered" id="manageUserTable">
                    <thead>
                        <tr>
                            <th style="width: 10%;">User Name</th>
                            <th style="width: 10%;">Last Name</th>
                            <th style="width: 10%;">Phone</th>
                            <th style="width: 10%;">Email</th>
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
    
<!-- send email modal -->

<!-- send email modal -->


<div class="modal fade" id="notifyModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Send Invoice to Email</h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="notifyForm" method="post" action="sendinvoice.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="email">Recipient Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="invoice">Invoice File</label>
                        <input type="file" class="form-control-file" id="invoice" name="invoice" required accept=".pdf, .doc, .docx">
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <!-- Button to cancel -->
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <!-- Button to submit form -->
                        <button type="submit" class="btn btn-primary" name="updatestatus">Send Email</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script>

</script>

<script src="custom/js/tsuser.js"></script>

<?php require_once 'includes/footer.php'; ?>
