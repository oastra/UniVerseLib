<?php
session_start();
include 'inc/db_config.php';

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

if (isset($_GET['id'])) {
    $book_id = $_GET['id'];
    $member_id = $_SESSION['memberID']; // Ensure 'memberID' is stored in session during login
    $borrowed_date = date('Y-m-d H:i:s');
    $return_due_date = date('Y-m-d H:i:s', strtotime('+21 days'));

    // Insert the borrow information into bookstatus
    $sql = "INSERT INTO bookstatus (book_id, member_id, status, borrowed_date, return_due_date) 
            VALUES ($book_id, $member_id, 'Onloan', '$borrowed_date', '$return_due_date')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success_message'] = "Book borrowed successfully.";
        header('Location: dashboard.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    header('Location: dashboard.php');
}

$conn->close();
?>
