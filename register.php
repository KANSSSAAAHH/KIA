<?php
session_start();
if (isset($_SESSION['loggedInStatus'])) {
    header('Location: index.php');
    exit();
}

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "ukl_2025");

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Validasi input
    $username = isset($_POST['username']) ? trim($_POST['username']) : "";
    $password = isset($_POST['password']) ? trim($_POST['password']) : "";

    if (empty($username) || empty($password)) {
        $errors[] = "Username dan Password tidak boleh kosong!";
    } else {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Gunakan prepared statement
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hashed_password);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Registrasi berhasil! Silakan login.";
            header("Location: login.php");
            exit();
        } else {
            $errors[] = "Terjadi kesalahan saat registrasi. Coba lagi!";
        }

        $stmt->close();
    }

    $conn->close();
    $_SESSION['errors'] = $errors;
    header("Location: register.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="register-style.css" rel="stylesheet">
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="mt-4 card card-body shadow">
                    <h2 style="text-align: center;">REGISTRASI</h2>
                    <hr>

                    <?php
                    if (isset($_SESSION['errors']) && count($_SESSION['errors']) > 0) {
                        foreach ($_SESSION['errors'] as $error) {
                            echo "<div class='alert alert-warning'>$error</div>";
                        }
                        unset($_SESSION['errors']);
                    }

                    if (isset($_SESSION['success'])) {
                        echo "<div class='alert alert-success'>" . $_SESSION['success'] . "</div>";
                        unset($_SESSION['success']);
                    }
                    ?>

                    <form action="register.php" method="POST">
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Daftar</button>
                        </div>
                    </form>

                    <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
