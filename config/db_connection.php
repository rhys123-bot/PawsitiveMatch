<?php 
    //Start Session
    session_start();

    //Create Constants to Store Non Repeating Values
    define('SITEURL', 'http://localhost:80/PawsitiveMatch/');
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'drool_db');
    
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($conn)); //Database Connection
    $db_select = mysqli_select_db($conn, DB_DATABASE) or die(mysqli_error($conn)); //Selecting Database
?>
