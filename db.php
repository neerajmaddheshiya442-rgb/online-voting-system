<?php
$servername = "localhost";
$username = "root";
$password = "";   // password blank hai
$dbname = "voting_system";
$port = 3307;     // important (tumhare system me 3307 hai)

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
