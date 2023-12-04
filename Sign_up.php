<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Establish database connection
$host = "localhost:3307";
$username = "root";
$password = "";
$database = "design_platform";

$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['pass'])) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);

    // Insert data into users table
    $sql = "INSERT INTO `users`(`full_name`, `email`, `pass`) VALUES (?,?,?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $pass);

    if (mysqli_stmt_execute($stmt)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }

    // Close statement
    mysqli_stmt_close($stmt);
} else {
    echo "Error: Form data not received.";
}

// Close connection
mysqli_close($conn);
?>