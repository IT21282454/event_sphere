<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="register.css">
</head>

<body>

    <?php include "./Navbar.php"; ?>

    <div class="register-container">
        <!-- Left Section: Register Form -->
        <div class="register-section">
            <h1>Create Account</h1>
            <p>Join us and explore our services</p>

            <form action="reg_handler.php" method="POST">
                <label for="username">Full Name</label>
                <input type="text" id="username" name="username" placeholder="Your Name" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="yourname@example.com" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="••••••••" required>

                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="••••••••" required>

                <button type="submit">Sign Up</button>
            </form>

            <div class="login-link">
                Already have an account? <a href="login.php">Sign In</a>
            </div>
        </div>

        <!-- Right Section: Illustration -->
        <div class="illustration-section">
            <!-- Replace this with an actual illustration image -->
            <img src="assets/register.png" alt="Register Illustration">
        </div>
    </div>

</body>

</html>