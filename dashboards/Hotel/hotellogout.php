<?php
session_start();

unset($_SESSION['hotel_email']);

header("Location: ../../hotellogin.php");
exit;
?>