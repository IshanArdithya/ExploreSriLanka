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
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $password = $_POST['password'];
        $age = $_POST['age'];
        $contactNumber = $_POST['contactNumber'];
        $district = $_POST['district'];
        $experience = $_POST['experience'];
        $specialty = $_POST['specialty'];

        $fullName = $firstName . " " . $lastName;

        // gen a unique tourguide ID
        $sql = "SELECT MAX(RIGHT(tg_id, 4)) AS max_id FROM tourguide";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $max_id = $row['max_id'];
        $next_id = $max_id + 1;
        $tg_id = 'TG' . str_pad($next_id, 4, '0', STR_PAD_LEFT);

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "SELECT * FROM tourguide WHERE email = '$email'";
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
                $mail->addAddress($email, $fullName);
                $mail->isHTML(true);
                $mail->Subject = "Welcome to Explore Sri Lanka!";
                $mail->Body = '';
                $Body = file_get_contents('emails/register-tourguide.php');
                $Body = str_replace('{{full_name}}', $fullName, $Body);
                $Body = str_replace('{{web_home}}', WEB_HOME, $Body);
                $mail->Body = $Body;
                $mail->send();

                $sql = "INSERT INTO tourguide (tg_id, email, password, first_name, last_name, full_name, age, contact_number, district, experience, specialty, active, status) VALUES ('$tg_id', '$email', '$hashed_password', '$firstName', '$lastName', '$fullName', '$age', '$contactNumber', '$district', '$experience', '$specialty', 0, 'Pending')";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    header("Location: index.php?tourguideregister=1");
                    exit();
                } else {
                    header("Location: index.php?tourguideregister=0");
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

        $check_sql = "SELECT * FROM tourguide WHERE email='$loginEmail'";
        $result = $conn->query($check_sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $hashed_password = $row["password"];
            if (password_verify($loginPassword, $hashed_password)) {
                if ($row["status"] === "Verified") {
                    $_SESSION['tourguide_email'] = $loginEmail;
                    header("Location: dashboards/tourguide/tourguidedashboard.php");
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
                            window.location.href = 'tourguidelogin.php';
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Guide Portal | Explore SriLanka</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="css/tourguidelogin.css">
</head>

<body>
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
                    <form action="" class="login" id="loginForm" method="POST">
                        <h3 class="title">Tour Guide Login</h3>
                        <div class="text-input">
                            <i class="fas fa-envelope"></i>
                            <input type="text" name="loginEmail" id="loginEmail" placeholder="Email" required>
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
                <a href="index.php"><span class="close-icon" >&times;</span></a>

                <div class="register-form-box">
                    <form action="" class="register" id="registerForm" style="display:none;" method="POST">
                        <div>
                            <h3 class="title">Create Your Account</h3>
                        </div>

                        <div class="text-input ">
                            <i class="fas fa-envelope"></i>
                            <input type="email" name="email"  id="email"  placeholder="Email" required>
                        </div>

                        <div class="text-input ">
                            <i class="fas fa-user"></i>
                            <input type="text" name="firstName" id="firstName" placeholder="First Name">
                        </div>

                        <div class="text-input ">
                            <i class="fas fa-user"></i>
                            <input type="text" name="lastName" id="lastName" placeholder="Last Name">
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
                            <i class="fas fa-user"></i>
                            <input type="text" name="age" id="age"  placeholder="Age">
                        </div>

                        <div class="text-input hidden">
                            <i class="fas fa-phone"></i>
                            <input type="tel" name="contactNumber" id="contactNumber" placeholder="Contact Number">
                        </div>

                        <div class="text-input hidden">
                            <i class="fas fa-city"></i>
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
                            <i class="fas fa-bolt"></i>
                            <input type="number" name="experience" id="experience" placeholder="Experience [Years]" min="0">
                        </div>

                        <div class="text-input hidden">
                            <i class="fa-solid fa-star"></i>
                            <input type="text" name="specialty" id="specialty" placeholder="Specialty">
                        </div>

                        <p class="error-message-p"></p>
                        
                        <button type="button" class="btn next-btn" onclick="validatePassword()">Next</button>
                        <div class="button-container hidden">
                            <button type="button" class="btn back-btn-form" onclick="hideAdditionalFields()">Back</button>
                            <input type="submit" class="btn signup-btn" name="register" value="Sign up" />
                        </div>

                        <br>
                        <a href="tourguidelogin.php">Back to Login</a>
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

        // next btn disable/enable
        function updateNextButtonState() {
            var email = document.getElementById("email").value;
            var firstName = document.getElementById("firstName").value;
            var lastName = document.getElementById("lastName").value;
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirmPassword").value;
            var nextBtn = document.querySelector('.next-btn');
            var errorMessage = document.querySelector('.error-message-p');

            if (email !== "" && firstName !== "" && lastName !== "" && password !== "" && confirmPassword !== "") {
                nextBtn.removeAttribute("disabled");
                nextBtn.classList.remove("disabled");
                errorMessage.innerHTML = "";
            } else {
                nextBtn.setAttribute("disabled", "true");
                nextBtn.classList.add("disabled");

            }

            if (email == "" && firstName == "" && lastName == "" && password == confirmPassword) {
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

        // signup btn disable/enable
        function updateSignUpButtonState() {
            var age = document.getElementById("age").value;
            var contactNumber = document.getElementById("contactNumber").value;
            var district = document.getElementById("district").value;
            var experience = document.getElementById("experience").value;
            var specialty = document.getElementById("specialty").value;
            var signupBtn = document.querySelector('.signup-btn');

            if (age !== "" && contactNumber !== "" && district !== "" && experience !== "" && specialty !== "") {
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

        // login btn disable/enable
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
