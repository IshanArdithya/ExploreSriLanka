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
                <h2>Inquaries</h2>
                <table>
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Table rows content -->
                        <tr>
                            <td>Alex Perera</td>
                            <td>Lorem ipsum dolor sit amet consectetur, adipisici</td>
                            <td>
                                <a href="#" class="btn-primary" onclick="toggleDetails(0)">View Details</a>
                                <input type="submit" name="submit" value="Accept" class="btn-secondary">
                                <input type="submit" name="submit" value="Decline" class="btn-danger">
                            </td>
                        </tr>
                        <!-- Additional row with details hidden by default -->
                        <tr class="extra-row" style="display: none;">
                            <td colspan="3">
                                <div id="details-0" style="display: none;">
                                    <p>Details for Alex Perera:</p>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisici elit. Provident, ratione.</p>
                                </div>
                            </td>
                        </tr>
                        <!-- Add more rows -->
                        <tr>
                            <td>John Doe</td>
                            <td>Lorem ipsum dolor sit amet consectetur, adipisici</td>
                            <td>
                                <a href="#" class="btn-primary" onclick="toggleDetails(1)">View Details</a>
                                <input type="submit" name="submit" value="Accept" class="btn-secondary">
                                <input type="submit" name="submit" value="Decline" class="btn-danger">
                            </td>
                        </tr>
                        <tr class="extra-row" style="display: none;">
                            <td colspan="3">
                                <div id="details-1" style="display: none;">
                                    <p>Details for John Doe:</p>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisici elit. Provident, ratione.</p>
                                </div>
                            </td>
                        </tr>
                        <!-- Add more extra rows-->
                        <tr>
                            <td colspan="3">
                                <a href="#" class="show-all-link" onclick="toggleExtraRows()">Show More</a>
                                <a href="#" class="show-less-link" style="display: none;" onclick="toggleExtraRows()">Show Less</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- End of Inquiries Table -->

            <div class="back">
                <a href="admin.shop.html" class="btn btn-back">Back</a>
            </div>

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