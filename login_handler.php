<?php
session_start();
require './config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // SQL query to select user by email
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email); // Bind the email to prevent SQL injection
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Check if user exists and the password matches (plain-text comparison)
    if ($user && $user['password'] === $password) {
        // Start session and store user data
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['username'] = $user['username'];

        // Redirect based on user role
        if ($user['role'] === 'admin') {
            header("Location: ./admin/dashboard.php");
        } else {
            header("Location: home.php");
        }
        exit();
    } else {
        echo "<script>alert('Invalid Username or Password!');</script>";
        echo "<script>window.history.back();</script>";
    }
}
