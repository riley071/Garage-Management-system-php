<?php
// Include the database connection file
require_once 'php_action/db_connect.php';

// Check if the user ID is provided in the URL
if (isset($_GET['u_id'])) {
    $userId = $_GET['u_id'];

    // Update the booking status to 'Approved' in the database
    $sql = "UPDATE tms_user SET u_car_book_status = 'Approved' WHERE u_id = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $userId);

    if ($stmt->execute()) {
        // Booking approval successful
        header("Location: schedule.php"); // Redirect back to the bookings page
        exit();
    } else {
        // Error occurred while updating booking status
        echo "Error: " . $connect->error;
    }

    // Close statement
    $stmt->close();
} else {
    // No user ID provided in the URL
    echo "User ID not provided";
}
?>
