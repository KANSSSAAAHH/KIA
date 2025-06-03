<?php
session_start();
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifier = trim($_POST['identifier']); 
    $password = trim($_POST['password']);

    if (empty($identifier) || empty($password)) {
        $error = "❌ Semua kolom wajib diisi!";
    } else {
        if (is_numeric($identifier)) {
            $query = "SELECT * FROM pendaftaran WHERE id_pendaftaran = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $identifier);
        } else {
            $query = "SELECT * FROM pendaftaran WHERE username = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $identifier);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        if ($data) {
            if ($password === $data['password']) {
                $_SESSION['user_id'] = $data['id_pendaftaran'];
                $_SESSION['username'] = $data['username'];
                $_SESSION['role'] = $data['role']; // Simpan peran user
                // var_dump($_SESSION['role']);
                // die();

                // Cek role dan arahkan sesuai peran
                if ($data['role'] === 'Admin') {
                    header("Location: ../crud/index.php");
                } else {
                    header('Location: ../login/form.php');
                }
                exit;
            } else {
                $error = "Password salah!";
            }
        } else {
            $error = "Username atau ID tidak ditemukan!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #00c6ff, #0072ff);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 350px;
        }
        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
            display: block;
        }
        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(to right, #00c6ff, #0072ff);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
        button:hover {
            opacity: 0.9;
        }
        .error {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }
        a {
            color: #0072ff;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
        <form method="POST">
            <input type="text" name="identifier" placeholder="Username atau ID" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p>Belum punya akun? <a href="../login/register.php">Registrasi di sini</a></p>
    </div>
</body>
</html>
