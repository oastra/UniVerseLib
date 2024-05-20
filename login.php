<?php
session_start();
include 'inc/db_config.php';

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script>alert("Invalid email address.")</script>';
    } else {
        // Retrieve the user from the database
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['first_name'] = $user['first_name']; // Store first name in session
                $_SESSION['last_name'] = $user['last_name']; // Store last name in session
                $_SESSION['memberID'] = $user['id']; // Store member ID in session
                echo '<script>alert("Login successful!")</script>';
                echo "<script>setTimeout(function(){ window.location.href = 'dashboard.php'; }, 1000);</script>";
                exit;
            } else {
                echo '<script>alert("Incorrect password.")</script>';
            }
        } else {
            echo '<script>alert("No user found with that email address.")</script>';
        }
    }
}

$conn->close();
?>
