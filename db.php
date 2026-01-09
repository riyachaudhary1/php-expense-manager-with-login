<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "spendwise";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start the session on every page that uses this file
session_start();
?>