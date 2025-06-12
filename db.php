<?php
$servername = "localhost";
$username = "root";
$password = "Sathya@2002";
$dbname = "employee_db";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
