<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
        }
        .container {
            border: 2px solid white;
            padding: 40px;
            backdrop-filter: blur(5px);
            display: inline-block;
        }
        h1 {
            font-size: 60px;
            font-family: serif;
        }
        .word1 { color:rgb(244, 52, 206); }
        .word2 { color:rgb(16, 238, 254); }
        .word3 { color:rgb(221, 201, 154); }
        .word4 { color: #F3FF33; }
        .word5 { color: #FF33F3; }
        .subtitle {
            font-size: 20px;
            margin-top: 10px;
            color: #fff;
        }
        .button {
            display: inline-block;
            margin-top: 50px;
            padding: 10px 20px;
            font-size: 18px;
            color: white;
            background: #444;
            text-decoration: none;
            border-radius: 10px;
        }
        .boxes {
            display: flex;
            justify-content: center;
            margin-top: 200px;
        }
        .box {
            width: 50px;
            height: 50px;
            margin: 5px;
            background: white;
            opacity: 0,5;
        }
    </style>
</head>
<body>
    <img src="fk.png" alt="Background" width="100%" height="100%" style="position: absolute; z-index: -1;">
    <div class="container">
        <h1>
            <span class="word1">CHILD</span> 
            <span class="word2">ID</span> 
            <span class="word3">GALLERY</span>
        </h1>
        <div class="subtitle">KIA</div>
        <a href="#" class="button">THANKS FOR YOUR COMING</a>
        </div>
    </div>
</body>
</html>