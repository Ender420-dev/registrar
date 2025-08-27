<?php
$host = "localhost:3307";  // XAMPP default
$user = "root";       // XAMPP default user
$pass = "";           // XAMPP default password
$db   = "registrar";       // change to your DB name

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
