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

$sql = "UPDATE rawdata SET flag='$flag' WHERE location='$point'";

if ($conn->query($sql) === TRUE) {
    include 'insertdetect.php';
    echo " ";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
