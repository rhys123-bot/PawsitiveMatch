<?php include('partials/menu.php'); ?>

<!-- Main Content Section Starts -->
<div class="main-content" style="min-height: 80vh; padding: 20px;">
    <div class="wrapper">
        <h1 style="font-size: 2em; margin-bottom: 20px; text-align: center; color: #333;">Manage Admin</h1>

        <br />

        <?php 
            if(isset($_SESSION['add'])) { echo $_SESSION['add']; unset($_SESSION['add']); }
            if(isset($_SESSION['delete'])) { echo $_SESSION['delete']; unset($_SESSION['delete']); }
            if(isset($_SESSION['update'])) { echo $_SESSION['update']; unset($_SESSION['update']); }
            if(isset($_SESSION['user-not-found'])) { echo $_SESSION['user-not-found']; unset($_SESSION['user-not-found']); }
            if(isset($_SESSION['pwd-not-match'])) { echo $_SESSION['pwd-not-match']; unset($_SESSION['pwd-not-match']); }
            if(isset($_SESSION['change-pwd'])) { echo $_SESSION['change-pwd']; unset($_SESSION['change-pwd']); }
        ?>

        <br><br><br>

        <!-- Button to Add Admin -->
        <a href="add-admin.php" class="btn-primary" style="margin-bottom: 20px; display: inline-block; background-color: #0044cc; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px; box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);">
            Add Admin
        </a>

        <br /><br /><br />

        <table class="tbl-full" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <tr style="background-color: #f4f4f4; border-bottom: 2px solid #ccc;">
                <th style="padding: 10px; text-align: left; font-weight: bold;">ID</th>
                <th style="padding: 10px; text-align: left; font-weight: bold;">Full Name</th>
                <th style="padding: 10px; text-align: left; font-weight: bold;">Username</th>
                <th style="padding: 10px; text-align: left; font-weight: bold;">Actions</th>
            </tr>

            <?php 
                $sql = "SELECT * FROM table_admin";
                $res = mysqli_query($conn, $sql);

                if($res==TRUE) {
                    $count = mysqli_num_rows($res);
                    $sn = 1;

                    if($count > 0) {
                        while($rows = mysqli_fetch_assoc($res)) {
                            $id = $rows['id'];
                            $full_name = $rows['full_name'];
                            $username = $rows['username'];
                            ?>

                            <tr style="border-bottom: 1px solid #ddd; background-color: #fff;">
                                <td style="padding: 10px;"><?php echo $sn++; ?>. </td>
                                <td style="padding: 10px;"><?php echo $full_name; ?></td>
                                <td style="padding: 10px;"><?php echo $username; ?></td>
                                <td style="padding: 10px;">
                                    <!-- Dropdown for actions -->
                                    <div class="dropdown" style="position: relative;">
                                        <a href="javascript:void(0);" class="dot-btn" style="display: inline-block; cursor: pointer;" onclick="toggleDropdown(<?php echo $id; ?>)">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="12" cy="4" r="2" fill="black"/>
                                                <circle cx="12" cy="12" r="2" fill="black"/>
                                                <circle cx="12" cy="20" r="2" fill="black"/>
                                            </svg>
                                        </a>
                                        <div class="dropdown-content" id="dropdown-<?php echo $id; ?>" style="display: none; position: absolute; background-color: #fff; box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1); padding: 10px; border-radius: 5px;">
                                            <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" style="color: #000; font-size: 14px; display: block; margin: 5px 0; text-decoration: none;">Change Password</a>
                                            <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" style="color: #000; font-size: 14px; display: block; margin: 5px 0; text-decoration: none;">Update Admin</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" style="color: #000; font-size: 14px; display: block; margin: 5px 0; text-decoration: none;">Delete Admin</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <?php
                        }
                    }
                }
            ?>
        </table>
    </div>
</div>
<!-- Main Content Section Ends -->

<div style="clear: both; height: 50px;"></div>
<?php include('partials/footer.php'); ?>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<!-- JavaScript for toggling action options -->
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
