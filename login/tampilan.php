<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Cek apakah role adalah User (Admin tidak ditampilkan datanya)
if ($_SESSION['role'] !== 'User') {
    echo "<script>alert('Halaman ini khusus untuk User!'); window.location.href='../Awal/kia.php';</script>";
    exit();
}

// Koneksi database
$host = "localhost";
$username = "root";
$password = "";
$database = "ukl_2025";

$conn = new mysqli($host, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data berdasarkan username yang sedang login
$current_username = $_SESSION['username'];

// Query untuk mengambil data pendaftaran user yang sedang login
$query_pendaftaran = "SELECT * FROM pendaftaran WHERE username = ?";
$stmt_pendaftaran = $conn->prepare($query_pendaftaran);
$stmt_pendaftaran->bind_param("s", $current_username);
$stmt_pendaftaran->execute();
$result_pendaftaran = $stmt_pendaftaran->get_result();
$data_pendaftaran = $result_pendaftaran->fetch_assoc();

// Jika tidak ada data pendaftaran
if (!$data_pendaftaran) {
    echo "<script>alert('Data pendaftaran tidak ditemukan!'); window.location.href='dashboard.php';</script>";
    exit();
}

$id_pendaftaran = $data_pendaftaran['id_pendaftaran'];

// Query untuk mengambil data pengambilan berdasarkan id_user dari tabel pengambilan
$query_pengambilan = "SELECT * FROM pengambilan WHERE id_user = ?";
$stmt_pengambilan = $conn->prepare($query_pengambilan);
$stmt_pengambilan->bind_param("i", $id_pendaftaran);
$stmt_pengambilan->execute();
$result_pengambilan = $stmt_pengambilan->get_result();
$data_pengambilan = $result_pengambilan->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIA Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #4A90E2 0%, #2E5F99 100%);
            min-height: 100vh;
            position: relative;
        }

        .header {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .header-left i {
            font-size: 2rem;
            color: #64b5f6;
        }

        .header-left h1 {
            font-size: 1.8rem;
            font-weight: 700;
            background: linear-gradient(45deg, #ffffff, #e3f2fd);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            background: rgba(255,255,255,0.15);
            padding: 0.8rem 1.5rem;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 1px solid rgba(255,255,255,0.2);
            backdrop-filter: blur(10px);
        }

        .user-profile:hover {
            background: rgba(255,255,255,0.25);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        }

        .user-profile i {
            font-size: 1.3rem;
            color: #e3f2fd;
        }

        .user-profile span {
            font-weight: 600;
            color: #ffffff;
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .welcome-card {
            background: rgba(255,255,255,0.95);
            border-radius: 20px;
            padding: 2.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
            text-align: center;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
        }

        .welcome-card h2 {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-size: 2rem;
            margin-bottom: 0.8rem;
            font-weight: 700;
        }

        .welcome-card p {
            color: #666;
            font-size: 1.2rem;
            font-weight: 500;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .stat-card {
            background: rgba(255,255,255,0.95);
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
        }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 16px 40px rgba(0,0,0,0.15);
        }

        .stat-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .stat-icon::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            transform: scale(0);
            transition: transform 0.3s ease;
        }

        .stat-card:hover .stat-icon::before {
            transform: scale(1);
        }

        .stat-icon.pendaftaran {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
        }

        .stat-icon.pengambilan {
            background: linear-gradient(135deg, #667eea, #4A90E2);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #666;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .data-sections {
            display: grid;
            gap: 2.5rem;
        }

        .section-card {
            background: rgba(255,255,255,0.95);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
        }

        .section-header {
            padding: 2rem 2.5rem;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .section-header i {
            font-size: 1.8rem;
            color: #e3f2fd;
        }

        .section-header h3 {
            font-size: 1.4rem;
            font-weight: 700;
        }

        .section-content {
            padding: 2.5rem;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 1.5rem;
        }

        .info-item {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 15px;
            border-left: 4px solid #4A90E2;
            transition: all 0.3s ease;
        }

        .info-item:hover {
            transform: translateX(3px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        }

        .info-item label {
            font-weight: 700;
            color: #1e3c72;
            display: block;
            margin-bottom: 0.8rem;
            font-size: 0.95rem;
        }

        .info-item span {
            color: #333;
            font-size: 1.1rem;
            font-weight: 500;
        }

        .status-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-terdaftar {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
        }

        .status-proses {
            background: linear-gradient(135deg,rgb(187, 19, 19),rgb(255, 47, 0));
            color: white;
            box-shadow: 0 4px 15px rgba(255, 193, 7, 0.3);
        }

        .no-data {
            text-align: center;
            padding: 4rem;
            color: #666;
        }

        .no-data i {
            font-size: 4rem;
            color: #ddd;
            margin-bottom: 1.5rem;
        }

        .no-data h4 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: #1e3c72;
        }

        .back-btn {
            background: linear-gradient(135deg,rgb(38, 23, 95),rgb(36, 77, 131));
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 30px;
            cursor: pointer;
            font-size: 1.1rem;
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.8rem;
            margin-top: 2rem;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(63, 85, 88, 0.3);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .back-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgb(32, 210, 238);
        }

        @media (max-width: 768px) {
            .header {
                padding: 1rem;
                flex-direction: column;
                gap: 1rem;
            }

            .header-left h1 {
                font-size: 1.5rem;
            }

            .container {
                margin: 1rem auto;
                padding: 0 0.5rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .section-content {
                padding: 1.5rem;
            }

            .welcome-card {
                padding: 2rem;
            }

            .welcome-card h2 {
                font-size: 1.6rem;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-left">
            <i class="fas fa-id-card"></i>
            <h1>KIA Dashboard</h1>
        </div>
        <div class="user-profile">
            <i class="fas fa-user-circle"></i>
            <span><?php echo htmlspecialchars($data_pendaftaran['nama_lengkap_anak']); ?> - User</span>
        </div>
    </div>

    <div class="container">
        <div class="welcome-card">
            <h2><i class="fas fa-id-card"></i> Data Pendaftaran & Pengambilan KIA</h2>
            <p>Sistem Registrasi dan Cetak Kartu Identitas Anak</p>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon pendaftaran">
                    <i class="fas fa-user-plus"></i>
                </div>
                <div class="stat-number">1</div>
                <div class="stat-label">Data Pendaftaran</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon pengambilan">
                    <i class="fas fa-clipboard-check"></i>
                </div>
                <div class="stat-number"><?php echo $data_pengambilan ? '1' : '0'; ?></div>
                <div class="stat-label">Pengambilan Dokumen</div>
            </div>
        </div>

        <div class="data-sections">
            <!-- Data Pendaftaran User -->
            <div class="section-card">
                <div class="section-header">
                    <i class="fas fa-user-plus"></i>
                    <h3>DATA PENDAFTARAN KIA USER</h3>
                </div>
                <div class="section-content">
                    <div class="info-grid">
                        <div class="info-item">
                            <label>Username:</label>
                            <span><?php echo htmlspecialchars($data_pendaftaran['username']); ?></span>
                        </div>
                        <div class="info-item">
                            <label>Nama Lengkap:</label>
                            <span><?php echo htmlspecialchars($data_pendaftaran['nama_lengkap_anak']); ?></span>
                        </div>
                        <div class="info-item">
                            <label>Nama Orang Tua:</label>
                            <span><?php echo htmlspecialchars($data_pendaftaran['nama_orang_tua']); ?></span>
                        </div>
                        <div class="info-item">
                            <label>Alamat:</label>
                            <span><?php echo htmlspecialchars($data_pendaftaran['alamat']); ?></span>
                        </div>
                        <div class="info-item">
                            <label>Status:</label>
                            <span class="status-badge status-terdaftar">Terdaftar</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Pengambilan -->
            <?php if($data_pengambilan): ?>
            <div class="section-card">
                <div class="section-header">
                    <i class="fas fa-clipboard-check"></i>
                    <h3>DATA PENGAMBILAN KIA USER</h3>
                </div>
                <div class="section-content">
                    <div class="info-grid">
                        <div class="info-item">
                            <label>Pilihan Pengambilan:</label>
                            <span><?php echo htmlspecialchars($data_pengambilan['pilihan_pengambilan']); ?></span>
                        </div>
                        <div class="info-item">
                            <label>Nama Kepala Keluarga:</label>
                            <span><?php echo htmlspecialchars($data_pengambilan['nama_kepala_keluarga']); ?></span>
                        </div>
                        <div class="info-item">
                            <label>Nama Pemohon:</label>
                            <span><?php echo htmlspecialchars($data_pengambilan['nama_pemohon']); ?></span>
                        </div>
                        <div class="info-item">
                            <label>Email Pemohon:</label>
                            <span><?php echo htmlspecialchars($data_pengambilan['email_pemohon']); ?></span>
                        </div>
                        <div class="info-item">
                            <label>Desa/Kelurahan:</label>
                            <span><?php echo htmlspecialchars($data_pengambilan['desa_kelurahan']); ?></span>
                        </div>
                        <div class="info-item">
                            <label>Kecamatan:</label>
                            <span><?php echo htmlspecialchars($data_pengambilan['kecamatan']); ?></span>
                        </div>
                        <div class="info-item">
                            <label>Kabupaten/Kota:</label>
                            <span><?php echo htmlspecialchars($data_pengambilan['kabupaten_kota']); ?></span>
                        </div>
                        <div class="info-item">
                            <label>Provinsi:</label>
                            <span><?php echo htmlspecialchars($data_pengambilan['provinsi']); ?></span>
                        </div>
                        <div class="info-item">
                            <label>Status:</label>
                            <span class="status-badge status-proses">Sedang Diproses</span>
                        </div>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <div class="section-card">
                <div class="section-header">
                    <i class="fas fa-clipboard-check"></i>
                    <h3>DATA PENGAMBILAN KIA USER</h3>
                </div>
                <div class="section-content">
                    <div class="no-data">
                        <i class="fas fa-clipboard-list"></i>
                        <h4>Belum Ada Data Pengambilan</h4>
                        <p>Data pengambilan dokumen belum tersedia</p>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <div style="text-align: center;">
                <a href="../Akhir/setelah.php" class="back-btn">
                    <i class=""></i>
                    LANJUTKAN HE HALAMAN BERIKUTNYA
                </a>
            </div>
        </div>
    </div>
</body>
</html>

<?php
// Tutup koneksi
$conn->close();
?>