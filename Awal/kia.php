<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROJECT UKL KHANZA</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #3b5998;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-left {
            display: flex;
            align-items: center;
        }

        .navbar-left img {
            width: 100px;
            height: auto;
            margin-right: 10px;
        }

        .navbar ul {
            list-style: none;
            display: flex;
        }

        .navbar ul li {
            margin: 0 15px;
        }

        .navbar ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }

        .navbar ul li a:hover {
            text-decoration: underline;
        }

        /* Add padding to body to compensate for fixed navbar */
        body {
            padding-top: 70px;
        }

        .hero {
            background: linear-gradient(to bottom, #c9a7f5, #92d3f5);
            color: white;
            padding: 100px 20px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            height: 350px;
        }

        .hero-content {
            max-width: 600px;
            text-align: left;
        }

        .hero h1 {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .hero p {
            font-size: 20px;
            margin-bottom: 20px;
        }

        .hero .btn {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .hero .btn:hover {
            background-color: #0056b3;
        }

        .layanan {
            text-align: center;
            padding: 50px 20px;
        }

        .layanan h2 {
            margin-bottom: 20px;
        }

        .layanan-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .layanan-item {
            text-align: center;
            max-width: 300px;
        }

        .layanan-item img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .layanan-item p {
            font-size: 16px;
            margin-top: 10px;
        }

        .footer {
            background-color: black;
            color: white;
            padding: 20px 50px;
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        .footer .footer-section {
            width: 30%;
        }

        .footer .footer-section h3 {
            margin-bottom: 10px;
        }

        .footer .footer-section p, 
        .footer .footer-section ul {
            font-size: 14px;
            line-height: 1.6;
        }

        .footer .footer-section ul {
            list-style: none;
            padding: 0;
        }

        .footer .footer-section ul li {
            margin-bottom: 5px;
        }

        .footer .footer-section ul li a {
            color: white;
            text-decoration: none;
        }

        .footer .footer-section ul li a:hover {
            text-decoration: underline;
        }

        /* Responsive navbar */
        @media (max-width: 768px) {
            .navbar {
                padding: 10px 15px;
            }
            
            .navbar-left img {
                width: 80px;
            }
            
            .navbar ul li {
                margin: 0 10px;
            }
            
            .navbar ul li a {
                font-size: 14px;
            }
            
            body {
                padding-top: 60px;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="navbar-left">
            <img src="KIA1.png" alt="KIA1 background" height="100">
        </div>
        <ul>
            <li><a href="../Tengah/persyaratan.php">HOME</a></li>
            <li><a href="../Tengah/about.php">ABOUT</a></li>
            <li><a href="../Tengah/contact.php">CONTACT</a></li>
        </ul>
    </nav>

    <section class="hero">
        <div class="hero-content">
            <h1>WELCOME TO OUR WEBSITE</h1>
            <p>KARTU IDENTITAS ANAK</p>
            <a href="../login/login.php" class="btn">DAFTAR</a>
        </div>
    </section>

    <section class="layanan">
        <h2>LAYANAN KAMI</h2>
        <div class="layanan-container">
            <div class="layanan-item">
                <img src="SATU.jpg" alt="Layanan 1">
            </div>
            <div class="layanan-item">
                <img src="DUA.jpg" alt="Layanan 2">
            </div>
            <div class="layanan-item">
                <img src="TIGA.jpg" alt="Layanan 3">
            </div>
            <div class="layanan-item">
                <img src="LIMA.jpg" alt="Layanan 4">
            </div>
            <div class="layanan-item">
                <img src="ENAM.jpg" alt="Layanan 5">
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-section">
            <h3>TENTANG</h3>
            <p>Website untuk mempermudah pengurusan kartu identitas anak secara online.</p>
        </div>

        <div class="footer-section">
    <h3>LAYANAN</h3>
    <ul>
        <li><a href="../Tengah/persyaratan.php">Persyaratan</a></li>
        <li><a href="../Tengah/about.php">Cara Pengajuan</a></li>
        <li><a href="../Tengah/contact.php">Contact</a></li>
        <li><a href="../Login/login.php">Daftar</a></li>
    </ul>
</div>

        <div class="footer-section">
            <h3>KONTAK</h3>
            <p>📍 Jl. Taman puspa sari d-3 klurak candi</p>
            <p>📞 083892606102</p>
            <p>✉ Khanzadiyas123@gmail.com</p>
        </div>
    </footer>

</body>
</html>