<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeline</title>
    <style>
        body {
            background: linear-gradient(135deg,rgb(80, 107, 148),rgb(80, 95, 146));
            color: white;
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .timeline {
            position: relative;
            max-width: 800px;
            margin: 50px auto;
        }
        .timeline::after {
            content: '';
            position: absolute;
            width: 2px;
            background: #777;
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -1px;
        }
        .event {
            position: relative;
            width: 50%;
            padding: 20px;
            box-sizing: border-box;
        }
        .event:nth-child(odd) {
            left: 0;
            text-align: right;
        }
        .event:nth-child(even) {
            left: 50%;
            text-align: left;
        }
        .event::before {
            content: '';
            position: absolute;
            top: 30px;
            width: 15px;
            height: 15px;
            background: #00bcd4;
            border-radius: 50%;
            border: 2px solid white;
            left: calc(100% - 8px);
        }
        .event:nth-child(even)::before {
            left: -7px;
        }
        .back-button {
            margin-top: 25px;
            padding: 10px 20px;
            background: #00bcd4;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 15px;
        }
        .back-button:hover {
            background: #008ba3;
        }
    </style>
</head>
<body>
    <h1>HISTORY PUBLISHED</h1>
    <div class="timeline">
        <div class="event"><h2>2010</h2><p>Identitas anak hanya menggunakan akta kelahiran, kurang praktis untuk keperluan administrasi.</p></div>
        <div class="event"><h2>2015</h2><p>Uji coba dilakukan di beberapa kota seperti Surakarta, Makassar, Balikpapan, dan Malang.</p></div>
        <div class="event"><h2>2017</h2><p>Disdukcapil mulai menerbitkan KIA secara lebih luas ke berbagai daerah.</p></div>
        <div class="event"><h2>2020</h2><p>Pandemi COVID-19 (2020) membuat layanan KIA mengalami kendala, namun mendorong inovasi pembuatan KIA online.</p></div>
        <div class="event"><h2>2022 - 2025</h2><p>Target pemerintah mencapai 100% cakupan KIA bagi seluruh anak di Indonesia, KIA menjadi bagian penting dalam ekosistem administrasi kependudukan berbasis digital.</p></div>
    </div>
    <button class="back-button" onclick="goBack()">Kembali</button>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>