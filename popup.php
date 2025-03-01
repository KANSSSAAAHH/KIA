<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
        }

        /* Tombol */
        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
        }

        /* Overlay */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        /* Pop-up */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
            width: 300px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            text-align: center;
        }

        /* Tombol close */
        .close-btn {
            background: red;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            float: right;
        }

        input {
            width: 90%;
            padding: 8px;
            margin: 8px 0;
        }
    </style>
</head>
<body>

    <button onclick="openPopup('login')">Login</button>
    <button onclick="openPopup('register')">Register</button>

    <div class="overlay" id="overlay" onclick="closePopup()"></div>

    <div class="popup" id="loginPopup">
        <button class="close-btn" onclick="closePopup()">X</button>
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Masuk</button>
        </form>
    </div>

    <div class="popup" id="registerPopup">
        <button class="close-btn" onclick="closePopup()">X</button>
        <h2>Register</h2>
        <form action="register.php" method="POST">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Daftar</button>
        </form>
    </div>

    <script>
        function openPopup(type) {
            document.getElementById("overlay").style.display = "block";
            if (type === 'login') {
                document.getElementById("loginPopup").style.display = "block";
            } else if (type === 'register') {
                document.getElementById("registerPopup").style.display = "block";
            }
        }

        function closePopup() {
            document.getElementById("overlay").style.display = "none";
            document.getElementById("loginPopup").style.display = "none";
            document.getElementById("registerPopup").style.display = "none";
        }
    </script>

</body>
</html>
