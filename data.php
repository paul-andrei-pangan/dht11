<?php
$hostname = "localhost";
$username = "u520535046_iot";
$password = "Panganpaul09+";
$database = "u520535046_iot";

// Create connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve POST data
$temperature = $_POST['temperature'] ?? null;
$humidity = $_POST['humidity'] ?? null;
$gas = $_POST['gas'] ?? null;

if ($temperature !== null && $humidity !== null && $gas !== null) {
    $stmt = $conn->prepare("INSERT INTO dht22 (temperature, humidity, gas, datetime) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("ddd", $temperature, $humidity, $gas);

    if ($stmt->execute()) {
        echo "Data saved successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid data received.";
}

$conn->close();
?>
