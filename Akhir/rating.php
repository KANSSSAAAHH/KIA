<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "ukl_2025";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$status = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nilai_rating = isset($_POST['nilai_rating']) ? (int)$_POST['nilai_rating'] : 0;

    if ($nilai_rating >= 1 && $nilai_rating <= 5) {
        $stmt = $conn->prepare("INSERT INTO rating (nilai_rating) VALUES (?)");
        $stmt->bind_param("i", $nilai_rating);
        if ($stmt->execute()) {
            $status = "Terima kasih sudah mengirimkan rating 😊";
        } else {
            $status = "Gagal mengirim rating: " . $conn->error;
        }
        $stmt->close();
    } else {
        $status = "Silakan pilih rating terlebih dahulu.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rating Website KIA</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #1a365d 0%, #2d3748 50%, #4299e1 100%);
            position: relative;
            overflow-x: hidden;
        }

        /* Animated background patterns */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('mrt.png') no-repeat center center fixed;
            background-size: cover;
            opacity: 0.2;
            z-index: -2;
        }

        body::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 80%, rgba(26, 54, 93, 0.8) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(45, 55, 72, 0.6) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(66, 153, 225, 0.3) 0%, transparent 50%);
            z-index: -1;
        }

        .floating-elements {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .floating-star {
            position: absolute;
            color: rgba(255, 215, 0, 0.6);
            font-size: 20px;
            animation: float-star 8s infinite ease-in-out;
        }

        .floating-star:nth-child(1) {
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-star:nth-child(2) {
            top: 60%;
            right: 15%;
            animation-delay: 2s;
        }

        .floating-star:nth-child(3) {
            bottom: 30%;
            left: 20%;
            animation-delay: 4s;
        }

        .floating-star:nth-child(4) {
            top: 40%;
            right: 30%;
            animation-delay: 6s;
        }

        @keyframes float-star {
            0%, 100% { 
                transform: translateY(0px) rotate(0deg); 
                opacity: 0.6;
            }
            25% { 
                transform: translateY(-20px) rotate(90deg); 
                opacity: 1;
            }
            50% { 
                transform: translateY(-10px) rotate(180deg); 
                opacity: 0.8;
            }
            75% { 
                transform: translateY(-30px) rotate(270deg); 
                opacity: 1;
            }
        }

        .page-wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
            position: relative;
            z-index: 2;
        }

        .back-button {
            position: fixed;
            top: 30px;
            left: 30px;
            background: linear-gradient(135deg, #4299e1, #3182ce);
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(66, 153, 225, 0.3);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            z-index: 1000;
        }

        .back-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(66, 153, 225, 0.4);
            background: linear-gradient(135deg, #3182ce, #2c5aa0);
        }

        .back-button::before {
            content: '←';
            font-size: 1.2rem;
        }

        .header-section {
            text-align: center;
            margin-bottom: 40px;
            animation: slideDown 0.8s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #4299e1, #63b3ed, #90cdf4, #bee3f8);
            background-size: 300% 300%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: gradient-shift 4s ease-in-out infinite;
            margin-bottom: 15px;
            text-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        @keyframes gradient-shift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .page-subtitle {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 300;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }

        .main-container {
            max-width: 600px;
            width: 100%;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(25px);
            border-radius: 25px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
            overflow: hidden;
            position: relative;
            animation: slideUp 0.8s ease-out 0.3s both;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .container-header {
            background: linear-gradient(135deg, rgba(66, 153, 225, 0.3), rgba(49, 130, 206, 0.2));
            padding: 30px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            position: relative;
        }

        .container-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, #4299e1, #63b3ed, #90cdf4);
        }

        .rating-icon {
            font-size: 3rem;
            color: #ffd700;
            margin-bottom: 15px;
            display: block;
            text-shadow: 0 0 20px rgba(255, 215, 0, 0.5);
        }

        .container-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: white;
            margin-bottom: 10px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }

        .container-subtitle {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.8);
            font-weight: 300;
        }

        .form-content {
            padding: 40px 30px;
        }

        .rating-section {
            margin-bottom: 35px;
        }

        .rating-label {
            font-size: 1.1rem;
            color: white;
            font-weight: 500;
            margin-bottom: 25px;
            text-align: center;
            text-shadow: 0 1px 2px rgba(0,0,0,0.3);
        }

        .stars-container {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 30px;
        }

        .star-wrapper {
            position: relative;
        }

        .stars {
            display: flex;
            flex-direction: row-reverse;
            gap: 8px;
        }

        .stars input[type="radio"] {
            display: none;
        }

        .stars label {
            font-size: 2.5rem;
            color: rgba(255, 255, 255, 0.3);
            cursor: pointer;
            transition: all 0.3s ease;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
            position: relative;
            display: inline-block;
        }

        .stars label:hover {
            color: #ffd700;
            transform: scale(1.2);
            text-shadow: 0 0 15px rgba(255, 215, 0, 0.8);
        }

        .stars input[type="radio"]:checked ~ label {
            color: #ffd700;
            text-shadow: 0 0 15px rgba(255, 215, 0, 0.8);
        }

        .stars label:hover ~ label {
            color: #ffd700;
            text-shadow: 0 0 10px rgba(255, 215, 0, 0.6);
        }

        .rating-descriptions {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 10px;
            margin-top: 20px;
            text-align: center;
        }

        .rating-desc {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.7);
            font-weight: 300;
            padding: 5px;
        }

        .submit-section {
            text-align: center;
            margin-top: 30px;
        }

        .submit-box {
            background: linear-gradient(135deg, #4299e1, #3182ce);
            color: white;
            padding: 15px 40px;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(66, 153, 225, 0.3);
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
        }

        .submit-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .submit-box:hover::before {
            left: 100%;
        }

        .submit-box:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(66, 153, 225, 0.4);
            background: linear-gradient(135deg, #3182ce, #2c5aa0);
        }

        .submit-box:active {
            transform: translateY(-1px);
        }

        .message-section {
            margin-top: 25px;
            text-align: center;
        }

        .message-box {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 20px 25px;
            font-size: 1.1rem;
            font-weight: 500;
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            text-shadow: 0 1px 2px rgba(0,0,0,0.3);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            animation: messageSlide 0.5s ease-out;
        }

        @keyframes messageSlide {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .success-message {
            border-left: 4px solid #48bb78;
            background: linear-gradient(135deg, rgba(72, 187, 120, 0.2), rgba(72, 187, 120, 0.1));
        }

        .error-message {
            border-left: 4px solid #f56565;
            background: linear-gradient(135deg, rgba(245, 101, 101, 0.2), rgba(245, 101, 101, 0.1));
        }

        .info-section {
            margin-top: 30px;
            padding: 25px;
            background: rgba(66, 153, 225, 0.1);
            border-radius: 15px;
            border: 1px solid rgba(66, 153, 225, 0.2);
        }

        .info-title {
            font-size: 1.2rem;
            color: white;
            font-weight: 600;
            margin-bottom: 15px;
            text-align: center;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 15px;
            margin-top: 15px;
        }

        .info-item {
            text-align: center;
            padding: 15px 10px;
            background: rgba(66, 153, 225, 0.15);
            border-radius: 10px;
            border: 1px solid rgba(66, 153, 225, 0.2);
            transition: all 0.3s ease;
        }

        .info-item:hover {
            background: rgba(66, 153, 225, 0.2);
            transform: translateY(-2px);
        }

        .info-emoji {
            font-size: 1.5rem;
            display: block;
            margin-bottom: 8px;
        }

        .info-text {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.8);
            font-weight: 300;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .page-title {
                font-size: 2rem;
            }

            .main-container {
                margin: 20px;
            }

            .form-content {
                padding: 30px 20px;
            }

            .stars label {
                font-size: 2rem;
            }

            .rating-descriptions {
                grid-template-columns: 1fr;
                gap: 5px;
            }

            .info-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .back-button {
                top: 20px;
                left: 20px;
                padding: 10px 16px;
                font-size: 0.8rem;
            }
        }

        @media (max-width: 480px) {
            .page-title {
                font-size: 1.8rem;
            }

            .container-title {
                font-size: 1.5rem;
            }

            .stars label {
                font-size: 1.8rem;
            }

            .stars-container {
                gap: 10px;
            }

            .submit-box {
                padding: 12px 30px;
                font-size: 1rem;
            }

            .back-button {
                padding: 8px 12px;
                font-size: 0.75rem;
            }
        }
    </style>
</head>
<body>
    <a href="../awal/kia.php" class="back-button">Kembali</a>

    <div class="floating-elements">
        <div class="floating-star">★</div>
        <div class="floating-star">⭐</div>
        <div class="floating-star">✨</div>
        <div class="floating-star">🌟</div>
    </div>

    <div class="page-wrapper">
        <div class="header-section">
            <h1 class="page-title">SISTEM RATING KIA</h1>
            <p class="page-subtitle">Evaluasi Kepuasan Pengguna Terhadap Website Kartu Identitas Anak</p>
        </div>

        <div class="main-container">
            <div class="container-header">
                <span class="rating-icon">⭐</span>
                <h2 class="container-title">Berikan Penilaian Anda</h2>
                <p class="container-subtitle">Bantuan Anda sangat berharga untuk meningkatkan kualitas layanan kami</p>
            </div>

            <div class="form-content">
                <form method="POST" action="">
                    <div class="rating-section">
                        <div class="rating-label">Seberapa puas Anda dengan website KIA kami?</div>
                        
                        <div class="stars-container">
                            <div class="star-wrapper">
                                <div class="stars">
                                    <input type="radio" id="star5" name="nilai_rating" value="5">
                                    <label for="star5">★</label>
                                    <input type="radio" id="star4" name="nilai_rating" value="4">
                                    <label for="star4">★</label>
                                    <input type="radio" id="star3" name="nilai_rating" value="3">
                                    <label for="star3">★</label>
                                    <input type="radio" id="star2" name="nilai_rating" value="2">
                                    <label for="star2">★</label>
                                    <input type="radio" id="star1" name="nilai_rating" value="1">
                                    <label for="star1">★</label>
                                </div>
                            </div>
                        </div>

                        <div class="rating-descriptions">
                            <div class="rating-desc">Sangat Buruk</div>
                            <div class="rating-desc">Buruk</div>
                            <div class="rating-desc">Cukup</div>
                            <div class="rating-desc">Baik</div>
                            <div class="rating-desc">Sangat Baik</div>
                        </div>
                    </div>

                    <div class="submit-section">
                        <button type="submit" class="submit-box">Kirim Penilaian</button>
                    </div>
                </form>

                <?php if (!empty($status)): ?>
                    <div class="message-section">
                        <div class="message-box <?= strpos($status, 'Terima kasih') !== false ? 'success-message' : 'error-message' ?>">
                            <?= $status ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="info-section">
                    <h3 class="info-title">Mengapa Rating Anda Penting?</h3>
                    <div class="info-grid">
                        <div class="info-item">
                            <span class="info-emoji"></span>
                            <div class="info-text">Meningkatkan Kualitas</div>
                        </div>
                        <div class="info-item">
                            <span class="info-emoji"></span>
                            <div class="info-text">Kepuasan Pengguna</div>
                        </div>
                        <div class="info-item">
                            <span class="info-emoji"></span>
                            <div class="info-text">Layanan Terbaik</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


        <?php if (!empty($status)): ?>
            <div class="message-box"><?= $status ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
