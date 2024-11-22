<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="contact.css">
</head>

<body>

    <?php include "./Navbar.php"; ?>

    <div class="contact-container">
        <!-- Left Section: Contact Information -->
        <div class="contact-info">
            <h2>Contact Us</h2>
            <div class="info-item">
                <div class="symbol">
                    <i class='bx bxs-envelope'></i>
                    <span>Email us</span>
                </div>
                <p>eventsphere@gmail.com</p>
            </div>
            <div class="info-item">
                <div class="symbol">
                    <i class='bx bxs-edit-location'></i>
                    <span>Visit us</span>
                </div>
                <p>10th Floor, East Tower, World Trade Center, Colombo 01</p>
            </div>
            <div class="info-item">
                <div class="symbol">
                    <i class='bx bxs-phone-call'></i>
                    <span>Call us</span>
                </div>
                <p>(+94) 71 140 8142</p>
            </div>
            <div class="social-icons">
                <a href="#"><i class='bx bxl-facebook-circle'></i></a>
                <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                <a href="#"><i class='bx bxl-twitter'></i></a>
                <a href="#"><i class='bx bxl-linkedin-square'></i></a>
            </div>
        </div>

        <!-- Right Section: Contact Form -->
        <div class="contact-form">
            <h2>Got ideas? Drop us a line</h2>
            <p>Tell us more about your problem and what you’re working on.</p>

            <form action="submit_form.php" method="POST">
                <label for="name">Your Name</label>
                <input type="text" id="name" name="name" placeholder="John Cena" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="you@company.com" required>

                <label for="project">Message</label>
                <textarea id="message" name="message" placeholder="message..."></textarea>

                <button type="submit">Drop the Message !</button>
            </form>
        </div>
    </div>
</body>

</html>