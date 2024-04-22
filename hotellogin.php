<?php

require_once 'config.php';

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Portal | Explore SriLanka</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="css/hotellogin.css">

</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
        $email = $_POST['email'];
        $hotelName = $_POST['hotelName'];
        $password = $_POST['password'];
        $hotelAddress = $_POST['hotelAddress'];
        $contactNumber = $_POST['contactNumber'];
        $district = $_POST['district'];
        $distanceFromDistrict = $_POST['distanceFromDistrict'];

        // gen a unique hotel ID
        $sql = "SELECT MAX(RIGHT(hotel_id, 5)) AS max_id FROM hotels";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $max_id = $row['max_id'];
        $next_id = $max_id + 1;
        $hotel_id = 'H' . str_pad($next_id, 5, '0', STR_PAD_LEFT);

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "SELECT * FROM hotels WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<script>
            Swal.fire({
                title: 'Exists!',
                text: 'Email already exists!',
                icon: 'error',
                confirmButtonText: 'OK',
                heightAuto: false
            });
        </script>";
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
                $mail->addAddress($email, $hotelName);
                $mail->isHTML(true);
                $mail->Subject = "Welcome to Explore Sri Lanka!";
                $mail->Body = '';
                $Body = file_get_contents('emails/register-hotel.php');
                $Body = str_replace('{{hotel_name}}', $hotelName, $Body);
                $Body = str_replace('{{web_home}}', WEB_HOME, $Body);
                $mail->Body = $Body;
                $mail->send();

                $sql = "INSERT INTO hotels (hotel_id, email, password, name, address, contact_number, district, distance, status) VALUES ('$hotel_id', '$email', '$hashed_password', '$hotelName', '$hotelAddress', '$contactNumber', '$district', '$distanceFromDistrict', 'Pending')";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    header("Location: index.php?hotelregister=1");
                    exit();
                } else {
                    header("Location: index.php?hotelregister=0");
                    exit();
                }
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error!";
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {

        $loginEmail = $_POST['loginEmail'];
        $loginPassword = $_POST['loginPassword'];

        $check_sql = "SELECT * FROM hotels WHERE email='$loginEmail'";
        $result = $conn->query($check_sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $hashed_password = $row["password"];
            if (password_verify($loginPassword, $hashed_password)) {
                if ($row["status"] === "Verified") {
                    $_SESSION['hotel_email'] = $email;
                    header("Location: hoteldashboard.php");
                    exit();
                } elseif ($row["status"] === "Pending") {
                    echo "<script>
                    Swal.fire({
                        title: 'Pending',
                        text: 'Your account is still pending verification. You will receive an email once your account is approved!',
                        icon: 'question',
                        confirmButtonText: 'OK',
                        heightAuto: false
                    });
                </script>";
                } elseif ($row["status"] === "Rejected") {
                    echo "<script>
                    Swal.fire({
                        title: 'Rejected!',
                        text: 'Your account has been rejected. Please contact our support for more information.',
                        icon: 'error',
                        confirmButtonText: 'OK',
                        showCancelButton: true,
                        cancelButtonText: 'Contact Us',
                        heightAuto: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'hotellogin.php';
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            window.location.href = 'contact.php';
                        }
                    });
                </script>";
                }
            } else {
                echo "<script>
                Swal.fire({
                    title: 'Error!',
                    text: 'Wrong Email or Password!',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    heightAuto: false
                });
            </script>";
            }
        } else {
            echo "<script>
            Swal.fire({
                title: 'Error!',
                text: 'Wrong Email or Password!',
                icon: 'error',
                confirmButtonText: 'OK',
                heightAuto: false
            });
        </script>";
        }
    }

    $conn->close();

    ?>


    <div class="container">
        <div class="design">
            <div class="pill-1 rotate-45"></div>
            <div class="pill-2 rotate-45"></div>
            <div class="pill-3 rotate-45"></div>
            <div class="pill-4 rotate-45"></div>
        </div>

        <div class="forms-container">
            <div class="signin-signup">
                <div class="login-form-box">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="login" id="loginForm" method="POST">

                        <h3 class="title">Hotel Login</h3>
                        <div class="text-input">
                            <i class="fas fa-user"></i>
                            <input type="text" name="loginEmail" id="loginEmail" placeholder="Email Address" required>
                        </div>
                        <div class="text-input">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="loginPassword" id="loginPassword" placeholder="Password" required>
                        </div>
                        <button class="login-btn" type="submit" name="login">LOGIN</button>
                        <div>
                            <a href="#" class="forgot">Forgot Password?</a>
                        </div>
                        <div class="create" id="createAccountLink">
                            <a href="#" onclick="toggleForms(),hideAdditionalFields()">Create Your Account</a>
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </form>
                </div>
                <span class="close-icon" onclick="index.php">&times;</span>

                <div class="register-form-box">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="register" id="registerForm" style="display:none;" method="POST">
                        <div>
                            <h3 class="title">Create Your Account</h3>
                        </div>

                        <div class="text-input ">
                            <i class="fas fa-envelope"></i>
                            <input type="email" name="email" id="email" placeholder="Email" required>
                        </div>
                        <div class="text-input ">
                            <i class="fas fa-building"></i>
                            <input type="text" name="hotelName" id="hotelName" placeholder="Hotel Name" required>
                        </div>

                        <div class="text-input ">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="password" id="password" placeholder="Password" required>
                        </div>
                        <div class="text-input ">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" required>
                        </div>

                        <div class="text-input hidden">
                            <i class="fas fa-location-dot"></i>
                            <input type="text" name="hotelAddress" id="hotelAddress" placeholder="Hotel Address">
                        </div>
                        <div class="text-input hidden">
                            <i class="fas fa-phone"></i>
                            <input type="tel" name="contactNumber" id="contactNumber" placeholder="Contact Number">
                        </div>
                        <div class="text-input hidden">
                            <i class="fas fa-globe"></i>
                            <select name="district" id="district" required>
                                <option value="" selected disabled>Select District</option>
                                <option value="Colombo">Colombo</option>
                                <option value="Gampaha">Gampaha</option>
                                <option value="Kalutara">Kalutara</option>
                                <option value="Kandy">Kandy</option>
                                <option value="Matale">Matale</option>
                                <option value="Nuwara Eliya">Nuwara Eliya</option>
                                <option value="Galle">Galle</option>
                                <option value="Matara">Matara</option>
                                <option value="Hambantota">Hambantota</option>
                                <option value="Jaffna">Jaffna</option>
                                <option value="Kilinochchi">Kilinochchi</option>
                                <option value="Mannar">Mannar</option>
                                <option value="Mullaitivu">Mullaitivu</option>
                                <option value="Vavuniya">Vavuniya</option>
                                <option value="Puttalam">Puttalam</option>
                                <option value="Kurunegala">Kurunegala</option>
                                <option value="Anuradhapura">Anuradhapura</option>
                                <option value="Polonnaruwa">Polonnaruwa</option>
                                <option value="Badulla">Badulla</option>
                                <option value="Monaragala">Monaragala</option>
                                <option value="Ratnapura">Ratnapura</option>
                                <option value="Kegalle">Kegalle</option>
                                <option value="Trincomalee">Trincomalee</option>
                                <option value="Batticaloa">Batticaloa</option>
                                <option value="Ampara">Ampara</option>
                            </select>
                        </div>
                        <div class="text-input hidden">
                            <i class="ri-pin-distance-fill"></i>
                            <input type="text" name="distanceFromDistrict" id="distanceFromDistrict" placeholder="Distance From District [00.0] (KM)" required>
                        </div>

                        <p class="error-message-p"></p>

                        <button type="button" class="btn next-btn" onclick="validatePassword()">Next</button>
                        <div class="button-container hidden">
                            <button type="button" class="btn back-btn-form" onclick="hideAdditionalFields()">Back</button>
                            <input type="submit" class="btn signup-btn" name="register" value="Sign up" />
                        </div>

                        <br>
                        <a href="hotellogin.php">Back to Login</a>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        function toggleForms() {
            var loginForm = document.getElementById("loginForm");
            var registerForm = document.getElementById("registerForm");

            if (loginForm.style.display === "none") {
                loginForm.style.display = "block";
                registerForm.style.display = "none";
            } else {
                loginForm.style.display = "none";
                registerForm.style.display = "block";
            }
        }

        function showAdditionalFields() {
            document.querySelectorAll('.register .text-input.hidden').forEach(function(input) {
                input.style.display = 'flex';
            });
            document.querySelectorAll('.register .text-input:not(.hidden)').forEach(function(input) {
                input.style.display = 'none';
            });
            document.querySelector('.next-btn').classList.add('hidden');
            document.querySelector('.button-container').classList.remove('hidden');
        }

        function hideAdditionalFields() {
            document.querySelectorAll('.register .text-input.hidden').forEach(function(input) {
                input.style.display = 'none';
            });
            document.querySelectorAll('.register .text-input:not(.hidden)').forEach(function(input) {
                input.style.display = 'flex';
            });
            document.querySelector('.next-btn').classList.remove('hidden');
            document.querySelector('.button-container').classList.add('hidden');
        }

        function validatePassword() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirmPassword").value;
            var errorMessage = document.querySelector('.error-message-p');

            if (password !== confirmPassword) {
                errorMessage.innerHTML = "Passwords do not match!";
                return;
            }

            errorMessage.innerHTML = "";
            showAdditionalFields();
        }

        function updateNextButtonState() {
            var email = document.getElementById("email").value;
            var hotelName = document.getElementById("hotelName").value;
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirmPassword").value;
            var nextBtn = document.querySelector('.next-btn');
            var errorMessage = document.querySelector('.error-message-p');

            if (email !== "" && hotelName !== "" && password !== "" && confirmPassword !== "") {
                nextBtn.removeAttribute("disabled");
                nextBtn.classList.remove("disabled");
                errorMessage.innerHTML = "";
            } else {
                nextBtn.setAttribute("disabled", "true");
                nextBtn.classList.add("disabled");

            }

            if (email == "" && hotelName == "" && password == confirmPassword) {
                errorMessage.innerHTML = "";
                return;
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            updateNextButtonState();
            document.querySelectorAll('.register input').forEach(function(input) {
                input.addEventListener("input", updateNextButtonState);
            });
        });

        // distance input formatting
        var element = document.getElementById('distanceFromDistrict');
        element.addEventListener('input', (event) => {
            event.target.value = event.target.value
                .replace(/[^\d.]/g, '')
                .replace(/\.(?=.*\.)/g, '');

            if (event.target.value.startsWith('0') && event.target.value.length > 1) {
                event.target.value = event.target.value.substring(1);
            }

            if (parseFloat(event.target.value) > 99.9) {
                event.target.value = '99.9';
            }
        });

        function updateSignUpButtonState() {
            var hotelAddress = document.getElementById("hotelAddress").value;
            var contactNumber = document.getElementById("contactNumber").value;
            var district = document.getElementById("district").value;
            var distanceFromDistrict = document.getElementById("distanceFromDistrict").value;
            var signupBtn = document.querySelector('.signup-btn');

            if (hotelAddress !== "" && contactNumber !== "" && district !== "" && distanceFromDistrict !== "") {
                signupBtn.removeAttribute("disabled");
                signupBtn.classList.remove("disabled");
            } else {
                signupBtn.setAttribute("disabled", "true");
                signupBtn.classList.add("disabled");
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            updateSignUpButtonState();
            document.querySelectorAll('.register input, .register select').forEach(function(input) {
                input.addEventListener("input", updateSignUpButtonState);
            });
        });

        // login

        function updateLoginButtonState() {
            var loginEmail = document.getElementById("loginEmail").value;
            var loginPassword = document.getElementById("loginPassword").value;
            var loginBtn = document.querySelector('.login-btn');

            if (loginEmail !== "" && loginPassword !== "") {
                loginBtn.removeAttribute("disabled");
                loginBtn.classList.remove("disabled");
            } else {
                loginBtn.setAttribute("disabled", "true");
                loginBtn.classList.add("disabled");
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            updateLoginButtonState();
            document.querySelectorAll('.login input').forEach(function(input) {
                input.addEventListener("input", updateLoginButtonState);
            });
        });
    </script>

</body>

</html>