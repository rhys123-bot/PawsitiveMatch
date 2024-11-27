<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1 class="page-title">Update Order</h1>
        <br><br>

        <?php 
            // Check if id is set or not
            if(isset($_GET['id'])) {
                // Get the Order Details
                $id = $_GET['id'];

                // SQL Query to get the order details
                $sql = "SELECT * FROM tabl_order WHERE id=$id";
                // Execute Query
                $res = mysqli_query($conn, $sql);
                // Count Rows
                $count = mysqli_num_rows($res);

                if($count == 1) {
                    // Details Available
                    $row = mysqli_fetch_assoc($res);

                    $pet = $row['pet'];
                    $price = $row['price'];
                    $qty = $row['qty'];
                    $status = $row['status'];
                    $customer_name = $row['customer_name'];
                    $customer_contact = $row['customer_contact'];
                    $customer_email = $row['customer_email'];
                    $customer_address = $row['customer_address'];
                } else {
                    // Details not Available
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            } else {
                // Redirect to Manage Order Page
                header('location:'.SITEURL.'admin/manage-order.php');
            }
        ?>

        <!-- Order Update Form -->
        <form action="" method="POST" class="order-form">
            <div class="form-group">
                <label for="pet" class="form-label">Pet Name</label>
                <p class="order-details"><b><?php echo $pet; ?></b></p>
            </div>

            <div class="form-group">
                <label for="price" class="form-label">Price</label>
                <p class="order-details"><b>$ <?php echo $price; ?></b></p>
            </div>

            <div class="form-group">
                <label for="qty" class="form-label">Quantity</label>
                <input type="number" name="qty" id="qty" value="<?php echo $qty; ?>" class="input-field" required>
            </div>

            <div class="form-group">
                <label for="status" class="form-label">Order Status</label>
                <select name="status" id="status" class="input-field" required>
                    <option <?php if($status == "Ordered") { echo "selected"; } ?> value="Ordered">Ordered</option>
                    <option <?php if($status == "On Delivery") { echo "selected"; } ?> value="On Delivery">On Delivery</option>
                    <option <?php if($status == "Delivered") { echo "selected"; } ?> value="Delivered">Delivered</option>
                    <option <?php if($status == "Cancelled") { echo "selected"; } ?> value="Cancelled">Cancelled</option>
                </select>
            </div>

            <div class="form-group">
                <label for="customer_name" class="form-label">Customer Name</label>
                <input type="text" name="customer_name" id="customer_name" value="<?php echo $customer_name; ?>" class="input-field" required>
            </div>

            <div class="form-group">
                <label for="customer_contact" class="form-label">Customer Contact</label>
                <input type="text" name="customer_contact" id="customer_contact" value="<?php echo $customer_contact; ?>" class="input-field" required>
            </div>

            <div class="form-group">
                <label for="customer_email" class="form-label">Customer Email</label>
                <input type="email" name="customer_email" id="customer_email" value="<?php echo $customer_email; ?>" class="input-field" required>
            </div>

            <div class="form-group">
                <label for="customer_address" class="form-label">Customer Address</label>
                <textarea name="customer_address" id="customer_address" class="input-field" rows="5" required><?php echo $customer_address; ?></textarea>
            </div>

            <div class="form-group text-center">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="price" value="<?php echo $price; ?>">
                <input type="submit" name="submit" value="Update Order" class="btn-primary">
            </div>
        </form>

        <?php 
            // Check whether the Update Button is Clicked or Not
            if(isset($_POST['submit'])) {
                // Get All the Values from Form
                $id = $_POST['id'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];
                $total = $price * $qty;

                $status = $_POST['status'];

                $customer_name = $_POST['customer_name'];
                $customer_contact = $_POST['customer_contact'];
                $customer_email = $_POST['customer_email'];
                $customer_address = $_POST['customer_address'];

                // Update the Values
                $sql2 = "UPDATE tabl_order SET 
                    qty = $qty,
                    total = $total,
                    status = '$status',
                    customer_name = '$customer_name',
                    customer_contact = '$customer_contact',
                    customer_email = '$customer_email',
                    customer_address = '$customer_address'
                    WHERE id=$id";

                // Execute the Query
                $res2 = mysqli_query($conn, $sql2);

                // Check whether update was successful
                if($res2 == true) {
                    $_SESSION['update'] = "<div class='success'>Order Updated Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-order.php');
                } else {
                    $_SESSION['update'] = "<div class='error'>Failed to Update Order.</div>";
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            }
        ?>
    </div>
</div>

<div style="clear: both; height: 1px;"></div>
<?php include('partials/footer.php'); ?>

<!-- Inline Styles for Improved Design -->
<style>
    /* General Body Styling */
    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        color: #333;
    }
    .main-content {
        background-color: #fff;
        padding: 20px;
        margin-top: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }
    .wrapper {
        max-width: 1000px;
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

    .order-details {
        font-size: 1.1em;
        font-weight: bold;
        color: #333;
    }

    /* Input Fields Styling */
    .input-field {
        width: 100%;
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ddd;
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
        border-radius: 4px;
        margin-bottom: 20px;
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
