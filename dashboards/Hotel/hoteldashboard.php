<?php include('partials/sidebar.php');?>

<!-- Main Content -->
<main>
    <h1>Dashboard</h1>

    <!-- Booking Details Table -->
    <div class="recent-user">
        <h2>Booking Details</h2>
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>Payment Status</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Table rows content -->
                <tr>
                    <td>JavaScript Tutorial</td>
                    <td>85743</td>
                    <td>Due</td>
                    <td>Pending</td>
                    <td>
                        <a href="manage.hotel.html" class="btn-secondary">Update</a>
                        <a href="#" class="btn-danger">Delete</a>
                    </td>
                </tr>

                <tr class="extra-row" style="display: none;">
                    <td>Extra Row 1</td>
                    <td>12345</td>
                    <td>Extra</td>
                    <td>Active</td>
                    <td>
                        <a href="#" class="btn-secondary">Update</a>
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

    <!-- Add rooms -->
    <div class="update">
        <h1>Add Room Details</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <table class="tbl-30">
                <tr>
                    <td>Room Type:</td>
                    <td>
                        <select name="room_type" id="room_type" required>
                            <option value="" selected disabled>Select Room Type</option>
                            <?php
                            foreach ($all_room_types as $type) {
                                echo '<option value="' . $type . '" ' . ($room_type == $type ? 'selected' : '') . '>' . $type . '</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Date:</td>
                    <td><input type="date" name="date" value=""></td>
                </tr>
                <tr>
                    <td>Location:</td>
                    <td><input type="text" name="location" value=""></td>
                </tr>
                <tr>
                    <td>Room No:</td>
                    <td><input type="text" name="room_no" value=""></td>
                </tr>
            </table>
            <div class="back">
                <input type="submit" name="submit" value="Add room" class="btn-secondary">
            </div>
        </form>
    </div>
</main>


    <!-- End of Main Content -->
    <?php include('partials/rightside.php');?>
</main>
<!--  -->