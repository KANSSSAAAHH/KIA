<?php
$koneksi = mysqli_connect("localhost", "root", "", "ukl_2025");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Update Data
if (isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $fields = ['nik', 'nama_lengkap', 'jenis_kelamin', 'golongan_darah', 'tempat_lahir', 'tanggal_lahir', 'no_kk', 'no_akta_kelahiran', 'agama','kewarganegaraan','alamat', 'pendidikan', 'nama_ayah', 'nama_ibu', 'kebangsaan', 'hubungan_keluarga', 'cacat_menurut_jenis','tanggal_pendaftaran','nama_kepala_keluarga'];
    $updates = [];

    foreach ($fields as $f) {
        $val = isset($_POST[$f]) ? mysqli_real_escape_string($koneksi, $_POST[$f]) : '';
        $updates[] = "$f='$val'";
    }

    $sql = "UPDATE pengguna SET " . implode(", ", $updates) . " WHERE id=$id";
    if ($koneksi->query($sql)) {
        header("Location: pengguna.php");
        exit();
    } else {
        echo "Gagal mengupdate data: " . $koneksi->error;
    }
}

$data = $koneksi->query("SELECT * FROM pengguna");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pengguna</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
        form { background: #f9f9f9; padding: 15px; margin-top: 20px; border-radius: 10px; }
        input, select { padding: 5px; margin: 5px; width: 180px; }
        button { padding: 6px 12px; margin-top: 10px; }
        .edit-btn { background-color: #007bff; color: white; border: none; padding: 5px 10px; border-radius: 5px; }
    </style>
</head>
<body>

<h2>Data Pengguna</h2>

<?php
// Tampilkan form edit jika edit parameter ada
if (isset($_GET['edit'])):
    $id = intval($_GET['edit']);
    $result = $koneksi->query("SELECT * FROM pengguna WHERE id=$id");
    if ($result && $result->num_rows > 0):
        $row = $result->fetch_assoc();
?>

<form method="post">
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    <input type="text" name="nik" placeholder="NIK" value="<?= $row['nik'] ?>" required>
    <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" value="<?= $row['nama_lengkap'] ?>" required>
    <select name="jenis_kelamin" required>
        <option value="">Pilih JK</option>
        <option value="Laki-laki" <?= $row['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
        <option value="Perempuan" <?= $row['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
    </select>
    <select name="golongan_darah">
        <option value="">Gol Darah</option>
        <?php foreach (['A', 'B', 'AB', 'O'] as $g): ?>
            <option value="<?= $g ?>" <?= $row['golongan_darah'] == $g ? 'selected' : '' ?>><?= $g ?></option>
        <?php endforeach; ?>
    </select>
    <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" value="<?= $row['tempat_lahir'] ?>">
    <input type="date" name="tanggal_lahir" value="<?= $row['tanggal_lahir'] ?>">
    <input type="text" name="no_kk" placeholder="No KK" value="<?= $row['no_kk'] ?>">
    <input type="text" name="no_akta_kelahiran" placeholder="No Akta" value="<?= $row['no_akta_kelahiran'] ?>">
    <input type="text" name="agama" placeholder="Agama" value="<?= $row['agama'] ?>">
    <input type="text" name="kewarganegaraan" placeholder="Kewarganegaraan" value="<?= $row['kewarganegaraan'] ?>">
    <input type="text" name="alamat" placeholder="Alamat" value="<?= $row['alamat'] ?>">
    <input type="text" name="pendidikan" placeholder="Pendidikan" value="<?= $row['pendidikan'] ?>">
    <input type="text" name="nama_ayah" placeholder="Nama Ayah" value="<?= $row['nama_ayah'] ?>">
    <input type="text" name="nama_ibu" placeholder="Nama Ibu" value="<?= $row['nama_ibu'] ?>">
    <input type="text" name="kebangsaan" placeholder="Kebangsaan" value="<?= $row['kebangsaan'] ?>">
    <input type="text" name="hubungan_keluarga" placeholder="Hubungan Keluarga" value="<?= $row['hubungan_keluarga'] ?>">
    <input type="text" name="cacat_menurut_jenis" placeholder="Jenis Cacat" value="<?= $row['cacat_menurut_jenis'] ?>">
    <input type="date" name="tanggal_pendaftaran" value="<?= $row['tanggal_pendaftaran'] ?>">
    <input type="text" name="nama_kepala_keluarga" placeholder="Nama Kepala Keluarga" value="<?= $row['nama_kepala_keluarga'] ?>">
    <br>
    <button type="submit" name="update">Simpan</button>
</form>
<?php endif; endif; ?>

<table>
    <tr>
        <th>No</th>
        <th>NIK</th>
        <th>Nama Lengkap</th>
        <th>Jenis Kelamin</th>
        <th>Golongan Darah</th>
        <th>TTL</th>
        <th>No KK</th>
        <th>No Akta</th>
        <th>Agama</th>
        <th>Alamat</th>
        <th>Pendidikan</th>
        <th>Nama Ayah</th>
        <th>Nama Ibu</th>
        <th>Kebangsaan</th>
        <th>Hubungan Keluarga</th>
        <th>Cacat</th>
        <th>Tgl Daftar</th>
        <th>Nama KK</th>
        <th>Aksi</th>
    </tr>
    <?php $no = 1; while ($row = $data->fetch_assoc()): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['nik'] ?></td>
        <td><?= $row['nama_lengkap'] ?></td>
        <td><?= $row['jenis_kelamin'] ?></td>
        <td><?= $row['golongan_darah'] ?></td>
        <td><?= $row['tempat_lahir'] ?>, <?= $row['tanggal_lahir'] ?></td>
        <td><?= $row['no_kk'] ?></td>
        <td><?= $row['no_akta_kelahiran'] ?></td>
        <td><?= $row['agama'] ?></td>
        <td><?= $row['alamat'] ?></td>
        <td><?= $row['pendidikan'] ?></td>
        <td><?= $row['nama_ayah'] ?></td>
        <td><?= $row['nama_ibu'] ?></td>
        <td><?= $row['kebangsaan'] ?></td>
        <td><?= $row['hubungan_keluarga'] ?></td>
        <td><?= $row['cacat_menurut_jenis'] ?></td>
        <td><?= $row['tanggal_pendaftaran'] ?></td>
        <td><?= $row['nama_kepala_keluarga'] ?></td>
        <td>
        <a class="edit-btn" href="edit.php?edit=<?= $row['id_user'] ?>">Edit</a>

    </td>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
