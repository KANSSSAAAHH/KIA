<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$database = "ukl_2025";

$conn = mysqli_connect($host, $user, $password, $database);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Cek apakah form telah dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
print_r($_POST); echo "<br>"; print_r($_FILES);
    // Ambil semua input
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
    $cacat_menurut_jenis = $_POST['cacat'];
    $tanggal_pendaftaran = $_POST['tanggal_pendaftaran'];
    $nama_kepala_keluarga = $_POST['nama_kepala_keluarga'];

    // Proses upload file
    $uploadDir = "../uploads/";
    $file_kk = $_FILES['file_kk']['name'];
    $ktp_ayah = $_FILES['ktp_ayah']['name'];
    $ktp_ibu = $_FILES['ktp_ibu']['name'];
    $pas_foto = $_FILES['pas_foto']['name'];

    $uploadOK = true;

    // // Fungsi upload dan validasi
    function uploadFile($fileInputName, $uploadDir) {
        $fileName = basename($_FILES[$fileInputName]['name']);
        $targetFile = $uploadDir . $fileName;
        if (move_uploaded_file($_FILES[$fileInputName]['tmp_name'], $targetFile)) {
            return $fileName;
        }
        return null;
    }

    $uploaded_kk = uploadFile('file_kk', $uploadDir);
    $uploaded_ktp_ayah = uploadFile('ktp_ayah', $uploadDir);
    $uploaded_ktp_ibu = uploadFile('ktp_ibu', $uploadDir);
    $uploaded_pas_foto_anak = uploadFile('pas_foto', $uploadDir);

    // if ($uploaded_kk && $uploaded_ayah && $uploaded_ibu && $uploaded_foto) {
        $sql = "INSERT INTO pengguna 
        (nik, nama_lengkap, jenis_kelamin, golongan_darah, tempat_lahir, tanggal_lahir, no_kk, no_akta_kelahiran, agama, kewarganegaraan, alamat, pendidikan, nama_ayah, nama_ibu, kebangsaan, hubungan_keluarga, cacat_menurut_jenis, tanggal_pendaftaran, nama_kepala_keluarga, file_kk, file_ktp_ayah, file_ktp_ibu, pas_foto_anak) 
        VALUES 
        ('$nik', '$nama_lengkap', '$jenis_kelamin', '$golongan_darah', '$tempat_lahir', '$tanggal_lahir', '$no_kk', '$no_akta_kelahiran', '$agama', '$kewarganegaraan', '$alamat', '$pendidikan', '$nama_ayah', '$nama_ibu', '$kebangsaan', '$hubungan_keluarga', '$cacat_menurut_jenis', '$tanggal_pendaftaran', '$nama_kepala_keluarga', '$uploaded_kk', '$uploaded_ktp_ayah', '$uploaded_ktp_ibu', '$uploaded_pas_foto_anak')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Pendaftaran berhasil!'); window.location.href = '../login/proses.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
 }
    // } else {
    //     echo "<script>alert('Upload file gagal! Pastikan semua file valid.');</script>";
    // }
}
mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Formulir KIA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            background: #f0f0f0;
            padding: 30px;
            display: flex;
            justify-content: center;
        }
        .container {
            background: white;
            padding: 30px;
            max-width: 900px;
            width: 100%;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.2);
        }
  .header {
            background-color:rgb(34, 29, 141);
            color: white;
            padding: 15px;
            text-align: center;
            border-radius: 10px;
            font-size: 22px;
            margin-bottom: 25px;
        }
        .form-container {
            display: grid;
            gap: 20px;
        }
        .row {
            display: grid;
            gap: 15px;
        }
        .row-1 { grid-template-columns: 1fr; }
        .row-2 { grid-template-columns: repeat(2, 1fr); }
        .row-3 { grid-template-columns: repeat(3, 1fr); }
        .row-4 { grid-template-columns: repeat(4, 1fr); }

        label {
            font-weight: normal;
            margin-bottom: 5px;
            display: block;
        }
        input, select {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .submit-btn {
            text-align: right;
        }
 button {
            background-color:rgb(37, 22, 167);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover {
            background-color:rgb(0, 0, 0);
        }
        @media (max-width: 768px) {
            .row-2, .row-3, .row-4 {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">PENDAFTARAN KIA SECARA ONLINE</div>
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-container">
                <div class="row row-3">
                    <div>
                        <label for="nik">NIK</label>
                        <input type="text" name="nik" id="nik" required>
                    </div>
                    <div>
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap" required>
                    </div>
                    <div>
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" required>
                            <option value="">-- Pilih --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
</div>
                </div>

                <div class="row row-4">
                    <div>
                        <label for="golongan_darah">Golongan Darah</label>
                        <select name="golongan_darah" id="golongan_darah" required>
                            <option value="">-- Pilih --</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                    </div>
                    <div>
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" required>
                    </div>
                    <div>
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" required>
                    </div>
                    <div>
                        <label for="no_kk">No. KK</label>
                        <input type="text" name="no_kk" id="no_kk" required>
                    </div>
                </div>

                <div class="row row-1">
                    <div>
                        <label for="no_akta_kelahiran">No. Akta Kelahiran</label>
                        <input type="text" name="no_akta_kelahiran" id="no_akta_kelahiran" required>
                    </div>
                </div>

                <div class="row row-3">
                    <div>
                        <label for="agama">Agama</label>
 <input type="text" name="agama" id="agama" required>
                    </div>
                    <div>
                        <label for="kewarganegaraan">Kewarganegaraan</label>
                        <select name="kewarganegaraan" id="kewarganegaraan" required>
                        <option value="">-- Pilih --</option>
                            <option value="WNI">WNI</option>
                            <option value="WNA">WNA</option>
                        </select>
                    </div>
                    <div>
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" id="alamat" required>
                    </div>
                </div>

                <div class="row row-3">
                    <div>
                        <label for="pendidikan">Pendidikan</label>
                        <input type="text" name="pendidikan" id="pendidikan" required>
                    </div>
                    <div>
                        <label for="kebangsaan">Kebangsaan</label>
                        <input type="text" name="kebangsaan" id="kebangsaan" required>
                    </div>
                    <div>
                        <label for="hubungan_keluarga">Hubungan Keluarga</label>
                        <select name="hubungan_keluarga" id="hubungan_keluarga" required>
                        <option value="">-- Pilih --</option>
                            <option value="Anak">Anak</option>
                            <option value="Orang tua">Orang tua</option>
                            <option value="Wali">Wali</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>

                <div class="row row-2">
<div>
                        <label for="nama_ayah">Nama Ayah</label>
                        <input type="text" name="nama_ayah" id="nama_ayah" required>
                    </div>
                    <div>
                        <label for="nama_ibu">Nama Ibu</label>
                        <input type="text" name="nama_ibu" id="nama_ibu" required>
                    </div>
                </div>

                <div class="row row-2">
                    <div>
                        <label for="cacat">Cacat Menurut Jenis</label>
                        <select name="cacat" id="cacat" required>
                            <option value="Tidak Ada">Tidak Ada</option>
                            <option value="Cacat Badan">Cacat Badan</option>
                            <option value="Cacat Mental">Cacat Mental</option>
                            <option value="Tunawicara">Tunawicara</option>
                            <option value="Cacat Jiwa">Cacat Jiwa</option>
                        </select>
                    </div>
                    <div>
                        <label for="tanggal_pendaftaran">Tanggal Pendaftaran</label>
                        <input type="date" name="tanggal_pendaftaran" id="tanggal_pendaftaran" required>
                    </div>
                </div>

                <div class="row row-1">
                    <div>
                        <label for="nama_kepala_keluarga">Nama Kepala Keluarga</label>
                        <input type="text" name="nama_kepala_keluarga" id="nama_kepala_keluarga" required>
                    </div>
                </div>

                <div class="row row-2">
    <div>
 <label for="file_kk">Upload File KK</label>
        <input type="file" name="file_kk" id="file_kk" required>
    </div>
    <div>
        <label for="ktp_ayah">Upload KTP Ayah</label>
        <input type="file" name="ktp_ayah" id="ktp_ayah" required>
    </div>
</div>

<div class="row row-2">
    <div>
        <label for="ktp_ibu">Upload KTP Ibu</label>
        <input type="file" name="ktp_ibu" id="ktp_ibu" required>
    </div>
    <div>
        <label for="pas_foto">Upload Pas Foto Anak (4x6)</label>
        <input type="file" name="pas_foto" id="pas_foto" required>
    </div>
</div>

                <div class="submit-btn">
                    <button type="submit">Selesai</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>