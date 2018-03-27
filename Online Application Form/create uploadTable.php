<?php
$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "tryDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE uploadTable (
id INT UNSIGNED AUTO_INCREMENT,
passportNum VARCHAR(30) NOT NULL,
PRIMARY KEY(id)
)";

if ($conn->query($sql) === TRUE) {
    echo "uploadTable created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
