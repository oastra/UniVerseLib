<?php
session_start();
include 'inc/db_config.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$user_id = $_SESSION['memberID'];
$book_id = $_GET['id'];

// Get the book title
$sql = "SELECT title FROM books WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $book_id);
$stmt->execute();
$result = $stmt->get_result();
$book = $result->fetch_assoc();
$book_title = htmlspecialchars($book['title']);

// Check if the book is already reserved by the user
$sql = "SELECT * FROM reservations WHERE book_id = ? AND user_id = ? AND status = 'Reserved'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $book_id, $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    $sql = "INSERT INTO reservations (book_id, user_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $book_id, $user_id);
    if ($stmt->execute()) {
       
        echo '<script>alert("You successfully reserved the book: ' . $book_title . '"); setTimeout(function(){ window.location.href = "dashboard.php"; }, 2000);</script>';
    } else {
        echo '<script>alert("Error reserving book."); window.location.href = "dashboard.php";</script>';
    }
} else {
    echo '<script>alert("You have already reserved this book."); window.location.href = "dashboard.php";</script>';
}
?>
