<?php

include_once '../../config.php';

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// reservations
// total reservations & last 30 days reservations
$sql = "SELECT COUNT(*) as totalReservations FROM hotelreservation";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalReservations = $row["totalReservations"];

$sql = "SELECT COUNT(*) as reservationsLast30Days FROM hotelreservation WHERE reserved_from >= DATE_SUB(NOW(), INTERVAL 30 DAY)";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$reservationsLast30Days = $row["reservationsLast30Days"];

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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../css/admin.style.css">
    <script src="../../js/admin.index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Hotel dashboard</title>
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
            <h1>Dashboard</h1>
            <!-- Analyses -->

            <div class="analyse">
                <div class="sales">
                    <div class="status">
                        <div class="info">
                            <h3>Total Reservations</h3>
                            <h1 id="totalReservations">...</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                                <circle class="progress-ring ring-reservations" cx="38" cy="38" r="36" style="stroke-dashoffset: 0;"></circle>
                            </svg>
                            <div class="percentage">
                                <p id="percentChangeReservations">...</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="visits">
                    <div class="status">
                        <div class="info">
                            <h3>Package Bookings</h3>
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


                <div class="rooms">
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


                <!-- <div class="roomtype">
                    <div class="status">
                        <div class="info">
                            <h3>Room Types</h3>
                            <h1>24,981</h1>
                        </div>

                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>-48%</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="searches">
                    <div class="status">
                        <div class="info">
                            <h3>Searches</h3>
                            <h1>14,147</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>+21%</p>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <!-- End of Analyses -->

            <!-- Approve hotels Table -->
            <div class="recent-user">
                <h2>Approve Hotels</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Hotel ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>District</th>
                            <th>Distance</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        // Fetch and display hotels with 'Pending' status
                        $sql = "SELECT * FROM hotels WHERE status = 'Pending'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['hotel_id'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['contact_number'] . "</td>";
                                echo "<td>" . $row['district'] . "</td>";
                                echo "<td>" . $row['distance'] . " KM</td>";
                                echo "<td>" . $row['status'] . "</td>";
                                echo "<td>";
                                echo "<a href='#' class='btn-primary' onclick='approveHotel(\"" . $row['hotel_id'] . "\", \"" . $row['name'] . "\")'>Approve</a>";
                                echo "<a href='#' class='btn-danger' onclick='declineHotel(\"" . $row['hotel_id'] . "\", \"" . $row['name'] . "\")'>Decline</a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8'>No hotels pending approval</td></tr>";
                        }

                        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && isset($_GET['id'])) {
                            if ($_GET['action'] == 'approve') {
                                if (!empty(trim($_GET['id']))) {
                                    $hotel_id = trim($_GET['id']);
                                    $status = 'Verified';

                                    $sql = "UPDATE hotels SET status = '$status' WHERE hotel_id = '$hotel_id'";

                                    if ($conn->query($sql) === TRUE) {

                                        echo "<script>Swal.fire('Approved!',
                                            'The profile is Approved!.', 
                                            'success').then(() => { 
                                                window.location.href = 'admin.hotel.php';
                                            })
                                            </script>";
                                    } else {
                                        echo "<script>Swal.fire('Error!',
                                            'Error updating record: " . $conn->error . "', 
                                            'error').then(() => { 
                                                window.location.href = 'admin.hotel.php';
                                            })</script>";
                                    }
                                }
                            } elseif ($_GET['action'] == 'decline') {
                                if (!empty(trim($_GET['id']))) {
                                    $hotel_id = trim($_GET['id']);
                                    $status = 'Declined';

                                    $sql = "UPDATE hotels SET status = '$status' WHERE hotel_id = '$hotel_id'";

                                    if ($conn->query($sql) === TRUE) {

                                        echo "<script>Swal.fire('Declined!',
                                            'The profile is Declined!.', 
                                            'success').then(() => { 
                                                window.location.href = 'admin.hotel.php';
                                            })
                                            </script>";
                                    } else {
                                        echo "<script>Swal.fire('Error!',
                                            'Error updating record: " . $conn->error . "', 
                                            'error').then(() => { 
                                                window.location.href = 'admin.hotel.php';
                                            })</script>";
                                    }
                                }
                            }
                        }

                        ?>
                    </tbody>
                </table>
            </div>
            <!-- End of Approve Hotels Table -->

            <!-- Booking Details Table -->
            <div class="recent-user">
                <h2>Recent Reservations</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Reservation ID</th>
                            <th>Hotel Name</th>
                            <th>Room Number</th>
                            <th>Reserved From</th>
                            <th>Reserved Till</th>
                            <th>Customer ID</th>
                            <th>Total Price (LKR)</th>
                            <th>Package Order ID</th>
                            <th>Approval</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch last 5 rows from the hotelreservation table
                        $sql = "SELECT * FROM hotelreservation ORDER BY reservation_id DESC LIMIT 5";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['reservation_id'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['room_number'] . "</td>";
                                echo "<td>" . $row['reserved_from'] . "</td>";
                                echo "<td>" . $row['reserved_till'] . "</td>";
                                echo "<td>" . $row['customer_id'] . "</td>";
                                echo "<td>" . $row['totalprice'] . "</td>";
                                echo "<td>" . $row['pkg_order_id'] . "</td>";
                                echo "<td>" . $row['approval'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='9'>No recent reservations found</td></tr>";
                        }
                        ?>

                    </tbody>
                </table>
                <!-- End of Booking Details Table -->
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

            const totalReservations = <?php echo $totalReservations; ?>;
            const reservationsLast30Days = <?php echo $reservationsLast30Days; ?>;
            const totalPackagesBooked = <?php echo $totalPackagesBooked; ?>;
            const packagesBookedLast30Days = <?php echo $packagesBookedLast30Days; ?>;
            const totalHotels = <?php echo $totalHotels; ?>;
            const hotelsLast30Days = <?php echo $hotelsLast30Days; ?>;

            // Reservations
            // update total reservations count
            document.getElementById('totalReservations').innerText = totalReservations;

            // calc percentage - reservations
            const percentChangeReservations = ((reservationsLast30Days / totalReservations) * 100).toFixed(2);

            // update percentage change & circle - reservations
            document.getElementById('percentChangeReservations').innerText = `+${percentChangeReservations}%`;
            const circleReservations = document.querySelector('.ring-reservations');
            const circleLengthReservations = 2 * Math.PI * circleReservations.getAttribute('r');
            const newOffsetReservations = circleLengthReservations * ((totalReservations - reservationsLast30Days) / totalReservations);
            circleReservations.style.strokeDashoffset = newOffsetReservations;

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

        });
    </script>

    <script>
        function approveHotel(hotel_id, name) {
            Swal.fire({
                title: 'Are you sure you want to approve?',
                html: "Hotel ID: " + hotel_id + "<br>Name: " + name,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {

                    window.location.href = "<?= $_SERVER['PHP_SELF'] ?>?action=approve&id=" + hotel_id;
                }
            });
        }

        function declineHotel(hotel_id, name) {
            Swal.fire({
                title: 'Are you sure you want to decline?',
                html: "Hotel ID: " + hotel_id + "<br>Name: " + name,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {

                    window.location.href = "<?= $_SERVER['PHP_SELF'] ?>?action=decline&id=" + hotel_id;
                }
            });
        }
    </script>

</body>

</html>