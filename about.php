<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: rgb(59, 79, 108);
        }
        header {
            background: rgb(199, 224, 234);
            color: white;
            padding: 20px;
            font-size: 28px;
            text-align: center;
            font-weight: bold;
        }
        nav {
            display: flex;
            justify-content: center;
            gap: 20px;
            padding: 15px;
            background: rgb(85, 120, 149);
            box-shadow: 0px 4px 8px rgb(0, 0, 0);
        }
        nav a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            padding: 12px 20px;
            background: rgb(0, 0, 0);
            border-radius: 8px;
            transition: 0.3s;
        }
        nav a:hover {
            background: rgb(100, 110, 120);
        }
        .container {
            background: white;
            padding: 30px;
            margin: 30px auto;
            width: 70%;
            box-shadow: 0px 5px 15px rgb(0, 0, 0);
            text-align: left;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 20px;
            flex-direction: column;
        }
        .content {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .content img {
            width: 150px;
            height: auto;
            border-radius: 10px;
        }
        .text-content {
            flex: 1;
        }
        h2 {
            color: #0056b3;
            font-size: 26px;
        }
        p {
            font-size: 18px;
            line-height: 1.6;
            color: #333;
        }
        .button-container {
            margin-top: 20px;
        }
        .btn-back {
            text-decoration: none;
            padding: 12px 20px;
            font-size: 18px;
            color: white;
            background: #444;
            border-radius: 8px;
            transition: 0.3s;
        }
        .btn-back:hover {
            background: rgb(195, 39, 39);
        }
    </style>
</head>
<body>
    <header>ABOUT OUR'S</header>
    <nav>
        <a href="pada-saat.php">PADA SAAT</a>
        <a href="pencapaian.php">PENCAPAIAN</a>
    </nav>
    <div class="container">
        <div class="content">
            <img src="your-image.jpg" alt="Deskripsi Gambar">
            <div class="text-content">
                <h2>DAFTAR DAN MASUK</h2>
                <p>Sebelum Kita bisa menggunakan Layanan Disdukcapil Online, hal pertama yang harus diperhatikan adalah akun. Kita harus memiliki akun untuk bisa menggunakan Layanan Disdukcapil Online. lalu, Bagaimana kita bisa mendapatkan akun ?</p>
                <p>Masuk Halaman Login, dengan cara tekan navigasi "Masuk" pada bagian navbar atas, lalu tekan tombol "Daftar" pada bagian samping</p>
            </div>
        </div>
        <div class="button-container">
            <a href="kia.php" class="btn-back">BACK</a>
        </div>
    </div>
</body>
</html>
