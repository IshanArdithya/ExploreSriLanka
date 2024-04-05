<?php require_once 'config.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM hotels WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['hotel_email'] = $email;
        header('Location: hotel_dashboard.php');
        exit();
    } else {
        $_SESSION['login_error'] = "Invalid email or password";
        header('Location: hotellogin.php');
        exit();
    }
}

// registration handling
if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $name = $_POST['hotelName'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $address = isset($_POST['hotelAddress']) ? $_POST['hotelAddress'] : '';
    $contact_number = isset($_POST['contactNumber']) ? $_POST['contactNumber'] : '';
    $city = isset($_POST['city']) ? $_POST['city'] : '';
    $distance = isset($_POST['distanceFromCity']) ? $_POST['distanceFromCity'] : '';

    //passwod cheking
    if ($password !== $confirmPassword) {
        $_SESSION['register_error'] = "Passwords do not match";
        header('Location: hotellogin.php');
        exit();
    }

    //email existing cheaking
    $sql_check_email = "SELECT * FROM hotels WHERE email='$email'";
    $result_check_email = mysqli_query($conn, $sql_check_email);
    if (mysqli_num_rows($result_check_email) > 0) {
        $_SESSION['register_error'] = "Email is already registered";
        header('Location: hotellogin.php');
        exit();
    }

   
    $hotel_id = uniqid();

    // insert new hotel login details into the database
    $sql_insert = "INSERT INTO hotels (hotel_id, email, name, password, address, contact_number, city, distance) 
                    VALUES ('$hotel_id', '$email', '$name', '$password', '$address', '$contact_number', '$city', '$distance')";
    if (mysqli_query($conn, $sql_insert)) {
        $_SESSION['register_success'] = "Registration successful. You can now login.";
        header('Location: hotellogin.php');
        exit();
    } else {
        $_SESSION['register_error'] = "Registration failed. Please try again later.";
        header('Location: hotellogin.php');
        exit();
    }
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

                        <h3 class="title">Hotel Login</h3>
                        <?php if(isset($_SESSION['login_error'])): ?>
                            <div class="error-message"><?php echo $_SESSION['login_error']; ?></div>
                            <?php unset($_SESSION['login_error']); ?>
                        <?php endif; ?>
                        <div class="text-input">
                            <i class="fas fa-user"></i>
                            <input type="text" name="email" placeholder="Email Address" required>
                        </div>
                        <div class="text-input">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="password" placeholder="Password" required>
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
                    <form action="" class="register" id="registerForm" style="display:none;" method="POST">
                        <div>
                            <h3 class="title">Create Your Account</h3>
                        </div>

                        <?php if(isset($_SESSION['register_error'])): ?>
                            <div class="error-message"><?php echo $_SESSION['register_error']; ?></div>
                            <?php unset($_SESSION['register_error']); ?>
                        <?php endif; ?>
                        <?php if(isset($_SESSION['register_success'])): ?>
                            <div class="success-message"><?php echo $_SESSION['register_success']; ?></div>
                            <?php unset($_SESSION['register_success']); ?>
                        <?php endif; ?>

                        <div class="text-input ">
                            <i class="fas fa-envelope"></i>
                            <input type="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="text-input ">
                            <i class="fas fa-building"></i>
                            <input type="text" name="hotelName" placeholder="Hotel Name" required>
                        </div>

                        <div class="text-input ">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="text-input ">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="confirmPassword" placeholder="Confirm Password" required>
                        </div>

                        <div class="text-input hidden">
                            <i class="fas fa-location-dot"></i>
                            <input type="text" name="hotelAddress" placeholder="Hotel Address">
                        </div>
                        <div class="text-input hidden">
                            <i class="fas fa-phone"></i>
                            <input type="tel" name="contactNumber" placeholder="Contact Number">
                        </div>
                        <div class="text-input hidden">
                            <i class="fas fa-globe"></i>
                            <input type="text" name="city" placeholder="City">
                        </div>
                        <div class="text-input hidden">
                            <i class="ri-pin-distance-fill"></i>
                            <input type="text" name="distanceFromCity" placeholder="Distance From City">
                        </div>

                        <button type="button" class="btn next-btn" onclick="showAdditionalFields()">Next</button>
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
    </script>

</body>

</html>
