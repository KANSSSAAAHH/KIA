<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, rgb(167, 206, 217), rgb(214, 170, 170));
            color: white;
        }
        .navbar {
            background: rgb(8, 15, 77);
            padding: 15px;
            text-align: center;
        }
        .navbar a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            text-align: center;
        }
        .section {
            display: flex;
            align-items: center;
            margin-bottom: 40px;
            padding: 20px;
            border-radius: 10px;
            border: 3px solid black;
            color: white;
        }
        .section img {
            width: 300px;
            height: auto;
            border-radius: 10px;
        }
        .text {
            flex: 1;
            padding: 20px;
        }
        .reverse {
            flex-direction: row-reverse;
        }
        .penjelasan {
            background-color: rgb(87, 111, 148);
        }
        .jenis {
            background-color: rgb(42, 70, 101);
        }
        .syarat {
            background-color: rgb(81, 95, 124);
        }
        .proses {
            background-color: rgb(40, 78, 107);
        }
        .manfaat {
            background-color: rgb(72, 100, 120);
        }
        .footer {
            background: rgb(0, 0, 0);
            padding: 15px;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>SIMAK BERIKUT INI</h1>
    </div>
    
    <div class="container">
        <div class="section penjelasan" id="penjelasan">
        <img src="g.png" alt="g background" width="25%" height="auto">
            <div class="text">
                <h2 style="color: yellow;">APA ITU KIA?</h2>
                <p>Kartu Identitas Anak (KIA) adalah bukti identitas resmi untuk anak di bawah usia 17 tahun yang berlaku selayaknya Kartu Tanda Penduduk (KTP) untuk orang dewasa pada umumnya. Sama seperti KTP, Kartu Identitas Anak (KIA) ini diterbitkan oleh Dinas Kependudukan dan Pencatatan Sipil (Dukcapil) Kabupaten/Kota.</p>
            </div>
        </div>
        
        <div class="section reverse jenis" id="jenis">
        <img src="ro.png" alt="ro background" width="25%" height="auto">
        <div class="text">
                <h2 style="color: yellow;">JENIS KIA</h2>
                <ul>
                   <p>1. KIA untuk anak usia 0-5 tahun (tanpa foto)</p>
                   <p>2. KIA untuk anak usia 5-17 tahun (dengan foto)</p>
                </ul>
            </div>
        </div>
        
        <div class="section syarat" id="syarat">
        <img src="mo.png" alt="mo background" width="25%" height="auto">
            <div class="text">
                <h2 style="color: yellow;">SYARAT PEMBUATAN KIA</h2>
                <ul>
                    <p>1. Memberikan fotokopi akta kelahiran dan menunjukkan akta kelahiran asli.</p>
                    <p>2. KTP asli kedua orang tuanya/wali ditambah pas foto anak berwarna ukuran 2 x 3 sebanyak 2 lembar.</p>
                    <p>3. Fotokopi Kartu Keluarga (KK)</p>
                </ul>
            </div>
        </div>
        
        <div class="section reverse proses" id="proses">
        <img src="c.png" alt="c background" width="25%" height="auto">
            <div class="text">
                <h2 style="color: yellow;">CARA MENGURUS KIA</h2>
                <ol>
                    <p>1. Pemohon atau orangtua anak menyerahkan persyaratan penerbitan KIA dengan menyerahkan persyaratan ke Dinas Kependudukan dan Pencatatan Sipil (Dukcapil) setempat.</p>
                    <p>2. Kepala Dinas menandatangani dan menerbitkan KIA.</p>
                    <p>3. KIA diberikan kepada pemohon atau orang tuanya di kantor dinas atau kecamatan atau desa/kelurahan.</p>
                    <p>4. Mengambil KIA setelah diproses</p>
                </ol>
            </div>
        </div>
        
        <div class="section manfaat" id="manfaat">
        <img src="e.png" alt="e background" width="25%" height="auto">
        <div class="text">
                <h2 style="color: yellow;">MANFAAT KIA</h2>
                <ul>
                    <p>1. Identitas resmi sebelum memiliki KTP</p>
                    <p>2. Mempermudah akses layanan publik</p>
                    <p>3. Dapat digunakan untuk perjalanan</p>
                    <p>4. Mendukung pendataan penduduk</p>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="footer">
        <p>AYO DAFTAR KARTU IDENTITAS ANAK</p>
    </div>
</body>
</html>