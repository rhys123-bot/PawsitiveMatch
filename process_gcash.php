<?php
// process_gcash.php

// Check if the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Check if 'donation_amount' is set and not empty
    if (isset($_POST['donation_amount']) && !empty($_POST['donation_amount'])) {
        $donation_amount = $_POST['donation_amount'];  // Donation amount
    } else {
        die("Donation amount is required.");
    }

    // Get other values from the POST data (form submission)
    $full_name = $_POST['gcash_name'];  // Donor's full name
    $email = $_POST['gcash_email'];  // Donor's email address
    $phone = $_POST['gcash_phone'];  // Donor's phone number
    $reference_number = $_POST['gcash_reference'];  // Reference number for the donation
    
    // Handling file upload (screenshot)
    if (isset($_FILES['gcash_screenshot'])) {
        $screenshot = $_FILES['gcash_screenshot'];
        $upload_dir = 'uploads/';  // Directory where the screenshot will be saved
        $upload_file = $upload_dir . basename($screenshot['name']);
        
        // Validate file upload (check file type, size)
        if ($screenshot['size'] < 5000000 && in_array(pathinfo($upload_file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif'])) {
            if (move_uploaded_file($screenshot['tmp_name'], $upload_file)) {
                // Save data to the database
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "drool_db";  // Database name

                // Create connection to the database
                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Insert donation data and donator info into the 'donators' table
                // Using the correct column name 'donation_amount' instead of 'amount'
                $stmt = $conn->prepare("INSERT INTO donators (donation_amount, payment_method, full_name, email, phone, reference_number, screenshot) 
                                        VALUES (?, 'gcash', ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssss", $donation_amount, $full_name, $email, $phone, $reference_number, $upload_file);

                // Execute the query and check for success
                if ($stmt->execute()) {
                    // Success message with styling
                    echo '<div style="padding: 20px; background-color: #28a745; color: white; font-size: 18px; border-radius: 8px; text-align: center; margin-top: 20px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
                            Payment details saved successfully. Thank you for your donation!
                          </div>';
                } else {
                    echo "Error: " . $stmt->error;
                }

                $stmt->close();
                $conn->close();
            } else {
                echo "File upload failed.";
            }
        } else {
            echo "Invalid file type or file size too large.";
        }
    } else {
        echo "No screenshot uploaded.";
    }
} else {
    echo "Invalid request method.";
}
?>
