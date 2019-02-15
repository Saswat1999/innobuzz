<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inno";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE rawdata ( 
stationname VARCHAR(30) NOT NULL,
cityname VARCHAR(30) NOT NULL,
location REAL,
flag int(3),
reg_date TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table rawdata created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
