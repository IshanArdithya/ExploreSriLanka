<?php
require_once 'config.php';

// functionto save image locally
function saveImageLocally($imageUrl, $destinationPath)
{
    $imageData = file_get_contents($imageUrl);
    if ($imageData !== false) {
        file_put_contents($destinationPath, $imageData);
        return true;
    } else {
        return false;
    }
}

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
  $sql = "SELECT * FROM customers WHERE email ='{$userinfo['email']}'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $userinfo = mysqli_fetch_assoc($result);
                                                
    $email = $userinfo['email'];
  } else {
    // user is not exists

      // gen a unique customer ID
    $sql = "SELECT MAX(RIGHT(customer_id, 5)) AS max_id FROM customers";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $max_id = $row['max_id'];
    $next_id = $max_id + 1;
    $customer_id = 'C' . str_pad($next_id, 5, '0', STR_PAD_LEFT);

    if ($userinfo['verifiedEmail'] == true) {
      $sql = "INSERT INTO customers (email, first_name, last_name, full_name, picture, email_verified_at, customer_id) VALUES ('{$userinfo['email']}', '{$userinfo['first_name']}', '{$userinfo['last_name']}', '{$userinfo['full_name']}', '{$userinfo['picture']}', NOW(), '$customer_id')";
    } else {
      $sql = "INSERT INTO customers (email, first_name, last_name, full_name, picture, email_verified_at, customer_id) VALUES ('{$userinfo['email']}', '{$userinfo['first_name']}', '{$userinfo['last_name']}', '{$userinfo['full_name']}', '{$userinfo['picture']}', NULL, '$customer_id')";
    }

    $result = mysqli_query($conn, $sql);
        if ($result) {
            $email = $userinfo['email'];

            $imagePath = "images/users/$customer_id.jpg";
            if (saveImageLocally($userinfo['picture'], $imagePath)) {
              
                $sql = "UPDATE customers SET picture = '$imagePath' WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);
            } else {
                // echo "Failed to save profile picture locally.";
            }
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
  $sql = "SELECT * FROM customers WHERE email ='{$_SESSION['customer_email']}'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    // user is exists
    $userinfo = mysqli_fetch_assoc($result);
  }
}

?>