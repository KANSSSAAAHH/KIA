<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Child ID Gallery</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 25%, #4facfe 75%, #00f2fe 100%);
            position: relative;
            overflow-x: hidden;
        }

        /* Animated background elements */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 20%, rgba(255,255,255,0.1) 2px, transparent 2px),
                radial-gradient(circle at 80% 80%, rgba(255,255,255,0.1) 2px, transparent 2px),
                radial-gradient(circle at 40% 70%, rgba(78,205,196,0.1) 3px, transparent 3px);
            background-size: 60px 60px, 80px 80px, 100px 100px;
            animation: float 20s ease-in-out infinite;
            z-index: -1;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        /* Header Section */
        .header-section {
            position: relative;
            z-index: 2;
            padding: 80px 20px;
            text-align: center;
            background: rgba(0,0,0,0.2);
            backdrop-filter: blur(20px);
        }

        .main-container {
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(30px);
            border: 2px solid rgba(255,255,255,0.3);
            border-radius: 25px;
            padding: 60px 50px;
            display: inline-block;
            box-shadow: 
                0 25px 50px rgba(0,0,0,0.3),
                inset 0 1px 0 rgba(255,255,255,0.2);
            margin-bottom: 40px;
            position: relative;
            overflow: hidden;
        }

        .main-container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.1) 50%, transparent 70%);
            animation: shimmer 3s ease-in-out infinite;
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        }

        .main-title {
            font-size: 4.5rem;
            font-family: 'Georgia', serif;
            font-weight: bold;
            margin-bottom: 25px;
            letter-spacing: 3px;
            position: relative;
            z-index: 1;
        }

        .word1 { 
            color: #ff6b6b;
            text-shadow: 
                0 0 20px rgba(255,107,107,0.8),
                0 0 40px rgba(255,107,107,0.4),
                2px 2px 4px rgba(0,0,0,0.5);
            animation: glow1 2s ease-in-out infinite alternate;
        }

        .word2 { 
            color: #4ecdc4;
            text-shadow: 
                0 0 20px rgba(78,205,196,0.8),
                0 0 40px rgba(78,205,196,0.4),
                2px 2px 4px rgba(0,0,0,0.5);
            animation: glow2 2s ease-in-out infinite alternate;
        }

        .word3 { 
            color: #ffe66d;
            text-shadow: 
                0 0 20px rgba(255,230,109,0.8),
                0 0 40px rgba(255,230,109,0.4),
                2px 2px 4px rgba(0,0,0,0.5);
            animation: glow3 2s ease-in-out infinite alternate;
        }

        @keyframes glow1 {
            from { text-shadow: 0 0 20px rgba(255,107,107,0.8), 0 0 40px rgba(255,107,107,0.4), 2px 2px 4px rgba(0,0,0,0.5); }
            to { text-shadow: 0 0 30px rgba(255,107,107,1), 0 0 60px rgba(255,107,107,0.6), 2px 2px 4px rgba(0,0,0,0.5); }
        }

        @keyframes glow2 {
            from { text-shadow: 0 0 20px rgba(78,205,196,0.8), 0 0 40px rgba(78,205,196,0.4), 2px 2px 4px rgba(0,0,0,0.5); }
            to { text-shadow: 0 0 30px rgba(78,205,196,1), 0 0 60px rgba(78,205,196,0.6), 2px 2px 4px rgba(0,0,0,0.5); }
        }

        @keyframes glow3 {
            from { text-shadow: 0 0 20px rgba(255,230,109,0.8), 0 0 40px rgba(255,230,109,0.4), 2px 2px 4px rgba(0,0,0,0.5); }
            to { text-shadow: 0 0 30px rgba(255,230,109,1), 0 0 60px rgba(255,230,109,0.6), 2px 2px 4px rgba(0,0,0,0.5); }
        }

        .subtitle {
            font-size: 1.8rem;
            color: #ffffff;
            font-weight: 400;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.6);
            margin-bottom: 30px;
            letter-spacing: 1px;
            position: relative;
            z-index: 1;
        }

        .description {
            font-size: 1.2rem;
            color: rgba(255,255,255,0.95);
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.7;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.4);
            position: relative;
            z-index: 1;
        }

        /* Content Section */
        .content-section {
            position: relative;
            z-index: 2;
            padding: 80px 20px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 40px;
            margin-bottom: 80px;
        }

        .feature-card {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(20px);
            border: 2px solid rgba(255,255,255,0.3);
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            color: white;
            box-shadow: 
                0 15px 35px rgba(0,0,0,0.2),
                inset 0 1px 0 rgba(255,255,255,0.2);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .feature-card:hover::before {
            left: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 
                0 25px 50px rgba(0,0,0,0.3),
                inset 0 1px 0 rgba(255,255,255,0.3);
        }

        .feature-icon {
            font-size: 4rem;
            margin-bottom: 25px;
            display: block;
            filter: drop-shadow(0 0 10px rgba(255,255,255,0.3));
            animation: bounce 2s ease-in-out infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }

        .feature-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: #ffffff;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }

        .feature-description {
            font-size: 1.1rem;
            line-height: 1.6;
            color: rgba(255,255,255,0.9);
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        }

        /* Info Section */
        .info-section {
            background: rgba(255,255,255,0.12);
            backdrop-filter: blur(25px);
            border-radius: 25px;
            padding: 50px;
            margin: 60px 0;
            border: 2px solid rgba(255,255,255,0.3);
            box-shadow: 
                0 20px 40px rgba(0,0,0,0.2),
                inset 0 1px 0 rgba(255,255,255,0.2);
        }

        .info-title {
            font-size: 2.5rem;
            color: #ffffff;
            text-align: center;
            margin-bottom: 40px;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            letter-spacing: 1px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }

        .info-item {
            background: rgba(255,255,255,0.15);
            padding: 30px;
            border-radius: 15px;
            border-left: 5px solid #4ecdc4;
            backdrop-filter: blur(15px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .info-item:hover {
            transform: translateX(5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
        }

        .info-item h4 {
            color: #4ecdc4;
            font-size: 1.3rem;
            margin-bottom: 15px;
            font-weight: 600;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        }

        .info-item p {
            color: rgba(255,255,255,0.95);
            line-height: 1.5;
            font-size: 1.05rem;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        }

        /* Statistics Section */
        .stats-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin: 80px 0;
        }

        .stat-card {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 40px 30px;
            text-align: center;
            border: 2px solid rgba(255,255,255,0.3);
            box-shadow: 
                0 15px 35px rgba(0,0,0,0.2),
                inset 0 1px 0 rgba(255,255,255,0.2);
            transition: all 0.4s ease;
        }

        .stat-card:hover {
            transform: translateY(-8px) scale(1.05);
            box-shadow: 
                0 25px 50px rgba(0,0,0,0.3),
                inset 0 1px 0 rgba(255,255,255,0.3);
        }

        .stat-number {
            font-size: 3.5rem;
            font-weight: bold;
            color: #ffe66d;
            text-shadow: 
                0 0 20px rgba(255,230,109,0.6),
                2px 2px 4px rgba(0,0,0,0.5);
            margin-bottom: 15px;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .stat-label {
            font-size: 1.2rem;
            color: rgba(255,255,255,0.9);
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 600;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        }

        /* Button Section */
        .button-section {
            text-align: center;
            padding: 80px 20px;
            position: relative;
            z-index: 2;
        }

        .satisfaction-text {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(25px);
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 50px;
            border: 2px solid rgba(255,255,255,0.3);
            display: inline-block;
            max-width: 700px;
            box-shadow: 
                0 20px 40px rgba(0,0,0,0.2),
                inset 0 1px 0 rgba(255,255,255,0.2);
        }

        .satisfaction-text h3 {
            color: #ffffff;
            font-size: 1.6rem;
            margin-bottom: 20px;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .satisfaction-text p {
            color: rgba(255,255,255,0.95);
            line-height: 1.7;
            font-size: 1.1rem;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        }

        .button-container {
            display: flex;
            justify-content: center;
            gap: 50px;
            flex-wrap: wrap;
        }

        .button {
            display: inline-block;
            padding: 18px 40px;
            font-size: 1.2rem;
            color: white;
            text-decoration: none;
            border-radius: 50px;
            transition: all 0.4s ease;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
            border: 3px solid transparent;
            position: relative;
            overflow: hidden;
        }

        .button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .button:hover::before {
            left: 100%;
        }

        .rating-btn {
            background: linear-gradient(135deg, #28a745, #20c997, #17a2b8);
            border-color: rgba(255,255,255,0.4);
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }

        .rating-btn:hover {
            background: linear-gradient(135deg, #20c997, #17a2b8, #28a745);
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 15px 40px rgba(40,167,69,0.5);
        }

        .back-btn {
            background: linear-gradient(135deg, #dc3545, #fd7e14, #ffc107);
            border-color: rgba(255,255,255,0.4);
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }

        .back-btn:hover {
            background: linear-gradient(135deg, #fd7e14, #ffc107, #dc3545);
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 15px 40px rgba(220,53,69,0.5);
        }

        /* Footer Section */
        .footer-section {
            background: rgba(0,0,0,0.4);
            backdrop-filter: blur(20px);
            padding: 60px 20px;
            text-align: center;
            position: relative;
            z-index: 2;
            margin-top: 80px;
            border-top: 2px solid rgba(255,255,255,0.2);
        }

        .footer-content {
            max-width: 900px;
            margin: 0 auto;
            color: rgba(255,255,255,0.9);
        }

        .footer-title {
            font-size: 1.5rem;
            color: #ffffff;
            margin-bottom: 20px;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .footer-text {
            line-height: 1.7;
            margin-bottom: 30px;
            font-size: 1.1rem;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        }

        .contact-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .contact-item {
            background: rgba(255,255,255,0.15);
            padding: 25px;
            border-radius: 15px;
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255,255,255,0.2);
            transition: transform 0.3s ease;
        }

        .contact-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .contact-item strong {
            color: #4ecdc4;
            font-size: 1.1rem;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .main-title {
                font-size: 3.5rem;
            }
            
            .features-grid {
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 30px;
            }
        }

        @media (max-width: 768px) {
            .main-title {
                font-size: 2.8rem;
            }

            .button-container {
                gap: 30px;
            }

            .main-container {
                padding: 40px 30px;
            }

            .content-section {
                padding: 60px 15px;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .stats-section {
                grid-template-columns: repeat(2, 1fr);
            }

            .info-section {
                padding: 30px;
            }
        }

        @media (max-width: 480px) {
            .main-title {
                font-size: 2.2rem;
                letter-spacing: 1px;
            }

            .subtitle {
                font-size: 1.4rem;
            }

            .button {
                padding: 15px 30px;
                font-size: 1rem;
            }

            .stats-section {
                grid-template-columns: 1fr;
            }

            .button-container {
                flex-direction: column;
                align-items: center;
                gap: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <div class="header-section">
        <div class="main-container">
            <h1 class="main-title">
                <span class="word1">CHILD</span> 
                <span class="word2">ID</span> 
                <span class="word3">GALLERY</span>
            </h1>
            <div class="subtitle">Kartu Identitas Anak</div>
            <p class="description">
                Platform digital untuk pengelolaan dan pengambilan Kartu Identitas Anak (KIA) 
                dengan sistem yang mudah, aman, dan terpercaya untuk masa depan anak Indonesia.
            </p>
        </div>
    </div>

    <!-- Content Section -->
    <div class="content-section">
        <!-- Features Grid -->
        <div class="features-grid">
            <div class="feature-card">
                <span class="feature-icon">🆔</span>
                <h3 class="feature-title">Identitas Resmi</h3>
                <p class="feature-description">
                    Kartu Identitas Anak merupakan dokumen resmi yang dikeluarkan oleh 
                    Dinas Kependudukan dan Pencatatan Sipil untuk anak di bawah 17 tahun.
                </p>
            </div>
            <div class="feature-card">
                <span class="feature-icon">🛡️</span>
                <h3 class="feature-title">Perlindungan Hukum</h3>
                <p class="feature-description">
                    KIA memberikan perlindungan hukum dan jaminan pengakuan identitas anak 
                    sebagai warga negara Indonesia yang sah.
                </p>
            </div>
            <div class="feature-card">
                <span class="feature-icon">📚</span>
                <h3 class="feature-title">Akses Pendidikan</h3>
                <p class="feature-description">
                    Memudahkan proses pendaftaran sekolah dan akses berbagai program 
                    pendidikan yang disediakan pemerintah.
                </p>
            </div>
        </div>

        <!-- Info Section -->
        <div class="info-section">
            <h2 class="info-title">INFORMASI PENTING TENTANG KIA</h2>
            <div class="info-grid">
                <div class="info-item">
                    <h4>Masa Berlaku</h4>
                    <p>KIA berlaku hingga anak berusia 17 tahun atau sudah menikah</p>
                </div>
                <div class="info-item">
                    <h4>Persyaratan</h4>
                    <p>Akta kelahiran, KK, KTP orang tua, dan pas foto anak</p>
                </div>
                <div class="info-item">
                    <h4>Biaya</h4>
                    <p>Penerbitan KIA tidak dikenakan biaya (gratis)</p>
                </div>
                <div class="info-item">
                    <h4>Waktu Proses</h4>
                    <p>Maksimal 14 hari kerja sejak berkas lengkap</p>
                </div>
            </div>
        </div>

        <!-- Statistics Section -->
        <div class="stats-section">
            <div class="stat-card">
                <div class="stat-number">100%</div>
                <div class="stat-label">Gratis</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">5</div>
                <div class="stat-label">Hari Kerja</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">9/5</div>
                <div class="stat-label">Online</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">∞</div>
                <div class="stat-label">Manfaat</div>
            </div>
        </div>
    </div>

    <!-- Button Section -->
    <div class="button-section">
        <div class="satisfaction-text">
            <h3>EVALUASI KEPUASAN PENGGUNA</h3>
            <p>
                Bantuan Anda dalam memberikan penilaian sangat berharga untuk meningkatkan 
                kualitas layanan kami. Mari bersama-sama membangun sistem yang lebih baik 
                untuk masa depan anak-anak Indonesia.
            </p>
        </div>
        
        <div class="button-container">
            <a href="rating.php" class="button rating-btn">Berikan Penilaian</a>
            <a href="../Awal/kia.php" class="button back-btn">Kembali ke Beranda</a>
        </div>
    </div>

    <!-- Footer Section -->
    <div class="footer-section">
        <div class="footer-content">
            <h3 class="footer-title">SISTEM KIA DIGITAL</h3>
            <p class="footer-text">
                Sistem informasi digital untuk pengelolaan Kartu Identitas Anak (KIA) 
                yang bertujuan memberikan kemudahan akses dan pelayanan terbaik bagi 
                masyarakat Indonesia dalam mengurus dokumen identitas anak.
            </p>
            
            <div class="contact-info">
                <div class="contact-item">
                    <strong>Hotline:</strong><br>
                    1500-537 (24 jam)
                </div>
                <div class="contact-item">
                    <strong>Email:</strong><br>
                    Khanzadiyas123@gmail.com
                </div>
                <div class="contact-item">
                    <strong>Website:</strong><br>
                    http://localhost/kia/Awal/kia.php
                </div>
            </div>
        </div>
    </div>
</body>
</html>