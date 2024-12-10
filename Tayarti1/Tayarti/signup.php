<?php

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tayarti";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$email = $_POST['email'];
$fullname = $_POST['fullname'];
$username = $_POST['uid'];
$password = $_POST['password'];

// Insert the data into the database
$sql = "INSERT INTO users (userEmail, userName, userUID, userPWD) VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param('ssss',$email, $fullname, $password);
$result = $stmt->execute();

if ($result) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();

header("Location: index.html")

?>
