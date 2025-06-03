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
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 20px;
            background-color: #000;
            color: white;
        }
        .logo {
            display: flex;
            align-items: center;
        }
        .logo img {
            height: 35px;
            margin-right: 10px;
        }
        .logo h1 {
            font-size: 20px;
            margin: 0;
        }
        nav {
            flex-grow: 1;
            text-align: right;
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
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            padding: 10px;
            transition: background 0.3s ease-in-out;
        }
        nav ul li a:hover {
            background: rgba(255, 255, 255, 0.2);
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
            list-style: none;
            padding: 0;
        }
        aside ul li a {
            text-decoration: none;
            color: #000;
            font-size: 18px;
            font-weight: bold;
            display: block;
            padding: 10px;
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
                <li><a href="../Tengah/home.php">HOME</a></li>
                <li><a href="../Tengah/about.php">ABOUT</a></li>
                <li><a href="../Tengah/contact.php">CONTACT</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <aside>
            <ul>
                <li><a href="../Tengah/pengajuan.php">Mengisi Form</a></li>
                <li><a href="../Tengah/nextstep.php">Pengambilan KIA</a></li>
                <li><a href="../Tengah/selesai.php">Selesai</a></li>
            </ul>
        </aside>
        <main>
            <h2>DAFTAR & MASUK</h2>
            <p>Sebelum menggunakan layanan Dispendukcapil Online, Anda harus membuat akun terlebih dahulu.</p>
            <ul>
                <li>Masuk Halaman "registrasi" terlebih dalalu</li>
                <li>Ketika sudah mengisi form "registrasi" lalu masukan username dan password di login</li>
            </ul>
            <img src="Lgn.jpg" alt="Login" height="200">
            <img src="Rgs.jpg" alt="Register" height="200">
        </main>
    </div>
</body>
</html>
