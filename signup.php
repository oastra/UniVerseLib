<?php
session_start();
include 'inc/db_config.php'; // Ensure this file is correctly configured to connect to your database

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']); // Use email as username
    $password = $_POST['password'];
    $retype_password = $_POST['retype_password'];
    $role = 'user'; // Default role

    // Initialize an array to hold error messages
    $errors = [];

    // Validate first name
    if (!preg_match("/^[a-zA-Z]*$/", $first_name) || strlen($first_name) > 50) {
        $errors[] = "First Name must contain only alpha characters and be no more than 50 characters.";
    }

    // Validate last name
    if (!preg_match("/^[a-zA-Z]*$/", $last_name) || strlen($last_name) > 50) {
        $errors[] = "Last Name must contain only alpha characters and be no more than 50 characters.";
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
    } elseif (strlen($email) > 100) {
        $errors[] = "Email is too long.";
    }

    // Validate password
    if ($password !== $retype_password) {
        $errors[] = "Passwords do not match.";
    }

    // Check for any errors
    if (empty($errors)) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Check if email (used as username) already exists
        $check_sql = "SELECT * FROM users WHERE email='$email'";
        $check_result = $conn->query($check_sql);
        if ($check_result->num_rows > 0) {
            $errors[] = "Email address already exists.";
        } else {
            // Insert user into database
            $sql = "INSERT INTO users (username, password, email, role, first_name, last_name) 
                    VALUES ('$email', '$hashed_password', '$email', '$role', '$first_name', '$last_name')";
            if ($conn->query($sql) === TRUE) {
                $_SESSION['username'] = $email;
                $_SESSION['role'] = $role;
                echo '<script>alert("Registration successful!")</script>';
                echo "<script>setTimeout(function(){ window.location.href = 'Choose-book.php'; }, 1000);</script>";
                exit;
            } else {
                $errors[] = "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    // If there are errors, display them
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<script>alert('$error')</script>";
        }
    }
}

$conn->close();
?>
