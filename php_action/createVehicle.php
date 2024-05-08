<?php
// Check if the form is submitted
if ($_POST) {
    // Include database connection
    require_once 'db_connect.php';

    // Get form data
    $vehicleName = $_POST['vehicleName'];
    $vehicleRegNo = $_POST['vehicleRegNo'];
    $vehiclePassNo = $_POST['vehiclePassNo'];
    $vehicleDriver = $_POST['vehicleDriver'];
    $vehicleCategory = $_POST['vehicleCategory'];
    $vehicleStatus = $_POST['vehicleStatus'];

    // File upload handling
    $uploadDir = '../uploads/'; // Directory where uploaded images will be saved
    $vehicleImage = ''; // Variable to store the filename of the uploaded image

    if ($_FILES['vehicleImage']['name']) {
        $fileName = $_FILES['vehicleImage']['name'];
        $tempName = $_FILES['vehicleImage']['tmp_name'];
        $fileSize = $_FILES['vehicleImage']['size'];
        $fileType = $_FILES['vehicleImage']['type'];

        // Move uploaded file to designated directory
        if (move_uploaded_file($tempName, $uploadDir . $fileName)) {
            $vehicleImage = $fileName;
        } else {
            echo "Failed to upload image.";
        }
    }

    // Insert data into database
    $sql = "INSERT INTO tms_vehicle (v_name, v_reg_no, v_pass_no, v_driver, v_category, v_dpic, v_status) 
            VALUES ('$vehicleName', '$vehicleRegNo', '$vehiclePassNo', '$vehicleDriver', '$vehicleCategory', '$vehicleImage', '$vehicleStatus')";

    if ($conn->query($sql) === TRUE) {
        echo "Vehicle added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
} else {
    // If form is not submitted, redirect back to the form page
    header("Location: ../addVehicle.php");
    exit;
}
?>
