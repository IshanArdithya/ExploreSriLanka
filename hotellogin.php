<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Login Page | Prilist</title>
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
        <div class="login" id="loginForm">
            <h3 class="title">User Login</h3>
            <div class="text-input">
                <i class="ri-user-fill"></i>
                <input type="text" placeholder="Username">
            </div>
            <div class="text-input">
                <i class="ri-lock-fill"></i>
                <input type="password" placeholder="Password">
            </div>
            <button class="login-btn">LOGIN</button>
            <a href="#" class="forgot">Forgot Username/Password?</a>
            <div class="create" id="createAccountLink">
                <a href="#" onclick="toggleForms()">Create Your Account</a>
                <i class="ri-arrow-right-fill"></i>
            </div>
        </div>

        <div class="register" id="registerForm" style="display:none;">
            <h3 class="title">Create Your Account</h3>
            <div class="text-input">
                <i class="ri-mail-fill"></i>
                <input type="email" placeholder="Email">
            </div>
            <div class="text-input">
                <i class="ri-lock-fill"></i>
                <input type="password" placeholder="Password">
            </div>
            <div class="text-input">
                <i class="ri-lock-fill"></i>
                <input type="password" placeholder="Confirm Password">
            </div>
            <div class="text-input">
                <i class="ri-building-fill"></i>
                <input type="text" placeholder="Hotel Full Name">
            </div>
            <div class="text-input">
                <i class="ri-map-pin-fill"></i>
                <input type="text" placeholder="Hotel Address">
            </div>
            <div class="text-input">
                <i class="ri-phone-fill"></i>
                <input type="tel" placeholder="Contact Number">
            </div>
            <div class="text-input">
                <i class="ri-city-fill"></i>
                <input type="text" placeholder="City">
            </div>
            <div class="text-input">
                <i class="ri-map-pin-distance-fill"></i>
                <input type="text" placeholder="Distance">
            </div>
            <button class="login-btn">CREATE ACCOUNT</button>
            <a href="#" onclick="toggleForms()">Back to Login</a>
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
    </script>
</body>
</html>
