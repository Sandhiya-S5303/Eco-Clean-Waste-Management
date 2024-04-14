<?php
// Establish database connection
$servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "root"; // Change this if you have a different username
$password = ""; // Change this if you have set a password for your database
$dbname = "wastemanagement";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"];
    $message = $_POST["message"];

    // Insert data into database
    $sql = "INSERT INTO messages (first_name, last_name, email, phone_number, message)
    VALUES ('$first_name', '$last_name', '$email', '$phone_number', '$message')";

if ($conn->query($sql) === TRUE) {
    // If message sent successfully, redirect to a thank you page
    header("Location: message-submit.html");
    exit(); // Ensure script execution stops after redirection
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

// Close connection
$conn->close();
?>
