<?php
// Koneksi database
$conn = new mysqli("localhost", "root", "", "ukl_2025");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Update data
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $pilihan_pengambilan = $_POST['pilihan_pengambilan'];
    $nama_kepala_keluarga = $_POST['nama_kepala_keluarga'];
    $nama_pemohon = $_POST['nama_pemohon'];
    $email_pemohon = $_POST['email_pemohon'];
    $desa_kelurahan = $_POST['desa_kelurahan'];
    $kecamatan = $_POST['kecamatan'];
    $kabupaten_kota = $_POST['kabupaten_kota'];
    $provinsi = $_POST['provinsi'];

    $conn->query("UPDATE pengambilan SET 
        pilihan_pengambilan='$pilihan_pengambilan',
        nama_kepala_keluarga='$nama_kepala_keluarga',
        nama_pemohon='$nama_pemohon',
        email_pemohon='$email_pemohon',
        desa_kelurahan='$desa_kelurahan',
        kecamatan='$kecamatan',
        kabupaten_kota='$kabupaten_kota',
        provinsi='$provinsi'
        WHERE id=$id
    ");
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Hapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $conn->query("DELETE FROM pengambilan WHERE id=$id");
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Ambil data untuk edit
$edit_data = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $conn->query("SELECT * FROM pengambilan WHERE id=$id");
    $edit_data = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pengambilan</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            box-sizing: border-box;
        }
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
        }
        body {
            display: flex;
            min-height: 100vh;
        }
        .main-content {
            flex: 1;
            padding: 40px;
            background-color: #ecf0f1;
            overflow-y: auto;
        }
        .form-container {
            max-width: 700px;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
            margin-bottom: 40px;
        }
        .submit-btn {
            background-color: #3498db;
            border: none;
            color: white;
            padding: 10px 16px;
            cursor: pointer;
            border-radius: 4px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }
        table, th, td {
            border: 1px solid #bdc3c7;
        }
        th {
            background-color: #2980b9;
            color: white;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .btn {
            padding: 6px 12px;
            text-decoration: none;
            border-radius: 4px;
            margin: 2px;
            font-size: 14px;
            color: white;
            display: inline-block;
        }
        .edit-btn {
            background-color: #27ae60;
        }
        .delete-btn {
            background-color: #e74c3c;
        }
        .back-btn {
            background-color: #34495e;
        }
    </style>
</head>
<body>

<div class="main-content">
    <?php if ($edit_data): ?>
    <h2>Edit Data Pengambilan</h2>
    <div class="form-container">
        <form method="POST">
            <input type="hidden" name="id" value="<?= $edit_data['id'] ?>">

            <label>Pilihan Pengambilan:</label>
            <input type="text" name="pilihan_pengambilan" required value="<?= $edit_data['pilihan_pengambilan'] ?>">

            <label>Nama Kepala Keluarga:</label>
            <input type="text" name="nama_kepala_keluarga" required value="<?= $edit_data['nama_kepala_keluarga'] ?>">

            <label>Nama Pemohon:</label>
            <input type="text" name="nama_pemohon" required value="<?= $edit_data['nama_pemohon'] ?>">

            <label>Email Pemohon:</label>
            <input type="email" name="email_pemohon" required value="<?= $edit_data['email_pemohon'] ?>">

            <label>Desa/Kelurahan:</label>
            <input type="text" name="desa_kelurahan" required value="<?= $edit_data['desa_kelurahan'] ?>">

            <label>Kecamatan:</label>
            <input type="text" name="kecamatan" required value="<?= $edit_data['kecamatan'] ?>">

            <label>Kabupaten/Kota:</label>
            <input type="text" name="kabupaten_kota" required value="<?= $edit_data['kabupaten_kota'] ?>">

            <label>Provinsi:</label>
            <input type="text" name="provinsi" required value="<?= $edit_data['provinsi'] ?>">

            <button type="submit" class="submit-btn" name="update">Update</button>
        </form>
    </div>
    <?php endif; ?>

    <h2>Data Pengambilan</h2>
    <table>
        <tr>
            <th>No</th>
            <th>Pilihan Pengambilan</th>
            <th>Nama Kepala Keluarga</th>
            <th>Nama Pemohon</th>
            <th>Email Pemohon</th>
            <th>Desa/Kelurahan</th>
            <th>Kecamatan</th>
            <th>Kabupaten/Kota</th>
            <th>Provinsi</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        $result = $conn->query("SELECT * FROM pengambilan ORDER BY id ASC");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$no}</td>
                <td>{$row['pilihan_pengambilan']}</td>
                <td>{$row['nama_kepala_keluarga']}</td>
                <td>{$row['nama_pemohon']}</td>
                <td>{$row['email_pemohon']}</td>
                <td>{$row['desa_kelurahan']}</td>
                <td>{$row['kecamatan']}</td>
                <td>{$row['kabupaten_kota']}</td>
                <td>{$row['provinsi']}</td>
                <td>
                    <a href='?edit={$row['id']}' class='btn edit-btn'>Edit</a>
                    <a href='?hapus={$row['id']}' onclick=\"return confirm('Yakin hapus data ini?')\" class='btn delete-btn'>Delete</a>
                </td>
            </tr>";
            $no++;
        }
        ?>
    </table>

    <br>
    <a href="../crud/index.php" class="btn back-btn">← Kembali</a>
</div>

</body>
</html>