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

$sql = "SELECT stationname, cityname, location, flag FROM rawdata";

if ($conn->query($sql) === TRUE) {
	include updatedata.php;
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
