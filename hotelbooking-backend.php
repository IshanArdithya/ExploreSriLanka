<?php

include_once 'config.php';

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$selectedDate = $_POST['reserved_from'];
$checkoutDate = $_POST['reserved_till'];
$hotelId = $_POST['hotel_id'];
$hotelName = $_POST['name'];
$roomNumber = $_POST['room_number'];
$stayDuration = $_POST['stay_duration'];
$approval = $_POST['approval'];

// customer data from session
$customerEmail = $_SESSION['customer_email'];
$sql = "SELECT first_name FROM customers WHERE email = '$customerEmail'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$customerFirstName = $row['first_name'];
$customerId = $row['customer_id'];

// get hotel data from hotel_id
$sql = "SELECT * FROM hotels WHERE hotel_id = '$hotelId'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$hotelEmail = $row['email'];

// generate reservation_id
$sql = "SELECT MAX(RIGHT(reservation_id, 5)) AS max_id FROM hotelreservation";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$max_id = $row['max_id'];
$next_id = $max_id + 1;
$reservation_id = 'RES' . str_pad($next_id, 5, '0', STR_PAD_LEFT);

// get room price
$sql = "SELECT price FROM hotelrooms WHERE room_id = '$roomNumber' AND hotel_id = '$hotelId'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$roomPrice = $row['price'];

// calculate total price
$totalPrice = $roomPrice * $stayDuration;

$sql = "INSERT INTO hotelreservation (reservation_id, hotel_id, name, room_number, reserved_from, reserved_till, customer_id, totalprice, pkg_order_id, approval) VALUES ('$reservation_id', '$hotelId', '$hotelName', '$roomNumber', '$selectedDate', '$checkoutDate', '$customer_Id', '$totalPrice', NULL, '$approval')";

// email that hotel receives when a booking is made...
$mailHotel = new PHPMailer(true);
$mailUser = new PHPMailer(true);

try {

    $mailHotel->SMTPDebug = 0;
    $mailHotel->isSMTP();
    $mailHotel->Host = SMTP_HOST;
    $mailHotel->SMTPAuth = true;
    $mailHotel->Username = SMTP_USERNAME;
    $mailHotel->Password = SMTP_PASSWORD;
    $mailHotel->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mailHotel->Port = SMTP_PORT;
    $mailHotel->setFrom(SMTP_USERNAME, SMTP_NAME);
    $mailHotel->addAddress($hotelEmail, $hotelName);
    $mailHotel->isHTML(true);
    $mailHotel->Subject = "New Booking Received!";
    $BodyHotel = file_get_contents('emails/hotel-hotelbooking.php');
    $BodyHotel = str_replace('{{hotel_name}}', $hotelName, $BodyHotel);
    $BodyHotel = str_replace('{{reservation_id}}', $reservation_id, $BodyHotel);
    $BodyHotel = str_replace('{{checkin_date}}', $selectedDate, $BodyHotel);
    $BodyHotel = str_replace('{{checkout_date}}', $checkoutDate, $BodyHotel);
    $BodyHotel = str_replace('{{room_number}}', $roomNumber, $BodyHotel);
    $mailHotel->Body = $BodyHotel;
    

    $mailUser->SMTPDebug = 0;
    $mailUser->isSMTP();
    $mailUser->Host = SMTP_HOST;
    $mailUser->SMTPAuth = true;
    $mailUser->Username = SMTP_USERNAME;
    $mailUser->Password = SMTP_PASSWORD;
    $mailUser->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mailUser->Port = SMTP_PORT;
    $mailUser->setFrom(SMTP_USERNAME, SMTP_NAME);
    $mailUser->addAddress($customerEmail, $customerFirstName);
    $mailUser->isHTML(true);
    $mailUser->Subject = "Your Hotel Reservation is Pending!";
    $BodyUser = file_get_contents('emails/customer-hotelbooking.php');
    $BodyUser = str_replace('{{hotel_name}}', $hotelName, $BodyUser);
    $BodyUser = str_replace('{{user_name}}', $customerFirstName, $BodyUser);
    $BodyUser = str_replace('{{reservation_id}}', $reservation_id, $BodyUser);
    $mailUser->Body = $BodyUser;
    
} catch (Exception $e) {
    echo "Message could not be sent.";
}

if ($conn->query($sql) === TRUE) {
    echo "Room booked successfully!";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$mailHotel->send();
$mailUser->send();

$conn->close();
