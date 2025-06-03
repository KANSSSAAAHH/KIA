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

        /* Tombol kembali pojok kiri atas */
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
            margin-top: 60px; /* Supaya tidak tertutup tombol */
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
            <!-- Tombol kembali -->
            <a href="../Tengah/about.php" class="btn-back">←</a>

            <h2>Mengisi Formulir Pengambilan KIA</h2>
            <p>Setelah kita mengisi formulir pendaftaran, user diharapkan mengisi form pengambilan KIA baik melalui kecamatan, kelurahan, atau langsung ke Dispendukcapil.</p>
            <img src="pengambilan.png" alt="Formulir Pengambilan KIA" height="200">
        </main>
    </div>

    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h3>TENTANG</h3>
                <p>Website untuk mempermudah pengurusan dokumen kependudukan secara online.</p>
            </div>
            <div class="footer-section">
                <h3>LAYANAN</h3>
                <a href="../Tengah/persyaratan.php">Syarat KIA</a><br>
                <a href="../Tengah/about.php">Cara Pengajuan</a><br>
                <a href="../Tengah/contact.php">Contact Us</a><br>
                <a href="../Login/login.php">Masuk</a>
            </div>
            <div class="footer-section">
                <h3>KONTAK</h3>
                <p>📍 Jl. Taman Puspa Sari D-3, Klurak Candi</p>
                <p>📞 083892606102</p>
                <p>✉ Khanzadiyas123@gmail.com</p>
            </div>
        </div>
    </footer>

</body>
</html>
