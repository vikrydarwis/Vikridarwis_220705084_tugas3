<?php
require 'db.php';

// Mendapatkan ID dari parameter URL
$id = $_GET['id'];

// Query untuk menghapus data berdasarkan ID
$sql = "DELETE FROM vocalist WHERE id = $id";

if ($conn->query($sql)) {
    // Redirect ke halaman utama setelah penghapusan berhasil
    header("Location: crud.php");
    exit();
} else {
    // Menampilkan pesan error jika ada masalah
    echo "Error: " . $conn->error;
}
?>
