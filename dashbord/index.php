<?php include('partials-front/menu.php'); ?>

<!-- Add Bootstrap and Google Fonts for styling -->
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
    /* Custom styles for the page */
    body {
        background-color: #f5f5f5;
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
    }

    /* Section styles */
    .section-header {
        font-size: 2.4rem;
        font-weight: 700;
        text-align: center;
        color: #333;
        margin-bottom: 15px;
    }

    .section-subheader {
        font-size: 1.2rem;
        color: #555;
        text-align: center;
        margin-bottom: 30px;
    }

    /* Pet Search Section */
    .pet-search {
        background-color: #e7f5ff;
        padding: 50px 20px;
        border-radius: 8px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        margin-bottom: 40px;
    }

    .pet-search input[type="search"] {
        max-width: 500px;
        border-radius: 25px;
        padding: 12px;
        font-size: 16px;
    }

    .pet-search input[type="submit"] {
        padding: 12px 25px;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 25px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .pet-search input[type="submit"]:hover {
        background-color: #1C86EE;
    }

    /* Featured Pet Categories Section */
    .categories {
        background-color: #fff;
        padding: 60px 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        margin-bottom: 40px;
    }

    .card {
        border-radius: 10px;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background-color: #fff;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
    }

    .card-img-top {
        height: 200px;
        object-fit: cover;
        border-radius: 10px;
    }

    .card-body {
        text-align: center;
    }

    .card-title {
        font-size: 1.6rem;
        font-weight: 600;
        color: green;
    }

    /* Featured Pets Section */
    .pet-menu {
        background-color: #f9f9f9;
        padding: 60px 20px;
    }

    .pet-menu h2 {
        font-size: 2.4rem;
        font-weight: 600;
        color: #333;
        text-align: center;
        margin-bottom: 30px;
    }

    .btn-primary {
        background-color: #28a745;
        border-radius: 25px;
        padding: 12px 30px;
        border: none;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #218838;
    }

    /* Owner Contact Section */
    .owner-contact {
        background-color: #f0f8ff;
        padding: 40px 20px;
        text-align: center;
        border-radius: 8px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        margin-bottom: 40px;
    }

    .owner-contact h3 {
        font-size: 2rem;
        font-weight: 700;
        color: ##28a745;
    }

    .owner-contact p {
        font-size: 1.2rem;
        color: #555;
        margin: 20px 0;
    }

    .owner-contact .btn-contact {
        background-color: #28a745;
        color: white;
        padding: 12px 30px;
        border-radius: 25px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .owner-contact .btn-contact:hover {
        background-color: #28a745;
    }

    /* Footer Section */
    footer {
        background-color: #333;
        color: white;
        padding: 20px 0;
        text-align: center;
    }

    footer p {
        font-size: 14px;
        margin-bottom: 0;
    }

    /* Section Containers */
    .container {
        width: 100%;
        max-width: 1140px;
        margin: 0 auto;
        padding: 0 15px;
    }

    /* Animations */
    .fade-in {
        animation: fadeIn 1.5s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    .pet-name {
    color: green;
}


    /* Align the email and styles for the Contact Us section */
    .owner-contact .email {
        font-size: 1.4rem;
        font-weight: 600;
        color: #333;
        margin-top: 20px;
    }
    .pet-menu .card-title {
    color: green !important;
}
  </style>
</head>

<!-- Pet SEARCH Section -->
<section class="pet-search fade-in">
    <div class="container">
        <h2 class="section-header text-white">Find Your New Best Friend</h2>
        <p class="section-subheader text-white">Browse pets from our network of over 14,500 shelters and rescues.</p>
        <form action="<?php echo SITEURL."dashbord/"; ?>pet-search.php" method="POST" class="d-flex justify-content-center">
            <input type="search" name="search" placeholder="Search for Pet..." required class="form-control me-2">
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>
    </div>
</section>

<!-- Featured Pet Categories Section -->
<section class="categories fade-in">
    <div class="container">
        <h2 class="section-header">Featured Pet Categories</h2>
        <div class="row">
            <?php 
                $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count > 0) {
                    while($row = mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
            ?>
            <div class="col-md-4 mb-4">
                <a href="<?php echo SITEURL; ?>dashbord/category-pets.php?category_id=<?php echo $id; ?>" class="text-decoration-none">
                    <div class="card">
                        <?php 
                            if($image_name == "") {
                                echo "<div class='error'>Image not Available</div>";
                            } else {
                        ?>
                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" class="card-img-top img-fluid" alt="<?php echo $title; ?>">
                        <?php } ?>
                        <div class="card-body">
                            <h5 class="card-title text-dark"><?php echo $title; ?></h5>
                        </div>
                    </div>
                </a>
            </div>
            <?php } } else { echo "<div class='error'>Category not Added.</div>"; } ?>
        </div>
    </div>
</section>

<!-- Featured Pets Section -->
<section class="pet-menu fade-in">
    <div class="container">
        <h2 class="section-header">Featured Pets</h2>
        <div class="row">
            <?php
                // Fetch featured pets from the database
                $sql = "SELECT * FROM tbl_pet WHERE featured='Yes' LIMIT 4";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count > 0) {
                    while($row = mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        $name = $row['name'];
                        $color = $row['color']; // Assuming 'color' is stored in the table
                        $breed = $row['breed']; // Assuming 'breed' is stored in the table
                        $age = $row['age']; // Assuming 'age' is stored in the table
                        $gender = $row['gender']; // Assuming 'gender' is stored in the table
                        $image_name = $row['image_name'];
            ?>
            <div class="col-md-3">
                <div class="card">
                    <?php
                        if($image_name == "") {
                            echo "<div class='error'>Image not Available</div>";
                        } else {
                    ?>
                        <img src="<?php echo SITEURL; ?>images/pet/<?php echo $image_name; ?>" class="card-img-top img-fluid" alt="<?php echo $name; ?>">
                    <?php } ?>
                    <div class="card-body">
                        <!-- <h5 class="card-title"><?php echo $name; ?></h5> -->
                        <p class="card-text">
                                Meet: <strong class="pet-name"><?php echo $name; ?></strong><br>
                                Color: <?php echo $color; ?><br>
                                Breed: <?php echo $breed; ?><br>
                                Age: <?php echo $age; ?><br>
                                Gender: <?php echo $gender; ?>
                            </p>

                        <a href="<?php echo SITEURL; ?>dashbord/order.php?pet_id=<?php echo $id; ?>" class="btn btn-primary">More Details</a>
                    </div>
                </div>
            </div>
            <?php } } else { echo "<div class='error'>No Pets Available</div>"; } ?>
            </div>
        <!-- Add "See More Adoptable Pets" Button -->
        <div class="text-center mt-4">
            <a href="<?php echo SITEURL; ?>dashbord/pets.php" class="btn btn-primary">See More Adoptable Pets</a>
        </div>
</section>

<!-- Owner Contact Section -->
<section class="owner-contact">
    <div class="container">
        <h3>Are You a Pet Owner?</h3>
        <p>If you're a pet owner looking to make your pet available for adoption, contact us today!</p>
        <a href="mailto:pawsitivematch@gmail.com" class="btn-contact">Contact Us</a>
    </div>
</section>

<!-- Footer -->
<?php include('partials-front/footer.php'); ?>