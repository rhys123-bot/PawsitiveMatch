<?php include('partials/menu.php'); ?>

<div class="main-content" style="padding: 20px;">
    <div class="wrapper">
        <h1 style="font-size: 2em; margin-bottom: 20px; text-align: center; color: #333;">Manage Category</h1>

        <br /><br />
        <?php 
            if(isset($_SESSION['add'])) { echo $_SESSION['add']; unset($_SESSION['add']); }
            if(isset($_SESSION['remove'])) { echo $_SESSION['remove']; unset($_SESSION['remove']); }
            if(isset($_SESSION['delete'])) { echo $_SESSION['delete']; unset($_SESSION['delete']); }
            if(isset($_SESSION['no-category-found'])) { echo $_SESSION['no-category-found']; unset($_SESSION['no-category-found']); }
            if(isset($_SESSION['update'])) { echo $_SESSION['update']; unset($_SESSION['update']); }
            if(isset($_SESSION['upload'])) { echo $_SESSION['upload']; unset($_SESSION['upload']); }
            if(isset($_SESSION['failed-remove'])) { echo $_SESSION['failed-remove']; unset($_SESSION['failed-remove']); }
        ?>
        <br><br>

        <!-- Button to Add Category -->
        <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary" style="margin-bottom: 20px; display: inline-block; background-color: #0044cc; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px; box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);">
            Add Category
        </a>

        <br /><br /><br />

        <table class="tbl-full" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <tr style="background-color: #f4f4f4; border-bottom: 2px solid #ccc;">
                <th style="padding: 10px; text-align: left; font-weight: bold;">ID</th>
                <th style="padding: 10px; text-align: left; font-weight: bold;">Title</th>
                <th style="padding: 10px; text-align: left; font-weight: bold;">Image</th>
                <th style="padding: 10px; text-align: left; font-weight: bold;">Featured</th>
                <th style="padding: 10px; text-align: left; font-weight: bold;">Active</th>
                <th style="padding: 10px; text-align: left; font-weight: bold;">Actions</th>
            </tr>

            <?php 
                // Query to Get all Categories from Database
                $sql = "SELECT * FROM tbl_category";

                // Execute Query
                $res = mysqli_query($conn, $sql);

                // Count Rows
                $count = mysqli_num_rows($res);

                // Create Serial Number Variable and assign value as 1
                $sn=1;

                // Check whether we have data in the database or not
                if($count > 0) {
                    // We have data in the database
                    while($row=mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];
            ?>

            <tr style="border-bottom: 1px solid #ddd; background-color: #fff;">
                <td style="padding: 10px;"><?php echo $sn++; ?>. </td>
                <td style="padding: 10px;"><?php echo $title; ?></td>

                <td style="padding: 10px;">
                    <?php  
                        // Check whether image name is available or not
                        if($image_name != "") {
                            // Display the Image
                            ?>
                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px" />
                            <?php
                        } else {
                            // Display the Message
                            echo "<div class='error'>Image not Added.</div>";
                        }
                    ?>
                </td>

                <td style="padding: 10px;"><?php echo $featured; ?></td>
                <td style="padding: 10px;"><?php echo $active; ?></td>
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
                        <!-- Dropdown content, hidden by default -->
                        <div class="dropdown-content" id="dropdown-<?php echo $id; ?>" style="display: none; position: absolute; background-color: #fff; box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1); padding: 10px; border-radius: 5px;">
                            <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="dropdown-link">Update Category</a>
                            <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="dropdown-link">Delete Category</a>
                        </div>
                    </div>
                </td>
            </tr>

            <?php
                    }
                } else {
                    // No data available
                    ?>
                    <tr>
                        <td colspan="6"><div class="error">No Category Added.</div></td>
                    </tr>
                    <?php
                }
            ?>
        </table>
    </div>
</div>

<div style="clear: both; height: 150px;"></div> <!-- Clear float and give some space -->
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
        background-color: #f4f4f4;
    }
</style>

