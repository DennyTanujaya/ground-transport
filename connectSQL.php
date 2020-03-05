<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourplan";

// Create connection
$pdo = new PDO('mysql:host='.$servername.';dbname='.$dbname, $username, $password);
?>