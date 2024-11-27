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

.change-password-form {
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

.form-input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
    color: #333;
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
        <h1 class="page-title">Change Password</h1>
        <br><br>

        <?php 
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
            }
        ?>

        <!-- Change Password Form -->
        <form action="" method="POST" class="change-password-form">
            <div class="form-group">
                <label for="current_password" class="form-label">Current Password:</label>
                <input type="password" name="current_password" placeholder="Current Password" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="new_password" class="form-label">New Password:</label>
                <input type="password" name="new_password" placeholder="New Password" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="confirm_password" class="form-label">Confirm Password:</label>
                <input type="password" name="confirm_password" placeholder="Confirm Password" class="form-input" required>
            </div>

            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="submit" value="Change Password" class="btn-submit">
            </div>
        </form>
        <!-- End Change Password Form -->
    </div>
</div>

<?php 

    // Check whether the Submit Button is Clicked
    if(isset($_POST['submit'])) {

        // Get the form data
        $id = $_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);

        // Check whether the user with the current ID and current password exists
        $sql = "SELECT * FROM table_admin WHERE id=$id AND password='$current_password'";

        // Execute the query
        $res = mysqli_query($conn, $sql);

        if($res == true) {
            // Check whether data is available or not
            $count = mysqli_num_rows($res);

            if($count == 1) {
                // User exists and password can be changed
                // Check whether the new password and confirm password match
                if($new_password == $confirm_password) {
                    // Update the password
                    $sql2 = "UPDATE table_admin SET password='$new_password' WHERE id=$id";

                    // Execute the query
                    $res2 = mysqli_query($conn, $sql2);

                    if($res2 == true) {
                        // Password changed successfully
                        $_SESSION['change-pwd'] = "<div class='success'>Password Changed Successfully. </div>";
                        header('location:' . SITEURL . 'admin/manage-admin.php');
                    } else {
                        // Failed to update password
                        $_SESSION['change-pwd'] = "<div class='error'>Failed to Change Password. </div>";
                        header('location:' . SITEURL . 'admin/manage-admin.php');
                    }
                } else {
                    // New and confirm passwords do not match
                    $_SESSION['pwd-not-match'] = "<div class='error'>Password Did Not Match. </div>";
                    header('location:' . SITEURL . 'admin/manage-admin.php');
                }
            } else {
                // User does not exist
                $_SESSION['user-not-found'] = "<div class='error'>User Not Found. </div>";
                header('location:' . SITEURL . 'admin/manage-admin.php');
            }
        }
    }
?>

<div style="clear: both; height: 250px;"></div>
<?php include('partials/footer.php'); ?>