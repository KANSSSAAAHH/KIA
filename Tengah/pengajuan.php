<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DUKCAPIL Sidoarjo</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        header {
            display: none;
        }

        .container {
            display: flex;
            margin: 30px;
            justify-content: center;
        }

        main {
            width: 75%;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
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

        main h2 {
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            text-transform: uppercase;
            margin-top: 60px; /* agar tidak tertimpa tombol */
        }

        main p {
            font-size: 18px;
            margin: 20px 0;
        }

        img {
            display: block;
            margin: 20px auto;
        }

        footer {
            background-color: #000;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 30px;
        }

        .footer-container {
            display: flex;
            justify-content: space-around;
            max-width: 1000px;
            margin: auto;
            flex-wrap: wrap;
            text-align: left;
        }

        .footer-section {
            flex: 1;
            padding: 0 20px;
        }

        .footer-section h3 {
            font-size: 18px;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .footer-section p,
        .footer-section a {
            font-size: 16px;
            color: white;
            text-decoration: none;
        }

        .footer-section a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <main>
            <!-- Tombol Kembali di pojok kiri atas -->
            <a href="../Tengah/about.php" class="btn-back">←</a>

            <h2>Mengisi Formulir</h2>
            <p>Setelah kita login kita akan diarahkan ke formulir pendaftaran KIA secara online dan harap mengisi dengan benar, jangan ada yang tidak diisi satu kolom pun.</p>
            <img src="form1.png" alt="Formulir 1" height="200">
            <img src="form2.png" alt="Formulir 2" height="146">
        </main>
    </div>

    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h3>TENTANG</h3>
                <p>Website untuk mempermudah pengurusan dokumen kependudukan secara Online.</p>
            </div>
            <div class="footer-section">
                <h3>LAYANAN</h3>
                <a href="#">Syarat KIA</a><br>
                <a href="#">Cara Pengajuan</a><br>
                <a href="#">Contact us</a><br>
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
