<?php
$koneksi = new mysqli("localhost", "root", "", "ukl_2025");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$sql = "SELECT * FROM user";
$result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD KIA</title>
</head>
<body>
    <h2>CRUD KIA</h2>

    <a href="create.php" style="padding:10px; background:green; color:white; text-decoration:none; border-radius:5px;">Tambah Data</a>
    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama Lengkap</th>
            <th>Nomor Telepon</th>
            <th>Email</th>
            <th>Password</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Registrasi</th>
            <th>Aksi</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?= $row['id_user']; ?></td>
                <td><?= $row['NamaUser']; ?></td>
                <td><?= $row['NomorTelp']; ?></td>
                <td><?= $row['Email']; ?></td>
                <td>******</td> <!-- Password disembunyikan -->
                <td><?= $row['JenisKelamin']; ?></td>
                <td><?= $row['TanggalRegistrasi']; ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id_user']; ?>" style="background:orange; color:white; padding:5px; text-decoration:none;">Edit</a>
                    <a href="hapus.php?id=<?= $row['id_user']; ?>" onclick="return confirm('Yakin ingin menghapus?');" style="background:red; color:white; padding:5px; text-decoration:none;">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php $koneksi->close(); ?>
