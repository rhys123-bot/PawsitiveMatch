<?php 
    include('../config/db_connection.php'); 
    include('login-check.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Boxicons CSS for Icons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <!-- Custom CSS File for Styling -->
    <link rel="stylesheet" href="../css/admin.css" />
    <!-- Import Google Font - Poppins -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet" />
    <title>PawsitiveMatch - Dashboard</title>
</head>

<body>

    <!-- Navbar -->
    <header>
        <nav class="navbar">
            <div class="logo_item">
                <!-- Sidebar Toggle Button -->
                <i class="bx bx-menu" id="sidebarToggle"></i>
                <img src="../images/logo.png" alt="Logo" />
                <span>PawsitiveMatch</span>
            </div>

            <div class="search_bar">
                <input type="text" placeholder="Search" />
            </div>

            <div class="navbar_content">
                <i class="bx bx-grid-alt"></i>
                <i class="bx bx-sun" id="darkLight"></i>
                <i class="bx bx-bell"></i>

                <!-- Profile Icon that triggers dropdown -->
                <div class="profile-dropdown">
                    <img src="../images/logo.png" alt="Profile" class="profile" id="profileImg" />
                    <div class="dropdown-content">
                        <a href="#">Profile</a>
                        <a href="#">Settings</a>
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="menu_content">
            <ul class="menu_items">
                <div class="menu_title menu_dashboard"></div>
                <li class="item">
                    <a href="index.php" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-home-alt"></i>
                        </span>
                        <span class="navlink">Home</span>
                    </a>
                </li>
                <li class="item">
                    <a href="manage-admin.php" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-user-circle"></i>
                        </span>
                        <span class="navlink">Admin</span>
                    </a>
                </li>
                <li class="item">
                    <a href="manage-user.php" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-user"></i> <!-- User Icon -->
                        </span>
                        <span class="navlink">Users</span>
                    </a>
                </li>
                <li class="item">
                    <a href="manage-category.php" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-list-ul"></i>
                        </span>
                        <span class="navlink">Category</span>
                    </a>
                </li>
                <li class="item">
                    <a href="manage-pet.php" class="nav_link">
                        <span class="navlink_icon">
                            <i class="fa fa-paw"></i> <!-- Pet Icon -->
                        </span>
                        <span class="navlink">Pets</span>
                    </a>
                </li>
               
                <li class="item">
                    <a href="contact-user.php" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-envelope"></i>
                        </span>
                        <span class="navlink">Contact Us</span>
                    </a>
                </li>
                <li class="item">
                    <a href="donators.php" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-heart"></i>
                        </span>
                        <span class="navlink">Donators</span>
                    </a>
                </li>
                <li class="item">
                    <a href="manage-order.php" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-cart"></i>
                        </span>
                        <span class="navlink">Orders</span>
                    </a>
                </li>
                <li class="item">
                    <a href="logout.php" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-log-out"></i>
                        </span>
                        <span class="navlink">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <!-- Content Area -->
    <main class="content">
        <h1>Welcome to the Dashboard</h1>
    </main>

    <!-- JavaScript to toggle the sidebar visibility -->
    <script>
        // Sidebar toggle for collapsing/expanding
        document.getElementById("sidebarToggle").addEventListener("click", function () {
            document.getElementById("sidebar").classList.toggle("close");
        });

        // Profile dropdown toggle
        document.getElementById("profileImg").addEventListener("click", function () {
            const dropdown = document.querySelector(".profile-dropdown .dropdown-content");
            dropdown.classList.toggle("show");
        });

        // Close dropdown if clicked outside
        window.addEventListener("click", function (event) {
            if (!event.target.matches('#profileImg')) {
                const dropdowns = document.querySelectorAll(".dropdown-content");
                dropdowns.forEach(function (dropdown) {
                    if (dropdown.classList.contains("show")) {
                        dropdown.classList.remove("show");
                    }
                });
            }
        });
    </script>

    <!-- Dark/Light mode toggle functionality -->
    <script>
        // Dark/Light mode toggle
        document.getElementById("darkLight").addEventListener("click", function () {
            // Toggle dark mode class
            document.body.classList.toggle("dark-mode");

            // Change icon to reflect the mode (sun/moon)
            if (document.body.classList.contains("dark-mode")) {
                document.getElementById("darkLight").classList.remove("bx-sun");
                document.getElementById("darkLight").classList.add("bx-moon");
            } else {
                document.getElementById("darkLight").classList.remove("bx-moon");
                document.getElementById("darkLight").classList.add("bx-sun");
            }
        });

        // On page load, check if dark mode was enabled previously
        window.addEventListener('load', function () {
            if (localStorage.getItem('darkMode') === 'enabled') {
                document.body.classList.add('dark-mode');
                document.getElementById("darkLight").classList.remove("bx-sun");
                document.getElementById("darkLight").classList.add("bx-moon");
            }
        });

        // Save dark mode preference to localStorage
        document.getElementById("darkLight").addEventListener("click", function () {
            if (document.body.classList.contains("dark-mode")) {
                localStorage.setItem('darkMode', 'enabled');
            } else {
                localStorage.removeItem('darkMode');
            }
        });
    </script>

</body>

</html>
