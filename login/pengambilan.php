<?php
// Koneksi ke database ukl_2025
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
    // Mengambil data dari form dengan validasi
    $pilihan_pengambilan = isset($_POST['pengambilan']) ? $_POST['pengambilan'] : '';
    $nama_kepala_keluarga = isset($_POST['nama_kepala_keluarga']) ? $_POST['nama_kepala_keluarga'] : '';
    $nama_pemohon = isset($_POST['nama_pemohon']) ? $_POST['nama_pemohon'] : '';
    $email_pemohon = isset($_POST['email_pemohon']) ? $_POST['email_pemohon'] : '';
    $desa_kelurahan = isset($_POST['desa_kelurahan']) ? $_POST['desa_kelurahan'] : '';
    $kecamatan = isset($_POST['kecamatan']) ? $_POST['kecamatan'] : '';
    $kabupaten_kota = isset($_POST['kabupaten_kota']) ? $_POST['kabupaten_kota'] : '';
    $provinsi = isset($_POST['provinsi']) ? $_POST['provinsi'] : '';

    // Debug: Lihat data yang diterima (hapus setelah berhasil)
    // echo "<script>console.log(" . json_encode($_POST) . ");</script>";
    
    // Validasi sederhana - hanya cek field utama
    if (!empty($pilihan_pengambilan) && !empty($nama_kepala_keluarga) && !empty($nama_pemohon)) {
        // Ambil id_rating yang valid dari tabel rating
        $get_rating = "SELECT id_rating FROM rating LIMIT 1";
        $rating_result = mysqli_query($conn, $get_rating);
        
        if ($rating_row = mysqli_fetch_assoc($rating_result)) {
            $default_rating = $rating_row['id_rating'];
            
            $sql = "INSERT INTO pengambilan 
                    (pilihan_pengambilan, nama_kepala_keluarga, nama_pemohon, email_pemohon, desa_kelurahan, kecamatan, kabupaten_kota, provinsi, id_rating) 
                    VALUES 
                    (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssssssssi", $pilihan_pengambilan, $nama_kepala_keluarga, $nama_pemohon, $email_pemohon, $desa_kelurahan, $kecamatan, $kabupaten_kota, $provinsi, $default_rating);
            
            if (mysqli_stmt_execute($stmt)) {
                echo "<script>
                    alert('Proses Pengambilan berhasil!');
                    window.location.href = 'lastproses.php';  
                </script>";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "<script>alert('Data tidak lengkap. Pastikan minimal pilihan pengambilan, nama kepala keluarga, dan nama pemohon diisi.');</script>";
        }
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pengambilan KIA</title>
    <style>
        body {
            background: #f1f1f1;
            font-family: Arial, sans-serif;
        }
        .container {
            width: 70%;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px #ccc;
        }
        h2 {
            background-color: rgb(37, 19, 140);
            color: white;
            padding: 10px;
            border-radius: 8px;
            text-align: center;
            font-family: 'Poppins', sans-serif;
        }
      .status {
    background-color: lightgreen;
    padding: 15px 20px;
    font-size: 18px;
    border-radius: 10px;
    margin-bottom: 15px;
    max-width: 250px; /* Lebar maksimum agar tidak terlalu panjang */
    margin-left: 3px; /* Agak kiri, tapi tidak nempel pinggir */
    box-shadow: 1px 1px 5px #aaa;
}
        form {
            margin-top: 10px;
        }
        .row {
            display: flex;
            margin-bottom: 15px;
            gap: 20px;
        }
        .row .col {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-size: 14px;
        }
        input[type="text"], input[type="email"], select {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: rgb(37, 17, 119);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
        }
        button:hover {
            background: black;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>PROSES PENGAMBILAN KARTU IDENTITAS ANAK</h2>
    
    <!-- Status Pengajuan -->
    <div class="status">
        <span>Status Pengajuan: <strong>Selesai</strong></span>
    </div>

    <form action="" method="post">
        <!-- Pilihan Pengambilan -->
        <div class="row">
            <div class="col">
                <label for="pengambilan">Pengambilan</label>
                <select name="pengambilan" id="pengambilan" required>
                    <option value="">-- Pilih --</option>
                    <option value="Kecamatan">Kecamatan</option>
                    <option value="Kelurahan">Kelurahan</option>
                    <option value="Dispendukcapil">Dispendukcapil</option>
                </select>
            </div>
        </div>

        <!-- Data Pemohon -->
        <div class="row">
            <div class="col">
                <label for="nama_kepala_keluarga">Nama Kepala Keluarga</label>
                <input type="text" name="nama_kepala_keluarga" id="nama_kepala_keluarga" required>
            </div>
            <div class="col">
                <label for="nama_pemohon">Nama Pemohon</label>
                <input type="text" name="nama_pemohon" id="nama_pemohon" required>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="email_pemohon">Email Pemohon</label>
                <input type="email" name="email_pemohon" id="email_pemohon" required>
            </div>
        </div>

        <!-- Data Daerah Asal -->
        <div class="row">
            <div class="col">
                <label for="desa_kelurahan">Desa/Kelurahan</label>
                <input type="text" name="desa_kelurahan" id="desa_kelurahan" required>
            </div>
            <div class="col">
                <label for="kecamatan">Kecamatan</label>
                <input type="text" name="kecamatan" id="kecamatan" required>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="kabupaten_kota">Kabupaten/Kota</label>
                <input type="text" name="kabupaten_kota" id="kabupaten_kota" required>
            </div>
            <div class="col">
                <label for="provinsi">Provinsi</label>
                <select name="provinsi" id="provinsi" required>
                    <option value="">-- Pilih --</option>
                    <option value="Jawa Timur">Jawa Timur</option>
                </select>
            </div>
        </div>

        <div>
            <button type="submit">Kirim</button>
        </div>
    </form>
</div>

</body>
</html>