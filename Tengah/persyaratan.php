<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DUKCAPIL Sidoarjo</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            background-color: #000;
            color: white;
        }
        .logo {
            display: flex;
            align-items: center;
        }
        .logo img {
            height: 40px;
            margin-right: 10px;
        }
        .logo h1 {
            font-size: 20px;
            margin: 0;
        }
        nav {
            background-color: #000;
            padding: 10px 20px;
        }
        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: flex-end;
        }
        nav ul li {
            margin-left: 20px;
        }
        nav ul li a {
            color: white;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            padding: 10px;
            transition: background 0.3s ease-in-out;
        }
        nav ul li a:hover {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
        }
        .container {
            display: flex;
            margin: 30px;
            gap: 20px;
        }
        aside {
            width: 25%;
            background-color: #e3e3e3;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }
        aside ul {
            list-style-type: none;
            padding: 0;
        }
        aside ul li a {
            text-decoration: none;
            color: #000;
            font-size: 18px;
            font-weight: bold;
            display: block;
            padding: 10px;
            border-radius: 5px;
            background-color: #dcdcdc;
            transition: all 0.3s ease;
        }
        aside ul li a:hover {
            background-color: #b3b3b3;
        }
        main {
            width: 75%;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        main h2 {
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            text-transform: uppercase;
        }
        main ul {
            padding-left: 20px;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="garuda.png" alt="Logo Garuda">
            <h1>DUSCAKPIL JAWA TIMUR</h1>
        </div>
        <nav>
            <ul>
                <li><a href="home.php">HOME</a></li>
                <li><a href="about.php">ABOUT</a></li>
                <li><a href="contact.php">CONTACT</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <aside>
            <ul>
                <li><a href="pelayanan.php">Layanan</a></li>
                <li><a href="identitas.php">KIA</a></li>
                <li><a href="pencapaian.php">Visi Misi</a></li>
            </ul>
        </aside>
        <main>
            <h2>SYARAT DAN KETENTUAN PENGGUNAAN LAYANAN ONLINE DUKCAPIL</h2>
            <p>Warga diharapkan membaca, memahami, dan menyetujui Syarat dan Ketentuan Penggunaan Layanan Online Dukcapil berikut sebelum menggunakan layanan ini.</p>
            <ul>
                <li>Fasilitas layanan ini merupakan media alternatif...</li>
                <li>Warga yang bisa mendapatkan layanan adalah warga dengan domisili Jawa Timur...</li>
                <li>Warga HANYA bisa mendapatkan layanan untuk dirinya sendiri...</li>
                <li>NIK dan Password sepenuhnya menjadi tanggung jawab pengguna...</li>
                <li>Jika warga memiliki lebih dari 1 NIK, hanya satu yang bisa digunakan...</li>
                <li>Layanan hanya akan diproses jika berkas pendukung dinyatakan benar dan lengkap...</li>
                <li>Dinas Kependudukan dan Pencatatan Sipil Provinsi. Jawa Timur dapat memperbaharui ketentuan sewaktu-waktu...</li>
                <li>Dinas Kependudukan dan Pencatatan Sipil Provinsi. Jawa Timur tidak bertanggung jawab atas penyalahgunaan layanan...</li>
                <li>Warga melepaskan Dinas Kependudukan dan Pencatatan Sipil Kab. Sidoarjo dari gugatan terkait penggunaan layanan ini...</li>
            </ul>
        </main>
    </div>
</body>
</html>
