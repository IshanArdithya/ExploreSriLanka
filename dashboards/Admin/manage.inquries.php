<?php

include_once '../../config.php';

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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
    <title>Admin dashboard</title>
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
            <!-- Inquiries Table -->
            <div class="recent-user">
                <br>
                <br>
                <br>
                <h2>Inquiries</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Inquiry ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>Country</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php


                            $sql = "SELECT * FROM contactus ORDER BY inquiry_id DESC LIMIT 15";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['inquiry_id'] . "</td>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['contact_number'] . "</td>";
                                    echo "<td>" . $row['country'] . "</td>";
                                    echo "<td>" . $row['message'] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='9'>No recent reservations found</td></tr>";
                            }


                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- End of Inquiries Table -->

        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->

        <?php
        include 'Components/rightsection.php'
        ?>

    </div>
    </div>

</body>

</html>