<?php
session_start();

unset($_SESSION['admin_email']);

header("Location: ../../index.php");
exit;
?>