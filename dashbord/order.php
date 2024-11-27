<?php include('partials-front/menu.php'); ?>
<style>
    /* General Styles */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    width: 90%;
    margin: 0 auto;
    max-width: 1200px;
}

/* Pet Detail Section */
.pet-details {
    padding: 50px 0;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.pet-title {
    font-size: 36px;
    font-weight: bold;
    color: #333;
    margin-bottom: 20px;
}

.pet-img {
    margin-bottom: 30px;
}

.pet-img img {
    max-width: 100%;
    border-radius: 10px;
    border: 2px solid #ddd;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.pet-info {
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.pet-breed,
.pet-age,
.pet-gender,
.pet-color {
    font-size: 18px;
    margin: 10px 0;
    color: #555;
}

.pet-description {
    margin-top: 20px;
}

.pet-description h4 {
    font-size: 24px;
    color: #333;
    margin-bottom: 10px;
}

.pet-description p {
    font-size: 16px;
    color: #666;
    line-height: 1.6;
}

.adopt-form {
    margin-top: 30px;
}

.adopt-form h3 {
    font-size: 28px;
    font-weight: bold;
    color: #333;
    margin-bottom: 20px;
}

.form-section {
    margin-bottom: 20px;
}

.form-section label {
    font-size: 18px;
    color: #333;
}

.form-section input,
.form-section textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 16px;
    color: #333;
}

.form-section textarea {
    resize: vertical;
}

.btn-primary {
    background-color: #4CAF50; /* Green color */
    color: #fff;
    border: none;
    padding: 12px 20px;
    font-size: 18px;
    cursor: pointer;
    border-radius: 6px;
    text-align: center;
}

.btn-primary:hover {
    background-color: #45a049;
}

.btn-secondary {
    background-color: #ff6f61;
    color: #fff;
    border: none;
    padding: 12px 20px;
    font-size: 18px;
    cursor: pointer;
    border-radius: 6px;
    text-align: center;
}

.btn-secondary:hover {
    background-color: #ff4a39;
}

/* Adoption Note Section */
.adoption-note {
    background-color: #f1f1f1;
    padding: 30px;
    margin-top: 40px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.adoption-note .note {
    font-size: 18px;
    color: #333;
    text-align: center;
}

.adoption-note .note strong {
    font-weight: bold;
    color: #4CAF50; /* Green for emphasis */
}

/* Responsive Design */
@media (max-width: 768px) {
    .pet-info {
        padding: 15px;
    }

    .pet-title {
        font-size: 28px;
    }

    .pet-img {
        text-align: center;
    }

    .adopt-form input,
    .adopt-form textarea {
        font-size: 14px;
    }

    .btn-primary {
        font-size: 16px;
    }
}

@media (max-width: 576px) {
    .container {
        width: 100%;
    }

    .pet-title {
        font-size: 24px;
    }

    .pet-description p {
        font-size: 14px;
    }

    .btn-primary {
        font-size: 16px;
        padding: 10px 15px;
    }
}
.pet-gallery {
    display: flex;
    gap: 20px;
    margin-top: 30px;
}

.pet-gallery img {
    max-width: 100%;
    border-radius: 10px;
    border: 2px solid #ddd;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 32%;
    height: auto;
}

</style>
<?php 
    // Check whether pet id is set or not
    if(isset($_GET['pet_id'])) {
        // Get the pet id and details of the selected pet
        $pet_id = $_GET['pet_id'];

        // Get the details of the selected pet
        $sql = "SELECT * FROM tbl_pet WHERE id=$pet_id";
        // Execute the Query
        $res = mysqli_query($conn, $sql);
        // Count the rows
        $count = mysqli_num_rows($res);
        // Check whether the data is available or not
        if($count == 1) {
            // We have data
            $row = mysqli_fetch_assoc($res);

            $name = $row['name'];
            $breed = $row['breed'];
            $age = $row['age'];
            $gender = $row['gender']; // Added gender field
            $color = $row['color'];   // Added color field
            $description = $row['description'];  // Add description information
            $image_name = $row['image_name'];    // Main pet image
            $extra_images = explode(',', $row['extra_images']);  // Extra images stored as a comma-separated list in the database
        } else {
            // Pet not available
            header('location:'.SITEURL);
        }
    } else {
        // Redirect to homepage
        header('location:'.SITEURL);
    }
    
?>

<!-- Pet Details Section -->
<section class="pet-details">
    <div class="container">
        <div class="row">
            <!-- Pet Image Section -->
            <div class="col-md-6 pet-img">
                <?php 
                    if($image_name == "") {
                        echo "<div class='error'>Image not Available.</div>";
                    } else {
                        ?>
                        <img src="<?php echo SITEURL; ?>images/pet/<?php echo $image_name; ?>" alt="<?php echo $name; ?>" class="img-responsive img-curve">
                        <?php
                    }
                ?>
            </div>

            <!-- Pet Information Section -->
            <div class="col-md-6 pet-info">
                <h2 class="text-center pet-title"><?php echo $name; ?></h2>
                <p class="pet-breed">Breed: <?php echo $breed; ?></p>
                <p class="pet-age">Age: <?php echo $age; ?> years</p>
                <p class="pet-gender">Gender: <?php echo $gender; ?></p> <!-- Added Gender -->
                <p class="pet-color">Color: <?php echo $color; ?></p> <!-- Added Color -->

                <!-- Pet Description -->
                <div class="pet-description">
                    <h4 class="text-center">Hello, I'm <?php echo $name; ?>!</h4>
                    <p><?php echo nl2br($description); ?></p>
                </div>

                <!-- Adoption Form -->
                <div class="adopt-form">
                    <h3>Proceed with Adoption</h3>
                    <form action="" method="POST" class="adopt-form">
                        <!-- Form Fields -->
                        <div class="form-section">
                            <label for="full-name">Your Full Name</label>
                            <input type="text" name="full-name" id="full-name" class="input-responsive" placeholder="E.g. John Doe" required>
                        </div>
                        <div class="form-section">
                            <label for="email">Your Email</label>
                            <input type="email" name="email" id="email" class="input-responsive" placeholder="E.g. john.doe@example.com" required>
                        </div>
                        <div class="form-section">
                            <label for="phone">Your Phone Number</label>
                            <input type="tel" name="phone" id="phone" class="input-responsive" placeholder="E.g. 123-456-7890" required>
                        </div>
                        <div class="form-section">
                            <label for="address">Your Address</label>
                            <textarea name="address" id="address" rows="5" class="input-responsive" placeholder="E.g. 123 Main St, City, Country" required></textarea>
                        </div>
                        <div class="form-section">
                            <label for="adopt-reason">Why do you want to adopt <?php echo $name; ?>?</label>
                            <textarea name="adopt-reason" id="adopt-reason" rows="5" class="input-responsive" placeholder="Let us know why you'd be a great match!" required></textarea>
                        </div>
                        <div class="form-section">
                            <input type="submit" name="submit" value="Proceed with Adoption" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Pet Gallery Section -->
        <div class="pet-gallery">
            <?php 
                // Loop through extra images and display them
                if (!empty($extra_images)) {
                    foreach ($extra_images as $extra_image) {
                        echo "<img src='" . SITEURL . "images/pet/{$extra_image}' alt='Additional Image' />";
                    }
                } else {
                    echo "<div class='error'>No additional images available.</div>";
                }
            ?>
        </div>
    </div>
</section>

<!-- Adoption Note Section -->
<section class="adoption-note">
    <div class="container">
        <div class="note">
            <p><strong>Note:</strong> By adopting, you are providing a loving and caring home to <?php echo $name; ?>. Please ensure that you can offer them the best care. Thank you for considering adoption!</p>
        </div>
    </div>
</section>

<?php include('partials-front/footer.php'); ?>