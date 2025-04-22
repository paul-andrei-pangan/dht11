<?php
$hostname = "localhost";
$username = "u520535046_iot";
$password = "7ZyhEQ~k@";
$database = "u520535046_iot";

// Create a connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch the latest data
$query = "SELECT temperature, humidity, gas, datetime FROM dht22 ORDER BY id DESC LIMIT 1";
$result = $conn->query($query);

// Check if the query was successful
if (!$result) {
    die("Error in query: " . $conn->error);
}

// Fetch the result
$data = $result->fetch_assoc();

// Return the result as JSON
echo json_encode($data);

// Close the database connection
$conn->close();
?>
