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

/* Link Section */
.add-user-link {
    text-align: center;
    margin-top: 20px;
}

.add-user-link a {
    color: #007bff;
    text-decoration: none;
}

.add-user-link a:hover {
    text-decoration: underline;
}
</style>

<div class="main-content">
    <div class="wrapper">
        <h1 class="page-title">Register User</h1>

        <br><br>

        <!-- Display success or error messages if any -->
        <?php 
            if(isset($_SESSION['add'])) { 
                echo $_SESSION['add']; 
                unset($_SESSION['add']);
            }
        ?>

        <!-- Register User Form Starts -->
        <form action="regFrm.php" method="POST" class="add-admin-form">
            <div class="form-group">
                <label for="fname" class="form-label">First Name:</label>
                <input type="text" name="fname" placeholder="Enter First Name" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="lname" class="form-label">Last Name:</label>
                <input type="text" name="lname" placeholder="Enter Last Name" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="mobile" class="form-label">Contact Number:</label>
                <input type="text" name="mobile" placeholder="Enter Contact Number" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" placeholder="Enter Email" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="pwd" class="form-label">Password:</label>
                <input type="password" name="pwd" placeholder="Enter Password" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="confirm_pwd" class="form-label">Confirm Password:</label>
                <input type="pwd" name="confirm_pwd" placeholder="Enter Password" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="address" class="form-label">Address:</label>
                <textarea name="address" placeholder="Enter Address" class="form-input" required></textarea>
            </div>

            <div class="form-group">
                <input type="submit" name="submit" value="Register User" class="btn-submit">
            </div>
        </form>
        <!-- Register User Form Ends -->
    </div>
</div>

<div style="clear: both; height: 250px;"></div>
<?php include('partials/footer.php'); ?>

<?php 
    // Process the value from the form and save it in the database
    if(isset($_POST['submit'])) {
        // Get the form data
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $contact_number = $_POST['contact_number'];
        $email = $_POST['email'];
        $password = md5($_POST['password']); // Password encryption with MD5
        $address = $_POST['address'];

        // SQL query to save the data into the database
        $sql = "INSERT INTO users (first_name, last_name, contact_number, email, password, address) 
                VALUES ('$first_name', '$last_name', '$contact_number', '$email', '$password', '$address')";

        // Executing query and saving data into the database
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        // Check if the query was executed successfully and display appropriate message
        if($res == TRUE) {
            // Data inserted
            $_SESSION['add'] = "<div class='success'>User Registered Successfully.</div>";
            // Redirect to a page (e.g., manage users or login page)
            header("location:" . SITEURL . 'admin/manage-user.php');
        } else {
            // Failed to insert data
            $_SESSION['add'] = "<div class='error'>Failed to Register User.</div>";
            // Redirect to register user page
            header("location:" . SITEURL . 'admin/registeruser.php');
        }
    }
?>
