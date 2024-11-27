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

.add-admin-form {
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
        <h1 class="page-title">Add Admin</h1>

        <br><br>

        <!-- Display success or error messages if any -->
        <?php 
            if(isset($_SESSION['add'])) { 
                echo $_SESSION['add']; 
                unset($_SESSION['add']);
            }
        ?>

        <!-- Add Admin Form Starts -->
        <form action="" method="POST" class="add-admin-form">
            <div class="form-group">
                <label for="full_name" class="form-label">Full Name:</label>
                <input type="text" name="full_name" placeholder="Enter Your Name" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="username" class="form-label">Username:</label>
                <input type="text" name="username" placeholder="Your Username" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" placeholder="Your Password" class="form-input" required>
            </div>



            <div class="form-group">
                <input type="submit" name="submit" value="Add Admin" class="btn-submit">
            </div>
            <div class="add-user-link">
</div>
        </form>
        <!-- Add Admin Form Ends -->
    </div>
</div>

<div style="clear: both; height: 250px;"></div>
<?php include('partials/footer.php'); ?>

<?php 
    // Process the value from the form and save it in the database
    if(isset($_POST['submit'])) {
        // Get the form data
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); // Password encryption with MD5

        // SQL query to save the data into the database
        $sql = "INSERT INTO table_admin SET 
                full_name='$full_name',
                username='$username',
                password='$password'
        ";

        // Executing query and saving data into the database
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        // Check if the query was executed successfully and display appropriate message
        if($res == TRUE) {
            // Data inserted
            $_SESSION['add'] = "<div class='success'>Admin Added Successfully.</div>";
            // Redirect to manage admin
            header("location:" . SITEURL . 'admin/manage-admin.php');
        } else {
            // Failed to insert data
            $_SESSION['add'] = "<div class='error'>Failed to Add Admin.</div>";
            // Redirect to add admin page
            header("location:" . SITEURL . 'admin/add-admin.php');
        }
    }
?>
