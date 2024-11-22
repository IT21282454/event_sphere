<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="events.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 50;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            transform: translateY(-30px);
            opacity: 0;
        }

        .modal-open .modal-content {
            transform: translateY(0);
            opacity: 1;
        }
    </style>
</head>

<body>
    <div class="events-container">
        <?php include "./Sidebar.php"; ?>

        <div class="events-wrapper">
            <div class="top-container">
                <h2 class="event-heading">Our Events</h2>

                <button id="openModal" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition duration-200">Add Event</button>
            </div>

            <!-- table -->
            <div class="overflow-x-auto bg-white shadow-md rounded-lg mt-14">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Event Title</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tickets</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php
                        $num = 1;

                        // Assuming you have a query to fetch event data
                        $sql = "SELECT * FROM events"; // Adjust this query as needed
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-900'>" . $num++ . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-900'>" . htmlspecialchars($row['event_title']) . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-900'>" . htmlspecialchars($row['event_description']) . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-900'>" . htmlspecialchars($row['event_category']) . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-900'>" . htmlspecialchars($row['location']) . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-900'>" . htmlspecialchars($row['event_date']) . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-900'>" . htmlspecialchars($row['event_time']) . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-900'>" . htmlspecialchars($row['num_tickets']) . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-900'>$" . number_format($row['ticket_price'], 2) . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap'><img src='uploads/" . htmlspecialchars($row['event_image']) . "' alt='" . htmlspecialchars($row['event_title']) . "' class='w-[50px] h-[50px] object-cover'></td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap flex gap-x-2'>";
                                echo "<a href='edit_event.php?id=" . $row['id'] . "' class='text-blue-600 hover:text-blue-900'>Edit</a> | ";
                                echo "<a href='delete_event.php?id=" . $row['id'] . "' class='text-red-600 hover:text-red-900'>Delete</a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='11' class='px-6 py-4 text-center'>No events found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Modal -->
            <div id="myModal" class="modal">
                <div class="modal-content bg-white rounded-lg shadow-lg mx-auto mt-20 p-6 max-w-2xl transition-all duration-300 ease-in-out">
                    <span id="closeModal" class="close text-gray-500 float-right cursor-pointer"><i class='bx bx-x' style='color:#af0909; font-size:25px;'></i></span>
                    <h2 class="text-lg font-bold mb-4">Add New Event</h2>
                    <form method="post" action="create_event.php" id="eventForm" enctype="multipart/form-data">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="eventTitle" class="block text-sm font-medium text-gray-700">Event Title</label>
                                <input type="text" id="eventTitle" name="event_title" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 p-2" placeholder="Enter event title">
                            </div>
                            <div class="mb-4">
                                <label for="eventDescription" class="block text-sm font-medium text-gray-700">Event Description</label>
                                <textarea id="eventDescription" name="event_description" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 p-2" placeholder="Enter event description"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="eventCategory" class="block text-sm font-medium text-gray-700">Event Category</label>
                                <select id="eventCategory" name="event_category" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 p-2">
                                    <option value="">Select a category</option>
                                    <!-- Populate categories dynamically from database if needed -->
                                    <?php
                                    // Example categories, replace with dynamic options if needed
                                    echo '<option value="Music">Music</option>';
                                    echo '<option value="Art">Art</option>';
                                    echo '<option value="Technology">Technology</option>';
                                    ?>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                                <input type="text" id="location" name="location" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 p-2" placeholder="Enter location">
                            </div>
                            <div class="mb-4">
                                <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                                <input type="date" id="date" name="date" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 p-2">
                            </div>
                            <div class="mb-4">
                                <label for="time" class="block text-sm font-medium text-gray-700">Time</label>
                                <input type="time" id="time" name="time" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 p-2">
                            </div>
                            <div class="mb-4">
                                <label for="tickets" class="block text-sm font-medium text-gray-700">No. of Tickets</label>
                                <input type="number" id="tickets" name="num_tickets" required min="1" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 p-2">
                            </div>
                            <div class="mb-4">
                                <label for="ticketPrice" class="block text-sm font-medium text-gray-700">Ticket Price</label>
                                <input type="number" id="ticketPrice" name="ticket_price" required min=".01" step=".01" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 p-2">
                            </div>
                            <div class='mb-4 col-span-full'>
                                <label for='eventImage' class='block text-sm font-medium text-gray-700'>Event Image</label>
                                <input type='file' id='eventImage' name='event_image' accept='image/*' required class='mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 p-2'>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type='submit' class='w-full bg-green-500 text-white py-2 rounded hover:bg-green-600 transition duration=200'>Create Event</button>
                    </form>
                </div>
            </div>
        </div>

        <script>
            // Get modal element
            const modal = document.getElementById("myModal");
            // Get open modal button
            const openModalBtn = document.getElementById("openModal");
            // Get close button
            const closeModalBtn = document.getElementById("closeModal");

            // Listen for open click
            openModalBtn.addEventListener("click", () => {
                modal.style.display = "block";
                setTimeout(() => {
                    modal.classList.add('modal-open');
                }, 10); // Delay to allow CSS transition to take effect
            });

            // Listen for close click
            closeModalBtn.addEventListener("click", () => {
                modal.classList.remove('modal-open');
                setTimeout(() => {
                    modal.style.display = "none";
                }, 300)
            });

            // Close modal when clicking outside of it
            window.addEventListener("click", (event) => {
                if (event.target === modal) {
                    closeModal();
                }
            });

            function closeModal() {
                modal.classList.remove('modal-open');
                setTimeout(() => {
                    modal.style.display = "none";
                }, 300);
            }
        </script>
    </div>
</body>

</html>