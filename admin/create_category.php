<?php
include '../config/config.php';

// Prepare and bind
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $category_name = $_POST['category_name'];
    $description = $_POST['description'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO categories (category_name, description) VALUES (?, ?)");
    $stmt->bind_param("ss", $category_name, $description);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: categories.php");
    } else {
        echo "<script>alert('Error: ' . $stmt->error);</script>";
    }

    // Close statement
    $stmt->close();
}

// Close the database connection
$conn->close();
