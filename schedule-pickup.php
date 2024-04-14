<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wastemanagement"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"];
    $waste_type = isset($_POST['waste_type']) ? $_POST['waste_type'] : '';
    $select_time = isset($_POST['select_time']) ? $_POST['select_time'] : '';
    $select_date = isset($_POST['select_date']) ? $_POST['select_date'] : '';
    $address = $_POST["address"];
    $state = $_POST["state"];
    $city = $_POST["city"];
    $pincode = $_POST["pincode"];

    // SQL query to insert data into the table
    $sql = "INSERT INTO pickup_schedule (first_name, last_name, email, phone_number, waste_type, select_time, select_date, address, state, city, pincode)
    VALUES ('$first_name', '$last_name', '$email', '$phone_number', '$waste_type', '$select_time', '$select_date', '$address', '$state', '$city', '$pincode')";

if ($conn->query($sql) === TRUE) {
    // Include HTML file
    include 'schedule-submit.html';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}

// Close the database connection
$conn->close();
?>
