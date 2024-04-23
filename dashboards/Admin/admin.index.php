<?php

include_once '../../config.php';

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// customers
// total users & last 30 days users
$sql = "SELECT COUNT(*) as totalUsers FROM customers";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalUsers = $row["totalUsers"];

$sql = "SELECT COUNT(*) as usersLast30Days FROM customers WHERE registered >= DATE_SUB(NOW(), INTERVAL 30 DAY)";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$usersLast30Days = $row["usersLast30Days"];

// hotels
// total hotels & last 30 days hotels
$sql = "SELECT COUNT(*) as totalHotels FROM hotels";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalHotels = $row["totalHotels"];

$sql = "SELECT COUNT(*) as hotelsLast30Days FROM hotels WHERE registered >= DATE_SUB(NOW(), INTERVAL 30 DAY)";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$hotelsLast30Days = $row["hotelsLast30Days"];

// tour guides
// total tour guides & last 30 days tour guides
$sql = "SELECT COUNT(*) as totalTourguides FROM tourguide";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalTourguides = $row["totalTourguides"];

$sql = "SELECT COUNT(*) as tourguidesLast30Days FROM tourguide WHERE registered >= DATE_SUB(NOW(), INTERVAL 30 DAY)";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$tourguidesLast30Days = $row["tourguidesLast30Days"];

// packages booked
// total packages booked & last 30 days packages booked
$sql = "SELECT COUNT(*) as totalPackagesBooked FROM packageorders";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalPackagesBooked = $row["totalPackagesBooked"];

$sql = "SELECT COUNT(*) as packagesBookedLast30Days FROM packageorders WHERE reserved_date >= DATE_SUB(NOW(), INTERVAL 30 DAY)";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$packagesBookedLast30Days = $row["packagesBookedLast30Days"];

// shop orders
// total shop orders & last 30 days shop orders
$sql = "SELECT COUNT(*) as totalShopOrders FROM shoporders";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalShopOrders = $row["totalShopOrders"];

$sql = "SELECT COUNT(*) as shopOrdersLast30Days FROM shoporders WHERE order_date >= DATE_SUB(NOW(), INTERVAL 30 DAY)";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$shopOrdersLast30Days = $row["shopOrdersLast30Days"];

?>

<script>Swal.fire('Deleted!', 'The profile has been deleted.', 'success').then(() => { location.reload(); })</script>


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
    <title>Admin dashboard</title>
</head>

<body>

    <div class="container">
        <!-- Sidebar Section -->

        <?php
        include 'Components/sidebar.php';
        ?>

        <!-- End of Sidebar Section -->


        <!-- Main Content -->
        <main>
            <h1>Dashboard</h1>
            <!-- Analyses -->

            <div class="analyse">
                <div class="sales">
                    <div class="status">
                        <div class="info">
                            <h3>Customers</h3>
                            <h1 id="totalUsers">...</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                                <circle class="progress-ring ring-customers" cx="38" cy="38" r="36" style="stroke-dashoffset: 0;"></circle>
                            </svg>
                            <div class="percentage">
                                <p id="percentChange">...</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="visits">
                    <div class="status">
                        <div class="info">
                            <h3>Hotels</h3>
                            <h1 id="totalHotels">...</h1>
                        </div>

                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                                <circle class="progress-ring ring-hotels" cx="38" cy="38" r="36" style="stroke-dashoffset: 0;"></circle>
                            </svg>
                            <div class="percentage">
                                <p id="percentChangeHotels">...</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="hotels">
                    <div class="status">
                        <div class="info">
                            <h3>Tour Guides</h3>
                            <h1 id="totalTourguides">...</h1>
                        </div>

                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                                <circle class="progress-ring ring-tourguides" cx="38" cy="38" r="36" style="stroke-dashoffset: 0;"></circle>
                            </svg>
                            <div class="percentage">
                                <p id="percentChangeTourguides">...</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tourguides">
                    <div class="status">
                        <div class="info">
                            <h3>Packages</h3>
                            <h1 id="totalPackagesBooked">...</h1>
                        </div>

                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                                <circle class="progress-ring ring-packages" cx="38" cy="38" r="36" style="stroke-dashoffset: 0;"></circle>
                            </svg>
                            <div class="percentage">
                                <p id="percentChangePackages">...</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="searches">
                    <div class="status">
                        <div class="info">
                            <h3>Shop Orders</h3>
                            <h1 id="totalShopOrders">...</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                                <circle class="progress-ring ring-shoporders" cx="38" cy="38" r="36" style="stroke-dashoffset: 0;"></circle>
                            </svg>
                            <div class="percentage">
                                <p id="percentChangeShopOrders">...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Analyses -->


            <!-- New Users Section -->

            <div class="new-users">
                <h2>New Users</h2>
                <div class="user-list">
                    <?php

                    // Get last 4 customers
                    $sql = "SELECT * FROM customers ORDER BY registered DESC LIMIT 4";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $registeredDate = new DateTime($row['registered']);
                            $today = new DateTime();
                            $interval = $registeredDate->diff($today);
                            $daysAgo = $interval->days;

                            if ($daysAgo == 0) {
                                $daysAgo = "~1 day ago";
                            } else {
                                $daysAgo = $daysAgo . " days ago";
                            }

                            $imagePath = file_exists('../../' . $row['picture']) ? '../../' . $row['picture'] : '../../images/users/avatar_placeholder.png';
                    ?>
                            <div class="user">
                                <img src="<?php echo $imagePath; ?>">
                                <h2><?php echo $row['first_name']; ?></h2>
                                <p><?php echo $daysAgo; ?></p>
                            </div>

                    <?php
                        }
                    }

                    if ($_SERVER["REQUEST_METHOD"] == "GET") {
                        if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
                            $customerId = trim($_GET['id']);
                    
                            $sql = "DELETE FROM customers WHERE customer_id='$customerId'";
                    
                            if ($conn->query($sql) === TRUE) {

                                echo "<script>Swal.fire('Deleted!',
                                 'The profile has been deleted.', 
                                 'success').then(() => { 
                                    window.location.href = 'admin.index.php';
                                })
                                </script>";

                            } else {
                                echo "<script>Swal.fire('Error!', 'Error deleting record: " . $conn->error . "', 'error').then(() => { location.reload(); })</script>";
                            }
                        }
                    }

                    ?>

                    <!-- <div class="user">
                        <img src="/img/plus2.png">
                        <h2>More</h2>
                        <p>New User</p>
                    </div> -->
                </div>
            </div>
            <!-- End of New Users Section -->


            <!-- User Details Table -->
            <div class="recent-user">
                <h2>Users Details</h2>
                <div class="search-bar">
                    <input type="text" id="searchInput" placeholder="Search...">
                    <button onclick="filterTable()">Filter</button>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Customer ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Country</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="userTableBody">
                        <!-- Table rows content -->
                        <?php

                        $sql = "SELECT * FROM customers";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr style='display: none;'>";
                                echo "<td>" . $row['customer_id'] . "</td>";
                                echo "<td>" . $row['full_name'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['country'] . "</td>";
                                echo "<td><a href='#' class='btn-danger' onclick='deleteProfile(\"" . $row['customer_id'] . "\", \"" . $row['full_name'] . "\", \"" . $row['email'] . "\")'>Delete</a></td>";
                                echo "</tr>";
                            }
                        }
                        ?>

                    </tbody>
                </table>
                <!-- End User Details Table -->

                <!-- Reviews Table -->
                <div class="recent-user">
                    <h2>Reviews</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Reviewer Name</th>
                                <th>Description</th>
                                <th>Ratings</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Table rows content -->
                            <tr>
                                <td>Alex Perera</td>
                                <td>Lorem ipsum dolor sit amet consectetur, adipisici</td>
                                <td class="star-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                    (3.5/5)
                                </td>
                                <td>
                                    <a href="manage.feedback.html" class="btn-secondary">Edit</a>
                                    <a href="#" class="btn-danger">Delete</a>
                                </td>
                            </tr>
                            <!-- add more rows here -->
                            <tr class="extra-row" style="display: none;">
                                <td>Alex Perera</td>
                                <td>Lorem ipsum dolor sit amet consectetur, adipisici</td>
                                <td class="star-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    (3/5)
                                </td>
                                <td>
                                    <a href="manage.feedback.html" class="btn-secondary">Edit</a>
                                    <a href="#" class="btn-danger">Delete</a>
                                </td>
                            </tr>
                            <!-- add more extra rows  -->
                            <tr>
                                <td colspan="4">
                                    <a href="#" class="show-all-link">Show More</a>
                                    <a href="#" class="show-less-link" style="display: none;">Show Less</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- End of Reviews Table -->

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

            const totalUsers = <?php echo $totalUsers; ?>;
            const usersLast30Days = <?php echo $usersLast30Days; ?>;
            const totalHotels = <?php echo $totalHotels; ?>;
            const hotelsLast30Days = <?php echo $hotelsLast30Days; ?>;
            const totaltourguides = <?php echo $totalTourguides; ?>;
            const tourguidesLast30Days = <?php echo $tourguidesLast30Days; ?>;
            const totalPackagesBooked = <?php echo $totalPackagesBooked; ?>;
            const packagesBookedLast30Days = <?php echo $packagesBookedLast30Days; ?>;
            const totalShopOrders = <?php echo $totalShopOrders; ?>;
            const shopOrdersLast30Days = <?php echo $shopOrdersLast30Days; ?>;

            // Customers
            // update total users count
            document.getElementById('totalUsers').innerText = totalUsers;

            // calc percentage - customers
            const percentChange = ((usersLast30Days / totalUsers) * 100).toFixed(2);

            // update percentage change & circle - customers
            document.getElementById('percentChange').innerText = `+${percentChange}%`;
            const circle = document.querySelector('.ring-customers');
            const circleLength = 2 * Math.PI * circle.getAttribute('r');
            const newOffset = circleLength * ((totalUsers - usersLast30Days) / totalUsers);
            circle.style.strokeDashoffset = newOffset;

            // Hotels
            // update total hotels count
            document.getElementById('totalHotels').innerText = totalHotels;

            // calc percentage - hotels
            const percentChangeHotels = ((hotelsLast30Days / totalHotels) * 100).toFixed(2);

            // update percentage change & circle - hotels
            document.getElementById('percentChangeHotels').innerText = `+${percentChangeHotels}%`;
            const circleHotels = document.querySelector('.ring-hotels');
            const circleLengthHotels = 2 * Math.PI * circleHotels.getAttribute('r');
            const newOffsetHotels = circleLengthHotels * ((totalHotels - hotelsLast30Days) / totalHotels);
            circleHotels.style.strokeDashoffset = newOffsetHotels;

            // Tour Guides
            // update total tour guides count
            document.getElementById('totalTourguides').innerText = totaltourguides;

            // calc percentage - tour guides
            const percentChangeTourguides = ((tourguidesLast30Days / totaltourguides) * 100).toFixed(2);

            // update percentage change & circle - tour guides
            document.getElementById('percentChangeTourguides').innerText = `+${percentChangeTourguides}%`;
            const circleTourguides = document.querySelector('.ring-tourguides');
            const circleLengthTourguides = 2 * Math.PI * circleTourguides.getAttribute('r');
            const newOffsetTourguides = circleLengthTourguides * ((totaltourguides - tourguidesLast30Days) / totaltourguides);
            circleTourguides.style.strokeDashoffset = newOffsetTourguides;

            // Packages Booked
            // update total packages booked count
            document.getElementById('totalPackagesBooked').innerText = totalPackagesBooked;

            // calc percentage - packages booked
            const percentChangePackages = ((packagesBookedLast30Days / totalPackagesBooked) * 100).toFixed(2);

            // update percentage change & circle - packages booked
            document.getElementById('percentChangePackages').innerText = `+${percentChangePackages}%`;
            const circlePackages = document.querySelector('.ring-packages');
            const circleLengthPackages = 2 * Math.PI * circlePackages.getAttribute('r');
            const newOffsetPackages = circleLengthPackages * ((totalPackagesBooked - packagesBookedLast30Days) / totalPackagesBooked);
            circlePackages.style.strokeDashoffset = newOffsetPackages;

            // Shop Orders
            // update total shop orders count
            document.getElementById('totalShopOrders').innerText = totalShopOrders;

            // calc percentage - shop orders
            const percentChangeShopOrders = ((shopOrdersLast30Days / totalShopOrders) * 100).toFixed(2);

            // update percentage change & circle - shop orders
            document.getElementById('percentChangeShopOrders').innerText = `+${percentChangeShopOrders}%`;
            const circleShopOrders = document.querySelector('.ring-shoporders');
            const circleLengthShopOrders = 2 * Math.PI * circleShopOrders.getAttribute('r');
            const newOffsetShopOrders = circleLengthShopOrders * ((totalShopOrders - shopOrdersLast30Days) / totalShopOrders);
            circleShopOrders.style.strokeDashoffset = newOffsetShopOrders;

        });
    </script>

    <script>
        function filterTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("userTableBody");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td");
                let found = false;
                for (var j = 0; j < td.length; j++) {
                    let cell = td[j];
                    if (cell) {
                        txtValue = cell.textContent || cell.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            found = true;
                            break;
                        }
                    }
                }
                if (found) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }

        function deleteProfile(customerId, fullName, email) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You are about to delete the profile",
                html: "ID: " + customerId + "<br>Name: " + fullName +"<br>Email: " + email,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to delete the profile
                    window.location.href = "<?= $_SERVER['PHP_SELF'] ?>?id=" + customerId;
                }
            });
        }
    </script>
</body>

</html>