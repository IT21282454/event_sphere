<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom animations */
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body class="bg-gray-100">
    <?php include "./Navbar.php"; ?>

    <section class="bg-green-600 text-white py-20 flex items-center justify-center relative overflow-hidden">
        <div class="container mx-auto text-center fade-in">
            <h2 class="text-4xl font-bold mb-4">Plan Your Perfect Event</h2>
            <p class="mb-8">Join us to create unforgettable experiences.</p>
            <a href="#" class="bg-white text-green-600 px-6 py-2 rounded-full shadow-lg hover:bg-gray-200 transition duration-300">Get Started</a>
        </div>
    </section>
    <section class="py-20">
        <div class="container mx-auto text-center mb-12 fade-in">
            <h3 class="text-3xl font-bold mb-6">Featured Events</h3>
            <p>Explore our upcoming events and join us!</p>
        </div>

        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 px-4">
            <!-- Event Card 1 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                <img src="https://via.placeholder.com/400x200" alt="Event 1" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h4 class="font-bold text-xl mb-2">Event Title 1</h4>
                    <p>A brief description of the event goes here.</p>
                    <a href="#" class="text-blue-600 underline mt-2 inline-block">Learn More</a>
                </div>
            </div>

            <!-- Event Card 2 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                <img src="https://via.placeholder.com/400x200" alt="Event 2" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h4 class="font-bold text-xl mb-2">Event Title 2</h4>
                    <p>A brief description of the event goes here.</p>
                    <a href="#" class="text-blue-600 underline mt-2 inline-block">Learn More</a>
                </div>
            </div>

            <!-- Event Card 3 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                <img src="https://via.placeholder.com/400x200" alt="Event 3" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h4 class="font-bold text-xl mb-2">Event Title 3</h4>
                    <p>A brief description of the event goes here.</p>
                    <a href="#" class="text-blue-600 underline mt-2 inline-block">Learn More</a>
                </div>
            </div>
        </div>
    </section>

    <script src="//unpkg.com/alpinejs" defer></script>

</body>

</html>