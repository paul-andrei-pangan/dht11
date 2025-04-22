<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "database";

$conn = new mysqli($hostname, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM dht22 ORDER BY id DESC"; 
$result = $conn->query($query);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data); 
$conn->close();
?>
