<?php 
// Start output buffering to avoid "headers already sent" error
ob_start();  

include('partials/menu.php'); 
?>

<style>
/* General Layout */
.page-title {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    margin-bottom: 20px;
    text-align: center;
}

.update-form {
    width: 50%;
    margin: 0 auto;
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 20px;
}

.form-label {
    font-size: 16px;
    font-weight: bold;
    color: #555;
    margin-bottom: 8px;
    display: block;
}

.input-field, .input-file {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
    color: #333;
}

.radio-group label {
    margin-right: 20px;
}

.radio-group input[type="radio"] {
    width: auto;
    margin-right: 5px;
}

.btn-submit {
    width: 100%;
    padding: 12px;
    background-color: #28a745;
    border: none;
    border-radius: 4px;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-submit:hover {
    background-color: #218838;
}

/* Success/Error Messages */
.success {
    background-color: #d4edda;
    color: #155724;
    padding: 10px;
    border-radius: 4px;
    margin-bottom: 20px;
}

.error {
    background-color: #f8d7da;
    color: #721c24;
    padding: 10px;
    border-radius: 4px;
    margin-bottom: 20px;
}

.current-image {
    max-width: 200px;
    margin-top: 10px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
</style>

<?php 
    // Check whether id is set or not
    if (isset($_GET['id'])) {
        // Get all the details
        $id = $_GET['id'];

        // SQL Query to Get the Selected pet
        $sql2 = "SELECT * FROM tbl_pet WHERE id=$id";
        // Execute the Query
        $res2 = mysqli_query($conn, $sql2);

        // Get the value based on query executed
        $row2 = mysqli_fetch_assoc($res2);

        // Get the Individual Values of Selected pet
        $title = $row2['title'];
        $description = $row2['description'];
        $price = $row2['price'];
        $current_image = $row2['image_name'];
        $current_category = $row2['category_id'];
        $featured = $row2['featured'];
        $active = $row2['active'];
        $breed = $row2['breed'];  // New field
        $age = $row2['age'];      // New field
        $color = $row2['color'];  // New field
        $gender = $row2['gender']; // New field
        $name = $row2['name'];    // New field
    } else {
        // Redirect to Manage Pet
        header('location:' . SITEURL . 'admin/manage-pet.php');
        exit;
    }
?>

<div class="main-content">
    <div class="wrapper">
        <h1 class="page-title">Update Pet</h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data" class="update-form">
            <div class="form-group">
                <label for="title" class="form-label">Pet Title:</label>
                <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($title); ?>" class="input-field" required placeholder="Enter pet title">
            </div>

            <div class="form-group">
                <label for="description" class="form-label">Description:</label>
                <textarea name="description" id="description" class="input-field" required placeholder="Enter pet description" rows="5"><?php echo htmlspecialchars($description); ?></textarea>
            </div>

            <div class="form-group">
                <label for="price" class="form-label">Price:</label>
                <input type="number" name="price" id="price" value="<?php echo htmlspecialchars($price); ?>" class="input-field" required placeholder="Enter pet price">
            </div>

            <div class="form-group">
                <label for="image" class="form-label">Select Image:</label>
                <input type="file" name="image" id="image" class="form-input-file" required>
            </div>
                

            <div class="form-group">
                        <label for="breed" class="form-label">Breed:</label>
                        <select name="breed" id="breed" class="input-field" onchange="toggleBreedInput()">
                            <option value="">Select Breed</option>
                            <option value="Labrador" <?php echo ($breed == "Labrador") ? "selected" : ""; ?>>Labrador</option>
                            <option value="Bulldog" <?php echo ($breed == "Bulldog") ? "selected" : ""; ?>>Bulldog</option>
                            <option value="Beagle" <?php echo ($breed == "Beagle") ? "selected" : ""; ?>>Beagle</option>
                            <option value="Poodle" <?php echo ($breed == "Poodle") ? "selected" : ""; ?>>Poodle</option>
                            <option value="German Shepherd" <?php echo ($breed == "German Shepherd") ? "selected" : ""; ?>>German Shepherd</option>
                            <option value="Golden Retriever" <?php echo ($breed == "Golden Retriever") ? "selected" : ""; ?>>Golden Retriever</option>
                            <option value="Domestic Shorthair" <?php echo ($breed == "Domestic Shorthair") ? "selected" : ""; ?>>Domestic Shorthair</option>
                            <option value="Persian" <?php echo ($breed == "Persian") ? "selected" : ""; ?>>Persian</option>
                            <option value="Siamese" <?php echo ($breed == "Siamese") ? "selected" : ""; ?>>Siamese</option>
                            <option value="Maine Coon" <?php echo ($breed == "Maine Coon") ? "selected" : ""; ?>>Maine Coon</option>
                            <option value="Ragdoll" <?php echo ($breed == "Ragdoll") ? "selected" : ""; ?>>Ragdoll</option>
                            <option value="Bengal" <?php echo ($breed == "Bengal") ? "selected" : ""; ?>>Bengal</option>
                            <option value="British Shorthair" <?php echo ($breed == "British Shorthair") ? "selected" : ""; ?>>British Shorthair</option>
                            <option value="Other" <?php echo ($breed == "Other") ? "selected" : ""; ?>>Other (Type manually)</option>
                        </select>
                        <input type="text" name="breed_other" id="breed_other" class="input-field" placeholder="Enter custom breed" style="display: <?php echo ($breed == 'Other') ? 'block' : 'none'; ?>" value="<?php echo htmlspecialchars($breed); ?>" />
                    </div>

                    <div class="form-group">
                    <label for="breed" class="form-label">Breed:</label>
                    <select name="breed" id="breed" class="input-field" onchange="toggleBreedInput()">
                        <option value="">Select Breed</option>
                        <option value="Labrador">Labrador</option>
                        <option value="Bulldog">Bulldog</option>
                        <option value="Beagle">Beagle</option>
                        <option value="Poodle">Poodle</option>
                        <option value="German Shepherd">German Shepherd</option>
                        <option value="Golden Retriever">Golden Retriever</option>
                        <option value="Domestic Shorthair">Domestic Shorthair</option>
                        <option value="Persian">Persian</option>
                        <option value="Siamese">Siamese</option>
                        <option value="Maine Coon">Maine Coon</option>
                        <option value="Ragdoll">Ragdoll</option>
                        <option value="Bengal">Bengal</option>
                        <option value="British Shorthair">British Shorthair</option>
                        <option value="Other">Other (Type manually)</option>
                    </select>
                    <input type="text" name="breed_other" id="breed_other" class="input-field" placeholder="Enter custom breed" style="display: none;" />
                </div>

                <div class="form-group">
                    <label for="age" class="form-label">Age:</label>
                    <select name="age" id="age" class="input-field" onchange="toggleAgeInput()">
                        <option value="">Select Age</option>
                        <option value="Prime">Prime</option>
                        <option value="Young">Young Adult</option>
                        <option value="Kitten">Kitten</option>
                        <option value="Puppy">Puppy</option>
                        <option value="Adult">Adult</option>
                        <option value="Senior">Senior</option>
                        <option value="Other">Other (Type manually)</option>
                    </select>
                    <input type="text" name="age_other" id="age_other" class="input-field" placeholder="Enter custom age" style="display: none;" />
                </div>

                <div class="form-group">
                    <label for="color" class="form-label">Color:</label>
                    <select name="color" id="color" class="input-field" onchange="toggleColorInput()">
                        <option value="">Select Color</option>
                        <option value="Black">Black</option>
                        <option value="Brown">Brown</option>
                        <option value="White">White</option>
                        <option value="Golden">Golden</option>
                        <option value="Spotted">Spotted</option>
                        <option value="Other">Other (Type manually)</option>
                    </select>
                    <input type="text" name="color_other" id="color_other" class="input-field" placeholder="Enter custom color" style="display: none;" />
                </div>

                <div class="form-group">
                    <label for="gender" class="form-label">Gender:</label>
                    <select name="gender" id="gender" class="input-field" onchange="toggleGenderInput()">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other (Type manually)</option>
                    </select>
                    <input type="text" name="gender_other" id="gender_other" class="input-field" placeholder="Enter custom gender" style="display: none;" />
                </div>


                  <div class="form-group">
                <label class="form-label">Category:</label>
                <select name="category" id="category" class="input-field">
                    <?php 
                        // Query to Get Active Categories
                        $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);

                        if ($count > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                $category_title = $row['title'];
                                $category_id = $row['id'];
                                echo "<option value='$category_id' ".(($current_category == $category_id) ? "selected" : "").">$category_title</option>";
                            }
                        } else {
                            echo "<option value='0'>Category Not Available</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
    <label for="name" class="form-label">Pet Name:</label>
    <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name); ?>" class="input-field" required placeholder="Enter pet name">
</div>
            <div class="form-group radio-group">
                <label class="form-label">Featured:</label>
                <label><input type="radio" name="featured" value="Yes" <?php echo ($featured == "Yes") ? "checked" : ""; ?>> Yes</label>
                <label><input type="radio" name="featured" value="No" <?php echo ($featured == "No") ? "checked" : ""; ?>> No</label>
            </div>

            <div class="form-group radio-group">
                <label class="form-label">Active:</label>
                <label><input type="radio" name="active" value="Yes" <?php echo ($active == "Yes") ? "checked" : ""; ?>> Yes</label>
                <label><input type="radio" name="active" value="No" <?php echo ($active == "No") ? "checked" : ""; ?>> No</label>
            </div>

       
          
            <!-- Hidden Fields for ID and Current Image -->
            <div class="form-group text-center">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="current_image" value="<?php echo htmlspecialchars($current_image); ?>">
                <input type="submit" name="submit" value="Update Pet" class="btn-submit">
            </div>

        </form>

        <?php 
            if (isset($_POST['submit'])) {
                // Get the data from form
                $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $current_image = $_POST['current_image'];
                $category = $_POST['category'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];
                $breed = $_POST['breed']; // New field
                $age = $_POST['age'];     // New field
                $color = $_POST['color']; // New field
                $gender = $_POST['gender']; // New field
                $name = $_POST['name'];   // New field

                // Handle image upload
                if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
                    $image_name = $_FILES['image']['name'];
                    $ext = pathinfo($image_name, PATHINFO_EXTENSION);
                    $image_name = "Pet-Name-" . rand(0000, 9999) . '.' . $ext;

                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "../images/pet/".$image_name;

                    if (move_uploaded_file($source_path, $destination_path)) {
                        // Remove current image if new image uploaded
                        if ($current_image != "") {
                            $remove_path = "../images/pet/".$current_image;
                            unlink($remove_path);
                        }
                    } else {
                        $_SESSION['upload'] = "<div class='error'>Failed to upload new image.</div>";
                        header('location:' . SITEURL . 'admin/manage-pet.php');
                        exit;
                    }
                } else {
                    $image_name = $current_image; // Keep the current image if no new one uploaded
                }

                // Update the pet in the database
                $sql3 = "UPDATE tbl_pet SET 
                    title = '$title',
                    description = '$description',
                    price = $price,
                    image_name = '$image_name',
                    category_id = '$category',
                    featured = '$featured',
                    active = '$active',
                    breed = '$breed',
                    age = '$age',
                    color = '$color',
                    gender = '$gender',
                    name = '$name' 
                    WHERE id=$id";

                $res3 = mysqli_query($conn, $sql3);

                if ($res3) {
                    $_SESSION['update'] = "<div class='success'>Pet updated successfully.</div>";
                } else {
                    $_SESSION['update'] = "<div class='error'>Failed to update pet.</div>";
                }

                // Redirect after update
                header('location:' . SITEURL . 'admin/manage-pet.php');
                exit;
            }
        ?>
    </div>
</div>
<script>
// JavaScript to toggle between select and input field
function toggleBreedInput() {
    var breedSelect = document.getElementById('breed');
    var breedOtherInput = document.getElementById('breed_other');
    breedOtherInput.style.display = breedSelect.value == 'Other' ? 'block' : 'none';
}

function toggleAgeInput() {
    var ageSelect = document.getElementById('age');
    var ageOtherInput = document.getElementById('age_other');
    ageOtherInput.style.display = ageSelect.value == 'Other' ? 'block' : 'none';
}

function toggleColorInput() {
    var colorSelect = document.getElementById('color');
    var colorOtherInput = document.getElementById('color_other');
    colorOtherInput.style.display = colorSelect.value == 'Other' ? 'block' : 'none';
}

function toggleGenderInput() {
    var genderSelect = document.getElementById('gender');
    var genderOtherInput = document.getElementById('gender_other');
    genderOtherInput.style.display = genderSelect.value == 'Other' ? 'block' : 'none';
}
</script>
<?php
// End the output buffer and send output
ob_end_flush();
include('partials/footer.php');
?>
