<?php
include '../config/database.php';

$nama = $_POST['nama'];
$nomor_telepon = $_POST['nomor_telepon'];
$email = $_POST['email'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tanggal_registrasi = $_POST['tanggal_registrasi'];

$query = "INSERT INTO users (nama, nomor_telepon, email, jenis_kelamin, tanggal_registrasi) 
          VALUES ('$nama', '$nomor_telepon', '$email', '$jenis_kelamin', '$tanggal_registrasi')";

if ($conn->query($query) === TRUE) {
    header("Location: ../views/index.php");
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
?>
