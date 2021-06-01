<?php
$servername = "localhost:8111";
$username = "root";
$password = "";
$database = "food_order";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("<p>Database <b><i>$database</i></b> couldn't found</p> " . $conn->connect_error);
} 


?>