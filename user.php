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
  <title>Product-Details</title>

</head>

<body>

  <!-- Header -->
  <?php
  include 'components/header.php';
  ?>

</head>
<body >
  <div class="container">
    <div class="profile-settings-container">
      <h1>Account settings</h1>
      <div class="profile-sub-container">
        <div class="profile-image">
          <img src="./Images/ella1.jpg" alt="Profile Picture">
          <button class="upload-profile-btn">Upload new photo</button>
         
          <button class="reset-password-btn upload-profile-btn">Reset Password</button>
        </div>
        <form class="profile-settings-details">
        <div class="name-inputs">
          <div class="profile-group">
            

            <label class="profile-label">First Name</label>
            <div>
            <input type="text" class="profile-control control-names profile-settings-row" placeholder="First Name">
            </div>
          </div>
          <div class="profile-group">
            <label class="profile-label">Last Name</label>
            <div>
            <input type="text" class="profile-control control-names profile-settings-row" placeholder="Last Name">
            </div>
          </div>

          </div>
          <div class="profile-group">
            <label class="profile-label">E-mail</label>
            <div>
            <input type="text" class="profile-control profile-settings-row" value="nmaxwell@mail.com"  disabled>
            </div>
          </div>
          <div class="profile-group">
            <label class="profile-label">Phone</label>
            <div>
            <input type="text" class="profile-control" placeholder="Telephone">
            </div>
          </div>
        
          <div class="profile-group">
            <label class="profile-label">Birthday</label>
            <div>
            <input type="date" class="profile-control" value="1995-05-03"  disabled>
            </div>
          </div>
          <div class="profile-group">
            <label class="profile-label">Country</label>
            <div>
            <input type="text" class="profile-control" value="Canada"  disabled>
            </div>
          </div>
          <div class="profile-setting-buttons">
            <button class="save-profile-btn">Save changes</button>
            <button class="cancel-profile-btn">Cancel</button>
          </div>
          <!-- Password section -->
          <div class="password-section">
            <div class="profile-group">
              <label class="profile-label">Current Password</label>
              <div>
              <input type="password" class="profile-control">
            </div>
            <div class="profile-group">
              <label class="profile-label">New Password</label>
              <div>
              <input type="password" class="profile-control">
              </div>
            </div>
            <div class="profile-group">
              <label class="profile-label">Confirm Password</label>
              <div>
              <input type="password" class="profile-control">
              </div>
            </div>
            <div class="profile-setting-buttons">
            <button class="save-profile-btn">Reset Password</button>
            <button class="cancel-profile-btn">Cancel</button>
          </div>
          </div>
         
        </form>
      </div>

    </div>
      </div>
  </div>



  <script src="js/script.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Toggle password section visibility
      const resetPasswordBtn = document.querySelector('.reset-password-btn');
      const passwordSection = document.querySelector('.password-section');

      resetPasswordBtn.addEventListener('click', function () {
        passwordSection.style.display = passwordSection.style.display === 'none' ? 'block' : 'none';
      });
    });
  </script>

<?php include 'components/footer.php'; ?>
</body>

</html>