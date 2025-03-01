<?php
include 'koneksi.php';

// Tambah User
if (isset($_POST['tambah'])) {
    $nama = $_POST['NamaUser'];
    $telepon = $_POST['NomorTelp'];
    $email = $_POST['Email'];
    $jenis_kelamin = $_POST['JenisKelamin'];
    $tanggal_registrasi = $_POST['TanggalRegistrasi'];

    $sql = "INSERT INTO user (NamaUser, NomorTelp, Email, JenisKelamin, TanggalRegistrasi) VALUES ('$nama', '$telepon', '$email', '$jenis_kelamin', '$tanggal_registrasi')";
    $conn->query($sql);
    header('Location: index.php');
}

// Hapus User
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $conn->query("DELETE FROM user WHERE id=$id");
    header('Location: index.php');
}

// Update User
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['NamaUser'];
    $telepon = $_POST['NomorTelp'];
    $email = $_POST['Email'];
    $jenis_kelamin = $_POST['JenisKelamin'];
    $tanggal_registrasi = $_POST['TanggalRegistrasi'];

    $sql = "UPDATE user SET NamaUser='$nama', NomorTelp='$telepon', Email='$email', JenisKelamin='$jenis_kelamin', TanggalRegistrasi='$tanggal_registrasi' WHERE id=$id";
    $conn->query($sql);
    header('Location: index.php');
}

// Ambil semua user dari database
$sql = "SELECT * FROM user";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD User</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>
<body>
    <h2>Data User</h2>
    <button onclick="document.getElementById('tambahModal').style.display='block'">Tambah User</button>
    <table id="userTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Nomor Telepon</th>
                <th>Email</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Registrasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['NamaUser'] ?></td>
                    <td><?= $row['NomorTelp'] ?></td>
                    <td><?= $row['Email'] ?></td>
                    <td><?= $row['JenisKelamin'] ?></td>
                    <td><?= $row['TanggalRegistrasi'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                        <a href="index.php?hapus=<?= $row['id'] ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <div id="tambahModal" style="display:none;">
        <form method="POST">
            <input type="text" name="NamaUser" placeholder="Nama" required>
            <input type="text" name="NomorTelp" placeholder="Nomor Telepon" required>
            <input type="email" name="Email" placeholder="Email" required>
            <select name="JenisKelamin" required>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <input type="date" name="TanggalRegistrasi" required>
            <button type="submit" name="tambah">Tambah</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
        });
    </script>
</body>
</html>
