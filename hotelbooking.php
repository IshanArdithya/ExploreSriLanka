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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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
            <!-- <div class="list-container">
                <div class="left-col"> -->
            <div class="card">
                <div class="card-row">
                    <form id="hotelSearchForm" method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="input-group">
                            <label class="input-label">Date</label>
                            <input name="date" type="date" class="form-control">
                        </div>
                        <div class="input-group">
                            <label class="input-label">Planning on Staying</label>
                            <select name="duration" class="form-control">
                                <option value="" disabled selected>Select</option>
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
                                <option value="" disabled selected>Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <br>
                            <button type="submit" class="form-control booking-btn-search" id="searchButton" disabled>Search</button>
                        </div>
                    </form>
                </div>
                <div class="card-row">
                    <div id="hotelResults">
                        <?php

                        $conn = new mysqli($hostname, $username, $password, $database);

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['date']) && isset($_GET['duration']) && isset($_GET['guests'])) {
                            $selectedDate = $_GET['date'];
                            $stayDuration = $_GET['duration'];
                            $guestCount = $_GET['guests'];

                            $checkoutDate = date('Y-m-d', strtotime($selectedDate . ' + ' . ($stayDuration - 1) . ' days'));

                            $sql = "SELECT hr.hotel_id, h.name AS hotel_name, h.district, hr.description, hr.guests, hr.price, hr.room_picture, h.distance, hr.room_type, hr.room_id
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
                                while ($row = $result->fetch_assoc()) {
                                    echo '<div class="house">';
                                    echo '<div class="house-img">';
                                    echo '<img src="' . $row["room_picture"] . '">';
                                    echo '</div>';
                                    echo '<div class="house-info">';
                                    echo '<p>Hotel in ' . $row["district"] . '</p>';
                                    echo '<h3>' . $row["hotel_name"] . '</h3>';
                                    echo '<p>' . $row['description'] . '</p>';
                                    echo '<p>' . $row['distance'] . ' km away from ' . $row['district'] . '.</p>';
                                    echo '<div class="house-price">';
                                    echo '<p>' . $row["guests"] . ' Guest(s)</p>';
                                    echo '<h4>Price: LKR' . $row["price"] . ' / day</h4>';
                                    echo '</div>';
                                    echo '<button onclick="bookNow(\'' . $row["hotel_name"] . '\', \'' . $row["room_type"] . '\', \'' . $selectedDate . '\', ' . $stayDuration . ', \'' . $checkoutDate . '\', ' . $row["price"] . ', \'' . $row["hotel_id"] . '\', \'' . $row["room_id"] . '\')" class="btn-book-now">Book Now</button>';

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
            <!-- </div>
                <div class="right-col">
                    <div class="sidebar">
                        <h2>Select Filters</h2>
                        <input type="text" id="searchInput" placeholder="Search...">
                        <h3>Districts</h3>

                        

                        <button id="filterButton" disabled>Filter</button>
                        <button id="resetButton">Reset</button>
                    </div>
                </div>
            </div> -->
        </div>
    </div>


    <!-- Footer -->
    <?php include 'components/footer.php'; ?>

    <button id="toTop" class="fa fa-arrow-up"></button>

    <script>
        // used this to disable search btn until all fields are filled

        document.addEventListener("DOMContentLoaded", function() {
            const searchButton = document.getElementById("searchButton");
            searchButton.classList.add("disabled");
        });

        document.querySelectorAll('select').forEach(item => {
            item.addEventListener('change', event => {
                var date = document.getElementsByName('date')[0].value;
                var duration = document.getElementsByName('duration')[0].value;
                var guests = document.getElementsByName('guests')[0].value;
                const searchButton = document.getElementById("searchButton");
                if (date !== '' && duration !== '' && guests !== '') {
                    searchButton.classList.remove("disabled");
                    searchButton.removeAttribute("disabled");
                } else {
                    searchButton.classList.add("disabled");
                    searchButton.setAttribute("disabled", true);
                }
            })
        });
    </script>

<script>
    function bookNow(hotelName, roomType, selectedDate, stayDuration, checkoutDate, price, hotelId, roomId) {
        Swal.fire({
            title: 'Booking Confirmation',
            html: '<h3>' + hotelName + '</h3>' +
                '<p>Room Type: ' + roomType + '</p>' +
                '<p>Selected Date: ' + selectedDate + '</p>' +
                '<p>Checkout Date: ' + checkoutDate + '</p>' +
                '<p>Total Price: LKR' + (price * stayDuration) + '</p>',
            showCancelButton: true,
            confirmButtonText: 'Confirm',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Processing...',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                    didOpen: () => {
                        swal.showLoading();
                        var xhr = new XMLHttpRequest();
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === XMLHttpRequest.DONE) {
                                if (xhr.status === 200) {
                                    Swal.fire({
                                        title: "Thank you!",
                                        text: "Your room booking request has been submitted. You will receive an email once your booking is approved.",
                                        icon: "success"
                                    });
                                } else {
                                    Swal.fire({
                                        title: "Oops...",
                                        text: "Something went wrong!",
                                        icon: "error"
                                    });
                                }
                            }
                        };

                        var params = 'hotel_id=' + hotelId + '&name=' + hotelName + '&room_number=' + roomId + '&reserved_from=' + selectedDate + '&reserved_till=' + checkoutDate + '&stay_duration=' + stayDuration + '&approval=Pending';

                        xhr.open('POST', 'hotelbooking-backend.php', true);
                        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                        xhr.send(params);
                    }
                });
            }
        });
    }
</script>


    <script src="js/script.js"></script>

</body>

</html>