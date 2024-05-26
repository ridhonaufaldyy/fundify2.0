<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "fundify";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
    echo("Connect");
}

