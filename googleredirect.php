<?php
require_once 'config.php'; // Include the config file

// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);

  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $userinfo = [
    'email' => $google_account_info['email'],
    'first_name' => $google_account_info['givenName'],
    'last_name' => $google_account_info['familyName'],
    'gender' => $google_account_info['gender'],
    'full_name' => $google_account_info['name'],
    'picture' => $google_account_info['picture'],
    'verifiedEmail' => $google_account_info['verifiedEmail'],
  ];

  // checking if user is already exists in database
  $sql = "SELECT * FROM users WHERE email ='{$userinfo['email']}'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    // user is exists
    $userinfo = mysqli_fetch_assoc($result);
                                                
    $email = $userinfo['email']; // Store email in $email variable
  } else {
    // user is not exists

    // Check if the email is verified by Google
    if ($userinfo['verifiedEmail'] == true) {
      // Update email_verified_at to current time
      $sql = "INSERT INTO users (email, first_name, last_name, full_name, picture, email_verified_at) VALUES ('{$userinfo['email']}', '{$userinfo['first_name']}', '{$userinfo['last_name']}', '{$userinfo['full_name']}', '{$userinfo['picture']}', NOW())";
    } else {
      $sql = "INSERT INTO users (email, first_name, last_name, full_name, picture, email_verified_at) VALUES ('{$userinfo['email']}', '{$userinfo['first_name']}', '{$userinfo['last_name']}', '{$userinfo['full_name']}', '{$userinfo['picture']}', NULL)";
    }

    $result = mysqli_query($conn, $sql);
    if ($result) {
                                                      
      $email = $userinfo['email']; // Store email in $email variable
    } else {
      echo "User is not created";
      die();
    }
  }

  // save user data into session
  $_SESSION['customer_email'] = $email;




  header("Location: index.php");
  exit();

} else {
  if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    die();
  }

  // checking if user is already exists in database
  $sql = "SELECT * FROM users WHERE email ='{$_SESSION['customer_email']}'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    // user is exists
    $userinfo = mysqli_fetch_assoc($result);
  }
}

?>