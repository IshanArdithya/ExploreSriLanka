<?php
include('partials/sidebar.php');

$tour_guide_query = "SELECT * FROM tourguide ORDER BY tg_id";
$tour_guide_result = mysqli_query($conn, $tour_guide_query);

// check if the query
if($tour_guide_result && mysqli_num_rows($tour_guide_result) > 0) {
?>

<!-- Main Content -->
<main>
    <h1>Dashboard</h1>
    <!-- booking details table -->
    <div class="recent-user">
        <h2>Booking Details</h2>
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
                // Fetch bookings 
                $booking_query = "SELECT * FROM tourguidebooking ORDER BY booking_id, tg_id, pkg_order_id";
                $booking_result = mysqli_query($conn, $booking_query);

                // check if the booking query was successful
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
                    echo "No bookings found.";
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- end of booking details table -->
</main>
<!-- end of main Content -->

<?php 
} else {
    echo "No tour guides found.";
}
include('partials/rightside.php');
?>
