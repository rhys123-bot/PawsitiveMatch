<?php 
include('./config/db_connection.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];
    $email = $_POST['email_login'] ?? '';
    $password = $_POST['pwd_login'] ?? '';

    // Check for empty fields
    if (empty($email) || empty($password)) {
        $errors[] = 'Please fill in both fields.';
    }

    if (empty($errors)) {
        // Use prepared statements to avoid SQL injection
        $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // User authenticated successfully
            $user_data = $result->fetch_assoc();
            $_SESSION['userID'] = $user_data['id']; // Store user ID in session
            $_SESSION['userName'] = $user_data['first_name']; // Store user name in session

            echo '<script>alert("Login Successful!");';
            echo 'window.location.href="http://localhost:80/PawsitiveMatch/dashbord/";</script>';
            exit;
        } else {
            // User authentication failed
            echo "<script>alert('Invalid email or password');</script>";
            echo "<script>location.href='login.html';</script>";
        }

        $stmt->close();
    } else {
        // Display errors if any
        foreach ($errors as $error) {
            echo "<script>alert('$error');</script>";
        }
    }

    // Close database connection
    $conn->close();
}
?>
