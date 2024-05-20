<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include 'inc/db_config.php';

// Ensure memberID is set in session
if (!isset($_SESSION['memberID'])) {
    header('Location: login.php');
    exit;
}

$book_id = $_GET['id'];
$member_id = $_SESSION['memberID'];

// Update the book status to 'Available'
$sql = "UPDATE bookstatus SET status='Available', member_id=NULL, borrowed_date=NULL, return_due_date=NULL WHERE book_id=$book_id AND member_id=$member_id";

if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Book returned successfully!"); window.location.href="dashboard.php";</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
