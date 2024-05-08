<?php 
require_once 'php_action/db_connect.php';
require_once 'includes/header.php'; 
?>

<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
            <li><a href="dashboard.php">Home</a></li>
            <li class="active">Vehicle</li>
        </ol>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="page-heading"><i class="glyphicon glyphicon-edit"></i> Manage Vehicles</div>
            </div>
            <!-- /panel-heading -->
            <div class="panel-body">
                <div class="remove-messages"></div>
                <div class="div-action pull pull-right" style="padding-bottom:20px;">
                    <button class="btn btn-success button1" data-toggle="modal" id="addVehicleModalBtn" data-target="#addVehicleModal"><i class="glyphicon glyphicon-plus-sign"></i> Add Vehicle</button>
                </div>
                <!-- /div-action -->
                <table class="table table-hover table-striped table-bordered" id="manageVehicleTable">
    <thead>
        <tr>
            <th style="width: 10%;">Vehicle Name</th>
            <th style="width: 10%;">Registration No</th>
            <th style="width: 10%;">Passenger Capacity</th>
            <th style="width: 10%;">User ID</th>
            <th style="width: 10%;">Category</th>
            <th style="width: 10%;">Options</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT v_id, v_name, v_reg_no, v_pass_no, v_driver, v_category FROM tms_vehicle";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["v_name"] . "</td>";
                echo "<td>" . $row["v_reg_no"] . "</td>";
                echo "<td>" . $row["v_pass_no"] . "</td>";
                echo "<td>" . $row["v_driver"] . "</td>";
                echo "<td>" . $row["v_category"] . "</td>";
                echo "<td>";
                echo "<button class='btn btn-primary btn-sm' data-toggle='modal' id='editVehicleModalBtn' data-target='#editVehicleModal' onclick='editVehicle(".$row['v_id'].")'>Edit</button>";
                echo "<button class='btn btn-danger btn-sm ml-1' data-toggle='modal' id='removeVehicleModalBtn' data-target='#removeVehicleModal' onclick='removeVehicle(".$row['v_id'].")'>Delete</button>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No vehicles found</td></tr>";
        }
        ?>
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

<!-- Add Vehicle Modal -->
<div class="modal fade" id="addVehicleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" id="submitVehicleForm" action="php_action/createVehicle.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Add Vehicle</h4>
                </div>

                <div class="modal-body" style="max-height:450px; overflow:auto;">
                    <div id="add-vehicle-messages"></div>

                    <!-- Add vehicle form inputs -->
                    <!-- Example: -->
                    
                    <!-- Vehicle Name -->
                    <div class="form-group">
                        <label for="vehicleName" class="col-sm-3 control-label">Vehicle Name: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="vehicleName" placeholder="Vehicle Name" name="vehicleName" autocomplete="off">
                        </div>
                    </div>

                    <!-- Registration Number -->
                    <div class="form-group">
                        <label for="vehicleRegNo" class="col-sm-3 control-label">Registration Number: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="vehicleRegNo" placeholder="Registration Number" name="vehicleRegNo" autocomplete="off">
                        </div>
                    </div>

                    <!-- Passenger Capacity -->
                    <div class="form-group">
                        <label for="vehiclePassNo" class="col-sm-3 control-label">Passenger Capacity: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="vehiclePassNo" placeholder="Passenger Capacity" name="vehiclePassNo" autocomplete="off">
                        </div>
                    </div>

                    <!-- Driver Name -->
                    <div class="form-group">
                        <label for="vehicleDriver" class="col-sm-3 control-label">Cient ID: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="vehicleDriver" placeholder="Client Name" name="vehicleDriver" autocomplete="off">
                        </div>
                    </div>

                    <!-- Category -->
                    <div class="form-group">
                        <label for="vehicleCategory" class="col-sm-3 control-label">Category: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="vehicleCategory" placeholder="Category" name="vehicleCategory" autocomplete="off">
                        </div>
                    </div>

                    <!-- Upload Image -->
                    <div class="form-group">
                        <label for="vehicleImage" class="col-sm-3 control-label">Upload Image: </label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" id="vehicleImage" name="vehicleImage">
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="form-group">
                        <label for="vehicleStatus" class="col-sm-3 control-label">Status: </label>
                        <div class="col-sm-8">
                            <select class="form-control" id="vehicleStatus" name="vehicleStatus">
                                <option value="">Select Status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>  
                    <!-- Add more form inputs as needed -->

                </div> <!-- /modal-body -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove-sign"></i> Close</button>
                    <button type="submit" class="btn btn-primary" id="createVehicleBtn" data-loading-text="Loading..." autocomplete="off"><i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
                </div> <!-- /modal-footer -->
            </form> <!-- /.form -->
        </div> <!-- /modal-content -->
    </div> <!-- /modal-dialog -->
</div> 
<!-- /Add Vehicle Modal -->



<!-- Edit Vehicle Modal -->
<div class="modal fade" id="editVehicleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" id="editVehicleForm" action="php_action/editVehicle.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Vehicle</h4>
                </div>

                <div class="modal-body" style="max-height:450px; overflow:auto;">
                    <div id="edit-vehicle-messages"></div>

                    <!-- Edit vehicle form inputs -->
                    <!-- Example: -->
                    <div class="form-group">
                        <label for="editVehicleName" class="col-sm-3 control-label">Vehicle Name: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="editVehicleName" placeholder="Vehicle Name" name="editVehicleName" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editVehicleDriver" class="col-sm-3 control-label">User ID: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="editVehicleDriver" placeholder="Driver Name" name="editVehicleDriver" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="editVehicleCategory" class="col-sm-3 control-label">Vehicle Category: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="editVehicleCategory" placeholder="Vehicle Category" name="editVehicleCategory" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="editVehicleDpic" class="col-sm-3 control-label">Vehicle Picture: </label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" id="editVehicleDpic" name="editVehicleDpic">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="editVehicleStatus" class="col-sm-3 control-label">Vehicle Status: </label>
                        <div class="col-sm-8">
                            <select class="form-control" id="editVehicleStatus" name="editVehicleStatus">
                                <option value="Active">Booked</option>
                                <option value="Inactive">Denied</option>
                            </select>
                        </div>
                    </div>

                    <!-- Add more form inputs as needed -->

                </div> <!-- /modal-body -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove-sign"></i> Close</button>
                    <button type="submit" class="btn btn-primary" id="editVehicleBtn" data-loading-text="Loading..." autocomplete="off"><i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
                </div> <!-- /modal-footer -->
            </form> <!-- /.form -->
        </div> <!-- /modal-content -->
    </div> <!-- /modal-dialog -->
</div> 
<!-- /Edit Vehicle Modal -->

<!-- Remove Vehicle Modal -->
<div class="modal fade" id="removeVehicleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" id="removeVehicleForm" action="php_action/removeVehicle.php" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-trash"></i> Remove Vehicle</h4>
                </div>

                <div class="modal-body">
                    <p>Are you sure you want to remove this vehicle?</p>
                    <!-- Hidden input to store vehicle ID -->
                    <input type="hidden" id="removeVehicleId" name="removeVehicleId">
                </div> <!-- /modal-body -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove-sign"></i> Close</button>
                    <button type="submit" class="btn btn-primary" id="removeVehicleBtn" data-loading-text="Loading..."><i class="glyphicon glyphicon-ok-sign"></i> Remove</button>
                </div> <!-- /modal-footer -->
            </form> <!-- /.form -->
        </div> <!-- /modal-content -->
    </div> <!-- /modal-dialog -->
</div> 
<!-- /Remove Vehicle Modal -->


<script src="custom/js/tsvehicle.js"></script>
<script>
    <script>
$(document).ready(function(){
    $('.editBtn').on('click', function(){
        $('#editVehicleId').val($(this).data('id'));
        $('#editVehicleName').val($(this).data('name'));
        $('#editVehicleRegNo').val($(this).data('reg-no'));
        $('#editVehiclePassNo').val($(this).data('pass-no'));
        $('#editVehicleDriver').val($(this).data('driver'));
        $('#editVehicleCategory').val($(this).data('category'));
        $('#editVehicleStatus').val($(this).data('status'));
        // Assuming you're displaying the image in an <img> tag
        $('#editVehicleDpic').attr('src', $(this).data('dpic'));
    });
});
</script>

</script>
<?php require_once 'includes/footer.php'; ?>
