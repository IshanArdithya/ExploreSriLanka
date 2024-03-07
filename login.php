<?php
require_once 'config.php';

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {

  $email = $_POST['remail'];
  $password = $_POST['rpassword'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $contact_number = $_POST['contact_number'];
  $nationality = $_POST['nationality'];

  // Generate a unique customer ID
  $sql = "SELECT MAX(RIGHT(customer_id, 5)) AS max_id FROM users";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $max_id = $row['max_id'];
  $next_id = $max_id + 1;
  $customer_id = 'C' . str_pad($next_id, 5, '0', STR_PAD_LEFT);

  $sql = "SELECT * FROM users WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // echo "<script>alert('Email already exists');</script>";
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
        <html>
            <head>
                <style>
                    /* Styling for the email content */
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
                        background-color: #fff;
                        border-radius: 10px;
                        overflow: hidden;
                    }
                    h1 {
                        font-size: 2.2rem;
                        color: #444;
                        margin-bottom: 10px;
                    }
                    p {
                        color: #666;
                        font-size: 1.1rem;
                        line-height: 1.6;
                        margin-bottom: 20px;
                    }
                    .btn {
                        width: 150px;
                        padding: 15px 20px;
                        background-color: #5995fd;
                        border: none;
                        outline: none;
                        height: 49px;
                        border-radius: 49px;
                        color: #fff;
                        text-transform: uppercase;
                        font-weight: 600;
                        margin: 10px 0;
                        cursor: pointer;
                        transition: 0.5s;
                        text-decoration: none;
                    }
                    .btn:hover {
                        background-color: #4d84e2;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <h1>Welcome to Explore Sri Lanka!</h1>
                    <p>Your journey starts here, ' . $first_name . ' ' . $last_name . '</p>
                    <p>Congrats—you\'ve just joined the Sri Lanka\'s largest travel community. We\'re thrilled to have you on board!</p>
                    <a href="http://localhost/ExploreSriLanka/index.php" class="btn" style="color: #fff;">Get Started</a>
                </div>
            </body>
        </html>';
      $mail->send();

      $sql = "INSERT INTO users (email, password, first_name, last_name, contact_number, nationality, email_verified_at, customer_id) VALUES ('$email', '$password', '$first_name', '$last_name', '$contact_number', '$nationality', NULL, '$customer_id')";
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

//   $query = "SELECT * FROM users WHERE email = '$email'";
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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["verify_email"])) {
  $email = $_POST["email"];
  $verification_code = $_POST["verification_code"];

  // mark email as verified
  $sql = "UPDATE users SET email_verified_at = NOW(), verification_code = NULL WHERE email = '" . $email . "' AND verification_code = '" . $verification_code . "'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_affected_rows($conn) == 0) {
    die("Verification code failed.");
  }

  // Store the user's token in the session
  $_SESSION['customer_email'] = $email;
  // Redirect the user to the test page
  header("Location: index.php");
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["send_code"])) {
  $email = $_POST['email'];

  // Generate verification code
  $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

  // Update verification code in the database
  $sql = "UPDATE users SET verification_code = '$verification_code' WHERE email = '$email'";
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
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="email" placeholder="Email Address" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" />
            </div>
            <p class = "loginError" id="loginMessage" class="login-message"></p> <!-- Paragraph for displaying login messages -->
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
      <h2>Enter Verification Code</h2>
      <form id="verificationForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div>
        <div class="input-field">
          <i class="fas fa-envelope"></i>
          <input type="text" class="form-control" id="verification_code" name="verification_code" placeholder="Enter verification code" maxlength="6" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
        </div>
        <input type="hidden" id="verified_email" name="email" value="">
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

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
        modal.style.display = "none";
      }

      // // When the user clicks anywhere outside of the modal, close it
      // window.onclick = function(event) {
      //   if (event.target == modal) {
      //     modal.style.display = "none";
      //   }
      // }

      // Prevent the modal from closing when clicking outside of it
      modal.onclick = function(event) {
        if (event.target === modal) {
          return false; // Prevent closing the modal
        }
      }

      // Display the modal
      modal.style.display = "block";
    }

    // Check if the email and password match, if yes, and email is not verified, display verification modal
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])): ?>
      <?php
      $email = $_POST['email'];
      $password = $_POST['password'];

      $query = "SELECT * FROM users WHERE email = '$email'";
      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (!empty($row['password'])) {
          // Password exists, so check if it matches
          if ($row['password'] == $password) {
            if ($row['email_verified_at'] == NULL) {
              echo 'var needVerificationModal = true;';
              echo 'var userEmail = "' . $email . '";';
            } else {
              // Store the user's token in the session
              $_SESSION['customer_email'] = $email;
              // Redirect the user to the test page
              echo 'window.location.href = "index.php";';
            }
          } else {
            // Password doesn't match
            // echo 'alert("Invalid email or password.");';
            echo '$("#loginMessage").text("Invalid Email or Password.");';
            echo '$(".input-field").css("border", "1px solid red");'; // Highlight input fields with red border
          }
        } else {
          // Password is empty in the database
          echo 'alert("This email is registered using Google authentication. Login through Google!");';
        }
      } else {
        // No user found with the provided email
        // echo 'alert("Invalid email or password.");';
        echo '$("#loginMessage").text("Invalid Email or Password.");';
        echo '$(".input-field").css("border", "1px solid red");'; // Highlight input fields with red border
      }
      ?>
    <?php endif; ?>

    // Execute logic based on the JavaScript variables
    if (needVerificationModal) {
      displayVerificationModal(userEmail);
    }
  });
</script>




    <script>
    $(document).ready(function() {
    $('#sendCodeBtn').on('click', function() {
        var btn = $(this);
        var cooldownText = $('#sendCodeBtn'); // Get the button element
        var countdown = 60; // Set the countdown duration in seconds
        btn.prop('disabled', true); // Disable the button during cooldown
        btn.addClass('disabled');
        var interval = setInterval(function() {
            cooldownText.text('Resend Code (' + countdown + 's)'); // Update button text with countdown
            countdown--;
            if (countdown < 0) {
                clearInterval(interval);
                btn.prop('disabled', false); // Enable the button after cooldown finishes
                cooldownText.text('Send Code'); // Revert button text to original
            }
        }, 1000);
        // AJAX request to send code
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
