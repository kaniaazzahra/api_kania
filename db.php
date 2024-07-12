<?php
$servername = "localhost";
$username = "mobw7774_user_kania";
$password = "@kania20";
$dbname = "mobw7774_api_kania";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
