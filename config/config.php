<?php
// Assign DB Properties
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "event_sphere_db";

// Create DB Connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check Connection 
if ($conn->connect_error) {
    die("Connection Failed! " . $conn->connect_error);
} else {
    // echo "Connection Successfull!";
}
