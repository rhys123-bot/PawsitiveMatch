<?php include('partials/menu.php'); ?>

<div class="main-content" style="padding: 20px;">
    <div class="wrapper">
        <h1 style="font-size: 2em; margin-bottom: 20px; text-align: center; color: #333;">Manage Pet</h1>

        <br /><br />

        <!-- Button to Add Pet -->
        <a href="<?php echo SITEURL; ?>admin/add-pet.php" class="btn-primary" style="margin-bottom: 20px; display: inline-block; background-color: #0044cc; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px; box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);">
            Add Pet
        </a>

        <br /><br /><br />

        <?php 
            if(isset($_SESSION['add'])) { echo $_SESSION['add']; unset($_SESSION['add']); }
            if(isset($_SESSION['delete'])) { echo $_SESSION['delete']; unset($_SESSION['delete']); }
            if(isset($_SESSION['upload'])) { echo $_SESSION['upload']; unset($_SESSION['upload']); }
            if(isset($_SESSION['unauthorize'])) { echo $_SESSION['unauthorize']; unset($_SESSION['unauthorize']); }
            if(isset($_SESSION['update'])) { echo $_SESSION['update']; unset($_SESSION['update']); }
        ?>

        <table class="tbl-full" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <tr style="background-color: #f4f4f4; border-bottom: 2px solid #ccc;">
                <th style="padding: 10px; text-align: left; font-weight: bold;">ID</th>
                <th style="padding: 10px; text-align: left; font-weight: bold;">Title</th>
                <th style="padding: 10px; text-align: left; font-weight: bold;">Name</th>
                <th style="padding: 10px; text-align: left; font-weight: bold;">Image</th>
                <th style="padding: 10px; text-align: left; font-weight: bold;">Featured</th>
                <th style="padding: 10px; text-align: left; font-weight: bold;">Active</th>
                <th style="padding: 10px; text-align: left; font-weight: bold;">Actions</th>
            </tr>

            <?php 
                // SQL query to fetch all pets
                $sql = "SELECT * FROM tbl_pet";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                $sn = 1;

                if($count > 0)
                {
                    // Loop through the pets and display each one
                    while($row = mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $name = $row['name'];
                        $image_name = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                        ?>

                        <tr style="border-bottom: 1px solid #ddd; background-color: #fff;">
                            <td style="padding: 10px;"><?php echo $sn++; ?>. </td>
                            <td style="padding: 10px;"><?php echo $title; ?></td>
                            <td style="padding: 10px;"><?php echo $name; ?></td>
                            <td style="padding: 10px;">
                                <?php  
                                    // Check whether image exists
                                    if($image_name != "")
                                    {
                                        echo "<img src='".SITEURL."images/pet/".$image_name."' width='100px'>";
                                    }
                                    else
                                    {
                                        echo "<div class='error'>Image not Added.</div>";
                                    }
                                ?>
                            </td>
                            <td style="padding: 10px;"><?php echo $featured; ?></td>
                            <td style="padding: 10px;"><?php echo $active; ?></td>
                            <td style="padding: 10px;">
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
                                        <a href="<?php echo SITEURL; ?>admin/update-pet.php?id=<?php echo $id; ?>" class="dropdown-link">Update Pet</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-pet.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="dropdown-link">Delete Pet</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <?php
                    }
                }
                else
                {
                    // No pets found
                    echo "<tr><td colspan='7' class='error'>Pet not Added Yet.</td></tr>";
                }
            ?>
        </table>
    </div>
</div>

<!-- Clear the float and add space at the bottom -->
<div style="clear: both; height: 150px;"></div> 

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
        background-color: #f4f4f4; /* Add hover effect to links */
    }
</style>
