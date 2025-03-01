<?php
include 'index.php';

// Ambil data dari database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP - List Pengguna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Daftar Pengguna</h2>
    <a href="create.php">+ Tambah Pengguna</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Lengkap</th>
            <th>Nomor Telp</th>
            <th>Email</th>
            <th>Password</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Registrasi</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$no++."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['email']."</td>
                    <td>
                        <a href='edit.php?id=".$row['id']."'>Edit</a> |
                        <a href='delete.php?id=".$row['id']."' onclick='return confirm(\"Yakin hapus?\")'>Hapus</a>
                    </td>
                </tr>";
        }
        ?>
    </table>
</body>
</html>
