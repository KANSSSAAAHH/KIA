<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama    = mysqli_real_escape_string($conn, $_POST['nama']);
    $email   = mysqli_real_escape_string($conn, $_POST['email']);
    $no_telp = mysqli_real_escape_string($conn, $_POST['no_telp']);
    $pesan   = mysqli_real_escape_string($conn, $_POST['pesan']);

    $sql = "INSERT INTO keluhan (nama, email, no_telp, pesan) 
            VALUES ('$nama', '$email', '$no_telp', '$pesan')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Pesan berhasil dikirim!'); window.location.href='../awal/kia.php';</script>";
        exit;
    } else {
        echo "<script>alert('Gagal mengirim pesan: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - KIA</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: rgb(58, 86, 128);
            color: white;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            background: black;
        }

        .navbar .left {
            display: flex;
            align-items: center;
        }

        .navbar .left img.garuda-logo {
            width: 50px;
            height: auto;
            margin-right: 10px;
        }

        .navbar .left .logo {
            color: white;
            font-size: 20px;
            font-weight: bold;
        }

        .navbar .right {
            display: flex;
            align-items: center;
        }

        .navbar .right a,
        .navbar .right .logout-btn {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            font-weight: 600;
        }

        .navbar .right .logout-btn {
            background-color: red;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .navbar .right .logout-btn:hover {
            background-color: darkred;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to right, rgb(146, 221, 236), rgb(68, 99, 166));
            padding: 20px;
        }

        .contact-box {
            display: flex;
            background: rgba(64, 98, 146, 0.8);
            padding: 30px;
            border-radius: 10px;
            max-width: 900px;
            width: 100%;
            flex-wrap: wrap;
        }

        .contact-left, .contact-right {
            flex: 1;
            padding: 20px;
        }

        .contact-left h2 {
            margin-bottom: 10px;
        }

        .contact-left p {
            margin-bottom: 10px;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
        }

        .contact-form button {
            background: rgb(255, 3, 3);
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="left">
            <img src="garuda.png" alt="Garuda" class="garuda-logo"> 
            <div class="logo">DUSCAKPIL JAWA TIMUR</div>
        </div>
        <div class="right">
            <a href="../Tengah/persyaratan.php">HOME</a>
            <a href="../Tengah/about.php">ABOUT</a>
            <a href="../Tengah/contact.php">CONTACT</a>
            <a href="../awal/kia.php" class="logout-btn">LOGOUT</a>
        </div>
    </nav>

    <div class="container">
        <div class="contact-box">
            <div class="contact-left">
                <h2>Contact Us</h2>
                <p>Kami siap membantu Anda dalam proses pembuatan Kartu Identitas Anak (KIA). Jika Anda memiliki pertanyaan, membutuhkan informasi lebih lanjut, atau mengalami kendala dalam pendaftaran, jangan ragu untuk menghubungi kami.</p>
                <p>📞 +62 838 9260-6102</p>
                <p>📧 Khanzadiyas123@gmail.com</p>
                <p>📍 Jl. Taman Puspa Sari D-3, Klurak Candi</p>
            </div>
            <div class="contact-right">
                <form class="contact-form" method="POST" action="">
                    <input type="text" name="nama" placeholder="Nama" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="tel" name="no_telp" placeholder="Nomor Telepon" required>
                    <textarea name="pesan" rows="5" placeholder="Pesan" required></textarea>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>
