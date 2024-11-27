<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    // session_start();
}

// Include necessary files only once
include_once('partials/menu.php');
include_once('../config/db_connection.php');

// Ensure no output (HTML, whitespace) is sent before this point
// Check whether the category ID is set or not
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Fetch the category details from the database using prepared statements
    $sql = "SELECT * FROM tbl_category WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $count = mysqli_num_rows($res);

    // If category exists, fetch the data
    if ($count == 1) {
        $row = mysqli_fetch_assoc($res);
        $title = $row['title'];
        $current_image = $row['image_name'];
        $featured = $row['featured'];
        $active = $row['active'];
    } else {
        $_SESSION['no-category-found'] = "<div class='error'>Category not Found.</div>";
        header('location:' . SITEURL . 'admin/manage-category.php');
        exit;  // Stop the script after the redirect
    }
} else {
    header('location:' . SITEURL . 'admin/manage-category.php');
    exit;
}

// Handle form submission for updating the category
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $current_image = $_POST['current_image'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];

    // If a new image is uploaded
    if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
        $image_name = $_FILES['image']['name'];
        $ext = pathinfo($image_name, PATHINFO_EXTENSION);
        $image_name = "category_" . rand(000, 999) . '.' . $ext;

        // Path for uploading new image
        $source_path = $_FILES['image']['tmp_name'];
        $destination_path = "../images/category/" . $image_name;

        // Validate if the file is a valid image
        $allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
        if (!in_array(strtolower($ext), $allowed_ext)) {
            $_SESSION['upload'] = "<div class='error'>Invalid image format. Allowed formats: jpg, jpeg, png, gif.</div>";
            header('location:' . SITEURL . 'admin/manage-category.php');
            exit;
        }

        // Upload image
        if (move_uploaded_file($source_path, $destination_path)) {
            // If there's a current image, remove it
            if ($current_image != "") {
                $remove_path = "../images/category/" . $current_image;
                unlink($remove_path);
            }
        } else {
            $_SESSION['upload'] = "<div class='error'>Failed to upload image. Please try again.</div>";
            header('location:' . SITEURL . 'admin/manage-category.php');
            exit;
        }
    } else {
        // If no new image is uploaded, keep the current image
        $image_name = $current_image;
    }

    // Update the category details in the database using prepared statements
    $sql2 = "UPDATE tbl_category SET title = ?, image_name = ?, featured = ?, active = ? WHERE id = ?";
    $stmt2 = mysqli_prepare($conn, $sql2);
    mysqli_stmt_bind_param($stmt2, "ssssi", $title, $image_name, $featured, $active, $id);
    $res2 = mysqli_stmt_execute($stmt2);

    // Check if the category update was successful
    if ($res2) {
        $_SESSION['update'] = "<div class='success'>Category updated successfully!</div>";
        header('location:' . SITEURL . 'admin/manage-category.php');
        exit;  // Stop the script after the redirect
    } else {
        $_SESSION['update'] = "<div class='error'>Failed to update category. Please try again.</div>";
        header('location:' . SITEURL . 'admin/manage-category.php');
        exit;
    }
}
?>

<!-- Page Styling -->
<style>
/* General Layout */
.page-title {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    margin-bottom: 20px;
    text-align: center;
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

.form-input, .input-file {
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

<!-- Page Content -->
<div class="main-content">
    <div class="wrapper">
        <h1 class="page-title">Update Category</h1>
        <br><br>

        <!-- Update Category Form -->
        <form action="" method="POST" enctype="multipart/form-data" class="category-form">
            <div class="form-group">
                <label for="title" class="form-label">Category Title:</label>
                <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($title); ?>" class="form-input" required placeholder="Enter category title">
            </div>

            <div class="form-group">
                <label for="current_image" class="form-label">Current Image:</label>
                <div>
                    <?php 
                        if ($current_image != "") {
                            echo "<img src='" . SITEURL . "images/category/$current_image' alt='Category Image' class='current-image'>";
                        } else {
                            echo "<div class='error'>No image added yet.</div>";
                        }
                    ?>
                </div>
            </div>

            <div class="form-group">
                <label for="image" class="form-label">New Image:</label>
                <input type="file" name="image" id="image" class="input-file">
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
                <input type="hidden" name="current_image" value="<?php echo htmlspecialchars($current_image); ?>">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="submit" value="Update Category" class="btn-submit">
            </div>
        </form>

    </div>
</div>

<div style="clear: both; height: 5px;"></div>
<?php include('partials/footer.php'); ?>
