<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<?php
include('partials/sidebar.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../../config.php';

try {
    $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}

if (isset($_SESSION['hotel_email'])) {
    $hotel_email = $_SESSION['hotel_email'];

    $sql = "SELECT * FROM hotels WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$hotel_email]);
    $hotels = $stmt->fetch(PDO::FETCH_ASSOC);

    $hotel_id = $hotels['hotel_id'];
    $name = $hotels['name'];
    $address = $hotels['address'];
    $contact_number = $hotels['contact_number'];
    $district = $hotels['district'];
    $distance = $hotels['distance'];
    $short_desc = $hotels['short_desc'];
    $profile_picture = $hotels['hotel_picture'];
    $active = $hotels['active'];
} else {
    header("location: ../../hotellogin.php");
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact_number = $_POST['contact_number'];
    $district = $_POST['district'];
    $distance = $_POST['distance'];
    $short_desc = $_POST['short_desc'];
    $active = isset($_POST['active_checkbox']) ? 1 : 0;

    $profile_picture = $_FILES['hotel_picture'];
    if ($profile_picture['error'] === UPLOAD_ERR_OK) {
        $file_extension = pathinfo($profile_picture['name'], PATHINFO_EXTENSION);

        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array(strtolower($file_extension), $allowed_extensions)) {
            $new_filename = $hotel_id . '.' . $file_extension;

            $destination = '../../images/hotels/' . $new_filename;
            $picturepath = 'images/hotels/' . $new_filename;
            if (move_uploaded_file($profile_picture['tmp_name'], $destination)) {
                $sql = "UPDATE hotels SET hotel_picture = ? WHERE email = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$picturepath, $hotel_email]);
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
        }
    }

    $sql = "UPDATE hotels SET name = ?, address = ?, contact_number = ?, district = ?, distance = ?, short_desc = ?, active = ? WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $address, $contact_number, $district, $distance, $short_desc, $active, $hotel_email]);

    echo "<script>Swal.fire('Updated!',
        'Profile successfully updated.', 
        'success').then(() => { 
            window.location.href = 'hotelsettings.php';
        })
        </script>";
    exit();
}
?>

<!-- Main Content -->
<main>
    <h1>Settings</h1>
    <h2 style="margin-top: 1.3rem; margin-bottom: 0.8rem;">Update Your Profile</h2>
    <div class="updatesettings">
        <form action="" method="POST" enctype="multipart/form-data" class="update-form">
            <input type="hidden" name="id">
            <div class="settings-container">
                <div class="form-group">
                    <label for="avatar">Avatar:</label>
                    <div class="avatar-input">
                        <div class="profile-picture-container">
                            <?php if (!empty($profile_picture)) echo '<img src="../../' . $profile_picture . '" class="profile-picture" alt="Profile Picture">'; ?>
                        </div>
                        <label class="custom-file-upload">
                            <input type="file" name="hotel_picture" onchange="updateFileName(this)">
                            <span style="display: block">Choose File</span>
                        </label>
                        <span style="margin-left: 1rem;"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="first_name">Name</label>
                    <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name); ?>">
                </div>
                <div class="form-group">
                    <label for="first_name">Address</label>
                    <input type="text" name="address" id="address" value="<?php echo htmlspecialchars($address); ?>">
                </div>
                <div class="form-group">
                    <label for="contact_number">Contact No.</label>
                    <input type="text" name="contact_number" id="contact_number" value="<?php echo htmlspecialchars($contact_number); ?>">
                </div>
                <div class="form-group">
                    <label for="district">District:</label>
                    <select name="district" id="district" required>
                        <option value="" disabled>Select District</option>
                        <?php
                        $districts = array(
                            "Colombo", "Gampaha", "Kalutara", "Kandy", "Matale", "Nuwara Eliya",
                            "Galle", "Matara", "Hambantota", "Jaffna", "Kilinochchi", "Mannar",
                            "Mullaitivu", "Vavuniya", "Puttalam", "Kurunegala", "Anuradhapura",
                            "Polonnaruwa", "Badulla", "Monaragala", "Ratnapura", "Kegalle",
                            "Trincomalee", "Batticaloa", "Ampara"
                        );

                        $sql = "SELECT district FROM hotels WHERE email = ?";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([$hotel_email]);
                        $hotel_data = $stmt->fetch(PDO::FETCH_ASSOC);
                        $hotel_district = $hotel_data['district'];

                        foreach ($districts as $district) {
                            if ($district === $hotel_district) {
                                echo "<option value=\"$district\" selected>$district</option>";
                            } else {
                                echo "<option value=\"$district\">$district</option>";
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="experience">Distance</label>
                    <input type="number" name="distance" id="distance" value="<?php echo htmlspecialchars($distance); ?>">
                </div>
                <div class="form-group">
                    <label for="short_desc">Description</label>
                    <textarea name="short_desc" id="short_desc"><?php echo htmlspecialchars($short_desc); ?></textarea>
                </div>
                <div class="form-group">
                    <label for="active">Available</label>
                    <label class="switch">
                        <input type="checkbox" name="active_checkbox" id="active_toggle" <?php if ($active == 1) echo 'checked'; ?> onchange="toggleStatus()">
                        <span class="slider round"></span>
                    </label>
                    <input type="hidden" name="active" id="active" value="<?php echo $active; ?>">
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" value="Save Changes" class="btn-secondary">
                </div>
            </div>
        </form>

    </div>
</main>

<script>
    function updateFileName(input) {
        var fileName = input.files[0].name;
        var span = input.parentNode.nextElementSibling;
        span.textContent = fileName;
    }
</script>

<?php include('partials/rightside.php'); ?>