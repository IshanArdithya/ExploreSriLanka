<header>
  <div class="container">
    <nav>
      <div class="logo">
        <a href="/ExploreSriLanka/index.php"><img src="/ExploreSriLanka/Images/logo.png" alt=""></a>
      </div>
      <ul>
    <div class="btn">
        <i class="fas fa-times close-btn"></i>
    </div>
    <li class="main-navigation <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>"><a href="/ExploreSriLanka/index.php">Home</a></li>
    <li class="main-navigation <?php echo (basename($_SERVER['PHP_SELF']) == 'about.php') ? 'active' : ''; ?>"><a href="/ExploreSriLanka/about.php">About</a></li>
    <li class="main-navigation <?php echo (basename($_SERVER['PHP_SELF']) == 'tours.php') ? 'active' : ''; ?>"><a href="/ExploreSriLanka/tours.php">Tours</a></li>
    <li class="main-navigation <?php echo (basename($_SERVER['PHP_SELF']) == 'destinations.php') ? 'active' : ''; ?>"><a href="/ExploreSriLanka/destinations.php">Destinations</a></li>
    <li class="main-navigation <?php echo (basename($_SERVER['PHP_SELF']) == 'shop.php') ? 'active' : ''; ?>"><a href="/ExploreSriLanka/shop.php">Shop</a></li>
    <li class="main-navigation <?php echo (basename($_SERVER['PHP_SELF']) == 'hotelbooking.php') ? 'active' : ''; ?>"><a href="/ExploreSriLanka/hotelbooking.php">Hotel</a></li>
    <li class="main-navigation <?php echo (basename($_SERVER['PHP_SELF']) == 'gallery.php') ? 'active' : ''; ?>"><a href="/ExploreSriLanka/gallery.php">Gallery</a></li>
    <li class="main-navigation <?php echo (basename($_SERVER['PHP_SELF']) == 'contact.php') ? 'active' : ''; ?>"><a href="/ExploreSriLanka/contactus.php">Contact</a></li>
</ul>

      <?php
      require_once __DIR__ . '/../config.php';

      if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_number'], $_POST['country'])) {
        $contactNumber = mysqli_real_escape_string($conn, $_POST['contact_number']);
        $country = mysqli_real_escape_string($conn, $_POST['country']);

        $customerEmail = $_SESSION['customer_email'];

        $sql = "UPDATE customers SET contact_number = '$contactNumber', country = '$country' WHERE email = '$customerEmail'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
          header("Location: {$_SERVER['PHP_SELF']}");
          exit();
        } else {
          echo "Failed to update profile.";
        }
      }

      if (isset($_SESSION['customer_email'])) {

        $customer_email = $_SESSION['customer_email'];
        $sql = "SELECT picture, contact_number, country FROM customers WHERE email = '$customer_email'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
          $user_picture_path = $row['picture'];

          if ($user_picture_path && file_exists($_SERVER['DOCUMENT_ROOT'] . '/ExploreSriLanka/' . $user_picture_path)) {
            echo '<div class="profile-avatar">';
            echo '<ul class="image-profile">';
            echo '<li class="image-profile">';
            echo '<img src="/ExploreSriLanka/' . $user_picture_path . '" alt="User Picture" class="avatar"/>';
          } else {

            echo '<div class="profile-avatar">';
            echo '<ul class="image-profile">';
            echo '<li class="image-profile">';
            echo '<img src="/ExploreSriLanka/Images/users/avatar_placeholder.png" alt="User Picture" class="avatar"/>';
          }
      ?>
          <ul>
            <li class="avatar-sub-item">
              <a href="/ExploreSriLanka/new-profile.php">
                <i class="fa-solid fa-circle-user"></i>
                <span>Profile</span>
              </a>
            </li>
            <li class="avatar-sub-item">
              <a href="/ExploreSriLanka/user.php">
                <i class="fa-solid fa-gear"></i>
                <span>Settings</span>
              </a>
            </li>
            <li class="avatar-sub-item">
              <a href="/ExploreSriLanka/logout.php">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>logout</span>
              </a>
            </li>
          </ul>
          </li>
          </ul>
  </div>

  <?php

          if (empty($row['contact_number']) || empty($row['country'])) {

  ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
      Swal.fire({
        title: "Complete Profile",
        html: '<div class="completeprofile"><input type="tel" id="contact_number" placeholder="Contact Number"><div class="input-with-icon"><input type="text" id="country" placeholder="Country" class="country-select"></div><p>You have to fill these fields to continue in to the site!</p></div>',
        icon: "info",
        showCancelButton: false,
        confirmButtonText: "Submit",
        showLoaderOnConfirm: true,
        allowOutsideClick: false,
        preConfirm: () => {
          const contactNumber = document.getElementById("contact_number").value;
          const country = document.getElementById("country").value;
          const countryCode = phoneInput.getSelectedCountryData().dialCode;

          if (!contactNumber || !country) {
            Swal.showValidationMessage("Please fill out both fields.");
            return false;
          }

          return fetch("", {
            method: "POST",
            headers: {
              "Content-Type": "application/x-www-form-urlencoded",
            },
            body: new URLSearchParams({
              contact_number: countryCode + contactNumber,
              country: country,
            }),
          }).then(response => {
            if (!response.ok) {
              throw new Error(response.statusText);
            }
            return response.json();
          }).catch(error => {
            Swal.showValidationMessage(`Request failed: ${error}`);
          });
        },
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title: "Profile Updated",
            icon: "success",
          }).then(() => {
            location.reload();
          });
        }
      });

      const contactNumberInput = document.getElementById("contact_number");
      const countryInput = document.getElementById("country");
      const submitButton = Swal.getConfirmButton();

      submitButton.disabled = true;

      contactNumberInput.addEventListener("input", toggleSubmitButtonState);
      countryInput.addEventListener("input", toggleSubmitButtonState);

      function toggleSubmitButtonState() {
        const contactNumber = contactNumberInput.value.trim();
        const country = countryInput.value.trim();

        submitButton.disabled = !(contactNumber && country);
      }
    </script>
<?php
          }
        } else {
          echo 'User picture not found.';
        }
        mysqli_close($conn);
      } else {
        echo '<div class="sign-in-up-btn">';
        echo '<a href="/ExploreSriLanka/login.php" class="custom-btn">Sign In Now</a>';
        echo '</div>';
      }
?>
<div class="btn">
  <i class="fas fa-bars menu-btn"></i>
</div>
</nav>
</div>
</header>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/country-select-js/2.1.1/css/countrySelect.css" integrity="sha512-WPc1lYhwI/V+DbzjPRw98rLrQznhpPZ7C/d7K6Vc5s7Sxw2zEk4xLodZwPP0SQ3aLJsBbuaYF0iovbFs2zzKlw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/country-select-js/2.1.1/js/countrySelect.min.js" integrity="sha512-criuU34pNQDOIx2XSSIhHSvjfQcek130Y9fivItZPVfH7paZDEdtAMtwZxyPq/r2pyr9QpctipDFetLpUdKY4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<img src="https://cdnjs.cloudflare.com/ajax/libs/country-select-js/2.1.1/img/flags@2x.png" style="display: none;">


<script>
  const phoneInputField = document.querySelector("#contact_number");
  const phoneInput = window.intlTelInput(phoneInputField, {
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
  });

  $(document).ready(function() {
    $('.country-select').countrySelect();
  });
</script>

<style>

.avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    text-decoration: none;
}
  .profile-avatar ul {
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    gap: 3rem;
    text-decoration: none;

  }

  .profile-avatar li {
    list-style-type: none;
    position: relative;
    padding: 0.625rem 0 0.5rem;
  }

  .profile-avatar li ul {
    flex-direction: column;
    position: fixed;
    background-color: white;
    align-items: flex-start;
    transition: all 0.5s ease;
    width: 15em;
    top: 4.5rem;
    border-radius: 0.325rem;
    gap: 0;
    padding: 1rem 0rem;
    opacity: 0;
    box-shadow: 0px 0px 100px rgba(20, 18, 18, 0.25);
    display: none;
    text-decoration: none;

  }

  .profile-avatar li ul:hover {
    transform: translate(0, 0) !important;
    
  }

  .avatar-sub-item a {
    display: flex;
    align-items: center;
    gap: 0.725rem;
    text-decoration: none;
    color: black;
    font-size: 1rem;
  }

  

  .avatar-sub-item a i {
    flex-shrink: 0;
    color: black;
  }

  .avatar-sub-item a span {
    flex-grow: 1;
    color: black;
  }


  .profile-avatar ul li:hover>ul,
  .profile-avatar ul li ul:hover {
    visibility: visible;
    opacity: 1;
    display: flex;
  }

  .profile-avatar .material-icons-outlined {
    color: #888888;
    transition: all 0.3s ease-out;
  }

  .profile-avatar .material-icons-outlined:hover {
    color: #ff9800;
    transform: scale(1.25) translateY(-4px);
    cursor: pointer;
  }

  .profile-avatar .profile {
    height: 3rem;
    width: auto;
    cursor: pointer;
  }

  .profile-avatar .avatar-sub-item {
    width: 100%;
    display: flex;
    align-items: center;
    gap: 0.725rem;
    cursor: pointer;
    padding: 0.5rem 1.5rem;
  }

  .profile-avatar .avatar-sub-item:hover {
    background-color: rgba(232, 232, 232, 0.4);
  }

  .profile-avatar .avatar-sub-item:hover .material-icons-outlined {
    color: #ff9800;
    transform: scale(1.08) translateY(-2px);
    cursor: pointer;
  }

  .profile-avatar .avatar-sub-item:hover p {
    color: #000;
    cursor: pointer;
  }

  .profile-avatar .avatar-sub-item p {
    font-size: 0.85rem;
    color: #888888;
    font-weight: 500;
    margin: 0.4rem 0;
    flex: 1;
  }

  #contact_number,
  #country {
    margin-bottom: 10px;
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 14px;
    padding-left: 3.5em;
  }

  .iti {
    width: 100%;
  }

  .iti__country-list {
    max-height: 125px;
    overflow-y: auto;
  }

  .iti__country-name,
  .iti__dial-code {
    font-size: 13px;
  }

  .completeprofile {
    display: flex;
    flex-direction: column;
    gap: 10px;
    overflow: hidden;
  }

  .completeprofile p {
    font-size: 0.85rem;
    color: #888888;
    font-weight: 500;
    margin: 0.4rem 0;
    margin-top: 20px;
  }

  .country-select {
    width: 100%;
  }

  .country-list {
    max-height: 75px !important;
  }

  .country-name {
    font-size: 13px;
  }
</style>