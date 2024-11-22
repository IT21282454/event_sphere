<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

// Retrieve the username from session
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="Sidebar.css">
</head>

<body>
    <div class="sidebar">
        <!-- Logo Section -->
        <div class="logo">
            <a href="../home.php">
                <i class='bx bxs-leaf' style='color:#108554'></i>
                <p>EventSphere</p>
            </a>
        </div>

        <!-- Profile Section -->
        <div class="profile">
            <img src="../assets/admin.jpg" alt="Profile Picture">
            <div class="profile-name"><?php echo htmlspecialchars($username); ?></div>
        </div>

        <!-- Menu Section -->
        <div class="menu">
            <a href="dashboard.php" class="menu-item active">
                <i class='bx bxs-dashboard'></i>
                <span>Dashboard</span>
            </a>
            <a href="categories.php" class="menu-item">
                <i class='bx bxs-shield-alt-2'></i>
                <span>Categories</span>
            </a>
            <a href="events.php" class="menu-item">
                <i class='bx bxs-calendar-event'></i>
                <span>Events</span>
            </a>
            <a href="booking.php" class="menu-item">
                <i class='bx bxs-bookmark-star'></i>
                <span>Booking</span>
            </a>
            <a href="user.php" class="menu-item">
                <i class='bx bxs-user'></i>
                <span>User</span>
            </a>
            <a href="message.php" class="menu-item">
                <i class='bx bxs-message-alt-detail'></i>
                <span>Messages</span>
            </a>
            <a href="#" class="menu-item" style='color:#b10303' onclick="window.location.href='../logout.php';">
                <i class='bx bx-log-out'></i>
                <span>Logout</span>
            </a>
        </div>
    </div>

    <script>
        const menuItems = document.querySelectorAll('.menu-item');

        menuItems.forEach(item => {
            item.addEventListener('click', function() {
                // Remove 'active' class from all items
                menuItems.forEach(i => i.classList.remove('active'));
                // Add 'active' class to the clicked item
                this.classList.add('active');
            });
        });
    </script>

</body>

</html>