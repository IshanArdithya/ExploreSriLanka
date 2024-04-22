<?php

require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

        $mailHotel = new PHPMailer(true);
        $mailTourguide = new PHPMailer(true);
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
          $BodyHotel = file_get_contents('../emails/package-hotel.php');
          $BodyHotel = str_replace('{{hotel_name}}', $hotelName, $BodyHotel);
          $BodyHotel = str_replace('{{reservation_id}}', $reservation_id, $BodyHotel);
          $BodyHotel = str_replace('{{checkin_date}}', $reservedFrom, $BodyHotel);
          $BodyHotel = str_replace('{{checkout_date}}', $reservedTill, $BodyHotel);
          $BodyHotel = str_replace('{{room_number}}', $roomNumber, $BodyHotel);
          $mailHotel->Body = $BodyHotel;

          $mailTourguide->SMTPDebug = 0;
          $mailTourguide->isSMTP();
          $mailTourguide->Host = SMTP_HOST;
          $mailTourguide->SMTPAuth = true;
          $mailTourguide->Username = SMTP_USERNAME;
          $mailTourguide->Password = SMTP_PASSWORD;
          $mailTourguide->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
          $mailTourguide->Port = SMTP_PORT;
          $mailTourguide->setFrom(SMTP_USERNAME, SMTP_NAME);
          $mailTourguide->addAddress($tourguideEmail, $tourGuideName);
          $mailTourguide->isHTML(true);
          $mailTourguide->Subject = "Your Hotel Reservation is Pending!";
          $BodyTourguide = file_get_contents('../emails/package-tourguide.php');
          $BodyTourguide = str_replace('{{tg_name}}', $tourGuideName, $BodyTourguide);
          $BodyTourguide = str_replace('{{reservation_id}}', $booking_id, $BodyTourguide);
          $BodyTourguide = str_replace('{{checkin_date}}', $reservedFrom, $BodyTourguide);
          $BodyTourguide = str_replace('{{checkout_date}}', $reservedTill, $BodyTourguide);
          $BodyTourguide = str_replace('{{package_name}}', $package_name, $BodyTourguide);
          $mailTourguide->Body = $BodyTourguide;

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
          $mailUser->Subject = "The package is successfully booked!";
          $BodyUser = file_get_contents('../emails/package-customer.php');
          $BodyUser = str_replace('{{user_name}}', $customerFirstName, $BodyUser);
          $BodyUser = str_replace('{{package_name}}', $package_name, $BodyUser);
          $BodyUser = str_replace('{{hotel_name}}', $hotelName, $BodyUser);
          $BodyUser = str_replace('{{package_id}}', $pkg_order_id, $BodyUser);
          $mailUser->Body = $BodyUser;

          $mailHotel->send();
          $mailTourguide->send();
          $mailUser->send();
        } catch (Exception $e) {
          echo "Message could not be sent.";
        }

?>