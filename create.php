<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    $query = "INSERT INTO user (nama_lengkap, email, nomor_telepon, jenis_kelamin) VALUES ('$nama', '$email', '$nomor_telepon', '$jenis_kelamin')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Data berhasil ditambahkan!";
        header("Location: index.php"); // Redirect ke halaman utama
        exit();
    } else {
        die("Gagal menambahkan data: " . mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data</title>
</head>
<body>
    <h2>Tambah Data User</h2>
    <form method="POST">
        <label>Nama Lengkap:</label>
        <input type="text" name="nama_lengkap" required><br><br>

        <label>Email:</label>
        <input type="email" name="email" required><br><br>

        <label>Nomor Telepon:</label>
        <input type="text" name="nomor_telepon" required><br><br>

        <label>Jenis Kelamin:</label>
        <select name="jenis_kelamin" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select><br><br>

        <button type="submit" name="submit">Tambah Data</button>
    </form>
</body>
</html>
