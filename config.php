<?php

require_once 'vendor/autoload.php';

session_start();

// init configuration
$clientID = '176934487237-8hdrp8n0eq45s1oabf8eohcfep9fkmps.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/ExploreSriLanka/googleredirect.php';
$webHome = 'http://localhost/ExploreSriLanka/index.php';
// SMTP configuration
$smtpHost = 'smtp.gmail.com';
$smtpUsername = 'exploresrilanka2024@gmail.com';
$smtpPassword = 'lvhb crws tvgc suwb';
$smtpPort = 587;
$smtpName = 'Explore Sri Lanka';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// Connect to database
$hostname = "localhost";
$username = "root";
$password = "";
$database = "exploresrilanka";

$conn = mysqli_connect($hostname, $username, $password, $database);

// SMTP configuration
define('SMTP_HOST', $smtpHost);
define('SMTP_USERNAME', $smtpUsername);
define('SMTP_PASSWORD', $smtpPassword);
define('SMTP_PORT', $smtpPort);
define('SMTP_NAME', $smtpName);
define('WEB_HOME', $webHome);