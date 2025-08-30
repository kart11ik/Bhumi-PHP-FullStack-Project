<?php
include 'dbconnection.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not authenticated
    exit();
}

$fullname = $_SESSION['fullname']; // Get the logged-in user's full name
?>
