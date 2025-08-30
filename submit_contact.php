<?php
$servername = "localhost";
$username = "root";  // Change if necessary
$password = "";  // Change if necessary
$dbname = "bhumiecom";  // Ensure this matches your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data and sanitize inputs
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$message = mysqli_real_escape_string($conn, $_POST['message']);

// Insert data into contacts table
$sql = "INSERT INTO contacts (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";

if ($conn->query($sql) === TRUE) {
    header("Location: contact.php?success=1"); // Redirect to contact.php with a success message
    exit();
} else {
    header("Location: contact.php?error=1"); // Redirect to contact.php with an error message
    exit();
}


// Close connection
$conn->close();
?>
