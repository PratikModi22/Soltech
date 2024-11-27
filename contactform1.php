<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "soltech"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email']; // Assuming 'address' is meant to store email
$products = mysqli_real_escape_string ($conn, $_POST['products']); // Use the correct name from the select field
$query = $_POST['query'];

// SQL query to insert data
$sql = "INSERT INTO contactform (name, phone, email, products, query) 
        VALUES ('$name', '$phone', '$email', '$products', '$query')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "Record added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
