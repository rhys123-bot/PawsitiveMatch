<?php include('partials/menu.php'); ?>

<style>
/* General Layout */
.page-title {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    margin-bottom: 20px;
}

.category-form {
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
.form-input-file {
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
</style>

<div class="main-content">
    <div class="wrapper">
        <h1 class="page-title">Add Category</h1>

        <br><br>

        <?php 
            if(isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['upload'])) {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <br><br>

        <!-- Add Category Form Starts -->
        <form action="" method="POST" enctype="multipart/form-data" class="category-form">
            <div class="form-group">
                <label for="title" class="form-label">Category Title:</label>
                <input type="text" id="title" name="title" placeholder="Enter Category Title" class="form-input">
            </div>

            <div class="form-group">
                <label for="image" class="form-label">Select Image:</label>
                <input type="file" name="image" class="form-input-file">
            </div>

            <div class="form-group">
                <label class="form-label">Featured:</label>
                <div class="radio-group">
                    <label><input type="radio" name="featured" value="Yes"> Yes</label>
                    <label><input type="radio" name="featured" value="No"> No</label>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Active:</label>
                <div class="radio-group">
                    <label><input type="radio" name="active" value="Yes"> Yes</label>
                    <label><input type="radio" name="active" value="No"> No</label>
                </div>
            </div>

            <div class="form-group">
                <input type="submit" name="submit" value="Add Category" class="btn-submit">
            </div>
        </form>
        <!-- Add Category Form Ends -->

        <?php 
            // Check whether the Submit Button is Clicked or Not
            if(isset($_POST['submit'])) {
                // Get the Value from Category Form
                $title = $_POST['title'];

                if(isset($_POST['featured'])) {
                    $featured = $_POST['featured'];
                } else {
                    $featured = "No";
                }

                if(isset($_POST['active'])) {
                    $active = $_POST['active'];
                } else {
                    $active = "No";
                }

                if(isset($_FILES['image']['name'])) {
                    $image_name = $_FILES['image']['name'];

                    if($image_name != "") {
                        $ext = pathinfo($image_name, PATHINFO_EXTENSION);
                        $image_name = "pet_Category_".rand(000, 999).'.'.$ext;
                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path = "../images/category/".$image_name;

                        $upload = move_uploaded_file($source_path, $destination_path);

                        if($upload==false) {
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image. </div>";
                            header('location:'.SITEURL.'admin/add-category.php');
                            die();
                        }
                    }
                } else {
                    $image_name = "";
                }

                // SQL Query to Insert Category into Database
                $sql = "INSERT INTO tbl_category SET 
                        title='$title',
                        image_name='$image_name',
                        featured='$featured',
                        active='$active'";

                $res = mysqli_query($conn, $sql);

                if($res==true) {
                    $_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                } else {
                    $_SESSION['add'] = "<div class='error'>Failed to Add Category.</div>";
                    header('location:'.SITEURL.'admin/add-category.php');
                }
            }
        ?>

    </div>
</div>

<div style="clear: both; height: 165px;"></div>
<?php include('partials/footer.php'); ?>