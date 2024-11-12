<?php
// Include database connection
include 'db.php';

// Get device ID and desired status from the query string
if (isset($_GET['id']) && isset($_GET['status'])) {
    $device_id = (int)$_GET['id'];
    $new_status = $_GET['status'];

    // Update the device status in the database
    $stmt = $pdo->prepare("UPDATE devices SET status = :status WHERE id = :id");
    $stmt->execute([':status' => $new_status, ':id' => $device_id]);

    // Here you would interact with your IoT device to turn it on/off
    // For example, using an API call or GPIO control via PHP

    if ($new_status == 'on') {
        // Send signal to turn on the device
        // Example: Turn on a light via API (Assume a function to interact with IoT devices)
        // apiControlDevice($device_id, 'on');
    } else {
        // Send signal to turn off the device
        // Example: Turn off a light via API (Assume a function to interact with IoT devices)
        // apiControlDevice($device_id, 'off');
    }
}

// Redirect back to the main page after the action
header('Location: index.php');
exit;
?>
