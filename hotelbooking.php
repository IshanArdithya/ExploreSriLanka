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

            <div class="list-container">
                <div class="left-col">

                    <?php
                    $conn = new mysqli($hostname, $username, $password, $database);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $filterCondition = "WHERE h.active = 1";

                    if (isset($_GET['search']) && !empty($_GET['search'])) {
                        $searchTerm = $_GET['search'];
                        $filterCondition .= " AND (h.district LIKE '%$searchTerm%' OR h.name LIKE '%$searchTerm%' OR hr.description LIKE '%$searchTerm%')";
                    }

                    if (isset($_GET['filter']) && isset($_GET['district'])) {
                        $selectedDistricts = explode(',', $_GET['district']);
                        $selectedDistrictsStr = implode("','", $selectedDistricts);
                        $filterCondition .= " AND h.district IN ('$selectedDistrictsStr')";
                    }

                    $countSql = "SELECT COUNT(*) AS total FROM hotelrooms hr JOIN hotels h ON hr.hotel_id = h.hotel_id $filterCondition";
                    $countResult = mysqli_query($conn, $countSql);
                    $rowCount = mysqli_fetch_assoc($countResult)['total'];
                    echo '<p>' . $rowCount . ' Options</p>';

                    $perPage = 5;
                    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                    $offset = ($currentPage - 1) * $perPage;

                    $sql = "SELECT hr.hotel_id, h.district, h.name AS hotel_name, h.hotel_picture, hr.description, hr.price, hr.guests, h.distance, h.district 
                            FROM hotelrooms hr 
                            JOIN hotels h ON hr.hotel_id = h.hotel_id 
                            $filterCondition
                            LIMIT $offset, $perPage";

                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="house">';
                            echo '<div class="house-img">';
                            echo '<img src="' . $row['hotel_picture'] . '">';
                            echo '</div>';
                            echo '<div class="house-info" id="house-info">';
                            echo '<p>Hotel in ' . $row['district'] . '</p>';
                            echo '<h3>' . $row['hotel_name'] . '</h3>';
                            echo '<p>' . $row['description'] . '</p>';
                            echo '<p>' . $row['distance'] . ' km away from ' . $row['district'] . '.</p>';
                            echo '<div class="house-price">';
                            echo '<p>' . $row['guests'] . ' Guest(s)</p>';
                            echo '<h4>LKR ' . $row['price'] . ' <span1>/ day</span1></h4>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "No hotel rooms found.";
                    }
                    mysqli_close($conn);
                    ?>
                </div>
                <div class="right-col">
                    <div class="sidebar">
                        <h2>Select Filters</h2>
                        <input type="text" id="searchInput" placeholder="Search...">
                        <h3>Districts</h3>

                        <?php
                        $conn = new mysqli($hostname, $username, $password, $database);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $districtSql = "SELECT DISTINCT h.district, COUNT(hr.hotel_id) AS room_count FROM hotels h LEFT JOIN hotelrooms hr ON h.hotel_id = hr.hotel_id WHERE h.active = 1 GROUP BY h.district";
                        $districtResult = mysqli_query($conn, $districtSql);

                        // Check if districts are found
                        if (mysqli_num_rows($districtResult) > 0) {
                            while ($districtRow = mysqli_fetch_assoc($districtResult)) {
                                $district = $districtRow['district'];
                                $roomCount = $districtRow['room_count'];
                                echo '<div class="filter">';
                                echo '<input type="checkbox" name="district" value="' . $district . '">';
                                echo '<p>' . $district . '</p>';
                                echo '<span>(' . $roomCount . ')</span>';
                                echo '</div>';
                            }
                        } else {
                            echo "No districts found.";
                        }

                        mysqli_close($conn);
                        ?>

                        <button id="filterButton" disabled>Filter</button>
                        <button id="resetButton">Reset</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pagination">
        <?php
        $totalPages = ceil($rowCount / $perPage);
        for ($i = 1; $i <= $totalPages; $i++) {
            $link = '?page=' . $i;
            if (isset($_GET['filter'])) {
                $link .= '&filter=1';
                if (!empty($selectedDistricts)) {
                    $link .= '&district=' . urlencode(implode(',', $selectedDistricts));
                }
            }
            echo '<a href="' . $link . '" class="' . ($i == $currentPage ? 'current' : '') . '">' . $i . '</a>';
        }
        ?>
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

    <script src="js/script.js"></script>

</body>

</html>