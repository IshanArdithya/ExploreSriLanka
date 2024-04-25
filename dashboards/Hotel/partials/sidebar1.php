<?php require_once '../../config.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../css/hotel,tourguide.css">
    <script src="../../js/hotel,tourguide.js"></script>
    <title>Hotel Dashboard</title>
</head>

<body>

    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">

                    <h2>Explore<span class="danger"> SriLanka</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="hoteldashboard.php"  span class="material-icons-sharp">
                    <span class="icon">
                        <i class="fa-solid fa-hotel"></i>
                    </span>
                    <h3>Hotel</h3>
                </a>

                <a href="hotelinquiries.php" class="active">
                    <span class=icons>
                        <i class="fa-solid fa-info"></i>
                    </span>
                    <h3>Inquries</h3>
                </a>

                <a href="admin.logout.html">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Logout</h3>
                </a>
            </div>

        </aside>
        <!-- End of Sidebar Section -->