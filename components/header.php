<header>
    <div class="container">
        <nav>
            <div class="logo">
                <img src="/ExploreSriLanka/Images/logo.png" alt="">
            </div>
            <ul>
                <div class="btn">
                    <i class="fas fa-times close-btn"></i>
                </div>
                <li><a <?php if(basename($_SERVER['PHP_SELF']) == 'index.php') echo 'class="active"'; ?> href="/ExploreSriLanka/index.php">Home</a></li>
                <li><a <?php if(basename($_SERVER['PHP_SELF']) == 'about.php') echo 'class="active"'; ?> href="/ExploreSriLanka/about.php">About</a></li>
                <li><a <?php if(basename($_SERVER['PHP_SELF']) == 'tours.php') echo 'class="active"'; ?> href="/ExploreSriLanka/tours.php">Tours</a></li>
                <li><a <?php if(basename($_SERVER['PHP_SELF']) == 'destination.php') echo 'class="active"'; ?> href="/ExploreSriLanka/destination.php">Destination</a></li>
                <li><a <?php if(basename($_SERVER['PHP_SELF']) == 'shop.php') echo 'class="active"'; ?> href="/ExploreSriLanka/shop.php">Shop</a></li>
                <li><a <?php if(basename($_SERVER['PHP_SELF']) == 'gallery.php') echo 'class="active"'; ?> href="/ExploreSriLanka/gallery.php">Gallery</a></li>
                <li><a <?php if(basename($_SERVER['PHP_SELF']) == 'contact.php') echo 'class="active"'; ?> href="/ExploreSriLanka/contact.php">Contact</a></li>
            </ul>
            
            <?php
            require_once __DIR__ . '/../config.php';

            if (isset($_SESSION['customer_email'])) {

                $customer_email = $_SESSION['customer_email'];
                $sql = "SELECT picture FROM customers WHERE email = '$customer_email'";
                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $user_picture_path = $row['picture'];
            
                    // Check if the picture path is NULL or the image doesn't load
                    if ($user_picture_path && file_exists($_SERVER['DOCUMENT_ROOT'] . '/ExploreSriLanka/' . $user_picture_path)) {
                      echo '<div class="profile-avatar">';
                      echo '<ul>';
                      echo '<li>';
                      echo '<img src="/ExploreSriLanka/' . $user_picture_path . '" alt="User Picture" class="avatar"/>';
                    } else {


                        echo '<div class="profile-avatar">';
                        echo '<ul>';
                        echo '<li>';
                        echo '<img src="/ExploreSriLanka/Images/users/avatar_placeholder.png" alt="User Picture" class="avatar"/>';
                    }
                    echo '<ul>';
                    echo '<li class="avatar-sub-item">';
                    echo '<span class="material-icons-outlined"> account_circle </span>';
                    echo '<p>Profile</p>';
                    echo '</li>';
                    echo '<li class="avatar-sub-item">';
                    echo '<span class="material-icons-outlined"> manage_accounts </span>';
                    echo '<p>Settings</p>';
                    echo '</li>';
                    echo '<li class="avatar-sub-item">';
                    echo '<span class="material-icons-outlined"> logout </span>';
                    echo '<p>Logout</p>';
                    echo '</li>';
                    echo '</ul>';
                    echo '</li>';
                    echo '</ul>';
                    echo '</div>';
                } else {
                    echo 'User picture not found.';
                }
                mysqli_close($conn);
            } else {
                // if user not signed in, then:
                echo '<div class="sign-in-up-btn">';
                echo '<a href="/ExploreSriLanka/login.php" class="custom-btn">Sign In Now</a>';
                echo '</div>';
            }
            ?>
            <div class="btn">
                <i class="fas fa-bars menu-btn"></i>
            </div>
        </nav>
    </div>
</header>


<style>
 
  .profile-avatar ul {
  margin: 0;
  padding: 0;
  display: flex;
  align-items: center;
  gap: 3rem;
}

.profile-avatar li {
  list-style-type: none;
  position: relative;
  padding: 0.625rem 0 0.5rem;
}

.profile-avatar li ul {
  flex-direction: column;
  position: absolute;
  background-color: white;
  align-items: flex-start;
  transition: all 0.5s ease;
  width: 20rem;
  right: -3rem;
  top: 4.5rem;
  border-radius: 0.325rem;
  gap: 0;
  padding: 1rem 0rem;
  opacity: 0;
  box-shadow: 0px 0px 100px rgba(20, 18, 18, 0.25);
  display: none;
}

.profile-avatar ul li:hover > ul,
.profile-avatar ul li ul:hover {
  visibility: visible;
  opacity: 1;
  display: flex;
}

.profile-avatar .material-icons-outlined {
  color: #888888;
  transition: all 0.3s ease-out;
}

.profile-avatar .material-icons-outlined:hover {
  color: #ff9800;
  transform: scale(1.25) translateY(-4px);
  cursor : pointer;
}

.profile-avatar .profile {
  height: 3rem;
  width: auto;
  cursor: pointer;
}

.profile-avatar .avatar-sub-item {
  width: 100%;
  display: flex;
  align-items: center;
  gap: 0.725rem;
  cursor: pointer;
  padding: 0.5rem 1.5rem;
}

.profile-avatar .avatar-sub-item:hover {
  background-color: rgba(232, 232, 232, 0.4);
}

.profile-avatar .avatar-sub-item:hover .material-icons-outlined {
  color: #ff9800;
  transform: scale(1.08) translateY(-2px);
  cursor: pointer;
}

.profile-avatar .avatar-sub-item:hover p {
  color: #000;
  cursor: pointer;
}

.profile-avatar .avatar-sub-item p {
  font-size: 0.85rem;
  color: #888888;
  font-weight: 500;
  margin: 0.4rem 0;
  flex: 1;
}

</style>
