<?php
session_start();
include 'inc/db_config.php'; // Ensure this file is correctly configured to connect to your database

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$errors = []; // Initialize an array to hold error messages

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']); // Use email as username
    $password = $_POST['password'];
    $retype_password = $_POST['retype_password'];
    $role = 'user'; // Default role

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
    } else {
        // Check password complexity
        if (strlen($password) < 8) {
            $errors[] = "Password must be at least 8 characters long.";
        }
        if (!preg_match("/[A-Z]/", $password)) {
            $errors[] = "Password must contain at least one uppercase letter.";
        }
        if (!preg_match("/[a-z]/", $password)) {
            $errors[] = "Password must contain at least one lowercase letter.";
        }
        if (!preg_match("/[0-9]/", $password)) {
            $errors[] = "Password must contain at least one number.";
        }
        if (!preg_match("/[!@#$%^&*(),.?\":{}|<>]/", $password)) {
            $errors[] = "Password must contain at least one special character.";
        }
    }

    // Check for any errors
    if (empty($errors)) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Check if email (used as username) already exists
        $check_sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($check_sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $check_result = $stmt->get_result();

        if ($check_result->num_rows > 0) {
            $errors[] = "Email address already exists.";
        } else {
            // Insert user into database using prepared statements
            $sql = "INSERT INTO users (username, password, email, role, first_name, last_name) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssss", $email, $hashed_password, $email, $role, $first_name, $last_name);

            if ($stmt->execute() === TRUE) {
                $_SESSION['username'] = $email;
                $_SESSION['role'] = $role;
                $_SESSION['first_name'] = $first_name;
                $_SESSION['last_name'] = $last_name;
                $_SESSION['memberID'] = $stmt->insert_id; // Get the last inserted ID
                echo '<script>alert("Registration successful!")</script>';
                echo "<script>setTimeout(function(){ window.location.href = 'dashboard.php'; }, 1000);</script>";
                exit;
            } else {
                $errors[] = "Error: " . $stmt->error;
            }
        }
    }

    // If there are errors, display them
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['post_data'] = $_POST; // Preserve the posted data
        header("Location: index.php#signupModal");
        exit;
    }
}

$conn->close();
?>
