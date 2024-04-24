<?php 
session_start(); 
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $adminEmail = 'admin@exploresrilanka.com';
    $adminPassword = 'admin';

    if ($email === $adminEmail && $password === $adminPassword) {
        $_SESSION['admin_email'] = $email;
        echo '<script>
            Swal.fire({
              icon: "success",
              title: "Login Successful",
              text: "Welcome back, Admin!",
            }).then(function() {
                setTimeout(function() {
                    window.location.href = "admin.php";
                }, 2000); // 2000 milliseconds delay (2 seconds)
            });
        </script>';
        header('Location: dashboards/admin/admin.index.php');
        exit();
    } else {
        $_SESSION['login_error'] = "Invalid email or password" ;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal | Explore SriLanka</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="css/adminlogin.css">
    <style>
        .error-message {
            color: red;
            margin-bottom: 10px;
        }   
    </style>
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

                        <h3 class="title">Admin Login</h3>
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
                    </form>
                </div>
                <span class="close-icon" onclick="index.php">&times;</span>

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
