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
            background-color:rgb(0, 0, 0);
            color: white;
            text-align: center;
            padding: 20px;
            width: 100%;
        }

        .footer .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="navbar-left">
        <img src="KIA1.png" alt="KIA1 background" height="100">
    </div>
        <ul>
            <li><a href="home.php">HOME</a></li>
            <li><a href="about.php">ABOUT</a></li>
            <li><a href="galeri.php">GALERI</a></li>
            <li><a href="login.php">LOGIN</a></li>
        </ul>
    </nav>

    <section class="hero">
        <div class="hero-content">
            <h1>WELCOME TO OUR WEBSITE</h1>
            <p>KARTU IDENTITAS ANAK</p>
            <a href="klik.php" class="btn">KLIK</a>
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
                <img src="LIMA.jpg" alt="Layanan 5">
            </div>
            <div class="layanan-item">
                <img src="ENAM.jpg" alt="Layanan 6">
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <p><strong>KONTAK KAMI</strong></p>
            <p>📍 Instagram: knzaadysrd</p>
            <p>📞 Telegram: Asdyass</p>
            <p>✉ Email: khanzadiyas123@gmail.com</p>
        </div>
    </footer>

</body>
</html>
