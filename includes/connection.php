<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "math_game";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connectie gefaald: " . $conn->connect_error);
}