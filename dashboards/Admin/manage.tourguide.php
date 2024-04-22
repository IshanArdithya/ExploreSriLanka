<?php require_once '../config.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/hotel,tourguide.css">
    <script src="../js/hotel,tourguide.js"></script>
    <title>update tourguide</title>
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
                <a href="#"class="active"span class="material-icons-sharp">
                    <span class="icon">
                        <i class="fa-solid fa-location-dot"></i>
                        </span>
                    <h3>Tour Guide</h3>
                </a>

                <a href="manage.inquries.html">
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

    <!-- form for update user -->
    <main>
        <div class="update">
            <h1>Update Tour Guide</h1>
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Tour Guide Name : </td>
                        <td><input type="text" name="name" value=""></td>
                    </tr>
                    <tr>
                        <td>Tour Guide Email : </td>
                        <td><input type="email" name="email" value=""></td>
                    </tr>
                    <tr>
                        <td>Years Of Experience: </td>
                        <td><input type="number" name="exp" value=""></td>
                    </tr>
                </tr>
                    <tr>
                        <td>Profile Picture: </td>
                        <td><input type="file" name="new_img_name"></td>
                    </tr>
                        <tr>
                            <td>Price: </td>
                            <td><input type="number" name="price" value=""></td>
                        </tr>
                    </tr>
                    
                    <tr>
                        <td>Available : </td>
                        <td>
                            <label for="active_yes"><input type="checkbox" name="active" value="YES" id="active_yes">Yes</label>
                            <label for="active_no"><input type="checkbox" name="active" value="No" id="active_no">No</label>
                        </td>
                    </tr>           
                    <td colspan="2">
                        <input type="hidden" name="id" value="">
                        <input type="hidden" name="current_img" value="">
                        <input type="submit" name="submit" value="Update Tour Guide" class="btn-secondary" >
                        <input type="submit" name="submit" value="Delete Tour Guide" class="btn-danger">
                    </td>
                    
                </table>
            </form>
        </div>

        <div class="back">
            <a href="admin.tourguide.html" class="btn btn-back">Back</a>
        </div>
        
    </main>
           <!-- Right Section -->
           <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                        dark_mode
                    </span>
                </div>

                <div class="profile">
                    <div class="info">
                        <p>Hey, <b>Admin</b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="/img/profile-2.jpg">
                    </div>
                </div>

            </div>
            <!-- End of Nav -->

            <div class="user-profile">
                <div class="logo">
                    <img src="/img/logo-black.png">
                    <h2></h2>
                </div> 
            </div>
         </div>
    </div>
</div>

</body>
</html>