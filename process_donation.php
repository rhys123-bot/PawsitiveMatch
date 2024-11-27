<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "drool_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$full_name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$amount = $_POST['amount'];  // Donation amount

// Step 1: Insert donation info directly into the donators table
$sql_donator = "INSERT INTO donators (full_name, phone, email, donation_amount) VALUES (?, ?, ?, ?)";
$stmt_donator = $conn->prepare($sql_donator);

if ($stmt_donator === false) {
    die('Error in preparing donation statement: ' . $conn->error);
}

$stmt_donator->bind_param("ssss", $full_name, $phone, $email, $amount);  // Bind parameters (name, phone, email, donation_amount)
$stmt_donator->execute();  // Execute the statement

// Success message
echo "Thank you for your donation, $full_name! Your donation of \$$amount has been successfully received.";

// Close the statement and connection
$stmt_donator->close();
$conn->close();
?>
