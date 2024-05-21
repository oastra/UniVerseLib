<?php
session_start();
include 'inc/db_config.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reservation_id = $_POST['reservation_id'];

    $sql = "UPDATE reservations SET status = 'Cancelled' WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $reservation_id);

    if ($stmt->execute()) {
        echo '<script>alert("Reservation cancelled successfully!"); window.location.href = "dashboard.php";</script>';
    } else {
        echo '<script>alert("Error cancelling reservation."); window.location.href = "dashboard.php";</script>';
    }
}
?>
