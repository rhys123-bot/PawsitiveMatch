<?php include('partials-front/menu.php'); ?>
<link rel="stylesheet" href="css/order_history.css">
<?php
// Check if user is logged in
if(isset($_SESSION['userID'])) {
    // Establish database connection
require_once '../config/db_connection.php';

    $userID = $_SESSION['userID'];
    // Use prepared statement to prevent SQL injection
    $sql = "SELECT * FROM tabl_order WHERE user_id = ? ORDER BY order_date DESC";
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        die("SQL preparation failed:" /mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "i", $userID);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    
    if(mysqli_num_rows($res) > 0) {
?>
        <div class="order-history-details">
            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Pet</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Order Date</th>
                    <th>Status</th>
                </tr>
<?php
        $sn = 1;
        while($row = mysqli_fetch_assoc($res)) {
            $orderItems = $row['pet'];
            $price = $row['price'];
            $quantity = $row['qty'];
            $orderTotal = $row['total'];
            $orderDate = $row['order_date'];
            $orderStatus = $row['status'];
?>
                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $orderItems; ?></td>
                    <td><?php echo $price; ?></td>
                    <td><?php echo $quantity; ?></td>
                    <td><?php echo $orderTotal; ?></td>
                    <td><?php echo $orderDate; ?></td>
                    <td>
                        <?php
                        if($orderStatus == "Ordered") {
                            echo "<label>$orderStatus</label>";
                        } elseif($orderStatus == "On Delivery") {
                            echo "<label style='color: orange;'>$orderStatus</label>";
                        } elseif($orderStatus == "Delivered") {
                            echo "<label style='color: green;'>$orderStatus</label>";
                        } elseif($orderStatus == "Cancelled") {
                            echo "<label style='color: red;'>$orderStatus</label>";
                        }
                        ?>
                    </td>
                </tr>
<?php
        }
?>
            </table>
        </div>
<?php
    } else {
        echo "No orders found.";
    }

    // Close prepared statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    // Handle case when user is not logged in
    echo "Please log in to view order history.";
}
?>
<?php include('partials-front/footer.php'); ?>
