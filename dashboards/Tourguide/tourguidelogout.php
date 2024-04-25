<?php
session_start();

unset($_SESSION['tourguide_email']);

header("Location: ../../tourguidelogin.php");
exit;
?>