<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Hotel | Explore Sri Lanka</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/hotelbooking.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

    <!-- Header -->
    <?php include 'components/header.php'; ?>

    <div class="top-image">
        <img src="./Images/slides/slide-22.jpg" alt="">
        <h1 class="headings sub-heading"></h1>
    </div>

    <!-- Breadcrumbs -->
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
                <li class="active">Hotel</li>
            </ol>
        </div>

        <div class="container">
    <h1 class="headings mini-heading">Hotels to Stay</h1>
    <p class="lead mini-lead"></p>
    <div class="card">
        <div class="card-row">
            <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="input-group">
                    <label class="input-label">Date</label>
                    <input name="date" type="date" class="form-control">
                </div>
                <div class="input-group">
                    <label class="input-label">Planning on Staying</label>
                    <select name="duration" class="form-control">
                        <option value="1">1 day</option>
                        <option value="2">2 days</option>
                        <option value="3">3 days</option>
                        <option value="4">4 days</option>
                        <option value="5">5 days</option>
                    </select>
                </div>
                <div class="input-group">
                    <label class="input-label">Guest(s)</label>
                    <select name="guests" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
                <div class="input-group">
                    <br>
                    <button type="submit" class="form-control">Search</button>
                </div>
            </form>
        </div>
        <div class="card-row">
            <!-- Results will be displayed here -->
            <div id="hotelResults">
                <?php
                // Check if form submitted
                if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['date']) && isset($_GET['duration']) && isset($_GET['guests'])) {
                    // Process form submission
                    $selectedDate = $_GET['date'];
                    $stayDuration = $_GET['duration'];
                    $guestCount = $_GET['guests'];

                    // Calculate checkout date
                    $checkoutDate = date('Y-m-d', strtotime($selectedDate . ' + ' . ($stayDuration - 1) . ' days'));

                    // Query to fetch available rooms
                    $sql = "SELECT hr.hotel_id, h.name AS hotel_name, h.district, hr.description, hr.guests, hr.price, h.hotel_picture
                            FROM hotelrooms hr
                            INNER JOIN hotels h ON hr.hotel_id = h.hotel_id
                            WHERE hr.guests = $guestCount
                            AND NOT EXISTS (
                                SELECT 1
                                FROM hotelreservation
                                WHERE hotel_id = hr.hotel_id
                                AND room_number = hr.room_id
                                AND reserved_from <= '$checkoutDate'
                                AND reserved_till >= '$selectedDate'
                            )";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            // Output HTML for displaying hotel rooms
                            echo '<div class="house">';
                            echo '<div class="house-img">';
                            echo '<img src="' . $row["hotel_picture"] . '">';
                            echo '</div>';
                            echo '<div class="house-info">';
                            echo '<p>Hotel in ' . $row["district"] . '</p>';
                            echo '<h3>' . $row["hotel_name"] . '</h3>';
                            echo '<div class="house-price">';
                            echo '<p>' . $row["guests"] . ' Guest(s)</p>';
                            echo '<h4>Price: $' . $row["price"] . ' / day</h4>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "No available rooms found.";
                    }

                    $conn->close();
                }
                ?>
            </div>
        </div>
    </div>
</div>
    </div>


    <!-- Footer -->
    <?php include 'components/footer.php'; ?>

    <button id="toTop" class="fa fa-arrow-up"></button>






    <script>
        window.onload = function() {
            var url = window.location.href;
            if (url.indexOf('?') !== -1) {
                var cleanUrl = url.substring(0, url.indexOf('?'));
                window.history.replaceState({}, document.title, cleanUrl);
            }
        };

        document.addEventListener("DOMContentLoaded", function() {
            var filterButton = document.getElementById('filterButton');
            var checkboxes = document.querySelectorAll('input[name="district"]');
            var searchInput = document.getElementById('searchInput');

            function updateFilterButtonState() {
                var checkedCheckboxes = document.querySelectorAll('input[name="district"]:checked');
                var isSearchInputEmpty = searchInput.value.trim() === '';
                filterButton.disabled = checkedCheckboxes.length === 0 && isSearchInputEmpty;
            }

            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', updateFilterButtonState);
            });

            searchInput.addEventListener('input', updateFilterButtonState);

            updateFilterButtonState();

            filterButton.addEventListener('click', function() {
                var selectedDistricts = Array.from(document.querySelectorAll('input[name="district"]:checked')).map(function(checkbox) {
                    return checkbox.value;
                });

                var queryString = '';
                if (selectedDistricts.length > 0) {
                    queryString = '?filter=1&district=' + selectedDistricts.join(',');
                }

                var searchValue = searchInput.value.trim();
                if (searchValue !== '') {
                    queryString += (queryString ? '&' : '?') + 'search=' + encodeURIComponent(searchValue);
                }

                window.location.href = window.location.pathname + queryString;
            });
        });

        document.getElementById('resetButton').addEventListener('click', function() {
            window.location.href = window.location.pathname;
        });
    </script>

    <!-- <script src="js/script.js"></script> -->

</body>

</html>