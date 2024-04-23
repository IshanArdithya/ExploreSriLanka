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
    <title>TourGuide dashboard</title>
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
            <h1>Dashboard</h1>
            <!-- Analyses -->

            <div class="analyse">
                <div class="sales">
                    <div class="status">
                        <div class="info">
                            <h3>Total Bookings</h3>
                            <h1>$65,024</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>+81%</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="count">
                    <div class="status">
                        <div class="info">
                            <h3>Tour Guides Count</h3>
                            <h1>24,981</h1>
                        </div>

                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>-48%</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="visits">
                    <div class="status">
                        <div class="info">
                            <h3>Customer Count</h3>
                            <h1>24,981</h1>
                        </div>

                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>-48%</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="available">
                    <div class="status">
                        <div class="info">
                            <h3>Availibility</h3>
                            <h1>24,981</h1>
                        </div>

                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>-48%</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="searches">
                    <div class="status">
                        <div class="info">
                            <h3>Searches</h3>
                            <h1>14,147</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>+21%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Analyses -->



            <!-- Approved Tour Guides Table -->
            <div class="recent-user">
                <h2>Approved Tour Guides</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Tour Guide ID</th>
                            <th>Customer Name</th>
                            <th>Booking Status</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>JavaScript Tutorial</td>
                            <td>85743</td>
                            <td>Due</td>
                            <td>Pending</td>
                            <td>
                                <a href="#" class="btn-primary">Approve</a>
                                <a href="manage.tourguide.html" class="btn-secondary">Update</a>
                                <a href="#" class="btn-danger">Delete</a>
                            </td>
                        </tr>
                        <!-- Add more rows here -->
                        <tr class="extra-row" style="display: none;">
                            <td>Extra Row 1</td>
                            <td>12345</td>
                            <td>Extra</td>
                            <td>Active</td>
                            <td>
                                <a href="#" class="btn-primary">Approve</a>
                                <a href="manage.tourguide.html" class="btn-secondary">Update</a>
                                <a href="#" class="btn-danger">Delete</a>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="5">
                                <a href="#" class="show-all-link">Show More</a>
                                <a href="#" class="show-less-link" style="display: none;">Show Less</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- End of Approved Tour Guides Table -->

            <!-- Booking Details Table -->
            <div class="recent-user">
                <h2>Booking Details</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Hotel ID</th>
                            <th>Customer Name</th>
                            <th>Payment Status</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>JavaScript Tutorial</td>
                            <td>85743</td>
                            <td>Due</td>
                            <td>Pending</td>
                            <td>
                                <a href="#" class="btn-secondary">Confirm</a>
                                <a href="#" class="btn-danger">Delete</a>
                            </td>
                        </tr>

                        <tr class="extra-row" style="display: none;">
                            <td>Extra Row 1</td>
                            <td>12345</td>
                            <td>Extra</td>
                            <td>Active</td>
                            <td>
                                <a href="#" class="btn-secondary">Confirm</a>
                                <a href="#" class="btn-danger">Delete</a>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="5">
                                <a href="#" class="show-all-link">Show More</a>
                                <a href="#" class="show-less-link" style="display: none;">Show Less</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- End of Booking Details Table -->


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