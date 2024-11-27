<?php include('partials-front/menu.php'); ?>

<!-- Custom Styles (CSS) -->
<style>
/* Pet Search Section */
.pet-search {
    background-color: #f0f8ff;
    padding: 30px 0;
}

.search-input {
    padding: 10px;
    width: 60%;
    border-radius: 5px;
    border: 1px solid #ddd;
    font-size: 16px;
    margin-right: 10px;
}

.btn-primary {
    padding: 10px 20px;
    background-color: #28a745;
    border: none;
    color: white;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
}

.btn-primary:hover {
    background-color: #218838;
}

/* Pet Filters Section */
.pet-filters {
    background-color: #e7f7fc;
    padding: 40px 0;
}

.pet-filter-form {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    gap: 20px;
}

.filter-group {
    display: flex;
    flex-direction: column;
    max-width: 250px;
}

.filter-label {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 5px;
}

.filter-input {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
}

/* Pet Menu Section */
.pet-menu {
    padding: 60px 0;
    background-color: #fff;
}

.pet-menu-box {
    display: flex;
    border: 1px solid #ddd;
    margin-bottom: 30px;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.pet-menu-box:hover {
    transform: translateY(-10px);
}

.pet-menu-img img {
    width: 250px;
    height: 250px;
    object-fit: cover;
    border-radius: 8px;
}

.pet-menu-desc {
    padding: 20px;
    flex: 1;
}

.pet-name {
    font-size: 18px;
    font-weight: bold;
    color: #28a745;
}

.pet-age, .pet-breed, .pet-color, .pet-gender {
    font-size: 16px;
    margin: 5px 0;
}

.pet-detail {
    font-size: 14px;
    color: #555;
}

.clearfix::after {
    content: "";
    display: block;
    clear: both;
}
</style>

<!-- Pet Search Section Starts Here -->
<section class="pet-search text-center">
    <div class="container">
        <form action="<?php echo SITEURL; ?>dashbord/pet-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Pet..." required class="search-input">
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>
    </div>
</section>
<!-- Pet Search Section Ends Here -->

<!-- Pet Filters Section Starts Here -->
<section class="pet-filters text-center">
    <div class="container">
        <h2 class="text-center">Find Your New Best Friend</h2>

        <form action="" method="POST" class="pet-filter-form">
            <!-- Breed Filter -->
            <div class="filter-group">
                <label for="breed" class="filter-label">Breed:</label>
                <select name="breed" id="breed" class="filter-input">
                    <option value="">All Breeds</option>
                    <option value="Domestic Shorthair">Domestic Shorthair</option>
                    <option value="Persian">Persian</option>
                    <option value="Siamese">Siamese</option>
                    <option value="Maine Coon">Maine Coon</option>
                    <option value="Ragdoll">Ragdoll</option>
                    <option value="Bengal">Bengal</option>
                    <option value="British Shorthair">British Shorthair</option>
                    <option value="Labrador">Labrador</option>
                    <option value="Bulldog">Bulldog</option>
                    <option value="Beagle">Beagle</option>
                    <option value="Poodle">Poodle</option>
                    <option value="German Shepherd">German Shepherd</option>
                    <option value="Golden Retriever">Golden Retriever</option>
                </select>
            </div>

            <!-- Age Filter -->
            <div class="filter-group">
                <label for="age" class="filter-label">Age:</label>
                <select name="age" id="age" class="filter-input">
                    <option value="">All Ages</option>
                    <option value="Kitten">Kitten</option>
                    <option value="Young">Young Adult</option>
                    <option value="Prime">Prime</option>
                    <option value="Puppy">Puppy</option>
                    <option value="Adult">Adult</option>
                    <option value="Senior">Senior</option>
                </select>
            </div>

            <!-- Color Filter -->
            <div class="filter-group">
                <label for="color" class="filter-label">Color:</label>
                <select name="color" id="color" class="filter-input">
                    <option value="">All Colors</option>
                    <option value="Black">Black</option>
                    <option value="Brown">Brown</option>
                    <option value="White">White</option>
                    <option value="Golden">Golden</option>
                    <option value="Spotted">Spotted</option>
                </select>
            </div>

            <!-- Gender Filter -->
            <div class="filter-group">
                <label for="gender" class="filter-label">Gender:</label>
                <select name="gender" id="gender" class="filter-input">
                    <option value="">Any Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <div class="filter-group">
                <input type="submit" name="filter_submit" value="Apply Filters" class="btn btn-primary">
            </div>
        </form>
    </div>
</section>
<!-- Pet Filters Section Ends Here -->

<!-- Pet Menu Section Starts Here -->
<section class="pet-menu">
    <div class="container">
        <h2 class="text-center">Dogs Available for Adoption</h2>

        <?php 
            // Fetch filter values
            $breed = isset($_POST['breed']) ? $_POST['breed'] : '';
            $age = isset($_POST['age']) ? $_POST['age'] : '';
            $color = isset($_POST['color']) ? $_POST['color'] : '';
            $gender = isset($_POST['gender']) ? $_POST['gender'] : '';

            // Build the SQL query based on selected filters
            $sql = "SELECT id, title, description, name, image_name, breed, age, color, gender FROM tbl_pet WHERE active='Yes'";

            // Append filters to the SQL query if they are selected
            if ($breed != '') {
                $sql .= " AND breed='$breed'";
            }
            if ($age != '') {
                $sql .= " AND age='$age'";
            }
            if ($color != '') {
                $sql .= " AND color='$color'";
            }
            if ($gender != '') {
                $sql .= " AND gender='$gender'";
            }

            // Execute the query
            $res = mysqli_query($conn, $sql);

            // Count Rows
            $count = mysqli_num_rows($res);

            // Check whether pets are available
            if ($count > 0) {
                // Pets Available
                while ($row = mysqli_fetch_assoc($res)) {
                    // Safely handle 'name' key
                    $name = isset($row['name']) ? $row['name'] : 'No name available';

                    // Get other Values
                    $id = $row['id'];
                    $title = $row['title'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    $breed = $row['breed'];
                    $age = $row['age'];
                    $color = $row['color'];
                    $gender = $row['gender'];
                    ?>

                    <div class="pet-menu-box">
                        <div class="pet-menu-img">
                            <?php 
                             
                                if ($image_name == "") {
                                   
                                    echo "<div class='error'>Image not Available.</div>";
                                } else {
                                  
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/pet/<?php echo $image_name; ?>" alt="Pet Image" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                        </div>

                        <div class="pet-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="pet-age">Age: <?php echo $age; ?></p>
                            <p class="pet-name">Name: <?php echo $name; ?></p>
                            <p class="pet-breed">Breed: <?php echo $breed; ?></p>
                            <p class="pet-color">Color: <?php echo $color; ?></p>
                            <p class="pet-gender">Gender: <?php echo $gender; ?></p> 
                            <p class="pet-detail">
                                <?php echo $description; ?>
                            </p>
                            <br>

                            <a href="<?php echo SITEURL; ?>dashbord/order.php?pet_id=<?php echo $id; ?>" class="btn btn-primary">Adopt Now</a>
                        </div>
                    </div>

                    <?php
                }
            } else {
               
                echo "<div class='error'>No pets found matching your criteria.</div>";
            }
        ?>

        <div class="clearfix"></div>
    </div>
</section>
<!-- Pet Menu Section Ends Here -->

<?php include('partials-front/footer.php'); ?>
