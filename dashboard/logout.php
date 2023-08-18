<?php
session_start();
session_unset();

$_SESSION['logout_user'] = 'user logout';

header("location: ../login.php");

?>