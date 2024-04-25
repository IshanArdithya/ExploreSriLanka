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

if (isset($_SESSION['tourguide_email'])) {
    $tourguide_email = $_SESSION['tourguide_email'];

    $sql = "SELECT * FROM tourguide WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$tourguide_email]);
    $tourguide = $stmt->fetch(PDO::FETCH_ASSOC);

    $tourguide_id = $tourguide['tg_id'];
    $first_name = $tourguide['first_name'];
    $last_name = $tourguide['last_name'];
    $contact_number = $tourguide['contact_number'];
    $district = $tourguide['district'];
    $experience = $tourguide['experience'];
    $specialty = $tourguide['specialty'];
    $short_desc = $tourguide['short_desc'];
    $profile_picture = $tourguide['picture'];
    $active = $tourguide['active'];
} else {
    header("location: tourguidelogin.php");
}

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $full_name = $first_name . ' ' . $last_name;
    $contact_number = $_POST['contact_number'];
    $district = $_POST['district'];
    $experience = $_POST['experience'];
    $specialty = $_POST['specialty'];
    $short_desc = $_POST['short_desc'];
    $active = isset($_POST['active_checkbox']) ? 1 : 0;

    $profile_picture = $_FILES['picture'];
    if ($profile_picture['error'] === UPLOAD_ERR_OK) {
        $file_extension = pathinfo($profile_picture['name'], PATHINFO_EXTENSION);

        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array(strtolower($file_extension), $allowed_extensions)) {
            $new_filename = $tourguide_id . '.' . $file_extension;

            $destination = '../../images/tourguides/' . $new_filename;
            $picturepath = 'images/tourguides/' . $new_filename;
            if (move_uploaded_file($profile_picture['tmp_name'], $destination)) {
                $sql = "UPDATE tourguide SET picture = ? WHERE email = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$picturepath, $tourguide_email]);
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
        }
    }

    $sql = "UPDATE tourguide SET first_name = ?, last_name = ?, full_name = ?, contact_number = ?, district = ?, experience = ?, specialty = ?, short_desc = ?, active = ? WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$first_name, $last_name, $full_name, $contact_number, $district, $experience, $specialty, $short_desc, $active, $tourguide_email]);

    echo "<script>Swal.fire('Updated!',
        'Profile successfully updated.', 
        'success').then(() => { 
            window.location.href = 'tourguidesettings.php';
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
                            <input type="file" name="picture" onchange="updateFileName(this)">
                            <span style="display: block">Choose File</span>
                        </label>
                        <span style="margin-left: 1rem;"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" id="first_name" value="<?php echo htmlspecialchars($first_name); ?>">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" id="last_name" value="<?php echo htmlspecialchars($last_name); ?>">
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

                        $sql = "SELECT district FROM tourguide WHERE email = ?";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([$tourguide_email]);
                        $tourguide_data = $stmt->fetch(PDO::FETCH_ASSOC);
                        $tourguide_district = $tourguide_data['district'];

                        foreach ($districts as $district) {
                            if ($district === $tourguide_district) {
                                echo "<option value=\"$district\" selected>$district</option>";
                            } else {
                                echo "<option value=\"$district\">$district</option>";
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="experience">Years Of Experience</label>
                    <input type="number" name="experience" id="experience" value="<?php echo htmlspecialchars($experience); ?>">
                </div>
                <div class="form-group">
                    <label for="specialty">Specialty</label>
                    <input type="text" name="specialty" id="specialty" value="<?php echo htmlspecialchars($specialty); ?>">
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