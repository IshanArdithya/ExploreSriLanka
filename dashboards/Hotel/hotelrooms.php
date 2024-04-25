<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<?php



include('partials/sidebar.php');

// hotel data from session
$hotelEmail = $_SESSION['hotel_email'];
$sql = "SELECT hotel_id, name, district FROM hotels WHERE email = '$hotelEmail'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$hotel_id = $row['hotel_id'];
$name = $row['name'];
$district = $row['district'];


if (isset($_POST['submit'])) {
    $room_type = $_POST['room_type'];
    $guests = $_POST['guests'];
    $roomid = $_POST['roomid'];
    $short_desc = $_POST['short_desc'];
    $price = $_POST['price'];
    $addtopackages = $_POST['addtopackages'];
    $hotelEmail = $_SESSION['hotel_email'];

    $profile_picture = $_FILES['room_picture'];

    if ($profile_picture['error'] === UPLOAD_ERR_OK) {
        $file_extension = pathinfo($profile_picture['name'], PATHINFO_EXTENSION);

        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array(strtolower($file_extension), $allowed_extensions)) {
            $new_filename = $hotel_id . '-' . $roomid . '.' . $file_extension;

            $destination = '../../images/hotels/hotelrooms/' . $new_filename;
            $picturepath = 'images/hotels/hotelrooms/' . $new_filename;
            if (move_uploaded_file($profile_picture['tmp_name'], $destination)) {
                echo "File uploaded successfully";
            } else {
                echo "Failed to upload file";
            }
        }
    }


    $sql = "INSERT INTO hotelrooms (hotel_id, name, district, description, guests, room_type, room_id, price, room_picture, add_to_packages) VALUES ('$hotel_id', '$name', '$district', '$short_desc', '$guests', '$room_type', '$roomid', '$price', '$picturepath', '$addtopackages')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>Swal.fire('Updated!',
        'Profile successfully updated.', 
        'success').then(() => { 
            window.location.href = 'hotelrooms.php';
        })
        </script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<!-- Main Content -->
<main>
    <h1>Dashboard</h1>
    <h2 style="margin-top: 1.3rem; margin-bottom: 0.8rem;">Add Room Details</h2>
    <!-- Add rooms -->
    <div class="updatesettings">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <table class="tbl-30">
                <tr>
                    <td>Room Type:</td>
                    <td>
                        <select name="room_type" id="room_type" required>
                            <option value="" selected disabled>Select Room Type</option>
                            <option value="Standard">Standard</option>
                            <option value="Luxury">Luxury</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Guests:</td>
                    <td>
                        <select name="guests" id="guests" required>
                            <option value="" selected disabled>Select Guests</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Room No:</td>
                    <td><input type="text" name="roomid" id="roomid" value=""></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td><textarea name="short_desc" id="short_desc"></textarea></td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td><input type="text" name="price" id="price" value=""></td>
                </tr>
                <tr>
                    <td>Add Image:</td>
                    <td>
                        <label class="custom-file-upload">
                            <input type="file" name="room_picture" onchange="updateFileName(this)">
                            <span style="display: block">Choose File</span>
                        </label>
                        <span style="margin-left: 1rem;"></span>
                    </td>
                </tr>
                <tr>
                    <td>Add to Packages?</td>
                    <td>
                        <select name="addtopackages" id="addtopackages" required>
                            <option value="" selected disabled>Add to Packages?</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </td>
                </tr>
            </table>
            <div class="back">
                <input type="submit" name="submit" value="Add room" class="btn-secondary">
            </div>
        </form>
    </div>
    <div class="recent-user">
        <h2>Update Room Details</h2>
        <table>
            <thead>
                <tr>
                    <th>Room Number</th>
                    <th>Room Type</th>
                    <th>Guests</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Add to Packages</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $rooms_query = "SELECT hr.name, hr.hotel_id, hr.name, hr.district, hr.description, hr.guests, hr.room_type, hr.room_id, hr.price, hr.room_picture, hr.add_to_packages
                      FROM hotelrooms hr
                      WHERE hr.hotel_id = '$hotel_id'
                      ORDER BY hr.room_id";
                $rooms_result = mysqli_query($conn, $rooms_query);

                if ($rooms_result && mysqli_num_rows($rooms_result) > 0) {
                    while ($rooms_row = mysqli_fetch_assoc($rooms_result)) {
                        echo "<tr>";
                        echo "<td>" . $rooms_row['room_id'] . "</td>";
                        echo "<td>" . $rooms_row['room_type'] . "</td>";
                        echo "<td>" . $rooms_row['guests'] . "</td>";
                        echo "<td>" . $rooms_row['description'] . "</td>";
                        echo "<td>" . $rooms_row['price'] . "</td>";
                        echo "<td>" . $rooms_row['add_to_packages'] . "</td>";
                        echo "<td>";
                        echo "<a href='#' class='btn-secondary' onclick='updateRoom(\"" . $rooms_row['room_id'] . "\", \"" . $rooms_row['room_type'] . "\", \"" . $rooms_row['guests'] . "\", \"" . $rooms_row['description'] . "\", \"" . $rooms_row['price'] . "\", \"" . $rooms_row['add_to_packages'] . "\",  \"" . $rooms_row['room_picture'] . "\")'>Update</a>";
                        echo "<a href='#' class='btn-danger' onclick='deleteRoom(\"" . $rooms_row['room_id'] . "\", \"" . $rooms_row['room_type'] . "\", \"" . $rooms_row['guests'] . "\", \"" . $rooms_row['description'] . "\", \"" . $rooms_row['price'] . "\", \"" . $rooms_row['add_to_packages'] . "\",  \"" . $rooms_row['room_picture'] . "\")'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No pending reservations found!</td></tr>";
                }

                if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && isset($_GET['id'])) {
                    if ($_GET['action'] == 'updateroomsdata') {
                        if (!empty(trim($_GET['id']))) {
                            $room_id = trim($_GET['id']);
                            $room_type = trim($_GET['roomtype']);
                            $guests = trim($_GET['guests']);
                            $description = trim($_GET['description']);
                            $price = trim($_GET['price']);
                            $add_to_packages = trim($_GET['addtopackages']);


                            $sql = "UPDATE hotelrooms SET room_type = '$room_type', guests = '$guests', description = '$description', price = '$price', add_to_packages = '$add_to_packages' WHERE room_id = '$room_id'";

                            if ($conn->query($sql) === TRUE) {

                                echo "<script>Swal.fire('Updated!',
                                    'The Hotel Room is Updated!.', 
                                    'success').then(() => { 
                                        window.location.href = 'hotelrooms.php';
                                    })
                                    </script>";
                            } else {
                                echo "<script>Swal.fire('Error!',
                                    'Error updating record: " . $conn->error . "', 
                                    'error').then(() => { 
                                        window.location.href = 'hotelrooms.php';
                                    })</script>";
                            }
                        }
                    } elseif ($_GET['action'] == 'deleteroomsdata') {
                        if (!empty(trim($_GET['id']))) {
                            $room_id = trim($_GET['id']);

                            $sql = "DELETE FROM hotelrooms WHERE room_id = '$room_id'";

                            if ($conn->query($sql) === TRUE) {

                                echo "<script>Swal.fire('Declined!',
                                    'The Reservation is Declined!.', 
                                    'success').then(() => { 
                                        window.location.href = 'hotelrooms.php';
                                    })
                                    </script>";
                            } else {
                                echo "<script>Swal.fire('Error!',
                                    'Error updating record: " . $conn->error . "', 
                                    'error').then(() => { 
                                        window.location.href = 'hotelrooms.php';
                                    })</script>";
                            }
                        }
                    }
                }

                ?>
            </tbody>
        </table>
    </div>
</main>


<!-- End of Main Content -->

</main>

<script>
    function updateFileName(input) {
        var span = input.parentNode.nextElementSibling;
        span.textContent = "File Added";
    }
</script>

<script>
    function updateRoom(room_id, room_type, guests, description, price, add_to_packages, room_picture) {
        Swal.fire({
            title: 'Update Product',
            html: `<div class="update-formss">
                    <div class="input-container">
                        <img src="../../${room_picture}" alt="Product Photo" class="product-photo">
                        <br><p>Change fields to update the Room!</p><br>
                        <label for="item_id" class="field-name">Room ID</label>
                        <input type="text" id="room_id" value="${room_id}" placeholder="Room ID" class="swal2-input" readonly>
                        <label for="name" class="field-name">Type</label>
                        <select name="u_room_type" id="u_room_type" required>
                            <option value="" selected disabled>Select Room Type</option>
                            <option value="Standard">Standard</option>
                            <option value="Luxury">Luxury</option>
                        </select>
                        <label for="guests" class="field-name">Guests</label>
                        <select name="u_guests" id="u_guests" required>
                            <option value="" selected disabled>Select Guests</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                        <label for="description" class="field-name">Description</label>
                        <textarea id="u_description" placeholder="Description" class="swal2-textarea" required>${description}</textarea>
                        <label for="price" class="field-name">Price</label>
                        <input type="text" id="u_price" value="${price}" placeholder="Price (LKR)" class="swal2-input" required>
                        <label for="add_to_packages" class="field-name">Add to Packages?</label>
                        <select name="u_addtopackages" id="u_addtopackages" required>
                            <option value="" selected disabled>Add to Packages?</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
                `,
            focusConfirm: false,
            preConfirm: () => {
                const u_room_type = Swal.getPopup().querySelector('#u_room_type').value;
                const u_guests = Swal.getPopup().querySelector('#u_guests').value;
                const u_description = Swal.getPopup().querySelector('#u_description').value;
                const u_price = Swal.getPopup().querySelector('#u_price').value;
                const u_add_to_packages = Swal.getPopup().querySelector('#u_addtopackages').value;

                return {
                    u_room_type: u_room_type,
                    u_guests: u_guests,
                    u_description: u_description,
                    u_price: u_price,
                    u_add_to_packages: u_add_to_packages
                }
            },
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Change',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                const u_room_type = Swal.getPopup().querySelector('#u_room_type').value;
                const u_guests = Swal.getPopup().querySelector('#u_guests').value;
                const u_description = Swal.getPopup().querySelector('#u_description').value;
                const u_price = Swal.getPopup().querySelector('#u_price').value;
                const u_add_to_packages = Swal.getPopup().querySelector('#u_addtopackages').value;

                Swal.fire({
                    title: 'Are you sure you want to change?',
                    html: `
                            <div class="update-formss">
                                <div class="input-container">
                                    <label for="item_id" class="field-name">Room ID</label>
                                    <div class="info-container">
                                        <p class="current-info">${room_id}</p>
                                    </div><br>
                                    <label for="name" class="field-name">Type</label>
                                    <p class="confirmation-text">
                                        <div class="info-container">
                                            <span class="current-info">${room_type}</span><br>
                                        </div>
                                        <span class="arrow-down">↓</span>
                                        <div class="info-container">
                                            <span class="changed-info">${u_room_type}</span>
                                        </div>
                                    </p><br>
                                    <label for="guests" class="field-name">Guests</label>
                                    <p class="confirmation-text">
                                        <div class="info-container">
                                            <span class="current-info">${guests}</span><br>
                                        </div>
                                        <span class="arrow-down">↓</span>
                                        <div class="info-container">
                                            <span class="changed-info">${u_guests}</span>
                                        </div>
                                    </p><br>
                                    <label for="description" class="field-name">Description</label>
                                    <p class="confirmation-text">
                                        <div class="info-container">
                                            <span class="current-info">${description}</span><br>
                                        </div>
                                        <span class="arrow-down">↓</span>
                                        <div class="info-container">
                                            <span class="changed-info">${u_description}</span>
                                        </div>
                                    </p><br>
                                    <label for="price" class="field-name">Price</label>
                                    <p class="confirmation-text">
                                        <div class="info-container">
                                            <span class="current-info">LKR ${price}</span><br>
                                        </div>
                                        <span class="arrow-down">↓</span>
                                        <div class="info-container">
                                            <span class="changed-info">LKR ${u_price}</span>
                                        </div>
                                    </p><br>
                                    <label for="description" class="field-name">Add to Packages</label>
                                    <p class="confirmation-text">
                                        <div class="info-container">
                                            <span class="current-info">${add_to_packages}</span><br>
                                        </div>
                                        <span class="arrow-down">↓</span>
                                        <div class="info-container">
                                            <span class="changed-info">${u_add_to_packages}</span>
                                        </div>
                                    </p><br>
                                </div>
                            </div>
                        `,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Confirm',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {

                        window.location.href = "<?= $_SERVER['PHP_SELF'] ?>?action=updateroomsdata&id=" + room_id + "&roomtype=" + u_room_type + "&guests=" + u_guests + "&description=" + u_description + "&price=" + u_price + "&addtopackages=" + u_add_to_packages;
                    }
                });
            }
        });
    }

    function deleteRoom(room_id, room_type, guests, description, price, add_to_packages, room_picture) {
        Swal.fire({
            title: 'Are you sure you want to delete product?',
            html: "Room ID: " + room_id,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {

                window.location.href = "<?= $_SERVER['PHP_SELF'] ?>?action=deleteroomsdata&id=" + room_id;
            }
        });
    }
</script>


<?php include('partials/rightside.php'); ?>
<!--  -->