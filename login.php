<?php
require_once 'config.php';

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Register
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {

  $email = $_POST['remail'];
  $password = $_POST['rpassword'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $contact_number = $_POST['contact_number'];
  $nationality = $_POST['nationality'];

  // Generate a unique customer ID
  $sql = "SELECT MAX(RIGHT(customer_id, 5)) AS max_id FROM customers";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $max_id = $row['max_id'];
  $next_id = $max_id + 1;
  $customer_id = 'C' . str_pad($next_id, 5, '0', STR_PAD_LEFT);

  $sql = "SELECT * FROM customers WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);

  // if email doesn't exists, then the user can register
  if (mysqli_num_rows($result) > 0) {
    echo "<div class='alert alert-danger'>Email already exists</div>";
  } else {
    
    $mail = new PHPMailer(true);

    try {
      
      $mail->SMTPDebug = 0;
      $mail->isSMTP();
      $mail->Host = SMTP_HOST;
      $mail->SMTPAuth = true;
      $mail->Username = SMTP_USERNAME;
      $mail->Password = SMTP_PASSWORD;
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = SMTP_PORT;
      $mail->setFrom(SMTP_USERNAME, SMTP_NAME);
      $full_name = $first_name . " " . $last_name;
      $mail->addAddress($email, $full_name);
      $mail->isHTML(true);
      $mail->Subject = "Welcome to Explore Sri Lanka!";
      $mail->Body = '
      <!DOCTYPE html>
      <html>
      <head>
          <style>
              body {
                  font-family: "Poppins", sans-serif;
                  background-color: #f5f5f5;
                  margin: 0;
                  padding: 0;
                  box-sizing: border-box;
              }
              .container {
                  max-width: 600px;
                  margin: 0 auto;
                  padding: 20px;
                  background-color: #cbf2f6;
                  border-radius: 10px;
                  border: 1px solid #b9c9e5;
                  overflow: hidden;
              }
              h1 {
                  font-size: 1.9rem;
                  color: #444;
                  margin-bottom: 10px;
                  text-align: center;
                  font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande", "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
              }
      
              h2 {
                  font-size: 1.8rem;
                  color: #444;
                  margin-bottom: 10px;
                  margin-top: 50px;
                  text-align: center;
                  font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande", "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
              }
      
              h3 {
                  font-size: 0.6rem;
                  color: #444;
                  margin-bottom: 10px;
                  margin-top: 10px;
                  text-align: center;
                  font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande", "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
              }
      
              p {
                  color: #666;
                  font-size: 1.3rem;
                  line-height: 1.6;
                  margin-bottom: 20px;
                  text-align: center;
              }
      
              .btn {
                  width: 120px;
                  padding: 15px 20px;
                  background-color: #5995fd;
                  border: none;
                  outline: none;
                  height: 20px;
                  border-radius: 49px;
                  color: #fff;
                  text-transform: uppercase;
                  font-weight: 600;
                  margin: 10px auto;
                  cursor: pointer;
                  transition: 0.5s;
                  text-decoration: none;
                  display: block; 
              }
      
              .btn:hover {
                  background-color: #083076;
              }
      
              .pic1 img {
                  max-width: 100%;
                  height: auto;
                  overflow: hidden;
                  border-radius: 20px;
              }
      
              .service {
                  text-align: center;
                  margin-top: 50px;
              }
      
              .service .pic1 {
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  margin: 20px auto;
                  margin-top: 70px;
              }
      
              .service .pic1 img {
                  width: 50%;
                  margin: 0 10px;
                  border-radius: 20px;
                  border: #083076 solid 1px;
              }
      
              .service .pic1 p {
                  width: 50%;
                  text-align: center;
                  margin: 10px auto;
              }
      
              .footer {
                  margin-top: 50px;
                  text-align: center;
              }
      
              .footer .pic1 img {
                  width: 50%; 
                  height: 50%;
                  margin-top: 10px;
              }
          </style>
      </head>
      <body>
          <div class="container">
              <div class="pic1">
                  <img src="https://i.postimg.cc/9XTC1YS2/Travel1.png">
                  <h1>Your journey starts here,<br> ' . $first_name . ' ' . $last_name . '</h1>
                  <p>Congrats – you\'ve just stepped into a Explore Sri Lanka travel community! Get ready for an unforgettable journey through this amazing destination!</p>
                  <a href="' . WEB_HOME . '" class="btn" style="color: #fff; text-align: center;">Get Started</a>
              </div>
              
              <div class="service">
                  <h2>What you can do on <br>Explore SriLanka </h2>
                  <div class="pic1">
                      <p><b>Plan Your Trip</b><br>Create custom itineraries and save your favourite finds.</p>
                      <img src="https://i.postimg.cc/Nf6GGk7D/Travel3.png">
                  </div>
                  
                  <div class="service">
                      <div class="pic1">
                          <img src="https://i.postimg.cc/85fD2Rzh/Travel7.jpg">
                          <p><b>Craft Your Perfect Stay</b><br>Swift Bookings in Nearby Destinations, Deluxe Stays Await!</p>
                      </div>    
                  </div>
      
                  <div class="catagory">
                      <h2>Explore by category</h2>
                      <div class="pic1">
                          <img src="https://i.postimg.cc/BnNqHZz1/Travel4.webp">Camping
                          <img src="https://i.postimg.cc/FKRhZ5tC/Travel8-1.png">Tour Guidence
                          <img src="https://i.postimg.cc/nr8ZpXXN/Travel9.jpg">Adventure
                      </div>
                  </div>
              </div>
      
              <div class="footer">
                  <div class="pic1">
                      <img src="https://i.postimg.cc/YqKqwsgj/logo-no-background.png">
                      <h3>Please do not reply directly to this email. This was sent from an address that cannot accept responses. For questions or assistance, visit our Help Centre.<br>
                          <br>
                          © 2024 ExploreSriLanka. All rights reserved.</h2>
                  </div>
              </div>
          </div>
      </body>
      </html>
      ';
      $mail->send();

      $sql = "INSERT INTO customers (email, password, first_name, last_name, contact_number, nationality, email_verified_at, customer_id) VALUES ('$email', '$password', '$first_name', '$last_name', '$contact_number', '$nationality', NULL, '$customer_id')";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        echo "<div class='alert alert-success'>Registration successful</div>";
      } else {
        echo "<div class='alert alert-danger'>Registration failed</div>";
      }
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }
}

// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
//   $email = $_POST['email'];
//   $password = $_POST['password'];

//   $query = "SELECT * FROM customers WHERE email = '$email'";
//   $result = mysqli_query($conn, $query);

//   if (mysqli_num_rows($result) == 1) {
//     $row = mysqli_fetch_assoc($result);
//     if (!empty($row['password'])) {
//       // Password exists, so check if it matches
//       if ($row['password'] == $password) {
//         if ($row['email_verified_at'] == NULL) {
          
//         } else {
//           // Store the user's token in the session
//           $_SESSION['customer_email'] = $email;
//           // Redirect the user to the test page
//           header("Location: index.php");
//           exit();
//         }
//       } else {
//         // Password doesn't match
//         echo "<div class='alert alert-danger'>Invalid email or password.</div>";
//       }
//     } else {
//       // Password is empty in the database
//       echo "<div class='alert alert-warning'>This email is registered using Google authentication. Login through Google!</div>";
//     }
//   } else {
//     // No user found with the provided email
//     echo "<div class='alert alert-danger'>Invalid email or password.</div>";
//   }
// }

// Verify Email (Email Verification Modal)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["verify_email"])) {
  $email = $_POST["email"];
  $verification_code = $_POST["verification_code"];

  // mark email as verified
  $sql = "UPDATE customers SET email_verified_at = NOW(), verification_code = NULL WHERE email = '" . $email . "' AND verification_code = '" . $verification_code . "'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_affected_rows($conn) == 0) {
      echo json_encode(array("status" => "error"));
      exit();
  }

  // Store the user's token in the session
  $_SESSION['customer_email'] = $email;

  echo json_encode(array("status" => "success"));
  exit();
}

// Send Verification Code (Email Verification Modal)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["send_code"])) {
  $email = $_POST['email'];

  // Generate verification code
  $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

  // Update verification code in the database
  $sql = "UPDATE customers SET verification_code = '$verification_code' WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    // Send verification code to user's email
    // Instantiate PHPMailer
    $mail = new PHPMailer(true);

    try {
      // SMTP configuration
      $mail->isSMTP();
      $mail->Host = SMTP_HOST;
      $mail->SMTPAuth = true;
      $mail->Username = SMTP_USERNAME;
      $mail->Password = SMTP_PASSWORD;
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = SMTP_PORT;

      // Sender and recipient
      $mail->setFrom(SMTP_USERNAME, SMTP_NAME);
      $mail->addAddress($email);

      // Email content
      $mail->isHTML(true);
      $mail->Subject = 'Email Verification';
      $mail->Body = 'Your verification code is: ' . $verification_code;

      // Send email
      $mail->send();
      
      echo "<div class='alert alert-success'>Verification code sent successfully.</div>";
    } catch (Exception $e) {
      echo "<div class='alert alert-danger'>Error sending verification code. Please try again later.</div>";
    }
  } else {
    echo "<div class='alert alert-danger'>Error updating verification code. Please try again later.</div>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="css/login.css">
    <title>Sign-In</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">

          <!-- Sign In -->
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="sign-in-form">
            <a href="index.php" class="back-btn"><i class="fa fa-arrow-left"></i></a>
            <h2 class="title">Sign in</h2>
            <p class="subtitle">Fill the following to continue</p>
            <div class="input-field input-login-error">
              <i class="fas fa-user"></i>
              <input type="text" name="email" placeholder="Email Address" />
            </div>
            <div class="input-field input-login-error">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" />
            </div>
            <p class = "loginError" id="loginMessage" class="login-message"></p>
            <input type="submit" value="Login" name="login" class="btn solid" />
            <p class="social-text">Or Sign in with Google</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
            </div>
          </form>

          <!-- Sign Up -->
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="sign-up-form">
            <a href="index.php" class="back-btn-signup"><i class="fa fa-arrow-left"></i></a>
            <h2 class="title">Sign up</h2>
            <p class="subtitle">Fill the following to continue</p>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" id="remail" name="remail" placeholder="Email" />
              <span id="emailError" class="error-message" style="color: red;"></span>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" id="rpassword" name="rpassword" placeholder="Password" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" id="reenter_password" name="reenter_password" placeholder="Re-enter Password" />
              <span id="passwordError" class="error-message" style="color: red;"></span>
            </div>
            <div class="input-field hidden">
              <i class="fas fa-user"></i>
              <input type="text" id="first_name" name="first_name" placeholder="First Name" required />
            </div>
            <div class="input-field hidden">
              <i class="fas fa-user"></i>
              <input type="text" id="last_name" name="last_name" placeholder="Last Name" required />
            </div>
            <div class="input-field hidden">
              <i class="fas fa-phone"></i>
              <input type="text" id="contact_number" name="contact_number" placeholder="Contact Number" required />
            </div>
            <div class="input-field hidden">
              <i class="fas fa-globe"></i>
              <input type="text" id="nationality" name="nationality" placeholder="Nationality" required />
            </div>
            <input type="button" class="btn next-btn" value="Next" />
            <div class="button-container">
              <input type="button" class="btn back-btn-form hidden" value="Back" />
              <input type="submit" class="btn signup-btn hidden" name="register" value="Sign up" />
            </div>            
            <p class="social-text">Or Sign up with Google</p>
            <div class="social-media">
              <a href="<?php echo $client->createAuthUrl(); ?>" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <!-- Modal for verification -->
  <div id="verificationModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Verification Code</h2>
      <form id="verificationForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div>
        <div class="input-field input-verify-error">
          <i class="fas fa-envelope"></i>
          <input type="text" class="form-control" id="verification_code" name="verification_code" placeholder="Enter verification code" maxlength="6" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
        </div>
        <input type="hidden" id="verified_email" name="email" value="">
        <p class = "verifyError" id="verifyMessage" class="verify-message"></p>
        <div class="modalVerifyBtn">
        <button type="button" id="sendCodeBtn" class="btn btn-primary">Send Code</button>
        <button type="submit" class="btn btn-success" name="verify_email">Verify</button>
        </div>
      </div>
        
      </form>
      <span id="cooldownText"></span>
    </div>
  </div>

  <script src="js/login.js"></script>

    <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
  $(document).ready(function() {
    // Function to display the verification modal
    function displayVerificationModal(email) {
      var modal = document.getElementById("verificationModal");
      var span = document.getElementsByClassName("close")[0];
      var verifiedEmailInput = document.getElementById("verified_email");

      verifiedEmailInput.value = email; // Set the email in the hidden input

      // close modal when user click x
      span.onclick = function() {
        modal.style.display = "none";
      }

      // this prevents user from closing the modal by clicking outside of it
      modal.onclick = function(event) {
        if (event.target === modal) {
          return false; // Prevent closing the modal
        }
      }

      // display the modal
      modal.style.display = "block";
    }

    // check if the email and password match, if yes, and email is not verified, display verification modal
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])): ?>
      <?php
      $email = $_POST['email'];
      $password = $_POST['password'];

      $query = "SELECT * FROM customers WHERE email = '$email'";
      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (!empty($row['password'])) {
          
          if ($row['password'] == $password) {
            if ($row['email_verified_at'] == NULL) {
              echo 'var needVerificationModal = true;';
              echo 'var userEmail = "' . $email . '";';
            } else {
              
              $_SESSION['customer_email'] = $email;
              echo 'window.location.href = "index.php";';
            }
          } else {
            echo '$("#loginMessage").text("Invalid Email or Password.");';
            echo '$(".input-login-error").css("border", "1px solid red");';
          }
        } else {
          // if password is empty in the database (that means user registered using Google authentication)
          echo '$("#loginMessage").text("This email is registered using Google authentication. Login through Google!");';
        }
      } else {
        echo '$("#loginMessage").text("Invalid Email or Password.");';
        echo '$(".input-login-error").css("border", "1px solid red");';
      }
      ?>
    <?php endif; ?>

    if (needVerificationModal) {
      displayVerificationModal(userEmail);
    }
  });
</script>

    <script>
    $(document).ready(function() {
  $('#verificationForm').on('submit', function(event) {
    event.preventDefault(); // using this to prevent form submission

    // gett the email, verification code
    var verificationCode = $('#verification_code').val();
    var email = $('#verified_email').val();

    
    $.ajax({
      type: 'POST',
      url: '<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>',
      data: {
        verify_email: true,
        email: email,
        verification_code: verificationCode
      },
      dataType: 'json',
      success: function(response) {
    if (response.status == 'success') {
        window.location.href = 'index.php';
    } else {
        $(".input-verify-error").css("border", "1px solid red");
        $('.verifyError').text("Invalid Verification Code");
    }
},
      error: function(xhr, status, error) {
        console.error(xhr.responseText);
      }
    });
  });

  $('#sendCodeBtn').on('click', function() {
    var btn = $(this);
    var cooldownText = $('#sendCodeBtn');

    // added a countdown to the button (60 seconds countdown & disables button)
    var countdown = 60;
    btn.prop('disabled', true);
    btn.addClass('disabled');

    // reset error message and the border of the input field
    $(".input-verify-error").css("border", "none");
    $('.verifyError').text("");

    // countdown timer
    var interval = setInterval(function() {
      cooldownText.text('Resend Code (' + countdown + 's)');
      countdown--;

      // if countdown is 0:
      if (countdown < 0) {
        clearInterval(interval);
        btn.prop('disabled', false); 
        cooldownText.text('Send Code');
        btn.removeClass('disabled');
      }
    }, 1000);

    $.ajax({
      type: 'POST',
      url: '<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>',
      data: {
        send_code: true,
        email: '<?php echo isset($email) ? $email : ''; ?>'
      },
      dataType: 'json',
      success: function(response) {
        if (response.status == 'success') {
          alert(response.message);
        } else {
          alert(response.message);
        }
      },
      error: function(xhr, status, error) {
        console.error(xhr.responseText);
      }
    });
  });
});

  </script>

  </body>
</html>
