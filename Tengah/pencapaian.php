<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harapan Adanya</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            color: black;
            text-align: center;
        }
        
        .container {
            padding: 50px;
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
        }

        .btn-back:hover {
            background-color: #2d4373;
        }
        
        h1 {
            font-size: 40px;
            font-weight: bold;
            text-transform: uppercase;
            color: #2c3e50;
            margin-top: 60px; /* agar tidak tertimpa tombol */
        }
        
        .highlight {
            color: #ff5500;
        }
        
        .cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }
        
        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            border: 2px solid #2c3e50;
            width: 300px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .card img {
            width: 50px;
            height: auto;
            margin-bottom: 10px;
        }
        
        .card p {
            font-size: 16px;
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

    <div class="container">
        <!-- Tombol Kembali di pojok kiri atas -->
        <a href="../tengah/persyaratan.php" class="btn-back">←</a>
        
        <h1><span class="highlight">HARAPAN</span> ADANYA</h1>
        <p>WEBSITE INI</p>
        <div class="cards">
            <div class="card">
                <img src="b.png" alt="b">
                <p><b>VISI:</b> Membantu masyarakat dalam mengelola, mendaftar, serta mendapatkan informasi seputar Kartu Identitas Anak (KIA) secara cepat, aman, dan efisien.</p>
            </div>
            <div class="card">
                <img src="b.png" alt="b">
                <p><b>MISI:</b> Menjamin keamanan dan validitas data anak melalui sistem digital yang aman dan terpercaya.</p>
            </div>
            <div class="card">
                <img src="b.png" alt="b">
                <p><b>GOAL:</b> Mewujudkan pelayanan publik yang berbasis digital sesuai dengan perkembangan teknologi informasi.</p>
            </div>
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