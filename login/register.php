<?php
session_start();

// Koneksi ke database
$host = "localhost";
$user = "root"; 
$password = ""; 
$dbname = "ukl_2025";  

$koneksi = mysqli_connect($host, $user, $password, $dbname);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_lengkap_anak = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap_anak']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password_plain = mysqli_real_escape_string($koneksi, $_POST['password']);
    $nama_orang_tua = mysqli_real_escape_string($koneksi, $_POST['nama_orang_tua']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $role = mysqli_real_escape_string($koneksi, $_POST['role']);

    // Validasi input
    if (empty($username) || empty($password_plain) || empty($nama_lengkap_anak)) {
        $error = "Field utama tidak boleh kosong!";
    } else {
        // Cek apakah username sudah terdaftar
        $query_check = "SELECT * FROM pendaftaran WHERE username = ?";
        $stmt_check = mysqli_prepare($koneksi, $query_check);
        mysqli_stmt_bind_param($stmt_check, "s", $username);
        mysqli_stmt_execute($stmt_check);
        $result_check = mysqli_stmt_get_result($stmt_check);

        if (mysqli_num_rows($result_check) > 0) {
            $error = "Username sudah terdaftar!";
        } else {
            // Ambil id_keluhan default atau yang pertama
            $keluhan_query = "SELECT id_keluhan FROM keluhan ORDER BY id_keluhan ASC LIMIT 1";
            $keluhan_result = mysqli_query($koneksi, $keluhan_query);
            
            if ($keluhan_row = mysqli_fetch_assoc($keluhan_result)) {
                $default_keluhan = $keluhan_row['id_keluhan'];
                
                // Insert data dengan id_keluhan default
                $query = "INSERT INTO pendaftaran (username, password, role, nama_lengkap_anak, nama_orang_tua, alamat, id_keluhan) 
                          VALUES (?, ?, ?, ?, ?, ?, ?)";
                
                $stmt = mysqli_prepare($koneksi, $query);
                mysqli_stmt_bind_param($stmt, "ssssssi", $username, $password_plain, $role, $nama_lengkap_anak, $nama_orang_tua, $alamat, $default_keluhan);

                if (mysqli_stmt_execute($stmt)) {
                    $last_id = mysqli_insert_id($koneksi);
                    $_SESSION['registration_success'] = "Registrasi berhasil! ID Anda: $last_id";
                    date_default_timezone_set("Asia/Jakarta");
                    $_SESSION['tanggal_pendaftaran'] = date("l, d F Y H:i:s");
                    
                    header("Location: login.php");
                    exit();
                } else {
                    $error = "Registrasi gagal: " . mysqli_error($koneksi);
                }
                mysqli_stmt_close($stmt);
            } else {
                $error = "Error: Tidak ada data keluhan default. Hubungi administrator.";
            }
        }
        mysqli_stmt_close($stmt_check);
    }
}
mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, rgb(98, 245, 255), rgb(115, 155, 241));
        }

        .register-container {
            width: 400px;
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            animation: fadeIn 0.8s ease-in-out;
        }

        h2 {
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
        }

        .error {
            color: red;
            background: #ffe6e6;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(90deg, #007bff, #00d4ff);
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: linear-gradient(90deg, #00d4ff, #007bff);
            transform: scale(1.05);
        }

        .link {
            display: block;
            margin-top: 10px;
            font-size: 14px;
            color: #555;
        }

        .link a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        .link a:hover {
            text-decoration: underline;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Registrasi</h2>
        
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <input type="text" name="nama_lengkap_anak" placeholder="Nama Lengkap Anak" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="nama_orang_tua" placeholder="Nama Orang Tua" required>
            <input type="text" name="alamat" placeholder="Alamat" required>
            <select name="role" required>
                <option value="">-- Pilih Role --</option>
                <option value="User">User</option>
                <option value="Admin">Admin</option>
            </select>
            <button type="submit">Daftar</button>
        </form>
        <p class="link">Sudah punya akun? <a href="login.php">Login di sini</a></p>
    </div>
</body>
</html>