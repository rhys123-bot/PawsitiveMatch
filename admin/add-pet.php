<?php include('partials/menu.php'); ?>

<style>
/* General Layout */
.page-title {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    margin-bottom: 20px;
    text-align: center;
}

.add-pet-form {
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

.form-input,
.form-input-file,
.select-input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
    color: #333;
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
    margin-right: 15px;
    font-size: 14px;
}

/* Submit Button */
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

/* Form Layout */
.add-pet-form label {
    font-weight: bold;
}

.radio-group {
    display: flex;
    gap: 20px;
    margin-top: 8px;
}

/* Table Layout Removed */
</style>

<div class="main-content">
    <div class="wrapper">
        <h1 class="page-title">Add Pet</h1>

        <br><br>

        <!-- Display success or error messages if any -->
        <?php 
            if (isset($_SESSION['upload'])) {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <!-- Add Pet Form Starts -->
        <form action="" method="POST" enctype="multipart/form-data" class="add-pet-form">
            <div class="form-group">
                <label for="title" class="form-label">Title:</label>
                <input type="text" id="title" name="title" placeholder="Title of the pet" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="description" class="form-label">Description:</label>
                <textarea name="description" id="description" cols="30" rows="5" placeholder="Description of the pet" class="form-input" required></textarea>
            </div>

            <div class="form-group">
                <label for="price" class="form-label">Price:</label>
                <input type="number" name="price" id="price" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="image" class="form-label">Select Image:</label>
                <input type="file" name="image" id="image" class="form-input-file" required>
            </div>

            <!-- New fields for Breed, Age, Color, Gender, and Name -->
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
                <label for="name" class="form-label">Name:</label>
                <input type="text" name="name" id="name" placeholder="Name of the pet" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="category" class="form-label">Category:</label>
                <select name="category" id="category" class="select-input" required>
                    <?php 
                        $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);

                        if ($count > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                $id = $row['id'];
                                $title = $row['title'];
                                echo "<option value='$id'>$title</option>";
                            }
                        } else {
                            echo "<option value='0'>No Category Found</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Featured:</label>
                <div class="radio-group">
                    <label><input type="radio" name="featured" value="Yes" required> Yes</label>
                    <label><input type="radio" name="featured" value="No" required> No</label>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Active:</label>
                <div class="radio-group">
                    <label><input type="radio" name="active" value="Yes" required> Yes</label>
                    <label><input type="radio" name="active" value="No" required> No</label>
                </div>
            </div>

            <div class="form-group">
                <input type="submit" name="submit" value="Add Pet" class="btn-submit">
            </div>
        </form>
        <!-- Add Pet Form Ends -->
    </div>
    
</div>

<?php include('partials/footer.php'); ?>
