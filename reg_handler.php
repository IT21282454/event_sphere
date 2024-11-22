<?php
require './config/config.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
    $email = $_POST['email'];

    // Validate inputs
    if (empty($username) || empty($password) || empty($confirm_password) || empty($email)) {
        echo "<script>alert('All fields are required!');</script>";
        echo "<script>window.history.back();</script>";
        exit;
    }

    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match!');</script>";
        echo "<script>window.history.back();</script>";
        exit;
    }

    // Prepare an SQL statement to check if the username already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>alert('Username is already taken.');</script>";
        echo "<script>window.history.back();</script>";
        $stmt->close();
        exit;
    }

    $stmt->close();

    // Insert new user into the database
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, 'user')");
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        echo "<script>alert('Registration Successful!');</script>";
        header("Location: login.php");
    } else {
        echo "<script>alert('Error during registration: ' . $conn->error);</script>";
        echo "<script>window.history.back();</script>";
    }

    $stmt->close();  // Close the statement
    $conn->close();  // Close the connection
}
