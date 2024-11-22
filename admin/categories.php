<?php
include '../config/config.php';

$sql = "SELECT * FROM categories";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="categories.css">
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
    <div class="categories-container">
        <?php include "./Sidebar.php"; ?>

        <div class="categories-wrapper">
            <div class="top-container">
                <h2 class="category-heading">Our Categories</h2>

                <button id="openModal" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition duration-200">Add Category</button>
            </div>

            <!-- table -->
            <div class="overflow-x-auto bg-white shadow-md rounded-lg mt-14">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php
                        $num = 1;

                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-900'>" . $num++ . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-900'>" . htmlspecialchars($row['category_name']) . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-900'>" . htmlspecialchars($row['description']) . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm font-medium flex gap-4'><a href='#' class='text-blue-600 hover:text-blue-900'>Edit</a> <a href='delete_category.php?id=" . $row['id'] . "' class='text-red-600 hover:text-red-900'>Delete</a> </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3' class='px-6 py-4 text-center'>No categories found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Modal -->
            <div id="myModal" class="modal">
                <div class="modal-content bg-white rounded-lg shadow-lg mx-auto mt-20 p-6 max-w-lg transition-all duration-300 ease-in-out">
                    <span id="closeModal" class="close text-gray-500 float-right cursor-pointer"><i class='bx bx-x' style='color:#af0909; font-size:25px;'></i></span>
                    <h2 class="text-lg font-bold mb-4">Add New Category</h2>
                    <form method="post" action="create_category.php" id="categoryForm">
                        <div class="mb-4">
                            <label for="categoryName" class="block text-sm font-medium text-gray-700">Category Name</label>
                            <input type="text" id="categoryName" name="category_name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 p-2" placeholder="Enter category name">
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea id="description" name="description" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 p-2" placeholder="Enter description"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600 transition duration-200">Create</button>
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

    <?php $conn->close(); ?>
</body>

</html>