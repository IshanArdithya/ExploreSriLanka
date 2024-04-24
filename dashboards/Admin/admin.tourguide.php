<?php

include_once '../../config.php';

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// tour guides booking
// total tour guides booking & last 30 days bookings
$sql = "SELECT COUNT(*) as totalTgBookings FROM tourguidebooking";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalTgBookings = $row['totalTgBookings'];

$sql = "SELECT COUNT(*) as tgBookingsLast30Days FROM tourguidebooking WHERE booked_from >= DATE_SUB(NOW(), INTERVAL 30 DAY)";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$tgBookingsLast30Days = $row["tgBookingsLast30Days"];

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
    <title>TourGuide dashboard</title>
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

            <div class="analyse tourguidepage">
                <div class="sales">
                    <div class="status">
                        <div class="info">
                            <h3>Total Bookings</h3>
                            <h1 id="totalTgBookings">...</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                                <circle class="progress-ring ring-tgbookings" cx="38" cy="38" r="36" style="stroke-dashoffset: 0;"></circle>
                            </svg>
                            <div class="percentage">
                                <p id="percentChangeTgBookings">...</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="count">
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

            </div>
            <!-- End of Analyses -->

            <!-- Approved Tour Guides Table -->
            <div class="recent-user">
                <h2>Approve Tour Guides</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Tour Guide ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>Age</th>
                            <th>District</th>
                            <th>Experience</th>
                            <th>Specialty</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php

                            // Fetch and display hotels with 'Pending' status
                            $sql = "SELECT * FROM tourguide WHERE status = 'Pending'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['tg_id'] . "</td>";
                                    echo "<td>" . $row['full_name'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['contact_number'] . "</td>";
                                    echo "<td>" . $row['age'] . "</td>";
                                    echo "<td>" . $row['district'] . "</td>";
                                    echo "<td>" . $row['experience'] . " Years</td>";
                                    echo "<td>" . $row['specialty'] . "</td>";
                                    echo "<td>" . $row['status'] . "</td>";
                                    echo "<td>";
                                    echo "<a href='#' class='btn-primary' onclick='approveTG(\"" . $row['tg_id'] . "\", \"" . $row['full_name'] . "\")'>Approve</a>";
                                    echo "<a href='#' class='btn-danger' onclick='declineTG(\"" . $row['tg_id'] . "\", \"" . $row['full_name'] . "\")'>Decline</a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='8'>No tour guides pending approval</td></tr>";
                            }

                            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && isset($_GET['id'])) {
                                if ($_GET['action'] == 'approve') {
                                    if (!empty(trim($_GET['id']))) {
                                        $tg_id = trim($_GET['id']);
                                        $status = 'Verified';

                                        $sql = "UPDATE tourguide SET status = '$status' WHERE tg_id = '$tg_id'";

                                        if ($conn->query($sql) === TRUE) {

                                            echo "<script>Swal.fire('Approved!',
                                                'The profile is Approved!.', 
                                                'success').then(() => { 
                                                    window.location.href = 'admin.tourguide.php';
                                                })
                                                </script>";
                                        } else {
                                            echo "<script>Swal.fire('Error!',
                                                'Error updating record: " . $conn->error . "', 
                                                'error').then(() => { 
                                                    window.location.href = 'admin.tourguide.php';
                                                })</script>";
                                        }
                                    }
                                } elseif ($_GET['action'] == 'decline') {
                                    if (!empty(trim($_GET['id']))) {
                                        $tg_id = trim($_GET['id']);
                                        $status = 'Declined';

                                        $sql = "UPDATE tourguide SET status = '$status' WHERE tg_id = '$tg_id'";

                                        if ($conn->query($sql) === TRUE) {

                                            echo "<script>Swal.fire('Declined!',
                                                'The profile is Declined!.', 
                                                'success').then(() => { 
                                                    window.location.href = 'admin.tourguide.php';
                                                })
                                                </script>";
                                        } else {
                                            echo "<script>Swal.fire('Error!',
                                                'Error updating record: " . $conn->error . "', 
                                                'error').then(() => { 
                                                    window.location.href = 'admin.tourguide.php';
                                                })</script>";
                                        }
                                    }
                                }
                            }

                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- End of Approved Tour Guides Table -->

            <!-- Booking Details Table -->
            <div class="recent-user">
                <h2>Recent Bookings</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>Tour Guide ID</th>
                            <th>Name</th>
                            <th>Booked From</th>
                            <th>Booked Till</th>
                            <th>Customer ID</th>
                            <th>Package Order ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM tourguidebooking ORDER BY booking_id DESC LIMIT 5";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['booking_id'] . "</td>";
                                echo "<td>" . $row['tg_id'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['booked_from'] . "</td>";
                                echo "<td>" . $row['booked_till'] . "</td>";
                                echo "<td>" . $row['customer_id'] . "</td>";
                                echo "<td>" . $row['pkg_order_id'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='9'>No recent reservations found</td></tr>";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
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

            const totaltgbookings = <?php echo $totalTgBookings; ?>;
            const tgBookingsLast30Days = <?php echo $tgBookingsLast30Days; ?>;
            const totaltourguides = <?php echo $totalTourguides; ?>;
            const tourguidesLast30Days = <?php echo $tourguidesLast30Days; ?>;

            // Total Tour Guide Bookings
            // update total tour guide bookings
            document.getElementById('totalTgBookings').innerText = totaltgbookings;

            // calc percentage - tour guides bookings
            const percentChangeTgBookings = ((tgBookingsLast30Days / totaltgbookings) * 100).toFixed(2);

            // update percentage change & circle - tour guides booking
            document.getElementById('percentChangeTgBookings').innerText = `+${percentChangeTgBookings}%`;
            const circleTgBookings = document.querySelector('.ring-tgbookings');
            const circleLengthTgBookings = 2 * Math.PI * circleTgBookings.getAttribute('r');
            const newOffsetTgBookings = circleLengthTgBookings * ((totaltgbookings - tgBookingsLast30Days) / totaltgbookings);
            circleTgBookings.style.strokeDashoffset = newOffsetTgBookings;

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

        });
    </script>

    <script>
        function approveTG(tg_id, full_name) {
            Swal.fire({
                title: 'Are you sure you want to approve?',
                html: "Tour Guide ID: " + tg_id + "<br>Name: " + full_name,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {

                    window.location.href = "<?= $_SERVER['PHP_SELF'] ?>?action=approve&id=" + tg_id;
                }
            });
        }

        function declineTG(tg_id, full_name) {
            Swal.fire({
                title: 'Are you sure you want to decline?',
                html: "Tour Guide ID: " + tg_id + "<br>Name: " + full_name,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {

                    window.location.href = "<?= $_SERVER['PHP_SELF'] ?>?action=decline&id=" + tg_id;
                }
            });
        }
    </script>

</body>

</html>