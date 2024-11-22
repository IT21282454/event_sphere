<?php
session_start(); // Start the session

$isLoggedIn = isset($_SESSION['user_id']);

$username = $isLoggedIn ? $_SESSION['username'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="Navbar.css">
</head>

<body>
    <header>
        <div class="logo">
            <a href="./home.php">
                <i class='bx bxs-leaf' style='color:#108554'></i>
                <p>EventSphere</p>
            </a>

        </div>
        <nav>
            <a href="./gallery.php" class="nav-link">Gallery</a>
            <a href="./contact.php" class="nav-link">Contact</a>

            <?php if (!$isLoggedIn): ?>
                <!-- If the user is not logged in, show login and register links -->
                <a href="./login.php" class="nav-link login-link">Login</a>
                <a href="./register.php" class="nav-link register-link">Register</a>
            <?php else: ?>
                <span class="username">Hello, <?php echo htmlspecialchars($username); ?> !</span>
                <a href="logout.php" class="nav-link logout-link">Logout</a>
            <?php endif; ?>
        </nav>
    </header>
</body>

</html>