

<?php
include('partials/sidebar.php');

// hotel data from session
$hotelEmail = $_SESSION['hotel_email'];
$sql = "SELECT hotel_id FROM hotels WHERE email = '$hotelEmail'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$hotel_id = $row['hotel_id'];



?>

<!-- Main Content -->
<main>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <h1>Dashboard</h1>

    <!-- Booking Details Table -->
    <div class="recent-user">
        <h2>Pending Reservations</h2>
        <table>
            <thead>
                <tr>
                    <th>Reservation ID</th>
                    <th>Room Name</th>
                    <th>Reserved From</th>
                    <th>Reserved Till</th>
                    <th>Full Name</th>
                    <th>Total Price</th>
                    <th>Approval</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $reservation_query = "SELECT hr.reservation_id, hr.hotel_id, hr.name, hr.room_number, hr.reserved_from, hr.reserved_till, c.full_name, hr.totalprice, hr.approval
                      FROM hotelreservation hr
                      LEFT JOIN customers c ON hr.customer_id = c.customer_id
                      WHERE hr.hotel_id = '$hotel_id' AND hr.approval = 'Pending'
                      ORDER BY hr.reservation_id";
                $reservation_result = mysqli_query($conn, $reservation_query);

                if ($reservation_result && mysqli_num_rows($reservation_result) > 0) {
                    while ($reservation_row = mysqli_fetch_assoc($reservation_result)) {
                        echo "<tr>";
                        echo "<td>" . $reservation_row['reservation_id'] . "</td>";
                        echo "<td>" . $reservation_row['room_number'] . "</td>";
                        echo "<td>" . $reservation_row['reserved_from'] . "</td>";
                        echo "<td>" . $reservation_row['reserved_till'] . "</td>";
                        echo "<td>" . $reservation_row['full_name'] . "</td>";
                        echo "<td>" . $reservation_row['totalprice'] . "</td>";
                        echo "<td>" . $reservation_row['approval'] . "</td>";
                        echo "<td>";
                        echo "<a href='#' class='btn-primary' onclick='approveReservation(\"" . $reservation_row['reservation_id'] . "\")'>Approve</a>";
                        echo "<a href='#' class='btn-danger' onclick='declineReservation(\"" . $reservation_row['reservation_id'] . "\")'>Decline</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No pending reservations found!</td></tr>";
                }

                if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && isset($_GET['id'])) {
                    if ($_GET['action'] == 'approve') {
                        if (!empty(trim($_GET['id']))) {
                            $reservation_id = trim($_GET['id']);
                            $status = 'Approved';

                            $sql = "UPDATE hotelreservation SET approval = '$status' WHERE reservation_id = '$reservation_id'";

                            if ($conn->query($sql) === TRUE) {

                                echo "<script>Swal.fire('Approved!',
                                    'The Reservation is Approved!.', 
                                    'success').then(() => { 
                                        window.location.href = 'hoteldashboard.php';
                                    })
                                    </script>";
                            } else {
                                echo "<script>Swal.fire('Error!',
                                    'Error updating record: " . $conn->error . "', 
                                    'error').then(() => { 
                                        window.location.href = 'hoteldashboard.php';
                                    })</script>";
                            }
                        }
                    } elseif ($_GET['action'] == 'decline') {
                        if (!empty(trim($_GET['id']))) {
                            $reservation_id = trim($_GET['id']);
                            $status = 'Declined';

                            $sql = "DELETE FROM hotelreservation WHERE reservation_id = '$reservation_id'";

                            if ($conn->query($sql) === TRUE) {

                                echo "<script>Swal.fire('Declined!',
                                    'The Reservation is Declined!.', 
                                    'success').then(() => { 
                                        window.location.href = 'hoteldashboard.php';
                                    })
                                    </script>";
                            } else {
                                echo "<script>Swal.fire('Error!',
                                    'Error updating record: " . $conn->error . "', 
                                    'error').then(() => { 
                                        window.location.href = 'hoteldashboard.php';
                                    })</script>";
                            }
                        }
                    }
                }

                ?>
            </tbody>
        </table>
    </div>

    <div class="recent-user">
        <h2>Recent Reservations</h2>
        <table>
            <thead>
                <tr>
                    <th>Reservation ID</th>
                    <th>Room Name</th>
                    <th>Reserved From</th>
                    <th>Reserved Till</th>
                    <th>Full Name</th>
                    <th>Total Price</th>
                    <th>Package Order ID</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $recent_query = "SELECT hr.reservation_id, hr.hotel_id, hr.name, hr.room_number, hr.reserved_from, hr.reserved_till, c.full_name, hr.totalprice, hr.approval, hr.pkg_order_id
                      FROM hotelreservation hr
                      LEFT JOIN customers c ON hr.customer_id = c.customer_id
                      WHERE hr.hotel_id = '$hotel_id' AND hr.approval = 'Approved'
                      ORDER BY hr.reservation_id" . " DESC LIMIT 5";
                $recent_result = mysqli_query($conn, $recent_query);

                if ($recent_result && mysqli_num_rows($recent_result) > 0) {
                    while ($recent_row = mysqli_fetch_assoc($recent_result)) {
                        echo "<tr>";
                        echo "<td>" . $recent_row['reservation_id'] . "</td>";
                        echo "<td>" . $recent_row['room_number'] . "</td>";
                        echo "<td>" . $recent_row['reserved_from'] . "</td>";
                        echo "<td>" . $recent_row['reserved_till'] . "</td>";
                        echo "<td>" . $recent_row['full_name'] . "</td>";
                        echo "<td>" . $recent_row['totalprice'] . "</td>";
                        echo "<td>" . $recent_row['pkg_order_id'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No reservations found!</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</main>


<!-- End of Main Content -->

</main>

<?php include('partials/rightside.php'); ?>

<script>
    function approveReservation(reservation_id) {
        Swal.fire({
            title: 'Are you sure you want to approve?',
            html: "Reservation ID: " + reservation_id,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {

                window.location.href = "<?= $_SERVER['PHP_SELF'] ?>?action=approve&id=" + reservation_id;
            }
        });
    }

    function declineReservation(reservation_id) {
        Swal.fire({
            title: 'Are you sure you want to decline?',
            html: "Reservation ID: " + reservation_id,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {

                window.location.href = "<?= $_SERVER['PHP_SELF'] ?>?action=decline&id=" + reservation_id;
            }
        });
    }
</script>

<!--  -->