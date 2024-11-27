<?php include('partials-front/menu.php'); ?>

<!-- Categories Section Starts Here -->
<section class="categories fade-in">
    <div class="container">
        <h2 class="text-center">Explore Our Pets</h2>
        <p class="text-center">Browse through different categories of pets available for adoption and find your perfect companion!</p>

        <?php 
            // Display all the categories that are active
            $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

            // Execute the Query
            $res = mysqli_query($conn, $sql);

            // Count Rows
            $count = mysqli_num_rows($res);

            // Check whether categories are available or not
            if ($count > 0) {
                // Categories Available
                while ($row = mysqli_fetch_assoc($res)) {
                    // Get the Values
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>
                    
                    <a href="<?php echo SITEURL; ?>dashboard/category-pets.php?category_id=<?php echo $id; ?>" class="category-box">
                        <div class="box-3 float-container">
                            <?php 
                                if ($image_name == "") {
                                    // Image not Available
                                    echo "<div class='error'>Image not found.</div>";
                                } else {
                                    // Image Available
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="img-responsive img-curve" data-toggle="tooltip" title="Click to explore pets in this category">
                                    <?php
                                }
                            ?>
                            <h3 class="float-text text-white"><?php echo $title; ?></h3>
                        </div>
                    </a>

                    <?php
                }
            } else {
                // Categories Not Available
                echo "<div class='error'>Category not found.</div>";
            }
        ?>
        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->

<!-- Pet Adoption Tips Section Starts Here -->
<section class="adoption-tips fade-in">
    <div class="container">
        <h2 class="text-center">Pet Adoption Tips</h2>
        <p class="text-center">Adopting a pet is one of the most rewarding experiences you'll ever have. Here are some essential tips to guide you through the process!</p>
        
        <div class="tip-cards">
            <!-- Tip 1: Why Adoption is the Best Option -->
            <div class="tip-card">
                <div class="tip-icon">
                    <i class="fas fa-heartbeat"></i>
                </div>
                <h3 class="tip-title">Why Adoption is the Best Option</h3>
                <p class="tip-summary">Adopting a pet means giving a homeless animal a second chance at life. By adopting, you're saving a life and reducing the number of animals in shelters.</p>
                <button class="see-more" onclick="toggleTip(1)">See More</button>
                <div class="tip-full" id="tip-1">
                    <ul>
                        <li><strong>Save a Life:</strong> Every year, millions of pets are waiting in shelters for a loving home.</li>
                        <li><strong>Affordable Adoption:</strong> Adoption fees are generally lower than purchasing a pet from a breeder.</li>
                        <li><strong>Health and Wellbeing:</strong> Adopted pets are usually vaccinated, microchipped, and spayed/neutered.</li>
                        <li><strong>Variety of Options:</strong> Shelters have pets of all shapes, sizes, and personalities.</li>
                    </ul>
                </div>
            </div>

            <!-- Tip 2: How to Choose the Right Pet -->
            <div class="tip-card">
                <div class="tip-icon">
                    <i class="fas fa-paw"></i>
                </div>
                <h3 class="tip-title">How to Choose the Right Pet</h3>
                <p class="tip-summary">Choosing the right pet is key to having a happy and healthy relationship. Consider factors like energy level, living space, and time commitment.</p>
                <button class="see-more" onclick="toggleTip(2)">See More</button>
                <div class="tip-full" id="tip-2">
                    <ul>
                        <li><strong>Energy Level:</strong> Make sure the pet's energy matches your lifestyle.</li>
                        <li><strong>Living Space:</strong> Consider whether your home is suitable for the pet you’re thinking of adopting.</li>
                        <li><strong>Temperament:</strong> Ensure the pet’s temperament fits your household.</li>
                        <li><strong>Time Commitment:</strong> Consider how much time you can devote to your pet's care.</li>
                    </ul>
                </div>
            </div>

            <!-- Tip 3: Pet Care Essentials -->
            <div class="tip-card">
                <div class="tip-icon">
                    <i class="fas fa-medkit"></i>
                </div>
                <h3 class="tip-title">Pet Care Essentials</h3>
                <p class="tip-summary">Once you adopt your new pet, ensure you're providing proper nutrition, regular vet check-ups, and proper exercise.</p>
                <button class="see-more" onclick="toggleTip(3)">See More</button>
                <div class="tip-full" id="tip-3">
                    <ul>
                        <li><strong>Diet and Nutrition:</strong> Provide balanced food based on your pet’s breed and age.</li>
                        <li><strong>Regular Check-Ups:</strong> Schedule regular vet visits to monitor health.</li>
                        <li><strong>Exercise and Enrichment:</strong> Provide exercise and toys to keep your pet happy.</li>
                        <li><strong>Training:</strong> Basic training will help your pet behave well and integrate into your family.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Pet Adoption Tips Section Ends Here -->

<?php include('partials-front/footer.php'); ?>

<!-- CSS Styles -->
<style>
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

    .categories {
        background-color: #f8f9fa;
        padding: 60px 0;
    }

    .categories h2 {
        font-size: 36px;
        color: #333;
        margin-bottom: 40px;
        text-transform: uppercase;
    }

    .categories p {
        font-size: 18px;
        color: #555;
        margin-bottom: 40px;
    }

    .category-box {
        text-decoration: none;
    }

    .box-3 {
        position: relative;
        border: 1px solid #ddd;
        margin-bottom: 30px;
        border-radius: 8px;
        overflow: hidden;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .box-3:hover {
        transform: scale(1.05);
    }

    .img-responsive {
        width: 100%;
        height: auto;
        display: block;
    }

    .img-curve {
        border-radius: 8px;
    }

    .float-text {
        position: absolute;
        bottom: 15px;
        left: 20px;
        font-size: 24px;
        font-weight: bold;
        text-transform: uppercase;
    }

    .float-text.text-white {
        color: #fff;
    }

    .tip-cards {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 20px;
    }

    .tip-card {
        background-color: #f1f1f1;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 30%;
        text-align: center;
        transition: transform 0.3s ease;
        margin-bottom: 20px;
    }

    .tip-card:hover {
        transform: translateY(-10px);
    }

    .tip-title {
        font-size: 22px;
        color: #28a745; /* Yellowish text */
        margin-bottom: 15px;
    }

    .tip-icon {
        font-size: 40px;
        margin-bottom: 15px;
        color: #ff6347;
    }

    .tip-card p {
        font-size: 16px;
        color: #555;
    }

    .see-more {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 8px 20px;
        font-size: 16px;
        cursor: pointer;
        border-radius: 5px;
        margin-top: 15px;
    }

    .see-more:hover {
        background-color: #f39c12;
    }

    .tip-full {
        display: none;
        margin-top: 20px;
        color: #555;
        text-align: left;
    }

    .tip-full ul {
        list-style-type: none;
        padding-left: 0;
    }

    .tip-full li {
        font-size: 14px;
    }
    
</style>

<!-- JS (to handle "See More" toggle) -->
<script>
    function toggleTip(tipNumber) {
        var tip = document.getElementById('tip-' + tipNumber);
        var button = document.querySelectorAll('.see-more')[tipNumber - 1];

        if (tip.style.display === 'block') {
            tip.style.display = 'none';
            button.innerText = 'See More';
        } else {
            tip.style.display = 'block';
            button.innerText = 'See Less';
        }
    }
</script>
