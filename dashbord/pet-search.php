<?php include('partials-front/menu.php'); ?>

<!-- pet SEARCH Section Starts Here -->
<section class="pet-search text-center">
    <div class="container">
        <?php 
            // Check if the search form is submitted
            if (isset($_POST['submit'])) {
                // Get the Search Keyword, and sanitize it
                $search = mysqli_real_escape_string($conn, $_POST['search']);
            } else {
                // If not set, redirect or show a default message
                echo "<h2>No search term provided.</h2>";
                exit; // or redirect to another page like index.php
            }
        ?>

        <h2>Pets on Your Search: <a href="#" class="text-white">"<?php echo htmlspecialchars($search); ?>"</a></h2>
    </div>
</section>
<!-- pet SEARCH Section Ends Here -->

<!-- pet Menu Section Starts Here -->
<section class="pet-menu">
    <div class="container">
        <h2 class="text-center">Pet Menu</h2>

        <?php 
            // SQL Query to Get pets based on search keyword
            $sql = "SELECT * FROM tbl_pet WHERE title LIKE ? OR description LIKE ?";
            
            // Prepare the SQL query to prevent SQL Injection
            if ($stmt = mysqli_prepare($conn, $sql)) {
                // Bind parameters (the ? placeholders will be replaced with the sanitized search term)
                $search_term = "%" . $search . "%";
                mysqli_stmt_bind_param($stmt, 'ss', $search_term, $search_term);
                
                // Execute the query
                mysqli_stmt_execute($stmt);
                
                // Get result
                $res = mysqli_stmt_get_result($stmt);

                // Count Rows
                $count = mysqli_num_rows($res);

                // Check whether pets are available or not
                if ($count > 0) {
                    // Pets Available
                    while ($row = mysqli_fetch_assoc($res)) {
                        // Get the pet details
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>

                        <div class="pet-menu-box">
                            <div class="pet-menu-img">
                                <?php 
                                    // Check whether image name is available or not
                                    if ($image_name == "") {
                                        // Image not available
                                        echo "<div class='error'>Image not Available.</div>";
                                    } else {
                                        // Image available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/pet/<?php echo $image_name; ?>" alt="Pet Image" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                            </div>

                            <div class="pet-menu-desc">
                                <h4><?php echo htmlspecialchars($title); ?></h4>
                                <p class="pet-price">₹<?php echo htmlspecialchars($price); ?></p>
                                <p class="pet-detail"><?php echo htmlspecialchars($description); ?></p>
                                <br>

                                <a href="<?php echo SITEURL; ?>dashbord/order.php?pet_id=<?php echo $id; ?>" class="btn btn-primary">Adopt Now</a>
                            </div>
                        </div>

                        <?php
                    }
                } else {
                    // No pets found
                    echo "<div class='error'>No pets found matching your search criteria.</div>";
                }

                // Close the prepared statement
                mysqli_stmt_close($stmt);
            } else {
                echo "<div class='error'>Failed to prepare SQL query.</div>";
            }
        ?>

        <div class="clearfix"></div>
    </div>
</section>
<!-- pet Menu Section Ends Here -->

<?php include('partials-front/footer.php'); ?>
