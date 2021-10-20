<?php
ini_set('display_errors', 1);

session_start();

//connect.php
$server = 'localhost';
$username   = 'root';
$password   = 'root';
$database   = 'Forum';
$port = 8889;
 
// Create connection
$conn = mysqli_connect($server, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else
{
    echo "Connected successfully";
}

?>
		
		