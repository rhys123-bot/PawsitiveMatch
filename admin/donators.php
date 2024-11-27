<?php 
include('partials/menu.php'); 

// Database connection
$conn = new mysqli('localhost', 'root', '', 'drool_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle approve, deny, or cancel action
if (isset($_GET['action']) && isset($_GET['donator_id'])) {
    $donator_id = $_GET['donator_id'];
    $action = $_GET['action'];

    // Define the new status based on action
    if ($action == 'approve') {
        $new_status = 'Approved';
    } elseif ($action == 'deny') {
        $new_status = 'Denied';
    } else {
        $new_status = 'Pending';
    }

    // Update the donation status in the database
    $update_query = "UPDATE donators SET donation_status = '$new_status' WHERE id = $donator_id";
    if ($conn->query($update_query) === TRUE) {
        // Redirect to avoid reloading the page with the action parameter
        header("Location: donators.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<div class="main-content" style="padding: 20px;">
    <div class="wrapper" style="background-color: #fff; border: 1px solid #ddd; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); max-width: 95%; margin: 0 auto;">
        <h1 style="font-size: 24px; margin-bottom: 10px;">Donators List</h1>
        <br><br>

        <!-- Table to display donations -->
        <table class="tbl-full" style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #f9f9f9; border-bottom: 2px solid #ddd;">
                    <th style="padding: 12px; font-weight: bold;">Donator ID</th>
                    <th style="padding: 12px; font-weight: bold;">Name</th>
                    <th style="padding: 12px; font-weight: bold;">Donation Amount ($)</th>
                    <th style="padding: 12px; font-weight: bold;">Donation Date</th>
                    <th style="padding: 12px; font-weight: bold;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    // SQL query to get all donations from the donators table
                    $sql = "SELECT * FROM donators";
                    $res = mysqli_query($conn, $sql);

                    if ($res == TRUE) {
                        $count = mysqli_num_rows($res);
                        if ($count > 0) {
                            while($row = mysqli_fetch_assoc($res)) {
                                $donator_id = $row['id'];
                                $name = $row['full_name'];
                                $donation_amount = $row['donation_amount'];
                                $donation_date = $row['donation_date'];
                                $donation_status = $row['donation_status'];

                                // Set button color and text based on donation status
                                if ($donation_status == 'Pending') {
                                    $status_button_color = 'yellow';
                                    $status_button_text = 'Pending';
                                } elseif ($donation_status == 'Approved') {
                                    $status_button_color = 'green';
                                    $status_button_text = 'Approved';
                                } else {
                                    $status_button_color = 'red';
                                    $status_button_text = 'Denied';
                                }
                                ?>
                                <tr style="border-bottom: 1px solid #ddd; transition: background-color 0.3s;">
                                    <td style="padding: 12px;"><?php echo $donator_id; ?></td>
                                    <td style="padding: 12px;"><?php echo $name; ?></td>
                                    <td style="padding: 12px;"><?php echo '$' . number_format($donation_amount, 2); ?></td>
                                    <td style="padding: 12px;"><?php echo $donation_date; ?></td>
                                    <td style="padding: 12px; text-align: center;">
                                        <!-- Toggle Action Menu -->
                                        <div class="dropdown">
                                            <a href="javascript:void(0);" class="dot-btn" style="display: inline-block; cursor: pointer;" onclick="toggleDropdown(<?php echo $donator_id; ?>)">
                                                <!-- Inline SVG for the 3 vertical dots -->
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="12" cy="4" r="2" fill="black"/>
                                                    <circle cx="12" cy="12" r="2" fill="black"/>
                                                    <circle cx="12" cy="20" r="2" fill="black"/>
                                                </svg>
                                            </a>
                                            <div class="dropdown-content" id="dropdown-<?php echo $donator_id; ?>" style="display: none;">
                                                <a href="?action=approve&donator_id=<?php echo $donator_id; ?>" class="dropdown-link green">Approve</a>
                                                <a href="?action=deny&donator_id=<?php echo $donator_id; ?>" class="dropdown-link red">Deny</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='5' class='error'>No Donations Yet.</td></tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    // Open and close the dropdown for each donator
    function toggleDropdown(id) {
        var actionDiv = document.getElementById("dropdown-" + id);
        // Toggle the display property
        if (actionDiv.style.display === "none" || actionDiv.style.display === "") {
            actionDiv.style.display = "block";
        } else {
            actionDiv.style.display = "none";
        }
    }

    // Close dropdowns if clicked outside
    window.onclick = function(event) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        for (var i = 0; i < dropdowns.length; i++) {
            if (!dropdowns[i].contains(event.target) && event.target !== dropdowns[i].previousElementSibling) {
                dropdowns[i].style.display = "none";
            }
        }
    }
</script>

<?php include('partials/footer.php'); ?>

<style>
/* Styling for the table and buttons */
.tbl-full {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
}

.tbl-full th, .tbl-full td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: center;
    font-size: 14px;
}

.tbl-full th {
    background-color: #f2f2f2;
}

.tbl-full td {
    background-color: #fff;
}

/* Dropdown button style */
.dot-btn {
    display: inline-block;
    cursor: pointer;
    padding: 8px;
    border-radius: 50%;
    transition: background-color 0.3s ease;
}

/* Hover effect for the dots button */
.dot-btn:hover {
    background-color: #f4f4f4;
}

/* Style for the dropdown menu */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #fff;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
    padding: 10px;
    border-radius: 5px;
    z-index: 1000;
}

.dropdown-link {
    color: #000;
    font-size: 14px;
    display: block;
    margin: 5px 0;
    text-decoration: none;
    padding: 5px 10px;
    border-radius: 4px;
    transition: background-color 0.3s ease;
}

.dropdown-link:hover {
    background-color: #f4f4f4;
}

.green {
    color: green;
}

.green:hover {
    background-color: #e0f7e0;
}

.red {
    color: red;
}

.red:hover {
    background-color: #f7e0e0;
}
</style>
