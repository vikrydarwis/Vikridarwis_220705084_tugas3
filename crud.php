<?php
// Include file db.php untuk koneksi database
require_once 'db.php';

// Query untuk mengambil data dari tabel peserta
$query = "SELECT * FROM peserta";

try {
    // Eksekusi query
    $result = $conn->query($query);

    // Header HTML
    echo "<!DOCTYPE html>
    <html lang='id'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Data Peserta - Lomba Vokalist Musik</title>
        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                margin: 0;
                padding: 0;
                background: linear-gradient(135deg, #ff9a85, #ff6f61);
                color: #333;
            }
            header {
                background-color: #333;
                color: white;
                text-align: center;
                padding: 1em 0;
                margin-bottom: 2em;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            header h1 {
                font-size: 2.5em;
                margin: 0;
            }
            .container {
                width: 90%;
                margin: 0 auto;
                background: white;
                padding: 2em;
                border-radius: 10px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 2em;
            }
            th, td {
                padding: 15px;
                text-align: left;
            }
            th {
                background: #ff6f61;
                color: white;
            }
            tr:nth-child(even) {
                background-color: #f9f9f9;
            }
            tr:hover {
                background-color: #ffe6e2;
            }
            footer {
                text-align: center;
                margin-top: 2em;
                padding: 1em 0;
                background-color: #333;
                color: white;
            }
            .no-data {
                text-align: center;
                margin: 2em 0;
                font-size: 1.2em;
                color: #555;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>Data Peserta Lomba Vokalist Musik</h1>
        </header>
        <div class='container'>";

    // Periksa apakah query berhasil
    if ($result->num_rows > 0) {
        // Tampilkan data dalam tabel HTML
        echo "<table border='1'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nama</th>";
        echo "<th>Email</th>";
        echo "<th>Telepon</th>";
        echo "<th>Cabang</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        // Loop untuk menampilkan data
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nama'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['telepon'] . "</td>";
            echo "<td>" . $row['cabang'] . "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        // Pesan jika tidak ada data
        echo "<p class='no-data'>Tidak ada data peserta yang ditemukan.</p>";
    }

    // Footer HTML
    echo "</div>
        <footer>
            <p>&copy; 2024 Panitia Lomba Vokalist Musik. Semua Hak Dilindungi.</p>
        </footer>
    </body>
    </html>";
} catch (Exception $e) {
    // Tangkap error jika ada
    die("Terjadi kesalahan: " . $e->getMessage());
}

// Tutup koneksi database
$conn->close();
?>
