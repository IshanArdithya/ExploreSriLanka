<?php

include_once '../../config.php';

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// tour guides booking
// total tour guides booking & last 30 days bookings
$sql = "SELECT COUNT(*) as totalProducts FROM shopitems";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalProducts = $row['totalProducts'];

$sql = "SELECT COUNT(*) as productsLast30Days FROM shopitems WHERE date_added >= DATE_SUB(NOW(), INTERVAL 30 DAY)";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$productsLast30Days = $row["productsLast30Days"];

// tour guides
// total tour guides & last 30 days tour guides
$sql = "SELECT COUNT(*) as totalOrders FROM shoporders";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalOrders = $row["totalOrders"];

$sql = "SELECT COUNT(*) as ordersLast30Days FROM shoporders WHERE order_date >= DATE_SUB(NOW(), INTERVAL 30 DAY)";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$ordersLast30Days = $row["ordersLast30Days"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../css/admin.style.css">
    <script src="user.js"></script>
    <script src="../../js/admin.index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Order Dashboard | Explore Srilanka</title>
</head>

<body>

    <div class="container">
        <!-- Sidebar Section -->

        <?php
        include 'Components/sidebar.php'
        ?>

        <!-- End of Sidebar Section -->

        <!-- Main Content -->
        <main>
            <h1>Orders</h1>
            <!-- Analyses -->

            <div class="analyse shoppage">
                <div class="sales">
                    <div class="status">
                        <div class="info">
                            <h3>Total Products</h3>
                            <h1 id="totalProducts">...</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                                <circle class="progress-ring ring-products" cx="38" cy="38" r="36" style="stroke-dashoffset: 0;"></circle>
                            </svg>
                            <div class="percentage">
                                <p id="percentChangeProducts">...</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="visits">
                    <div class="status">
                        <div class="info">
                            <h3>Orders</h3>
                            <h1 id="totalOrders">...</h1>
                        </div>

                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                                <circle class="progress-ring ring-orders" cx="38" cy="38" r="36" style="stroke-dashoffset: 0;"></circle>
                            </svg>
                            <div class="percentage">
                                <p id="percentChangeOrders">...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Analyses -->

            <!-- Pending Orders Table -->
            <div class="recent-user">
                <h2>Recent Orders</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Products</th>
                            <th>Customer ID</th>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Total Price (LKR)</th>
                            <th>Order Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM shoporders ORDER BY order_id DESC LIMIT 20";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['order_id'] . "</td>";
                                echo "<td>";
                                $items = explode(',', $row['items']);
                                foreach ($items as $item) {
                                    echo $item . "<br>";
                                }
                                echo "</td>";
                                echo "<td>" . $row['customer_id'] . "</td>";
                                echo "<td>" . $row['customer_name'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['totalprice'] . "</td>";
                                echo "<td>" . $row['order_date'] . "</td>";
                                echo "<td>";
                                echo "<a href='#' class='btn-primary' onclick='viewOrder(\"" . $row['order_id'] . "\", \"" . $row['customer_id'] . "\", \"" . $row['customer_name'] . "\", \"" . $row['street_address'] . "\", \"" . $row['district'] . "\", \"" . $row['city'] . "\", \"" . $row['email'] . "\", \"" . $row['contact_number'] . "\", \"" . $row['contact_number2'] . "\", \"" . $row['special_notes'] . "\", \"" . $row['items'] . "\", \"" . $row['totalprice'] . "\", \"" . $row['order_date'] . "\")'>View</a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='9'>No recent reservations found</td></tr>";
                        }

                        ?>
                    </tbody>
                </table>
            </div>

        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->

        <?php
        include 'Components/rightsection.php'
        ?>

    </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {

            const totalproducts = <?php echo $totalProducts; ?>;
            const productsLast30Days = <?php echo $productsLast30Days; ?>;
            const totalorders = <?php echo $totalOrders; ?>;
            const ordersLast30Days = <?php echo $ordersLast30Days; ?>;

            // Total Products
            // update total products count
            document.getElementById('totalProducts').innerText = totalproducts;

            // calc percentage - total products
            const percentChangeProducts = ((productsLast30Days / totalproducts) * 100).toFixed(2);

            // update percentage change & circle - products
            document.getElementById('percentChangeProducts').innerText = `+${percentChangeProducts}%`;
            const circleProducts = document.querySelector('.ring-products');
            const circleLengthProducts = 2 * Math.PI * circleProducts.getAttribute('r');
            const newOffsetProducts = circleLengthProducts * ((totalproducts - productsLast30Days) / totalproducts);
            circleProducts.style.strokeDashoffset = newOffsetProducts;

            // Orders
            // update total orders
            document.getElementById('totalOrders').innerText = totalorders;

            // calc percentage - orders
            const percentChangeOrders = ((ordersLast30Days / totalorders) * 100).toFixed(2);

            // update percentage change & circle - orders
            document.getElementById('percentChangeOrders').innerText = `+${percentChangeOrders}%`;
            const circleOrders = document.querySelector('.ring-orders');
            const circleLengthOrders = 2 * Math.PI * circleOrders.getAttribute('r');
            const newOffsetOrders = circleLengthOrders * ((totalorders - ordersLast30Days) / totalorders);
            circleOrders.style.strokeDashoffset = newOffsetOrders;

        });
    </script>

    <script>
        function viewOrder(order_id, customer_id, customer_name, street_address, district, city, email, contact_number, contact_number2, special_notes, items, totalprice, order_date) {
            Swal.fire({
                title: 'Order Details',
                html: `
                            <div class="update-form">
                                <div class="input-container">
                                    <label for="order_id" class="field-name">Order ID</label>
                                    <div class="info-container">
                                        <p class="current-info">${order_id}</p>
                                    </div><br>

                                    <label for="customer_id" class="field-name">Customer ID</label>
                                    <div class="info-container">
                                        <p class="current-info">${customer_id}</p>
                                    </div><br>

                                    <label for="customer_name" class="field-name">Customer Name</label>
                                    <div class="info-container">
                                        <p class="current-info">${customer_name}</p>
                                    </div><br>

                                    <label for="street_address" class="field-name">Street Address</label>
                                    <div class="info-container">
                                        <p class="current-info">${street_address}</p>
                                    </div><br>

                                    <label for="district" class="field-name">District</label>
                                    <div class="info-container">
                                        <p class="current-info">${district}</p>
                                    </div><br>

                                    <label for="city" class="field-name">City</label>
                                    <div class="info-container">
                                        <p class="current-info">${city}</p>
                                    </div><br>

                                    <label for="email" class="field-name">Email</label>
                                    <div class="info-container">
                                        <p class="current-info">${email}</p>
                                    </div><br>

                                    <label for="contact_number" class="field-name">Contact Number</label>
                                    <div class="info-container">
                                        <p class="current-info">${contact_number}</p>
                                    </div><br>

                                    <label for="contact_number" class="field-name">Contact Number 2</label>
                                    <div class="info-container">
                                        <p class="current-info">${contact_number2}</p>
                                    </div><br>

                                    <label for="special_notes" class="field-name">Special Notes</label>
                                    <div class="info-container">
                                        <p class="current-info">${special_notes}</p>
                                    </div><br>

                                    <label for="items" class="field-name">Products</label>
                                    <div class="info-container">
                                        <p class="current-info">${items}</p>
                                    </div><br>
                                    
                                    <label for="totalprice" class="field-name">Total Price</label>
                                    <div class="info-container">
                                        <p class="current-info">LKR ${totalprice}</p>
                                    </div><br>
                                    
                                    <label for="order_date" class="field-name">Ordered Date</label>
                                    <div class="info-container">
                                        <p class="current-info">${order_date}</p>
                                    </div><br>
                                </div>
                            </div>
                        `,
                focusConfirm: false
            });
            
        }
    </script>

</body>

</html>