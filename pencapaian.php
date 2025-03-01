<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harapan Adanya</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom,rgb(61, 90, 131),rgb(137, 166, 221));
            color: white;
            overflow-x: hidden;
            position: relative;
        }
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: repeating-linear-gradient(90deg, rgba(255,255,255,0.1) 0px, rgba(255,255,255,0.1) 1px, transparent 2px, transparent 50px);
            z-index: 0;
        }
        .container {
            text-align: center;
            padding: 50px;
            position: relative;
            z-index: 2;
        }
        h1 {
            font-size: 50px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .highlight {
            color: #ff5500;
        }
        .cards {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 50px;
        }
        .card {
            background: black;
            padding: 15px;
            border-radius: 10px;
            border: 2px solid orange;
            width: 300px;
            text-align: center;
        }
        .card img {
            width: 100%;
            border-radius: 5px;
        }
        .card p {
            margin-top: 10px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><span class="highlight">HARAPAN</span> ADANYA</h1>
        <p>WEBSITE INI</p>
        <div class="cards">
            <div class="card">
            <img src="b.png" alt="one background" width="5%" height="auto">
                <p>Membantu masyarakat dalam mengelola, mendaftar, serta mendapatkan informasi seputar Kartu Identitas Anak (KIA) secara cepat, aman, dan efisien. (VISI)</p>
            </div>
            <div class="card">
            <img src="b.png" alt="two background" width="5%" height="auto">
                <p>Menjamin keamanan dan validitas data anak melalui sistem digital yang aman dan terpercaya. (MISI)</p>
            </div>
            <div class="card">
            <img src="b.png" alt="tri background" width="5%" height="auto">
                <p>Mewujudkan pelayanan publik yang berbasis digital sesuai dengan perkembangan teknologi informasi. (GOAL)</p>
            </div>
        </div>
    </div>
</body>
</html>
