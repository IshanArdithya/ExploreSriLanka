<?php
include('partials/sidebar.php');

// tourguide data from session
$tourguideEmail = $_SESSION['tourguide_email'];
$sql = "SELECT tg_id FROM tourguide WHERE email = '$tourguideEmail'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$tg_id = $row['tg_id'];

// Fetch the specific tour guide's details including email
$tour_guide_query = "SELECT * FROM tourguide WHERE tg_id = '$tg_id'";
$tour_guide_result = mysqli_query($conn, $tour_guide_query);

// Check if the tour guide exists
if($tour_guide_result && mysqli_num_rows($tour_guide_result) > 0) {
    $tour_guide_row = mysqli_fetch_assoc($tour_guide_result);
?>

<!-- Main Content -->
<main>
    <h1>Dashboard</h1>

    <!-- Booking Details Table -->
    <div class="recent-user">
        <h2>Your Booking Details</h2>
        <table>
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Customer Name</th>
                    <th>Contact Number</th>
                    <th>Booked From</th>
                    <th>Booked Till</th>
                    <th>Package Order ID</th>
                </tr>
            </thead>
            <tbody>
    <?php
    // Fetch bookings for the specific tour guide
    $booking_query = "SELECT tg.booking_id, tg.name, tg.booked_from, tg.booked_till, tg.pkg_order_id, c.full_name, c.contact_number
                      FROM tourguidebooking tg
                      LEFT JOIN customers c ON tg.customer_id = c.customer_id
                      WHERE tg.tg_id = '$tg_id'
                      ORDER BY tg.booking_id";
    $booking_result = mysqli_query($conn, $booking_query);

    if($booking_result && mysqli_num_rows($booking_result) > 0) {
        while ($booking_row = mysqli_fetch_assoc($booking_result)) {
            echo "<tr>";
            echo "<td>" . $booking_row['booking_id'] . "</td>";
            echo "<td>" . $booking_row['full_name'] . "</td>";
            echo "<td>" . $booking_row['contact_number'] . "</td>";
            echo "<td>" . $booking_row['booked_from'] . "</td>";
            echo "<td>" . $booking_row['booked_till'] . "</td>";

            if(isset($booking_row['pkg_order_id'])) {
                echo "<td>" . $booking_row['pkg_order_id'] . "</td>";
            } else {
                echo "<td>N/A</td>";
            }
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No bookings found for this tour guide.</td></tr>";
    }
    ?>
</tbody>
        </table>
    </div>
</main>
<!-- End of Main Content -->

<?php 
} else {
    echo "Tour guide not found.";
}

include('partials/rightside.php');
?>
