<?php
$conn = new mysqli("localhost", "root", "", "ukl_2025");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Update data dengan benar - update setiap tabel secara terpisah
if (isset($_POST['update'])) {
    $id_user = $_POST['id_user'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama_lengkap'];
    $alamat = $_POST['alamat'];
    
    // Data pendaftaran
    $nama_anak = $_POST['nama_lengkap_anak'];
    $nama_ortu = $_POST['nama_orang_tua'];
    $username = $_POST['username'];
    $role = $_POST['role'];
    
    // Data pengambilan
    $email = $_POST['email_pemohon'];
    $desa = $_POST['desa_kelurahan'];
    $kecamatan = $_POST['kecamatan'];
    $kabupaten = $_POST['kabupaten_kota'];
    $provinsi = $_POST['provinsi'];
    $pengambilan = $_POST['pilihan_pengambilan'];
    
    $id_pendaftaran = $_POST['id_pendaftaran'];
    $id_pengambilan = $_POST['id_pengambilan'];

    // Update tabel pengguna
    $conn->query("UPDATE pengguna SET 
        nik = '$nik',
        nama_lengkap = '$nama',
        alamat = '$alamat'
        WHERE id_user = $id_user
    ");
    
    // Update tabel pendaftaran (hanya untuk record ini)
    if ($id_pendaftaran) {
        $conn->query("UPDATE pendaftaran SET 
            nama_lengkap_anak = '$nama_anak',
            nama_orang_tua = '$nama_ortu',
            username = '$username',
            role = '$role'
            WHERE id_pendaftaran = $id_pendaftaran
        ");
    }
    
    // Update tabel pengambilan (hanya untuk record ini)
    if ($id_pengambilan) {
        $conn->query("UPDATE pengambilan SET 
            email_pemohon = '$email',
            desa_kelurahan = '$desa',
            kecamatan = '$kecamatan',
            kabupaten_kota = '$kabupaten',
            provinsi = '$provinsi',
            pilihan_pengambilan = '$pengambilan'
            WHERE id_pengambilan = $id_pengambilan
        ");
    }
    
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Hapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    
    $result = $conn->query("SELECT id_pendaftaran, id_pengambilan FROM pengguna WHERE id_user=$id");
    $user_data = $result->fetch_assoc();
    
    if ($user_data) {
        // Hapus data dari semua tabel terkait
        $conn->query("DELETE FROM pengguna WHERE id_user=$id");
    }
    
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Ambil data untuk edit dengan JOIN
$edit_data = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $sql = "
    SELECT 
        p.id_user, p.nik, p.nama_lengkap, p.alamat, p.id_pendaftaran, p.id_pengambilan,
        pd.nama_lengkap_anak, pd.nama_orang_tua, pd.username, pd.role,
        pg.email_pemohon, pg.desa_kelurahan, pg.kecamatan, pg.kabupaten_kota, pg.provinsi, pg.pilihan_pengambilan
    FROM pengguna p
    LEFT JOIN pendaftaran pd ON p.id_pendaftaran = pd.id_pendaftaran
    LEFT JOIN pengambilan pg ON p.id_pengambilan = pg.id_pengambilan
    WHERE p.id_user = $id
    ";
    $result = $conn->query($sql);
    $edit_data = $result->fetch_assoc();
}

// Fungsi untuk auto-assign data baru ke tabel pengguna
function autoAssignNewUsers($conn) {
    // Cari pengguna yang belum memiliki id_pendaftaran atau id_pengambilan
    $result = $conn->query("SELECT id_user FROM pengguna WHERE id_pendaftaran IS NOT NULL OR id_pengambilan IS NOT NULL");
    
    while ($row = $result->fetch_assoc()) {
        $id_user = $row['id_user'];
        
        // Ambil id_pendaftaran dan id_pengambilan yang belum terpakai
        $pendaftaran_result = $conn->query("SELECT id_pendaftaran FROM pendaftaran WHERE id_pendaftaran NOT IN (SELECT COALESCE(id_pendaftaran, 0) FROM pengguna WHERE id_pendaftaran IS NOT NULL) LIMIT 1");
        $pengambilan_result = $conn->query("SELECT id_pengambilan FROM pengambilan WHERE id_pengambilan NOT IN (SELECT COALESCE(id_pengambilan, 0) FROM pengguna WHERE id_pengambilan IS NOT NULL) LIMIT 1");
        
        $id_pendaftaran = null;
        $id_pengambilan = null;
        
        if ($pendaftaran_result && $pendaftaran_result->num_rows > 0) {
            $pendaftaran_data = $pendaftaran_result->fetch_assoc();
            $id_pendaftaran = $pendaftaran_data['id_pendaftaran'];
        }
        
        if ($pengambilan_result && $pengambilan_result->num_rows > 0) {
            $pengambilan_data = $pengambilan_result->fetch_assoc();
            $id_pengambilan = $pengambilan_data['id_pengambilan'];
        }
        
        // Update pengguna dengan id yang ditemukan
        if ($id_pendaftaran || $id_pengambilan) {
            $update_sql = "UPDATE pengguna SET ";
            $updates = [];
            
            if ($id_pendaftaran) {
                $updates[] = "id_pendaftaran = $id_pendaftaran";
            }
            if ($id_pengambilan) {
                $updates[] = "id_pengambilan = $id_pengambilan";
            }
            
            $update_sql .= implode(", ", $updates) . " WHERE id_user = $id_user";
            $conn->query($update_sql);
        }
    }
}

// Jalankan auto-assign
autoAssignNewUsers($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data INNER JOIN - Diperbaiki</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * { box-sizing: border-box; }
        body { font-family: Arial, sans-serif; margin: 0; padding: 40px; background: #ecf0f1; }
        .form-container {
            max-width: 800px; background: white; padding: 20px;
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
            padding: 10px; text-align: left; font-size: 12px;
        }
        .btn {
            padding: 6px 12px; text-decoration: none; border-radius: 4px;
            font-size: 14px; color: white; margin: 2px; display: inline-block;
        }
        .edit-btn { background-color: #27ae60; }
        .delete-btn { background-color: #e74c3c; }
        .back-btn { background-color: #34495e; }
        .submit-btn { 
            background-color: #3498db; color: white; padding: 10px 20px; 
            border: none; border-radius: 4px; cursor: pointer; 
        }
        .form-row {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
        }
        .form-col {
            flex: 1;
        }
        textarea, input[type="text"], input[type="email"] { 
            width: 100%; 
            padding: 8px; 
            margin-top: 5px; 
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }
        .section-title {
            background: #34495e;
            color: white;
            padding: 10px;
            margin: 20px 0 10px 0;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<?php if ($edit_data): ?>
    <h2>Edit Data Lengkap</h2>
    <div class="form-container">
        <form method="POST">
            <input type="hidden" name="id_user" value="<?= $edit_data['id_user'] ?>">
            <input type="hidden" name="id_pendaftaran" value="<?= $edit_data['id_pendaftaran'] ?>">
            <input type="hidden" name="id_pengambilan" value="<?= $edit_data['id_pengambilan'] ?>">

            <div class="section-title">Data Pengguna</div>
            <div class="form-row">
                <div class="form-col">
                    <label>NIK:</label>
                    <input type="text" name="nik" required value="<?= htmlspecialchars($edit_data['nik']) ?>">
                </div>
                <div class="form-col">
                    <label>Nama Lengkap:</label>
                    <input type="text" name="nama_lengkap" required value="<?= htmlspecialchars($edit_data['nama_lengkap']) ?>">
                </div>
            </div>
            
            <label>Alamat:</label>
            <textarea name="alamat" required rows="2"><?= htmlspecialchars($edit_data['alamat']) ?></textarea><br><br>

            <div class="section-title">Data Pendaftaran</div>
            <div class="form-row">
                <div class="form-col">
                    <label>Nama Lengkap Anak:</label>
                    <input type="text" name="nama_lengkap_anak" value="<?= htmlspecialchars($edit_data['nama_lengkap_anak']) ?>">
                </div>
                <div class="form-col">
                    <label>Nama Orang Tua:</label>
                    <input type="text" name="nama_orang_tua" value="<?= htmlspecialchars($edit_data['nama_orang_tua']) ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-col">
                    <label>Username:</label>
                    <input type="text" name="username" value="<?= htmlspecialchars($edit_data['username']) ?>">
                </div>
                <div class="form-col">
                    <label>Role:</label>
                    <input type="text" name="role" value="<?= htmlspecialchars($edit_data['role']) ?>">
                </div>
            </div>

            <div class="section-title">Data Pengambilan</div>
            <div class="form-row">
                <div class="form-col">
                    <label>Email Pemohon:</label>
                    <input type="email" name="email_pemohon" value="<?= htmlspecialchars($edit_data['email_pemohon']) ?>">
                </div>
                <div class="form-col">
                    <label>Desa/Kelurahan:</label>
                    <input type="text" name="desa_kelurahan" value="<?= htmlspecialchars($edit_data['desa_kelurahan']) ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-col">
                    <label>Kecamatan:</label>
                    <input type="text" name="kecamatan" value="<?= htmlspecialchars($edit_data['kecamatan']) ?>">
                </div>
                <div class="form-col">
                    <label>Kabupaten/Kota:</label>
                    <input type="text" name="kabupaten_kota" value="<?= htmlspecialchars($edit_data['kabupaten_kota']) ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-col">
                    <label>Provinsi:</label>
                    <input type="text" name="provinsi" value="<?= htmlspecialchars($edit_data['provinsi']) ?>">
                </div>
                <div class="form-col">
                    <label>Pilihan Pengambilan:</label>
                    <input type="text" name="pilihan_pengambilan" value="<?= htmlspecialchars($edit_data['pilihan_pengambilan']) ?>">
                </div>
            </div>

            <button type="submit" class="submit-btn" name="update">Update</button>
        </form>
    </div>
<?php endif; ?>

<h2>Data Query JOIN</h2>
<table>
    <tr>
        <th>No</th><th>NIK</th><th>Nama Pengguna</th><th>Alamat</th><th>Nama Anak</th>
        <th>Orang Tua</th><th>Username</th><th>Role</th><th>Email</th><th>Desa</th>
        <th>Kecamatan</th><th>Kabupaten</th><th>Provinsi</th><th>Pengambilan</th><th>Aksi</th>
    </tr>
    <?php
    // Menggunakan LEFT JOIN agar data baru tetap muncul meski belum lengkap
    $sql = "
    SELECT 
        p.id_user, p.nik, p.nama_lengkap AS nama_pengguna, p.alamat AS alamat_pengguna,
        pd.nama_lengkap_anak, pd.nama_orang_tua, pd.username, pd.role,
        pg.email_pemohon, pg.desa_kelurahan, pg.kecamatan, pg.kabupaten_kota, pg.provinsi, pg.pilihan_pengambilan
    FROM pengguna p
    LEFT JOIN pendaftaran pd ON p.id_pendaftaran = pd.id_pendaftaran
    LEFT JOIN pengambilan pg ON p.id_pengambilan = pg.id_pengambilan
    ORDER BY p.id_user
    ";

    $result = $conn->query($sql);
    $no = 1;

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $no . "</td>";
            echo "<td>" . htmlspecialchars($row['nik']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nama_pengguna']) . "</td>";
            echo "<td>" . htmlspecialchars($row['alamat_pengguna']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nama_lengkap_anak'] ?? '-') . "</td>";
            echo "<td>" . htmlspecialchars($row['nama_orang_tua'] ?? '-') . "</td>";
            echo "<td>" . htmlspecialchars($row['username'] ?? '-') . "</td>";
            echo "<td>" . htmlspecialchars($row['role'] ?? '-') . "</td>";
            echo "<td>" . htmlspecialchars($row['email_pemohon'] ?? '-') . "</td>";
            echo "<td>" . htmlspecialchars($row['desa_kelurahan'] ?? '-') . "</td>";
            echo "<td>" . htmlspecialchars($row['kecamatan'] ?? '-') . "</td>";
            echo "<td>" . htmlspecialchars($row['kabupaten_kota'] ?? '-') . "</td>";
            echo "<td>" . htmlspecialchars($row['provinsi'] ?? '-') . "</td>";
            echo "<td>" . htmlspecialchars($row['pilihan_pengambilan'] ?? '-') . "</td>";
            echo "<td>
                <a href='?edit=" . $row['id_user'] . "' class='btn edit-btn'>Edit</a>
                <a href='?hapus=" . $row['id_user'] . "' onclick=\"return confirm('Yakin hapus data ini?')\" class='btn delete-btn'>Delete</a>
            </td>";
            echo "</tr>";
            $no++;
        }
    } else {
        echo "<tr><td colspan='15' style='text-align:center; color:red;'>Tidak ada data yang ditemukan.</td></tr>";
    }
    ?>
</table>

<br>
<a href="../crud/index.php" class="btn back-btn">← Kembali</a>

<?php $conn->close(); ?>

</body>
</html>