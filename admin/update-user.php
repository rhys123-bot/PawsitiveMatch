<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1 class="page-title">Update User</h1>
        <br><br>

        <?php
            // Check whether the id is set or not
            if(isset($_GET['id'])) {
                $id = $_GET['id'];

                // SQL query to get the user details
                $sql = "SELECT * FROM users WHERE id=$id";
                $res = mysqli_query($conn, $sql);

                if($res == TRUE) {
                    $count = mysqli_num_rows($res);
                    if($count == 1) {
                        $row = mysqli_fetch_assoc($res);
                        $fname = $row['first_name'];
                        $lname = $row['last_name'];
                        $number = $row['contact_number'];
                        $email = $row['email'];
                        $address = $row['address'];
                    } else {
                        header('location:'.SITEURL.'admin/manage-user.php');
                    }
                }
            } else {
                header('location:'.SITEURL.'admin/manage-user.php');
            }
        ?>

        <!-- Update User Form -->
        <form action="" method="POST" class="user-form">
            <div class="form-group">
                <label for="first_name" class="form-label">First Name:</label>
                <input type="text" name="first_name" id="first_name" value="<?php echo htmlspecialchars($fname); ?>" class="input-field" required>
            </div>

            <div class="form-group">
                <label for="last_name" class="form-label">Last Name:</label>
                <input type="text" name="last_name" id="last_name" value="<?php echo htmlspecialchars($lname); ?>" class="input-field" required>
            </div>

            <div class="form-group">
                <label for="contact_number" class="form-label">Contact Number:</label>
                <input type="text" name="contact_number" id="contact_number" value="<?php echo htmlspecialchars($number); ?>" class="input-field" required>
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" class="input-field" required>
            </div>

            <div class="form-group">
                <label for="address" class="form-label">Address:</label>
                <textarea name="address" id="address" class="input-field" rows="5" required><?php echo htmlspecialchars($address); ?></textarea>
            </div>

            <div class="form-group text-center">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="submit" value="Update User" class="btn-primary">
            </div>
        </form>

        <?php
            // Check if the Update Button is clicked
            if(isset($_POST['submit'])) {
                $id = $_POST['id'];
                $fname = $_POST['first_name'];
                $lname = $_POST['last_name'];
                $number = $_POST['contact_number'];
                $email = $_POST['email'];
                $address = $_POST['address'];

                // SQL query to update user details
                $sql2 = "UPDATE users SET 
                    first_name = '$fname',
                    last_name = '$lname',
                    contact_number = '$number',
                    email = '$email',
                    address = '$address'
                    WHERE id=$id";

                $res2 = mysqli_query($conn, $sql2);

                if($res2 == TRUE) {
                    $_SESSION['update'] = "<div class='success'>User Updated Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-user.php');
                } else {
                    $_SESSION['update'] = "<div class='error'>Failed to Update User.</div>";
                    header('location:'.SITEURL.'admin/manage-user.php');
                }
            }
        ?>
    </div>
</div>

<div style="clear: both; height: 70px;"></div>
<?php include('partials/footer.php'); ?>

<!-- Inline Styles for Improved Design -->
<style>
    /* General Body Styling */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f7f6;
        color: #333;
    }
    .main-content {
        background-color: #fff;
        padding: 30px;
        margin-top: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }
    .wrapper {
        max-width: 900px;
        margin: 0 auto;
    }

    /* Page Title Styling */
    .page-title {
        font-size: 24px;
        font-weight: bold;
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }

    /* Form Group Styling */
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

    /* Input Field Styling */
    .input-field {
        width: 100%;
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-top: 5px;
    }
    .input-field:focus {
        outline: none;
        border-color: #007bff;
    }

    /* Button Styling */
    .btn-primary {
        padding: 12px 20px;
        font-size: 16px;
        color: white;
        background-color: #007bff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }

    /* Success and Error Message Styling */
    .success, .error {
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 4px;
        font-size: 16px;
    }
    .success {
        background-color: #28a745;
        color: white;
    }
    .error {
        background-color: #dc3545;
        color: white;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .page-title {
            font-size: 20px;
        }
        .form-label {
            font-size: 14px;
        }
        .input-field {
            font-size: 14px;
        }
        .btn-primary {
            width: 100%;
            padding: 14px;
        }
    }
</style>
