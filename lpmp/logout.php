<?php
require_once "admin/core/init3.php";

unset($_SESSION['user']);
session_destroy();
header('Location: index.php');
?>
