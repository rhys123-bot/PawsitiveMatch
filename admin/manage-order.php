<?php include('partials/menu.php'); ?>

<div class="main-content" style="padding: 20px;">
    <div class="wrapper" style="background-color: #fff; border: 1px solid #ddd; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); max-width: 95%; margin: 0 auto;">
        <h1 style="font-size: 24px; margin-bottom: 10px;">Manage Orders</h1>

        <br /><br />

        <?php 
            if(isset($_SESSION['update'])) {
                echo "<div class='alert alert-success'>" . $_SESSION['update'] . "</div>";
                unset($_SESSION['update']);
            }
        ?>
        
        <br><br>

        <table class="tbl-full" style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #f9f9f9; border-bottom: 2px solid #ddd;">
                    <th style="padding: 12px; font-weight: bold;">ID</th>
                    <th style="padding: 12px; font-weight: bold;">Pet</th>
                    <th style="padding: 12px; font-weight: bold;">Order Date</th>
                    <th style="padding: 12px; font-weight: bold;">Status</th>
                    <th style="padding: 12px; font-weight: bold;">Customer Name</th>
                    <th style="padding: 12px; font-weight: bold;">Contact</th>
                    <th style="padding: 12px; font-weight: bold;">Email</th>
                    <th style="padding: 12px; font-weight: bold;">Address</th>
                    <th style="padding: 12px; font-weight: bold;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    // Get all the orders from the database
                    $sql = "SELECT * FROM tabl_order ORDER BY id DESC"; // Display the Latest Order at First
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);
                    $sn = 1;

                    if($count > 0) {
                        while($row = mysqli_fetch_assoc($res)) {
                            $id = $row['id'];
                            $pet = $row['pet'];
                            $order_date = $row['order_date'];
                            $status = $row['status'];
                            $customer_name = $row['customer_name'];
                            $customer_contact = $row['customer_contact'];
                            $customer_email = $row['customer_email'];
                            $customer_address = $row['customer_address'];
                ?>
                    <tr style="border-bottom: 1px solid #ddd; transition: background-color 0.3s;">
                        <td style="padding: 12px;"><?php echo $sn++; ?>.</td>
                        <td style="padding: 12px;"><?php echo $pet; ?></td>
                        <td style="padding: 12px;"><?php echo $order_date; ?></td>
                        <td style="padding: 12px;">
                            <?php 
                                if($status == "Ordered") {
                                    echo "<span style='color: #3498db;'>$status</span>";
                                } elseif($status == "On Delivery") {
                                    echo "<span style='color: orange;'>$status</span>";
                                } elseif($status == "Delivered") {
                                    echo "<span style='color: green;'>$status</span>";
                                } else {
                                    echo "<span style='color: red;'>$status</span>";
                                }
                            ?>
                        </td>
                        <td style="padding: 12px;"><?php echo $customer_name; ?></td>
                        <td style="padding: 12px;"><?php echo $customer_contact; ?></td>
                        <td style="padding: 12px;"><?php echo $customer_email; ?></td>
                        <td style="padding: 12px;"><?php echo $customer_address; ?></td>
                        <td style="padding: 12px; text-align: center;">
                            <!-- Toggle Action Menu -->
                            <div class="dropdown">
                                <a href="javascript:void(0);" class="dot-btn" style="display: inline-block; cursor: pointer;" onclick="toggleDropdown(<?php echo $id; ?>)">
                                    <!-- Inline SVG for the 3 vertical dots -->
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="4" r="2" fill="black"/>
                                        <circle cx="12" cy="12" r="2" fill="black"/>
                                        <circle cx="12" cy="20" r="2" fill="black"/>
                                    </svg>
                                </a>
                                <div class="dropdown-content" id="dropdown-<?php echo $id; ?>" style="display: none;">
                                    <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>">Update Order</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete-order.php?id=<?php echo $id; ?>">Remove Order</a>
                                    <a href="<?php echo SITEURL; ?>admin/view-order.php?id=<?php echo $id; ?>">View Order</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php
                        }
                    } else {
                        echo "<tr><td colspan='9' class='error'>No Orders Available</td></tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Styles for the Dropdown and Button -->
<style>
    .tbl-full {
        width: 100%;
        border-collapse: collapse;
    }

    .tbl-full th, .tbl-full td {
        padding: 12px;
        text-align: left;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dot-btn {
        cursor: pointer;
        display: inline-block;
    }

    .dropdown-content {
        position: absolute;
        background-color: #fff;
        min-width: 160px;
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        z-index: 1;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 5px;
        font-size: 14px;
    }

    .dropdown-content a {
        color: #3498db;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    tr:hover {
        background-color: #f9f9f9;
        cursor: pointer;
    }

    /* Style for the success message */
    .alert-success {
        background-color: #d4edda;
        color: #155724;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 20px;
    }

    .error {
        color: red;
        text-align: center;
        font-size: 18px;
    }
</style>

<!-- JavaScript to Toggle Dropdown -->
<script>
    function toggleDropdown(id) {
        var dropdown = document.getElementById("dropdown-" + id);
        dropdown.style.display = (dropdown.style.display === "none" || dropdown.style.display === "") ? "block" : "none";
    }
</script>

<?php include('partials/footer.php'); ?>
