<?php
// process_payment.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $payment_method = $_POST['payment_method'];
    $donation_id = $_POST['donation_id'];
    $amount = $_POST['amount'];

    // Save donation info to the database
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

    // Insert donation record into the database
    $stmt = $conn->prepare("INSERT INTO donations (donation_id, amount, payment_method) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $donation_id, $amount, $payment_method);

    if ($stmt->execute()) {
        // Payment method processing (this is where you'd integrate PayPal/GCash API)
        if ($payment_method == 'gcash') {
            // Redirect or handle GCash payment
            header("Location: https://gcash-redirect-url.com?donation_id=$donation_id&amount=$amount");
        } elseif ($payment_method == 'paypal') {
            // Redirect to PayPal payment page
            header("Location: https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=your-business-email&amount=$amount&item_name=Donation&id=$donation_id");
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
