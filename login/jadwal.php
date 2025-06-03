<?php
include 'koneksi.php';

$tanggal = $_POST['tanggal_pelayanan'];
$mulai   = $_POST['jam_mulai'];
$selesai = $_POST['jam_selesai'];
$kuota   = $_POST['kuota'];
$ket     = $_POST['keterangan'];

$sql = "INSERT INTO jadwal_pelayanan (tanggal_pelayanan, jam_mulai, jam_selesai, kuota, keterangan)
        VALUES ('$tanggal', '$mulai', '$selesai', '$kuota', '$ket')";

mysqli_query($koneksi, $sql);
header("Location: kelola_jadwal.php");
?>

<!-- kelola_jadwal.php -->
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Jadwal Pelayanan</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f1f5f9;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .form-container {
      background: #fff;
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      width: 400px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #2c3e50;
    }

    label {
      display: block;
      margin-top: 15px;
      font-weight: 600;
      color: #333;
    }

    input[type="date"],
    input[type="time"],
    input[type="number"],
    input[type="text"] {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 8px;
      box-sizing: border-box;
    }

    button {
      width: 100%;
      margin-top: 20px;
      padding: 12px;
      background-color: #3498db;
      border: none;
      color: white;
      font-weight: bold;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s;
    }

    button:hover {
      background-color: #2980b9;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Tambah Jadwal Pelayanan</h2>
    <form method="POST" action="simpan_jadwal.php">
      <label>Tanggal:</label>
      <input type="date" name="tanggal_pelayanan" required>

      <label>Jam Mulai:</label>
      <input type="time" name="jam_mulai" required>

      <label>Jam Selesai:</label>
      <input type="time" name="jam_selesai" required>

      <label>Kuota:</label>
      <input type="number" name="kuota" required>

      <label>Keterangan:</label>
      <input type="text" name="keterangan">

      <button type="submit">Simpan Jadwal</button>
    </form>
  </div>
</body>
</html>
