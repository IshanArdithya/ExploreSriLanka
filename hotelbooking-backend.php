<?php

include_once 'config.php';

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$selectedDate = $_POST['reserved_from'];
$checkoutDate = $_POST['reserved_till'];
$hotelId = $_POST['hotel_id'];
$hotelName = $_POST['name'];
$roomNumber = $_POST['room_number'];
$approval = $_POST['approval'];

$sql = "SELECT MAX(RIGHT(reservation_id, 5)) AS max_id FROM hotelreservation";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$max_id = $row['max_id'];
$next_id = $max_id + 1;
$reservation_id = 'RES' . str_pad($next_id, 5, '0', STR_PAD_LEFT);

$sql = "INSERT INTO hotelreservation (reservation_id, hotel_id, name, room_number, reserved_from, reserved_till, pkg_order_id, approval) VALUES ('$reservation_id', '$hotelId', '$hotelName', '$roomNumber', '$selectedDate', '$checkoutDate', NULL, '$approval')";

if ($conn->query($sql) === TRUE) {
    echo "Room booked successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
