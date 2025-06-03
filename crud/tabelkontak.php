<?php
// Koneksi database
$conn = new mysqli("localhost", "root", "", "ukl_2025");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Update data
if (isset($_POST['update'])) {
    $id_keluhan = $_POST['id_keluhan'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    $pesan = $_POST['pesan'];

    $conn->query("UPDATE keluhan SET 
        nama='$nama',
        email='$email',
        no_telp='$no_telp',
        pesan='$pesan'
        WHERE id_keluhan=$id_keluhan
    ");
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Hapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $conn->query("DELETE FROM keluhan WHERE id_keluhan=$id");
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Ambil data untuk edit
$edit_data = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $conn->query("SELECT * FROM keluhan WHERE id_keluhan=$id");
    $edit_data = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Contact User</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * { box-sizing: border-box; }
        body { font-family: Arial, sans-serif; margin: 0; padding: 40px; background: #ecf0f1; }
        .form-container {
            max-width: 600px; background: white; padding: 20px;
            border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); margin-bottom: 30px;
        }
        table {
            width: 100%; border-collapse: collapse; background: white;
        }
        table, th, td {
            border: 1px solid #bdc3c7;
        }
        th {
            background-color: #2980b9; color: white;
        }
        th, td {
            padding: 10px; text-align: left;
        }
        .btn {
            padding: 6px 12px; text-decoration: none; border-radius: 4px;
            font-size: 14px; color: white; margin: 2px; display: inline-block;
        }
        .edit-btn { background-color: #27ae60; }
        .delete-btn { background-color: #e74c3c; }
        .back-btn { background-color: #34495e; }
    </style>
</head>
<body>

<?php if ($edit_data): ?>
    <h2>Edit Data Keluhan</h2>
    <div class="form-container">
        <form method="POST">
            <input type="hidden" name="id_keluhan" value="<?= $edit_data['id_keluhan'] ?>">

            <label>Nama:</label>
            <input type="text" name="nama" required value="<?= $edit_data['nama'] ?>"><br><br>

            <label>Email:</label>
            <input type="email" name="email" required value="<?= $edit_data['email'] ?>"><br><br>

            <label>No. Telepon:</label>
            <input type="text" name="no_telp" required value="<?= $edit_data['no_telp'] ?>"><br><br>

            <label>Pesan:</label>
            <textarea name="pesan" required rows="4" style="width: 100%;"><?= $edit_data['pesan'] ?></textarea><br><br>

            <button type="submit" class="submit-btn" name="update">Update</button>
        </form>
    </div>
<?php endif; ?>

<h2>Data Contact User</h2>
<table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>No Telp</th>
        <th>Pesan</th>
        <th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    $result = $conn->query("SELECT * FROM keluhan ORDER BY id_keluhan ASC");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$no}</td>
            <td>{$row['nama']}</td>
            <td>{$row['email']}</td>
            <td>{$row['no_telp']}</td>
            <td>{$row['pesan']}</td>
            <td>
                <a href='?edit={$row['id_keluhan']}' class='btn edit-btn'>Edit</a>
                <a href='?hapus={$row['id_keluhan']}' onclick=\"return confirm('Yakin hapus data ini?')\" class='btn delete-btn'>Delete</a>
            </td>
        </tr>";
        $no++;
    }
    ?>
</table>

<br>
<a href="../crud/index.php" class="btn back-btn">← Kembali</a>

</body>
</html>
