<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan KIA</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            text-align: center;
            position: relative;
        }
        
        .btn-back {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 10px 20px;
            background-color: #3b5998;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            z-index: 1000;
        }

        .btn-back:hover {
            background-color: #2d4373;
        }
        
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 60px 20px 20px 20px; /* padding-top diperbesar agar tidak tertimpa tombol */
        }
        
        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 20px;
            margin: 10px;
            width: 300px;
            text-align: left;
        }
        
        .card h2 {
            background-color: #3b5998;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin: -20px -20px 10px -20px;
        }
        
        footer {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            margin-top: 20px;
        }
        
        .footer-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            max-width: 900px;
            margin: auto;
        }
        
        .footer-section {
            flex: 1;
            padding: 10px;
            min-width: 250px;
            text-align: left;
        }
        
        .footer-section h3 {
            padding-bottom: 5px;
        }
        
        .footer-section a {
            color: white;
            text-decoration: none;
            display: block;
            margin: 5px 0;
        }
        
        .footer-section a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- Tombol Kembali di pojok kiri atas -->
    <a href="../tengah/persyaratan.php" class="btn-back">←</a>

    <div class="container">
        <div class="card">
            <h2>APA ITU KIA?</h2>
            <p>Kartu Identitas Anak (KIA) adalah bukti identitas resmi untuk anak di bawah usia 17 tahun...</p>
        </div>
        <div class="card">
            <h2>JENIS KIA</h2>
            <p>1. KIA untuk anak usia 0-5 tahun (tanpa foto)</p>
            <p>2. KIA untuk anak usia 5-17 tahun (dengan foto)</p>
        </div>
        <div class="card">
            <h2>SYARAT PEMBUATAN KIA</h2>
            <p>1. Fotokopi akta kelahiran</p>
            <p>2. KTP asli orang tua/wali & pas foto anak</p>
            <p>3. Fotokopi Kartu Keluarga (KK)</p>
        </div>
        <div class="card">
            <h2>CARA MENGURUS KIA</h2>
            <p>1. Pemohon menyerahkan persyaratan ke Dukcapil</p>
            <p>2. KIA diterbitkan setelah verifikasi</p>
            <p>3. Pemohon mengambil KIA di kantor Dukcapil</p>
        </div>
        <div class="card">
            <h2>MANFAAT KIA</h2>
            <p>1. Identitas resmi sebelum KTP</p>
            <p>2. Mempermudah akses layanan publik</p>
            <p>3. Digunakan untuk perjalanan</p>
        </div>
    </div>

    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h3>TENTANG</h3>
                <p>Website untuk mempermudah pengurusan dokumen kependudukan secara Online.</p>
            </div>
            <div class="footer-section">
                <h3>LAYANAN</h3>
                <a href="#">Syarat KIA</a>
                <a href="#">Cara Pengajuan</a>
                <a href="#">Contact us</a>
                <a href="#">Masuk</a>
            </div>
            <div class="footer-section">
                <h3>KONTAK</h3>
                <p>📍 Jl. Taman puspa sari d-3 klurak candi</p>
                <p>📞 083892606102</p>
                <p>✉ Khanzadiyas123@gmail.com</p>
            </div>
        </div>
    </footer>

</body>
</html>