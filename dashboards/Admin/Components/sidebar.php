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
                <a href="admin.index.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'admin.index.php') ? 'active' : ''; ?>">
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                    <h3>Users</h3>
                </a>

                <a href="admin.hotel.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'admin.hotel.php') ? 'active' : ''; ?>">
                    <span class="icon">
                        <i class="fa-solid fa-hotel"></i>
                    </span>
                    <h3>Hotel</h3>
                </a>

                <a href="admin.tourguide.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'admin.tourguide.php') ? 'active' : ''; ?>">
                    <span class="icon">
                        <i class="fa-solid fa-location-dot"></i>
                    </span>
                    <h3>Tour Guide</h3>
                </a>

                <a href="admin.shop.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'admin.shop.php') ? 'active' : ''; ?>">
                    <span class="icon">
                        <i class="fa-brands fa-shopify"></i>
                    </span>
                    <h3>Shop</h3>
                </a>

                <a href="admin.order.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'admin.order.php') ? 'active' : ''; ?>">
                    <span class="icon">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </span>
                    <h3>Order</h3>
                </a>

                <a href="manage.inquries.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'manage.inquries.php') ? 'active' : ''; ?>">
                    <span class=icons>
                        <i class="fa-solid fa-info"></i>
                    </span>
                    <h3>Inquries</h3>
                </a>

                </a>

                <a href="admin.logout.php">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>