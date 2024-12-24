<?php
// Include file koneksi database
include 'db.php';

// Cek apakah form telah dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $nama = $_POST['nama'] ?? '';
    $umur = $_POST['umur'] ?? '';
    $email = $_POST['email'] ?? '';
    $telepon = $_POST['telepon'] ?? '';
    $cabang_lomba = $_POST['cabang'] ?? '';
    $tanggal_pendaftaran = date('Y-m-d'); // Tanggal otomatis

    // Validasi sederhana
    if (empty($nama) || empty($umur) || empty($email) || empty($telepon) || empty($cabang_lomba)) {
        die("Semua field harus diisi!");
    }

    // Simpan data ke database
    $sql = "INSERT INTO pendaftaran (nama, umur, email, telepon, cabang_lomba, tanggal_pendaftaran) 
            VALUES ('$nama', '$umur', '$email', '$telepon', '$cabang_lomba', '$tanggal_pendaftaran')";

    if ($conn->query($sql) === TRUE) {
        echo "Pendaftaran berhasil! <a href='crud.php'>Lihat data peserta</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    die("Akses ditolak. Form tidak dikirim melalui metode POST.");
}

// Tutup koneksi
$conn->close();
?>
