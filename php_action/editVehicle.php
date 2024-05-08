<?php
require_once 'db_connect.php';

if($_POST) {
    $v_id = $_POST['v_id'];
    $v_name = $_POST['editVehicleName'];
    $v_reg_no = $_POST['editVehicleRegNo'];
    $v_pass_no = $_POST['editVehiclePassNo'];
    $v_driver = $_POST['editVehicleDriver'];
    $v_category = $_POST['editVehicleCategory'];
    // Assuming you're storing the image path in the database
    $v_dpic = $_FILES['editVehicleDpic']['name'];
    $v_status = $_POST['editVehicleStatus'];

    $target_dir = "uploads/"; // Directory where you want to save the image
    $target_file = $target_dir . basename($_FILES["editVehicleDpic"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["editVehicleDpic"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["editVehicleDpic"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["editVehicleDpic"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["editVehicleDpic"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $sql = "UPDATE tms_vehicle SET v_name = '$v_name', v_reg_no = '$v_reg_no', v_pass_no = '$v_pass_no', v_driver = '$v_driver', v_category = '$v_category', v_dpic = '$v_dpic', v_status = '$v_status' WHERE v_id = {$v_id}";
    if($connect->query($sql) === TRUE) {
        echo "<p>Successfully updated</p>";
        echo "<a href='../manageVehicle.php'><button type='button'>Back</button></a>";
    } else {
        echo "Error while updating record : ". $connect->error;
    }

    $connect->close();
}
?>
