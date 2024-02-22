<?php
// Create 4 variables to store these information
$server = "localhost";
$username = "u991535966_shared_infits";
$password = "Teaminfits@123";
$database = "u991535966_shared_infits";
// Create connection
$conn = new mysqli($server, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
