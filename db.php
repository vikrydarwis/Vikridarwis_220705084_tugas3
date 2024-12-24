<?php
// Konfigurasi database
$host = 'localhost'; // Nama host, biasanya 'localhost'
$user = 'root'; // Username database, default untuk XAMPP adalah 'root'
$password = ''; // Password database, default untuk XAMPP adalah kosong
$database = 'lomba_vocalist_musik'; // Nama database Anda

// Koneksi ke database menggunakan MySQLi
$conn = new mysqli($host, $user, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Pesan jika koneksi berhasil
// echo "Koneksi berhasil";
?>
