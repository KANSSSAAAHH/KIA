<?php
include '../config/database.php';
$id = $_GET['id'];
$query = "SELECT * FROM users WHERE id='$id'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
    <div class="container">
        <h2>Edit User</h2>
        <form action="../actions/update.php" method="POST">
            <input type="hidden" name="id" value="<?= $row['id']; ?>">

            <label>Nama:</label>
            <input type="text" name="nama" value="<?= $row['nama']; ?>" required>

            <label>Nomor Telepon:</label>
            <input type="text" name="nomor_telepon" value="<?= $row['nomor_telepon']; ?>" required>

            <label>Email:</label>
            <input type="email" name="email" value="<?= $row['email']; ?>" required>

            <label>Jenis Kelamin:</label>
            <select name="jenis_kelamin">
                <option value="Laki-laki" <?= ($row['jenis_kelamin'] == "Laki-laki") ? "selected" : ""; ?>>Laki-laki</option>
                <option value="Perempuan" <?= ($row['jenis_kelamin'] == "Perempuan") ? "selected" : ""; ?>>Perempuan</option>
            </select>

            <button type="submit" class="btn btn-edit">Update</button>
            <a href="index.php" class="btn">Kembali</a>
        </form>
    </div>
</body>
</html>
