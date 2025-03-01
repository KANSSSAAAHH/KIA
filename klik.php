<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #fce4ec;
            flex-direction: column;
        }
        .card {
            width: 400px;
            height: 300px;
            background-color: pink;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            text-align: center;
            transform: rotate(0deg);
        }
        .card-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            flex: 1;
        }
        .card-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        input {
            width: 90%;
            padding: 5px;
            margin: 5px 0;
            border: none;
            border-radius: 5px;
        }
        .photo {
            width: 100px;
            height: 140px;
            background-color: #fff;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 12px;
            color: gray;
            border: 2px dashed gray;
            overflow: hidden;
        }
        .photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .buttons {
            margin-top: 20px;
            display: flex;
            gap: 10px;
        }
        button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .save-btn { background-color: #4CAF50; color: white; }
        .back-btn { background-color: #f44336; color: white; }
    </style>
</head>
<body>
    <div class="card" id="card">
        <div class="card-content">
            <div class="card-title">KARTU IDENTITAS ANAK</div>
            <input type="text" placeholder="NIK" id="nik">
            <input type="text" placeholder="Nama Lengkap" id="namalengkap">
            <input type="text" placeholder="Tempat/Tgl.Lahir" id="dob">
            <input type="text" placeholder="Jenis Kelamin" id="dob">
            <input type="text" placeholder="Agama" id="dob">
            <input type="text" placeholder="Kewarganegaraan" id="dob">
            <input type="text" placeholder="Alamat" id="address">
        </div>
        <div class="photo" id="photo" onclick="document.getElementById('fileInput').click()">
            <span>Tambahkan Foto</span>
        </div>
        <input type="file" id="fileInput" accept="image/*" style="display: none;" onchange="previewPhoto(event)">
    </div>
    <div class="buttons">
        <button class="save-btn" onclick="saveCard()">SAVE</button>
        <button class="back-btn" onclick="goBack()">BACK</button>
    </div>
    
    <script>
        function previewPhoto(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const photoDiv = document.getElementById("photo");
                    photoDiv.innerHTML = `<img src="${e.target.result}" alt="Foto Anak">`;
                }
                reader.readAsDataURL(file);
            }
        }
        
        function saveCard() {
            html2canvas(document.getElementById("card")).then(canvas => {
                let link = document.createElement("a");
                link.download = "kartu_identitas.png";
                link.href = canvas.toDataURL();
                link.click();
            });
        }
        
        function goBack() {
            window.history.back();
        }
    </script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
</body>
</html>
