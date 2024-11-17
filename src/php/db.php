<?php

require_once 'env.php';

$host = $_ENV['DB_HOST'];
$user = $_ENV['DB_USER'];
$password = $_ENV['DB_PASSWORD'];
$database = $_ENV['DB_NAME'];
$port = $_ENV['DB_PORT'];

$conn = new mysqli($host, $user, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SHOW DATABASES");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row['Database'] . "<br>";
    }
} else {
    echo "No databases found.";
}

$result = $conn->query("SHOW TABLES");

echo "<br>Tables<br>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_array()) {
        echo $row[0] . "<br>";
    }
} else {
    echo "No tables found in the database.";
}

echo "Connected to db";
