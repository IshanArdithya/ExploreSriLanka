<?php

require_once 'config.php';

if (isset($_SESSION['customer_email'])) {

  try {
    // Connect to the database
    $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare and execute the SQL query to fetch customer data
    $stmt = $pdo->prepare("SELECT * FROM customers WHERE email = :email");
    $stmt->bindParam(':email', $_SESSION['customer_email']);
    $stmt->execute();
    $customer = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($customer) {
      $first_name = $customer['first_name'];
      $last_name = $customer['last_name'];
      $email = $customer['email'];
      $contact_number = $customer['contact_number'];
      $country = $customer['country'];
    }
  } catch (PDOException $e) {
    // Handle database connection errors
    echo "Error: " . $e->getMessage();
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/responsive.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
  <title>Settings | Explore Sri Lanka</title>

</head>

<body>

  <!-- Header -->
  <?php
  include 'components/header.php';
  ?>

  </head>

  <body>

    <div class="top-image">
      <h1 class="headings sub-heading"></h1>
    </div>

    <div class="container">
      <div class="row">
        <ol class="breadcrumb">
          <li><a href="../index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
          <li><a href="./new-profile.php" title="Explore Sri Lanka" class="bolds">User-Profile</a></li>
          <li class="active">Settings</li>
        </ol>
      </div>

      <div class="profile-settings-container">
        <h1>Account settings</h1>
        <div class="profile-sub-container">
          <div class="profile-image">
            <img src="<?php echo isset($customer['picture']) ? $customer['picture'] : '.Images/users/avatar_placeholder.png'; ?>" alt="Profile Picture">
            <button class="upload-profile-btn">Upload new photo</button>

          </div>
          <form class="profile-settings-details">
            <div class="name-inputs">
              <div class="profile-group">


                <label class="profile-label">First Name</label>
                <div>
                  <input type="text" class="profile-control control-names profile-settings-row" placeholder="First Name" name="u_firstname" value="<?php echo isset($first_name) ? $first_name : ''; ?>" readonly>
                </div>
              </div>
              <div class="profile-group">
                <label class="profile-label">Last Name</label>
                <div>
                  <input type="text" class="profile-control control-names profile-settings-row" placeholder="Last Name" name="u_lastname" value="<?php echo isset($last_name) ? $last_name : ''; ?>" readonly>
                </div>
              </div>

            </div>
            <div class="profile-group">
              <label class="profile-label">E-mail</label>
              <div>
                <input type="text" class="profile-control profile-settings-row" value="<?php echo isset($email) ? $email : ''; ?>" readonly>
              </div>
            </div>
            <div class="profile-group">
              <label class="profile-label">Phone</label>
              <div>
                <input type="text" class="profile-control" placeholder="Telephone" name="u_contact_number" value="<?php echo isset($contact_number) ? $contact_number : ''; ?>" readonly>
              </div>
            </div>

            <div class="profile-group">
              <label class="profile-label">Country</label>
              <div>
                <input type="text" class="profile-control" value="<?php echo isset($country) ? $country : ''; ?>" readonly>
              </div>
            </div>
            <div class="profile-setting-buttons">
              <button type="submit" class="save-profile-btn" name="save_changes">Save changes</button>
              <button class="cancel-profile-btn">Cancel</button>
            </div>
          </form>
          <!-- Password section -->
          <form action="password_reset.php" method="post">
            <div class="password-section">
              <div class="profile-group">
                <label class="profile-label">Current Password</label>
                <div>
                  <input type="password" class="profile-control" name="current_password">
                </div>
              </div>
              <div class="profile-group">
                <label class="profile-label">New Password</label>
                <div>
                  <input type="password" class="profile-control" name="new_password">
                </div>
              </div>
              <div class="profile-group">
                <label class="profile-label">Confirm Password</label>
                <div>
                  <input type="password" class="profile-control" name="confirm_password">
                </div>
              </div>
              <div class="profile-setting-buttons">
                <button type="submit" class="save-profile-btn" name="reset_password">Reset Password</button>
                <button type="button" class="cancel-profile-btn">Cancel</button>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
    </div>



    <script src="js/script.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        // Toggle password section visibility
        const resetPasswordBtn = document.querySelector('.reset-password-btn');
        const passwordSection = document.querySelector('.password-section');

        resetPasswordBtn.addEventListener('click', function() {
          passwordSection.style.display = passwordSection.style.display === 'none' ? 'block' : 'none';
        });
      });
    </script>

    <?php include 'components/footer.php'; ?>
  </body>

</html>