<?php
include('partials/sidebar.php');


$tg_id = "TG0002"; // Set the specific tour guide ID

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
    <!-- Tour Guide Email Session -->
    <div class="tour-guide-email">
        <h2>Tour Guide Email</h2>
        <p>Email: <?php echo $tour_guide_row['email']; ?></p>
    </div>
    <!-- End of Tour Guide Email Session -->

    <!-- Booking Details Table -->
    <div class="recent-user">
        <h2>Your Booking Details <?php echo $tour_guide_row['tg_id']; ?></h2>
        <table>
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>TourGuide ID</th>
                    <th>Name</th>
                    <th>Booked From</th>
                    <th>Booked Till</th>
                    <th>Package Order ID</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch bookings for the specific tour guide
                $booking_query = "SELECT * FROM tourguidebooking WHERE tg_id = '$tg_id' ORDER BY booking_id";
                $booking_result = mysqli_query($conn, $booking_query);

                if($booking_result && mysqli_num_rows($booking_result) > 0) {
                    while ($booking_row = mysqli_fetch_assoc($booking_result)) {
                        echo "<tr>";
                        echo "<td>" . $booking_row['booking_id'] . "</td>";
                        echo "<td>" . $booking_row['tg_id'] . "</td>";
                        echo "<td>" . $booking_row['name'] . "</td>";
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
