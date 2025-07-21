<?php
// Koneksi database
session_start();
$conn = new mysqli("localhost", "root", "", "ukl_2025");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Update data
if (isset($_POST['update'])) {
    // var_dump($_POST); echo "<br>"; exit();
    $id_user = $_GET['edit'];
    $nik = $_POST['nik'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $golongan_darah = $_POST['golongan_darah'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $no_kk = $_POST['no_kk'];
    $no_akta_kelahiran = $_POST['no_akta_kelahiran'];
    $agama = $_POST['agama'];
    $kewarganegaraan = $_POST['kewarganegaraan'];
    $alamat = $_POST['alamat'];
    $pendidikan = $_POST['pendidikan'];
    $nama_ayah = $_POST['nama_ayah'];
    $nama_ibu = $_POST['nama_ibu'];
    $kebangsaan = $_POST['kebangsaan'];
    $hubungan_keluarga = $_POST['hubungan_keluarga'];
    $cacat_menurut_jenis = $_POST['cacat_menurut_jenis'];
    $tanggal_pendaftaran = $_POST['tanggal_pendaftaran'];
    $nama_kepala_keluarga = $_POST['nama_kepala_keluarga'];
    $file_kk = $_POST['file_kk'];
    $file_ktp_ayah = $_POST['file_ktp_ayah'];
    $file_ktp_ibu = $_POST['file_ktp_ibu'];
    $pas_foto_anak = $_POST['pas_foto_anak'];
   
    $conn->query("UPDATE pengguna SET 
        nik='$nik',
        nama_lengkap = '$nama_lengkap',
        jenis_kelamin = '$jenis_kelamin',
        golongan_darah = '$golongan_darah',
        tempat_lahir = '$tempat_lahir',
        tanggal_lahir = '$tanggal_lahir',
        no_kk='$no_kk',
        no_akta_kelahiran='$no_akta_kelahiran',
        agama='$agama',
        kewarganegaraan='$kewarganegaraan',
        alamat='$alamat',
        pendidikan='$pendidikan',
        nama_ayah='$nama_ayah',
        nama_ibu='$nama_ibu',
        kebangsaan='$kebangsaan',
        hubungan_keluarga='$hubungan_keluarga',
        cacat_menurut_jenis='$cacat_menurut_jenis',
        tanggal_pendaftaran='$tanggal_pendaftaran',
        nama_kepala_keluarga='$nama_kepala_keluarga',
        file_kk='$file_kk',
        file_ktp_ayah='$file_ktp_ayah',
        file_ktp_ibu='$file_ktp_ibu',
        pas_foto_anak='$pas_foto_anak'


        WHERE id_user=$id_user
    ");
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Hapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $conn->query("DELETE FROM pengguna WHERE id_user=$id");
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Ambil data untuk edit
$edit_data = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $conn->query("SELECT * FROM pengguna WHERE id_user=$id");
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
    <h2>Edit Data Pengguna</h2>
    <div class="form-container">
        <form method="POST">
            <input type="hidden" name="id_user" value="<?= $edit_data['id_user'] ?>">

             <label>NIK:</label>
            <input type="text" name="nik" required value="<?= $edit_data['nik'] ?>"><br><br>

            <label>Nama Lengkap:</label>
            <input type="text" name="nama_lengkap" required value="<?= $edit_data['nama_lengkap'] ?>"><br><br>

            <label>jenis_kelamin:</label>
            <input type="jenis_kelamin" name="jenis_kelamin" required value="<?= $edit_data['jenis_kelamin'] ?>"><br><br>

            <label>golongan_darah:</label>
            <input type="text" name="golongan_darah" required value="<?= $edit_data['golongan_darah'] ?>"><br><br>

          <label>tempat_lahir:</label>
            <input type="text" name="tempat_lahir" required value="<?= $edit_data['tempat_lahir'] ?>"><br><br>

            <label>tanggal_lahir:</label>
            <input type="text" name="tanggal_lahir" required value="<?= $edit_data['tanggal_lahir'] ?>"><br><br>

            <label>no_kk:</label>
            <input type="text" name="no_kk" required value="<?= $edit_data['no_kk'] ?>"><br><br>

            <label>no_akta_kelahiran:</label>
            <input type="text" name="no_akta_kelahiran" required value="<?= $edit_data['no_akta_kelahiran'] ?>"><br><br>

            <label>agama:</label>
            <input type="text" name="agama" required value="<?= $edit_data['agama'] ?>"><br><br>

            <label>kewarganegaraan:</label>
            <input type="text" name="kewarganegaraan" required value="<?= $edit_data['kewarganegaraan'] ?>"><br><br>

            <label>alamat:</label>
            <input type="text" name="alamat" required value="<?= $edit_data['alamat'] ?>"><br><br>

            <label>pendidikan:</label>
            <input type="text" name="pendidikan" required value="<?= $edit_data['pendidikan'] ?>"><br><br>

            <label>nama_ayah:</label>
            <input type="text" name="nama_ayah" required value="<?= $edit_data['nama_ayah'] ?>"><br><br>

            <label>nama_ibu:</label>
            <input type="text" name="nama_ibu" required value="<?= $edit_data['nama_ibu'] ?>"><br><br>

            <label>kebangsaan:</label>
            <input type="text" name="kebangsaan" required value="<?= $edit_data['kebangsaan'] ?>"><br><br>

            <label>hubungan_keluarga:</label>
            <input type="text" name="hubungan_keluarga" required value="<?= $edit_data['hubungan_keluarga'] ?>"><br><br>

            <label>cacat_menurut_jenis:</label>
            <input type="text" name="cacat_menurut_jenis" required value="<?= $edit_data['cacat_menurut_jenis'] ?>"><br><br>

            <label>tanggal_pendaftaran:</label>
            <input type="text" name="tanggal_pendaftaran" required value="<?= $edit_data['tanggal_pendaftaran'] ?>"><br><br>
            
            <label>nama_kepala_keluarga:</label>
            <input type="text" name="nama_kepala_keluarga" required value="<?= $edit_data['nama_kepala_keluarga'] ?>"><br><br>
            
            <label>file_kk:</label>
            <input type="text" name="file_kk" required value="<?= $edit_data['file_kk'] ?>"><br><br>
            
            <label>file_ktp_ayah:</label>
            <input type="text" name="file_ktp_ayah" required value="<?= $edit_data['file_ktp_ayah'] ?>"><br><br>
            
            <label>file_ktp_ibu:</label>
            <input type="text" name="file_ktp_ibu" required value="<?= $edit_data['file_ktp_ibu'] ?>"><br><br>

            <label>pas_foto_anak:</label>
            <input type="text" name="pas_foto_anak" required value="<?= $edit_data['pas_foto_anak'] ?>"><br><br>

            <button type="submit" class="submit-btn" name="update">Update</button>
        </form>
    </div>
<?php endif; ?>

<h2>Data Form User</h2>
<table>
    <tr>
    <th>nik</th>
    <th>nama_lengkap</th>
    <th>jenis_kelamin</th>
    <th>golongan_darah</th>
    <th>tempat_lahir</th>
    <th>tanggal_lahir</th>
    <th>no_kk</th>
    <th>no_akta_kelahiran</th>
    <th>agama</th>
    <th>kewarganegaraan</th>
    <th>alamat</th>
    <th>pendidikan</th>
    <th>nama_ayah</th>
    <th>nama_ibu</th>
    <th>kebangsaan</th>
    <th>hubungan_keluarga</th>
    <th>cacat_menurut_jenis</th>
    <th>tanggal_pendaftaran</th>
    <th>nama_kepala_keluarga</th>
    <th>file_kk</th>
    <th>file_ktp_ayah</th>
    <th>file_ktp_ibu</th>
    <th>pas_foto_anak</th>
    <th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    $result = $conn->query("SELECT * FROM pengguna ORDER BY id_user ASC");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['nik']}</td>
            <td>{$row['nama_lengkap']}</td>
            <td>{$row['jenis_kelamin']}</td>
            <td>{$row['golongan_darah']}</td>
            <td>{$row['tempat_lahir']}</td>
            <td>{$row['tanggal_lahir']}</td>
            <td>{$row['no_kk']}</td>
            <td>{$row['no_akta_kelahiran']}</td>
            <td>{$row['agama']}</td>
            <td>{$row['kewarganegaraan']}</td>
            <td>{$row['alamat']}</td>
            <td>{$row['pendidikan']}</td>
            <td>{$row['nama_ayah']}</td>
            <td>{$row['nama_ibu']}</td>
            <td>{$row['kebangsaan']}</td>
            <td>{$row['hubungan_keluarga']}</td>
            <td>{$row['cacat_menurut_jenis']}</td>
            <td>{$row['tanggal_pendaftaran']}</td>
            <td>{$row['nama_kepala_keluarga']}</td>
            <td><img src='../uploads/{$row['file_kk']}' alt='File KK' width='100'></td>
            <td><img src='../uploads/{$row['file_ktp_ayah']}' alt='File KK' width='100'></td>
            <td><img src='../uploads/{$row['file_ktp_ibu']}' alt='File KK' width='100'></td>
            <td><img src='../uploads/{$row['pas_foto_anak']}' alt='File KK' width='100'></td>
            <td>
                <a href='?edit={$row['id_user']}' class='btn edit-btn'>Edit</a>
                <a href='?hapus={$row['id_user']}' onclick=\"return confirm('Yakin hapus data ini?')\" class='btn delete-btn'>Delete</a>
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
