<?php
require_once '../../config.php';

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['hotel_email'])) {
    $hotel_email = $_SESSION['hotel_email'];

    $sql = "SELECT * FROM hotels WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $hotel_email);
    $stmt->execute();
    $result = $stmt->get_result();
    $hotels = $result->fetch_assoc();

    $full_name = $hotels['name'];
} else {
    header("location: hotellogin.php");
}

?>

<!-- Right Section -->
<div class="right-section">
    <div class="nav">

        <div class="profile">
            <div class="info">
                <p>Hey, <b><?php echo htmlspecialchars($full_name); ?></b></p>
                <small class="text-muted">Hotel</small>
            </div>
            <div class="profile-photo">
                <img src="../../Images/users/avatar_placeholder.png">
            </div>
        </div>

    </div>
    <!-- End of Nav -->

    <div class="user-profile">
        <div class="logo">
            <img src="../../Images/logoblack.png">
            <h2></h2>
        </div>
    </div>
</div>
</div>
</div>

</body>

</html>