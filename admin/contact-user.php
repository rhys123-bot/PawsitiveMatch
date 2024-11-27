<?php include('partials/menu.php'); ?>
<style>
    footer {
        background: #333;
        color: #fff;
        padding: 10px 0;
        text-align: center;
        margin-top: auto; /* Ensures it stays at the bottom */
    }

    /* Style for the table */
    table.tbl-full {
        width: 100%;
        border-collapse: collapse;
    }
    table.tbl-full th, table.tbl-full td {
        padding: 10px;
        text-align: left;
        font-weight: normal;
    }
    
    /* Styling the dropdown content */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #fff;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        padding: 10px;
        border-radius: 5px;
        z-index: 1000; /* Ensure the dropdown is above other content */
    }

    /* Dropdown button style */
    .dot-btn {
        display: inline-block;
        cursor: pointer;
        padding: 8px;
        border-radius: 50%;
        transition: background-color 0.3s ease;
    }

    /* Hover effect on the dots button */
    .dot-btn:hover {
        background-color: #f4f4f4;
    }

    /* Dropdown link styles */
    .dropdown-link {
        color: #000;
        font-size: 14px;
        display: block;
        margin: 5px 0;
        text-decoration: none;
        padding: 5px 10px;
        border-radius: 4px;
        transition: background-color 0.3s ease;
        white-space: nowrap;
    }

    /* Hover effect for the dropdown links */
    .dropdown-link:hover {
        background-color: #f4f4f4; /* Light grey background on hover */
    }

    /* Adjust table row background colors */
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:nth-child(odd) {
        background-color: #fff;
    }

</style>

<div class="main-content">
    <div class="wrapper">
        <h1>Contact Users</h1>
        <br><br>

        <?php 
            // Handle contact deletion if `id` is passed
            if (isset($_GET['delete_id'])) {
                $delete_id = $_GET['delete_id'];

                // SQL query to delete the contact
                $sql_delete = "DELETE FROM contact_user WHERE id=$delete_id";
                $res_delete = mysqli_query($conn, $sql_delete);

                if ($res_delete === TRUE) {
                    echo "<div class='success'>Contact Deleted Successfully.</div>";
                } else {
                    echo "<div class='error'>Failed to Delete Contact. Please Try Again.</div>";
                }
            }
        ?>

        <!-- Table to display users -->
        <table class="tbl-full">
            <tr style="background-color: #f4f4f4; border-bottom: 2px solid #ccc;">
                <th>ID</th>
                <th>Name</th>
                <th>Contact Number</th>
                <th>Email</th>
                <th>Message</th>
                <th>Actions</th> <!-- Add a column for actions -->
            </tr>

            <?php 
                // SQL query to get all users (contact info only)
                $sql = "SELECT * FROM contact_user";
                $res = mysqli_query($conn, $sql);
                if($res == TRUE) {
                    $count = mysqli_num_rows($res);
                    if($count > 0) {
                        while($row = mysqli_fetch_assoc($res)) {
                            $id = $row['id'];
                            $name = $row['full_name'];
                            $number = $row['phone'];
                            $email = $row['email'];
                            $message = $row['message'];
                            
                            ?>
                            <tr style="border-bottom: 1px solid #ddd; background-color: #fff;">
                                <td><?php echo $id; ?></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $number; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><?php echo $message; ?></td>
                                <td>
                                    <!-- Dropdown for actions -->
                                    <div class="dropdown" style="position: relative;">
                                        <!-- SVG Icon for the 3 vertical dots -->
                                        <a href="javascript:void(0);" class="dot-btn" style="display: inline-block; cursor: pointer;" onclick="toggleDropdown(<?php echo $id; ?>)">
                                            <!-- Inline SVG for the 3 vertical dots -->
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="12" cy="4" r="2" fill="black"/>
                                                <circle cx="12" cy="12" r="2" fill="black"/>
                                                <circle cx="12" cy="20" r="2" fill="black"/>
                                            </svg>
                                        </a>
                                        <!-- Dropdown content, hidden by default -->
                                        <div class="dropdown-content" id="dropdown-<?php echo $id; ?>" style="display: none; position: absolute; background-color: #fff; box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1); padding: 10px; border-radius: 5px;">
                                            <a href="?delete_id=<?php echo $id; ?>" class="dropdown-link" style="color: #000;" onclick="return confirm('Are you sure you want to delete this contact?');">Remove Contact</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='6' class='error'>No Contacts Available.</td></tr>";
                    }
                }
            ?>
        </table>
    </div>
</div>

<!-- Clear the float and add space at the bottom -->
<div style="clear: both; height: 480px;"></div>

<?php include('partials/footer.php'); ?>

<!-- JavaScript for toggling action options -->
<script>
    function toggleDropdown(id) {
        var actionDiv = document.getElementById("dropdown-" + id);
        // Toggle the display property
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
