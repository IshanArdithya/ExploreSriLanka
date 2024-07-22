<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['reset_password'])) {

        $customer_email = $_SESSION['customer_email'];

        $sql = "SELECT password FROM customers WHERE email='$customer_email'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $current_password = $row['password'];

        $entered_current_password = mysqli_real_escape_string($conn, $_POST['current_password']);
        if (password_verify($entered_current_password, $current_password)) {
            $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
            $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

            if ($new_password == $confirm_password) {
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $update_sql = "UPDATE customers SET password='$hashed_password' WHERE email='$customer_email'";
                if (mysqli_query($conn, $update_sql)) {
                    echo "Password updated successfully";
                } else {
                    echo "Error updating password: " . mysqli_error($conn);
                }
            } else {
                echo "New password and confirm password do not match";
            }
        } else {
            echo "Current password is incorrect";
        }
    }
}
?>
