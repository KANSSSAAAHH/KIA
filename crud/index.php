<?php
session_start();

$pesan = '';

// Cek apakah user role Admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Admin') {
    echo "<p style='color:red; padding:10px;'>Akses ditolak. Anda bukan Admin.</p>";
    exit;
}

$conn = new mysqli("localhost", "root", "", "ukl_2025");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses update data
if (isset($_POST['update'])) {
    $stmt = $conn->prepare("UPDATE pendaftaran SET username=?, password=?, role=?, nama_lengkap_anak=?, nama_orang_tua=?, alamat=? WHERE id_pendaftaran=?");
    $stmt->bind_param(
        "ssssssi",
        $_POST['username'],
        $_POST['password'],
        $_POST['role'],
        $_POST['nama_lengkap_anak'],
        $_POST['nama_orang_tua'],
        $_POST['alamat'],
        $_POST['id_pendaftaran']
    );
    if ($stmt->execute()) {
        $pesan = "✅ Data berhasil diperbarui!";
    } else {
        $pesan = "❌ Gagal memperbarui data.";
    }
    $stmt->close();
}

// Proses hapus data
if (isset($_GET['hapus'])) {
    $hapus_id = intval($_GET['hapus']);
    if ($conn->query("DELETE FROM pendaftaran WHERE id_pendaftaran=$hapus_id")) {
        $pesan = "🗑️ Data berhasil dihapus!";
    } else {
        $pesan = "❌ Gagal menghapus data.";
    }
}

// Ambil data untuk edit
$edit_data = null;
if (isset($_GET['edit'])) {
    $stmt = $conn->prepare("SELECT * FROM pendaftaran WHERE id_pendaftaran=?");
    $stmt->bind_param("i", $_GET['edit']);
    $stmt->execute();
    $edit_data = $stmt->get_result()->fetch_assoc();
    $stmt->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #ecf0f1;
            display: flex;
        }
        .sidebar {
            width: 240px;
            background-color: #2c3e50;
            color: white;
            height: 100vh;
            padding: 20px;
            position: fixed;
        }
        .sidebar h2 {
            margin-bottom: 20px;
        }
        .sidebar a {
            display: block;
            color: white;
            padding: 10px 0;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #34495e;
        }
        .dropdown {
            position: relative;
        }
        .dropdown .dropdown-content {
            display: none;
            background-color: #34495e;
            padding-left: 10px;
            margin-top: 5px;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }

        .main {
            margin-left: 260px;
            padding: 20px;
            width: calc(100% - 260px);
        }
        table {
            width: 100%;
            background: white;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background: #2980b9;
            color: white;
        }
        .btn {
            padding: 5px 10px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            color: white;
            margin: 2px;
        }
        .btn.edit {
            background-color: #27ae60;
        }
        .btn.delete {
            background-color: #e74c3c;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        form {
            background: white;
            padding: 20px;
            margin-top: 20px;
            border-radius: 6px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .message {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2><i class="fas fa-user-shield"></i> Admin Panel</h2>
        <a href="index.php"><i class="fas fa-home"></i> Dashboard</a>
        <div class="dropdown">
            <a href="#"><i class="fas fa-ellipsis-v"></i> Navigasi</a>
            <div class="dropdown-content">
                <a href="tabelform.php">Tabel Form</a>
                <a href="tabelkontak.php">Tabel Kontak</a>
                <a href="tabelpengambilan.php">Tabel Pengambilan</a>
                <a href="tabelrating.php">Tabel Rating</a>
            </div>
        </div>
    </div>

    <div class="main">
        <h1>Data Pendaftaran</h1>
        <?php if (!empty($pesan)) : ?>
            <div class="message <?php echo strpos($pesan, 'berhasil') !== false ? 'success' : 'error'; ?>">
                <?php echo $pesan; ?>
            </div>
        <?php endif; ?>

        <table>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Password</th>
                <th>Role</th>
                <th>Nama Anak</th>
                <th>Nama Orang Tua</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            $result = $conn->query("SELECT * FROM pendaftaran ORDER BY id_pendaftaran ASC");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $no++ . "</td>
                    <td>" . htmlspecialchars($row['username']) . "</td>
                    <td>" . htmlspecialchars($row['password']) . "</td>
                    <td>" . htmlspecialchars($row['role']) . "</td>
                    <td>" . htmlspecialchars($row['nama_lengkap_anak']) . "</td>
                    <td>" . htmlspecialchars($row['nama_orang_tua']) . "</td>
                    <td>" . htmlspecialchars($row['alamat']) . "</td>
                    <td>
                        <a href='?edit=" . $row['id_pendaftaran'] . "' class='btn edit'>Edit</a>
                        <a href='?hapus=" . $row['id_pendaftaran'] . "' class='btn delete' onclick=\"return confirm('Yakin ingin hapus?')\">Delete</a>
                    </td>
                </tr>";
            }
            ?>
        </table>

        <?php if ($edit_data): ?>
            <h2>Edit Data Pendaftaran</h2>
            <form method="POST">
                <input type="hidden" name="id_pendaftaran" value="<?php echo htmlspecialchars($edit_data['id_pendaftaran']); ?>">
                <label>Username:</label>
                <input type="text" name="username" value="<?php echo htmlspecialchars($edit_data['username']); ?>" required>
                
                <label>Password:</label>
                <input type="text" name="password" value="<?php echo htmlspecialchars($edit_data['password']); ?>" required>
                
                <label>Role:</label>
                <input type="text" name="role" value="<?php echo htmlspecialchars($edit_data['role']); ?>" readonly>
                
                <label>Nama Lengkap Anak:</label>
                <input type="text" name="nama_lengkap_anak" value="<?php echo htmlspecialchars($edit_data['nama_lengkap_anak']); ?>" required>
                
                <label>Nama Orang Tua:</label>
                <input type="text" name="nama_orang_tua" value="<?php echo htmlspecialchars($edit_data['nama_orang_tua']); ?>" required>
                
                <label>Alamat:</label>
                <textarea name="alamat" required><?php echo htmlspecialchars($edit_data['alamat']); ?></textarea>
                
                <button class="btn edit" type="submit" name="update">Simpan</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
