<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form fields (you can add more validation as needed)
    $errors = [];
    $fname = $_POST['fname'] ?? '';
    $lname = $_POST['lname'] ?? '';
    $mobile = $_POST['mobile'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['pwd'] ?? '';
    $confirmPassword = $_POST['confirm_pwd'] ?? '';
    $address = $_POST['address'] ?? '';

    // Example: Check if passwords match
    if ($password != $confirmPassword) {
        $errors[] = "Passwords do not match";
    }

    // If there are no errors, proceed with database checks and insertion
    if (empty($errors)) {
        // Connect to your database (replace 'hostname', 'username', 'password', and 'database' with your actual credentials)
        $conn = new mysqli("localhost", "root", "", "drool_db");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check for duplicate email
        $email_check_sql = "SELECT * FROM users WHERE email='$email'";
        $email_check_res = $conn->query($email_check_sql);
        if ($email_check_res->num_rows > 0) {
            $errors[] = "Email already exists";
        }

        // Check for duplicate mobile number
        $mobile_check_sql = "SELECT * FROM users WHERE contact_number='$mobile'";
        $mobile_check_res = $conn->query($mobile_check_sql);
        if ($mobile_check_res->num_rows > 0) {
            $errors[] = "Mobile number already exists";
        }

        // If there are no duplicate entries, insert the new user
        if (empty($errors)) {
            // Prepare SQL statement to insert data into the database
            $sql = "INSERT INTO users (first_name, last_name, contact_number, email, password, address) 
                    VALUES ('$fname', '$lname', '$mobile', '$email', '$password', '$address')";

            if ($conn->query($sql) === TRUE) {
                echo '<script>alert("Registration Successful..");';
                echo 'window.location.href="' . 'http://localhost:80/PawsitiveMatch/register.html' . '";</script>';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            // Output errors
            foreach ($errors as $error) {
                //popup alert
                echo "<script>alert('$error');</script>";
                //header location
                echo "<script>location.href='register.html';</script>";
                //echo $error . "<br>";
            }
        }

        // Close database connection
        $conn->close();
    } else {
        // Output errors
        foreach ($errors as $error) {
            //popup alert
            echo "<script>alert('$error');</script>";
            //header location
            echo "<script>location.href='register.html';</script>";
            //echo $error . "<br>";
        }
    }
}
?>
