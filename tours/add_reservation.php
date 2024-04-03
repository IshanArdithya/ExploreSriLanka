<?php
require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hotelId'], $_POST['hotelName'], $_POST['tourGuideId'], $_POST['tourGuideName'], $_POST['selectedDate'], $_POST['reservedTill'])) {
    // Extract data from POST request
    $hotelId = $_POST['hotelId'];
    $hotelName = $_POST['hotelName'];
    $tourGuideId = $_POST['tourGuideId'];
    $tourGuideName = $_POST['tourGuideName'];
    $selectedDate = $_POST['selectedDate'];
    $reservedTill = $_POST['reservedTill'];

    // Prepare the SQL statement to insert reservation details
    $sql = "INSERT INTO hotelreservation (hotel_id, hotel_name, room_number, tg_id, tg_name, reserved_from, reserved_till) VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    // Prepare and bind parameters
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ississ", $hotelId, $hotelName, $roomNumber, $tourGuideId, $tourGuideName, $selectedDate, $reservedTill);
    
    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        // Reservation successfully added
        $response = array('success' => true, 'message' => 'Reservation added successfully');
        echo json_encode($response);
    } else {
        // Error occurred while adding reservation
        $response = array('success' => false, 'message' => 'Error adding reservation: ' . mysqli_error($conn));
        echo json_encode($response);
    }

    // Close statement
    mysqli_stmt_close($stmt);
} else {
    // Invalid request
    $response = array('success' => false, 'message' => 'Invalid request');
    echo json_encode($response);
}
