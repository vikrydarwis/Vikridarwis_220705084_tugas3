<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data vocalist berdasarkan ID
    $sql = "SELECT * FROM vocalist WHERE id = $id";
    $result = $conn->query($sql);

    // Jika data vocalist ditemukan
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data vocalist tidak ditemukan!";
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $genre = $_POST['genre']; // Mengganti cabang ke genre musik
    $umur = $_POST['umur'];
    $email = $_POST['email']; 
    $telepon = $_POST['telepon'];

    // Update data vocalist
    $sql = "UPDATE vocalist SET nama = '$nama', genre = '$genre', umur = $umur, email = '$email', telepon = '$telepon' WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: crud.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Vocalist</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f9;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin: 10px 0 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"], input[type="email"] {
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            padding: 10px;
            background-color: #ff9a85;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #ff6f61;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Edit Data Vocalist</h1>
        <form action="edit.php?id=<?= $row['id'] ?>" method="POST">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="<?= $row['nama'] ?>" required>

            <label for="genre">Genre Musik:</label>
            <input type="text" id="genre" name="genre" value="<?= $row['genre'] ?>" required>

            <label for="umur">Umur:</label>
            <input type="number" id="umur" name="umur" value="<?= $row['umur'] ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= $row['email'] ?>" required>

            <label for="telepon">Telepon:</label>
            <input type="text" id="telepon" name="telepon" value="<?= $row['telepon'] ?>" required>

            <button type="submit">Simpan Perubahan</button>
        </form>
    </div>

</body>
</html>
