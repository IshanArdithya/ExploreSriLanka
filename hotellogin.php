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
                    <form action="" class="login" id="loginForm">
                        <!-- <a href="index.php"><span class="close-icon" >&times;</span></a> -->
                        <h3 class="title">Hotel Login</h3>
                        <div class="text-input">
                            <i class="fas fa-user"></i>
                            <input type="text" placeholder="Username">
                        </div>
                        <div class="text-input">
                            <i class="fas fa-lock"></i>
                            <input type="password" placeholder="Password">
                        </div>
                        <button class="login-btn">LOGIN</button>
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
                    <form action="" class="register" id="registerForm" style="display:none;">
                        <div>
                            <h3 class="title">Create Your Account</h3>
                        </div>

                        <div class="text-input ">
                            <i class="fas fa-envelope"></i>
                            <input type="email" placeholder="Email">
                        </div>
                        <div class="text-input ">
                            <i class="fas fa-building"></i>
                            <input type="text" placeholder="Hotel Name">
                        </div>

                        <div class="text-input ">
                            <i class="fas fa-lock"></i>
                            <input type="password" placeholder="Password">
                        </div>
                        <div class="text-input ">
                            <i class="fas fa-lock"></i>
                            <input type="password" placeholder="Confirm Password">
                        </div>

                        <div class="text-input hidden">
                            <i class="fas fa-location-dot"></i>
                            <input type="text" placeholder="Hotel Address">
                        </div>
                        <div class="text-input hidden">
                            <i class="fas fa-phone"></i>
                            <input type="tel" placeholder="Contact Number">
                        </div>
                        <div class="text-input hidden">
                            <i class="fas fa-globe"></i>
                            <input type="text" placeholder="City">
                        </div>
                        <div class="text-input hidden">
                            <i class="ri-pin-distance-fill"></i>
                            <input type="text" placeholder="Distance From City">
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
                // loginForm.style.position = "relative";
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