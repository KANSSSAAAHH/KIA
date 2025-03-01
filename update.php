<?php
include '../config/database.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$nomor_telepon = $_POST['nomor_telepon'];
$email = $_POST['email'];
$jenis_kelamin = $_POST['jenis_kelamin'];

$query = "UPDATE users SET nama='$nama', nomor_telepon='$nomor_telepon', email='$email', jenis_kelamin='$jenis_kelamin' WHERE id='$id'";

if ($conn->query($query) === TRUE) {
    header("Location: ../views/index.php");
} else {
    echo "Error updating record: " . $conn->error;
}
?>
