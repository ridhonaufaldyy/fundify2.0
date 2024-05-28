<?php
require 'koneksi.php'; 

// Mengambil data dari form
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$username = $_POST['username'];
$jabatan = $_POST['jabatan'];
$password = $_POST['password'];

// Validasi input disini (pastikan sudah sanitized untuk mencegah SQL Injection)
$fullname = $conn->real_escape_string($fullname);
$email = $conn->real_escape_string($email);
$username = $conn->real_escape_string($username);
$jabatan = $conn->real_escape_string($jabatan);
$password = $conn->real_escape_string($password);

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Menyiapkan SQL statement untuk memasukkan data ke database
$sql = "INSERT INTO akun (fullname, email, username, jabatan, password) VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if ($stmt) {
    $stmt->bind_param("sssss", $fullname, $email, $username, $jabatan, $hashed_password);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Registrasi berhasil. Silakan <a href='login.html'>login</a>.";
    } else {
        echo "Registrasi gagal: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Kesalahan: " . $conn->error;
}

$conn->close();
?>
