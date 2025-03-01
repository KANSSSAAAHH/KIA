<?php
// CREATE - Tambah User
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["tambah"])) {
    $nama = $_POST["NamaUser"];
    $nomor = $_POST["NomorTelp"];
    $email = $_POST["Email"];
    $password = $_POST["Password"];
    $jenis_kelamin = $_POST["JenisKelamin"];
    $tanggal = date("Y-m-d H:i:s");

    $sql = "INSERT INTO user (NamaUser, NomorTelp, Email, Password, JenisKelamin, TanggalRegistrasi) VALUES ('$nama', '$nomor', '$email', '$password', '$jenis_kelamin', '$tanggal')";
    $conn->query($sql);
}

// DELETE - Hapus User
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $conn->query("DELETE FROM user WHERE id=$id");
}

// READ - Tampilkan User
$result = $conn->query("SELECT * FROM user");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD User</title>
</head>
<body>
    <h2>Daftar User</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Nomor Telepon</th>
            <th>Email</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Registrasi</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["NamaUser"] ?></td>
                <td><?= $row["NomorTelp"] ?></td>
                <td><?= $row["Email"] ?></td>
                <td><?= $row["JenisKelamin"] ?></td>
                <td><?= $row["TanggalRegistrasi"] ?></td>
                <td>
                    <a href="?hapus=<?= $row['id'] ?>">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    
    <h2>Tambah User</h2>
    <form method="POST">
        <input type="text" name="NamaUser" placeholder="Nama" required>
        <input type="text" name="NomorTelp" placeholder="Nomor Telepon" required>
        <input type="email" name="Email" placeholder="Email" required>
        <input type="password" name="Password" placeholder="Password" required>
        <select name="JenisKelamin" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
        <button type="submit" name="tambah">Tambah</button>
    </form>
</body>
</html>

<?php $conn->close(); ?>
