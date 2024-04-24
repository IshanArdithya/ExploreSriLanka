<?php
include('partials/sidebar1.php');

// initialize variables
$id = '';
$first_name = '';
$last_name = '';
$contact_number = '';
$district = '';
$experience = '';
$specialty = '';
$short_desc = '';
$active = '';
$profile_picture = '';

if(isset($_POST['submit'])) {
    // get form data
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
    $contact_number = isset($_POST['contact_number']) ? $_POST['contact_number'] : '';
    $district = isset($_POST['district']) ? $_POST['district'] : '';
    $experience = isset($_POST['experience']) ? $_POST['experience'] : '';
    $specialty = isset($_POST['specialty']) ? $_POST['specialty'] : '';
    $short_desc = isset($_POST['short_desc']) ? $_POST['short_desc'] : '';
    $active = isset($_POST['active']) ? $_POST['active'] : 'NO'; 

    // upload profile picture
    if ($_FILES['picture']['name']) {
        $file_name = $_FILES['picture']['name'];
        $file_tmp = $_FILES['picture']['tmp_name'];
        $extension = pathinfo($file_name, PATHINFO_EXTENSION);
        $profile_picture = "TG000" . uniqid() . "." . $extension; 
        $target_dir = "Images/tourguide/";
        $target_path = $target_dir . $profile_picture;


    }

    $sql = "UPDATE tourguide SET first_name='$first_name', last_name='$last_name', contact_number='$contact_number', district='$district', experience='$experience', specialty='$specialty', short_desc='$short_desc', picture='$profile_picture', active='$active' WHERE tg_id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo '<script>
                Swal.fire({
                    title: "Success",
                    text: "Record updated successfully!",
                    icon: "success",
                    confirmButtonText: "OK"
                }).then(function() {
                    window.location.href = "tourguidedashboard.php";
                });
              </script>';
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
} else {
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    if (!empty($id)) {
        $sql = "SELECT * FROM tourguide WHERE tg_id='$id'"; 
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $contact_number = $row['contact_number'];
            $district = $row['district'];
            $experience = $row['experience'];
            $specialty = $row['specialty'];
            $short_desc = $row['short_desc'];
            $active = $row['active'];
            $profile_picture = $row['picture'];
        } else {
        }
    }
}
?>

<!-- Main Content -->
<main>
    <div class="update">
        <h1>Update Tour Guide</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <table class="tbl-30">
                <tr>
                    <td>First Name : </td>
                    <td><input type="text" name="first_name" value="<?php echo $first_name; ?>"></td>
                </tr>
                <tr>
                    <td>Last Name : </td>
                    <td><input type="text" name="last_name" value="<?php echo $last_name; ?>"></td>
                </tr>
                <tr>
                    <td>Contact No. : </td>
                    <td><input type="text" name="contact_number" value="<?php echo $contact_number; ?>"></td>
                </tr>
                <tr>
                    <td>District : </td>
                    <td><input type="text" name="district" value="<?php echo $district; ?>"></td>
                </tr>
                <tr>
                    <td>Years Of Experience: </td>
                    <td><input type="number" name="experience" value="<?php echo $experience; ?>"></td>
                </tr>
                <tr>
                    <td>Specialty : </td>
                    <td><input type="text" name="specialty" value="<?php echo $specialty; ?>"></td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td><input type="text" name="short_desc" value="<?php echo $short_desc; ?>"></td>
                </tr>
                <tr>
                    <td>Profile Picture: </td>
                    <td>
                        <input type="file" name="picture">
                        <?php if(!empty($profile_picture)) echo '<br><img src="' . $profile_picture . '" width="100" height="100">'; ?>
                    </td>
                </tr>
                <tr>
                    <td>Available :</td>
                    <td>
                        <label class="switch">
                            <input type="checkbox" name="active" id="active_toggle" <?php if($active == 'YES') echo 'checked'; ?> onchange="toggleStatus()">
                            <span class="slider round"></span>
                        </label>
                        <input type="hidden" name="active" id="active" value="YES">
                    </td>
                </tr>
            </table>
            <div class="back">
                <input type="submit" name="submit" value="Update Tour Guide" class="btn-secondary">
                <a href="tourguidedashboard.php" class="btn btn-back">Back</a>
            </div>
        </form>
    </div>
</main>

<?php include('partials/rightside.php'); ?>
