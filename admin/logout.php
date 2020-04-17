<?php
session_start();
unset($_SESSION['login_user']);
unset($_SESSION['login_name']);
unset($_SESSION['auth']);
session_destroy();
header("location: index.php");
?>
