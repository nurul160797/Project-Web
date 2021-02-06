<?php
//connect to db
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "internship";

$conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>