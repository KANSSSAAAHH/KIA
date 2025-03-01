<?php
include("koneksi.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $id = intval($id);

    $query = "SELECT * FROM user WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query gagal: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    } else {
        echo "Data tidak ditemukan.";
        exit();
    }
} else {
    echo "ID tidak ditemukan di URL.";
    exit();
}

if (isset($_POST['update'])) {
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    $updateQuery = "UPDATE user SET 
                    nama_lengkap = '$nama_lengkap', 
                    email = '$email', 
                    nomor_telepon = '$nomor_telepon', 
                    jenis_kelamin = '$jenis_kelamin' 
                    WHERE id = $id";

    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        echo "Data berhasil diperbarui!";
        header("Location: index.php"); // Redirect ke halaman utama
        exit();
    } else {
        die("Gagal memperbarui data: " . mysqli_error($conn));
    }
}
?>
