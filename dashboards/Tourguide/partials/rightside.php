<?php
require_once '../../config.php';

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['tourguide_email'])) {
    $tourguide_email = $_SESSION['tourguide_email'];

    $sql = "SELECT * FROM tourguide WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $tourguide_email);
    $stmt->execute();
    $result = $stmt->get_result();
    $tourguide = $result->fetch_assoc();

    $first_name = $tourguide['first_name'];
} else {
    header("location: ../../tourguidelogin.php");
}

?>

<!-- Right Section -->
        <div class="right-section">
            <div class="nav">

                <div class="profile">
                    <div class="info">
                        <p>Hey, <b><?php echo htmlspecialchars($first_name); ?></b></p>
                        <small class="text-muted">Tour Guide</small>
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

<?php
$conn->close();
?>