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

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            background-color: white;
        }

        th {
            background-color: #3b5998;
            color: white;
            padding: 12px;
            text-align: left;
            font-weight: bold;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
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
            <a href="../Tengah/persyaratan.php" class="btn-back">←</a>

            <h2>Jadwal Layanan Online DISPENDUKCAPIL</h2>
            <p>Berikut adalah jadwal hari kerja DUKCAPIL Sidoarjo untuk memudahkan masyarakat dalam mengatur waktu kunjungan.</p>

            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Hari</th>
                        <th>Status</th>
                        <th>Jam Kerja</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Senin</td>
                        <td>Active</td>
                        <td>08:00 - 16:00</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Selasa</td>
                        <td>Active</td>
                        <td>08:00 - 16:00</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Rabu</td>
                        <td>Active</td>
                        <td>08:00 - 16:00</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Kamis</td>
                        <td>Active</td>
                        <td>08:00 - 16:00</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Jumat</td>
                        <td>Active</td>
                        <td>08:00 - 15:00</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Sabtu</td>
                        <td>Active</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Minggu</td>
                        <td>Off</td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>

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