<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "soltech"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt password

    // SQL query to insert data
    $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "User registered successfully!";
        sleep(5);
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>