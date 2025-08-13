<?php
session_start();
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Trim and escape inputs
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $password = mysqli_real_escape_string($conn, trim($_POST['password']));

    // Validation
    if ( empty($email) || empty($password) || empty($c_password)) {
        echo "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
    } elseif (strlen($password) < 6) {
        echo "Password must be at least 6 characters long.";
    } elseif ($password !== $c_password) {
        echo "Passwords do not match.";
    } elseif (!$agree) {
        echo "You must agree to the terms.";
    } else {
        // Check if email already exists
       // Check if email already exists
$check = $conn->prepare("SELECT id FROM users WHERE email = ?");
if (!$check) {
    die("Prepare failed: " . $conn->error);
}
$check->bind_param("s", $email);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    echo "Email already registered.";
} else {
    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert new user
    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("sss", $name, $email, $hashed_password);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$check->close();
    }
    
    // Close connection
    $conn->close();
}else {
    echo "Invalid request method.";
}

