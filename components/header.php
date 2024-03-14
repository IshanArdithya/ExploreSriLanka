<header>
    <div class="container">
        <nav>
            <div class="logo">
                <img src="Images/logo.png" alt="">
            </div>
            <ul>
                <div class="btn">
                    <i class="fas fa-times close-btn"></i>
                </div>
                <li><a <?php if(basename($_SERVER['PHP_SELF']) == 'index.php') echo 'class="active"'; ?> href="index.php">Home</a></li>
                <li><a <?php if(basename($_SERVER['PHP_SELF']) == 'about.php') echo 'class="active"'; ?> href="about.php">About</a></li>
                <li><a <?php if(basename($_SERVER['PHP_SELF']) == 'tours.php') echo 'class="active"'; ?> href="tours.php">Tours</a></li>
                <li><a <?php if(basename($_SERVER['PHP_SELF']) == 'destination.php') echo 'class="active"'; ?> href="destination.php">Destination</a></li>
                <li><a <?php if(basename($_SERVER['PHP_SELF']) == 'shop.php') echo 'class="active"'; ?> href="shop.php">Shop</a></li>
                <li><a <?php if(basename($_SERVER['PHP_SELF']) == 'gallery.php') echo 'class="active"'; ?> href="gallery.php">Gallery</a></li>
                <li><a <?php if(basename($_SERVER['PHP_SELF']) == 'contact.php') echo 'class="active"'; ?> href="contact.php">Contact</a></li>
            </ul>
            
            <?php
            require_once 'config.php';

            if (isset($_SESSION['customer_email'])) {

                $customer_email = $_SESSION['customer_email'];
                $sql = "SELECT picture FROM customers WHERE email = '$customer_email'";
                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $user_picture_path = $row['picture'];
            
                    // Check if the picture path is NULL or the image doesn't load
                    if ($user_picture_path && file_exists($user_picture_path)) {
                        echo '<div class="user-picture">';
                        echo '<a href="logout.php"> <img src="' . $user_picture_path . '" alt="User Picture" class="avatar"></a>';
                        echo '</div>';
                    } else {
                        echo '<div class="user-picture">';
                        echo '<a href="logout.php"><img src="Images/users/avatar_placeholder.png" alt="User Picture" class="avatar"></a>';
                        echo '</div>';
                    }
                } else {
                    echo 'User picture not found.';
                }
                mysqli_close($conn);
            } else {
                // if user not signed in, then:
                echo '<div class="sign-in-up-btn">';
                echo '<a href="login.php" class="custom-btn">Sign In Now</a>';
                echo '</div>';
            }
            ?>
            <div class="btn">
                <i class="fas fa-bars menu-btn"></i>
            </div>
        </nav>
    </div>
</header>
