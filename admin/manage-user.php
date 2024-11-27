<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1 style="font-size: 2em; margin-bottom: 20px; text-align: center; color: #333;">Manage Users</h1>

        <br /><br />

        <!-- Button to Add User -->
        <a href="registeruser.php" class="btn-primary" style="margin-bottom: 20px; display: inline-block; background-color: #0044cc; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px; box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);">
            Add User
        </a>

        <?php 
            // Display session message if set
            if(isset($_SESSION['update'])) {
                echo "<div style='padding: 10px; background-color: #d4edda; color: #155724; margin-bottom: 20px; border-radius: 5px;'>".$_SESSION['update']."</div>";
                unset($_SESSION['update']);
            }
        ?>

        <!-- Table to Display Users -->
        <table class="tbl-full" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <tr style="background-color: #f4f4f4; border-bottom: 2px solid #ccc;">
                <th style="padding: 10px; text-align: left; font-weight: bold;">ID</th>
                <th style="padding: 10px; text-align: left; font-weight: bold;">Name</th>
                <th style="padding: 10px; text-align: left; font-weight: bold;">Contact Number</th>
                <th style="padding: 10px; text-align: left; font-weight: bold;">Email</th>
                <th style="padding: 10px; text-align: left; font-weight: bold;">Address</th>
                <th style="padding: 10px; text-align: left; font-weight: bold;">Actions</th>
            </tr>

            <?php 
                $sql = "SELECT * FROM users";
                $res = mysqli_query($conn, $sql);
                if($res == TRUE) {
                    $count = mysqli_num_rows($res);
                    if($count > 0) {
                        while($row = mysqli_fetch_assoc($res)) {
                            $id = $row['id'];
                            $fname = $row['first_name'];
                            $lname = $row['last_name'];
                            $number = $row['contact_number'];
                            $email = $row['email'];
                            $address = $row['address'];
                            $name = $fname . " " . $lname;
                            ?>
                            <tr style="border-bottom: 1px solid #ddd; background-color: #fff;">
                                <td style="padding: 10px;"><?php echo $id; ?></td>
                                <td style="padding: 10px;"><?php echo $name; ?></td>
                                <td style="padding: 10px;"><?php echo $number; ?></td>
                                <td style="padding: 10px;"><?php echo $email; ?></td>
                                <td style="padding: 10px;"><?php echo $address; ?></td>
                                <td style="padding: 10px;">
                                    <div class="dropdown" style="position: relative;">
                                        <a href="javascript:void(0);" class="dot-btn" style="display: inline-block; cursor: pointer;" onclick="toggleDropdown(<?php echo $id; ?>)">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="12" cy="4" r="2" fill="black"/>
                                                <circle cx="12" cy="12" r="2" fill="black"/>
                                                <circle cx="12" cy="20" r="2" fill="black"/>
                                            </svg>
                                        </a>
                                        <div class="dropdown-content" id="dropdown-<?php echo $id; ?>" style="display: none; position: absolute; background-color: #fff; box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1); padding: 10px; border-radius: 5px;">
                                            <a href="update-user.php?id=<?php echo $id; ?>" class="dropdown-link">Update User</a>
                                            <a href="delete-user.php?id=<?php echo $id; ?>" class="dropdown-link">Delete User</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='6' class='error'>No Users Added Yet.</td></tr>";
                    }
                }
            ?>
        </table>
    </div>
</div>
<!-- Clear the float and add space at the bottom -->
<div style="clear: both; height: 60px;"></div>

<?php include('partials/footer.php'); ?>

<script>
    function toggleDropdown(id) {
        var actionDiv = document.getElementById("dropdown-" + id);
        if (actionDiv.style.display === "none" || actionDiv.style.display === "") {
            actionDiv.style.display = "block";
        } else {
            actionDiv.style.display = "none";
        }
    }

    // Close dropdown if clicked outside
    document.addEventListener("click", function(event) {
        var dropdowns = document.querySelectorAll('.dropdown-content');
        dropdowns.forEach(function(dropdown) {
            var dropdownButton = dropdown.previousElementSibling; // The button that toggles the menu
            // If the click is outside of the dropdown or the button, close the menu
            if (!dropdown.contains(event.target) && !dropdownButton.contains(event.target)) {
                dropdown.style.display = "none";
            }
        });
    });
</script>

<style>
    /* Dropdown content style */
    .dropdown-content {
        display: none; 
        position: absolute;
        background-color: #fff;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        padding: 10px;
        border-radius: 5px;
        z-index: 1000; /* Ensure the dropdown is above other content */
    }

    /* Dropdown link styles */
    .dropdown-link {
        color: #000; /* Black color for the text */
        font-size: 14px;
        display: block;
        margin: 5px 0;
        text-decoration: none;
        padding: 5px 10px;
        border-radius: 4px;
        transition: background-color 0.3s ease;
        white-space: nowrap; /* Prevents line breaks */
    }

    /* Hover effect on the dropdown links */
    .dropdown-link:hover {
        background-color: #f4f4f4; /* Light grey background on hover */
    }

    /* Hover effect on the dots button */
    .dot-btn:hover {
        background-color: #e0e0e0; /* Change background on hover */
        border-radius: 50%; /* Optional: Adds a circular hover effect */
    }

    /* Move the toggle to the right */
    .dot-btn {
        margin-left: 10px; /* Adjust this value to move the button more to the right */
    }

    /* Move the dropdown content (links) to the right */
    .dropdown-content {
        margin-left: 10px; /* Move the dropdown content to the right */
        z-index: 1000; /* Ensure the dropdown menu appears above other elements */
    }

    /* Hover effect on the dropdown content */
    .dropdown-content a:hover {
        background-color: #f4f4f4; /* Light background when hovering over the menu items */
    }
</style>
