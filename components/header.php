<header>
  <div class="container">
    <nav>
      <div class="logo">
        <img src="/ExploreSriLanka/Images/logo.png" alt="">
      </div>
      <ul>
        <div class="btn">
          <i class="fas fa-times close-btn"></i>
        </div>
        <li><a <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') echo 'class="active"'; ?> href="/ExploreSriLanka/index.php">Home</a></li>
        <li><a <?php if (basename($_SERVER['PHP_SELF']) == 'about.php') echo 'class="active"'; ?> href="/ExploreSriLanka/about.php">About</a></li>
        <li><a <?php if (basename($_SERVER['PHP_SELF']) == 'tours.php') echo 'class="active"'; ?> href="/ExploreSriLanka/tours.php">Tours</a></li>
        <li><a <?php if (basename($_SERVER['PHP_SELF']) == 'destination.php') echo 'class="active"'; ?> href="/ExploreSriLanka/destination.php">Destination</a></li>
        <li><a <?php if (basename($_SERVER['PHP_SELF']) == 'shop.php') echo 'class="active"'; ?> href="/ExploreSriLanka/shop.php">Shop</a></li>
        <li><a <?php if (basename($_SERVER['PHP_SELF']) == 'gallery.php') echo 'class="active"'; ?> href="/ExploreSriLanka/gallery.php">Gallery</a></li>
        <li><a <?php if (basename($_SERVER['PHP_SELF']) == 'contact.php') echo 'class="active"'; ?> href="/ExploreSriLanka/contact.php">Contact</a></li>
      </ul>

      <?php
      require_once __DIR__ . '/../config.php';

      if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_number'], $_POST['nationality'])) {
        $contactNumber = mysqli_real_escape_string($conn, $_POST['contact_number']);
        $nationality = mysqli_real_escape_string($conn, $_POST['nationality']);

        $customerEmail = $_SESSION['customer_email'];

        $sql = "UPDATE customers SET contact_number = '$contactNumber', nationality = '$nationality' WHERE email = '$customerEmail'";
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
        $sql = "SELECT picture, contact_number, nationality FROM customers WHERE email = '$customer_email'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
          $user_picture_path = $row['picture'];

          if ($user_picture_path && file_exists($_SERVER['DOCUMENT_ROOT'] . '/ExploreSriLanka/' . $user_picture_path)) {
            echo '<div class="profile-avatar">';
            echo '<ul>';
            echo '<li>';
            echo '<img src="/ExploreSriLanka/' . $user_picture_path . '" alt="User Picture" class="avatar"/>';
          } else {


            echo '<div class="profile-avatar">';
            echo '<ul>';
            echo '<li>';
            echo '<img src="/ExploreSriLanka/Images/users/avatar_placeholder.png" alt="User Picture" class="avatar"/>';
          }
          echo '<ul>';
          echo '<li class="avatar-sub-item">';
          echo '<span class="material-icons-outlined"> account_circle </span>';
          echo '<p>Profile</p>';
          echo '</li>';
          echo '<li class="avatar-sub-item">';
          echo '<span class="material-icons-outlined"> manage_accounts </span>';
          echo '<p>Settings</p>';
          echo '</li>';
          echo '<li class="avatar-sub-item">';
          echo '<span class="material-icons-outlined"> logout </span>';
          echo '<p>Logout</p>';
          echo '</li>';
          echo '</ul>';
          echo '</li>';
          echo '</ul>';
          echo '</div>';

          if (empty($row['contact_number']) || empty($row['nationality'])) {

      ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <script>
              Swal.fire({
                title: "Complete Profile",
                html: '<div class="completeprofile"><input type="tel" id="contact_number" placeholder="Contact Number"><div class="input-with-icon"><input type="text" id="nationality" placeholder="Nationality" class="country-select"></div><p>You have to fill these fields to continue in to the site!</p></div>',
                icon: "info",
                showCancelButton: false,
                confirmButtonText: "Submit",
                showLoaderOnConfirm: true,
                allowOutsideClick: false,
                preConfirm: () => {
                  const contactNumber = document.getElementById("contact_number").value;
                  const nationality = document.getElementById("nationality").value;
                  const countryCode = phoneInput.getSelectedCountryData().dialCode;

                  if (!contactNumber || !nationality) {
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
                      nationality: nationality,
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
              const nationalityInput = document.getElementById("nationality");
              const submitButton = Swal.getConfirmButton();

              submitButton.disabled = true;

              contactNumberInput.addEventListener("input", toggleSubmitButtonState);
              nationalityInput.addEventListener("input", toggleSubmitButtonState);

              function toggleSubmitButtonState() {
                const contactNumber = contactNumberInput.value.trim();
                const nationality = nationalityInput.value.trim();

                submitButton.disabled = !(contactNumber && nationality);
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
  .profile-avatar ul {
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    gap: 3rem;
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
    width: 20rem;
    right: -3rem;
    top: 4.5rem;
    border-radius: 0.325rem;
    gap: 0;
    padding: 1rem 0rem;
    opacity: 0;
    box-shadow: 0px 0px 100px rgba(20, 18, 18, 0.25);
    display: none;
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
  #nationality {
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

  .country-name {
    font-size: 13px;
  }
</style>