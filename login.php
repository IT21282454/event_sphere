<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="login.css">
</head>

<body>

    <?php include "./Navbar.php";?>

    <div class="login-container">
        <!-- Left Section: Login Form -->
        <div class="login-section">
            <h1>Hello, Welcome!</h1>
            <p>Hey, welcome to our special place</p>

            <form action="login_handler.php" method="POST">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="stanley@gmail.com" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="••••••••" required>

                <div class="form-options">
                    <div>
                        <input type="checkbox" id="remember-me" name="remember-me">
                        <label for="remember-me">Remember me</label>
                    </div>
                    <a href="#">Forgot Password?</a>
                </div>

                <button type="submit">Sign In</button>
            </form>

            <div class="sign-up">
                Don't have an account? <a href="register.php">Sign Up</a>
            </div>
        </div>

        <!-- Right Section: Illustration -->
        <div class="illustration-section">
            <!-- You can replace this with an actual illustration image -->
            <img src="./assets/login.png" alt="Login Illustration">
        </div>
    </div>
</body>

</html>