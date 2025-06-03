<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "ukl_2025");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Rating</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            background-color: #f4f9ff;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            background-color: #ffffff;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        th, td {
            padding: 12px;
            border: 1px solid #dddddd;
            text-align: center;
        }
        tr:nth-child(even) {
            background-color: #eaf2fb;
        }
        .btn {
            padding: 6px 12px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
            color: white;
            margin: 2px;
            display: inline-block;
        }
        .back-btn {
            background-color: #34495e;
        }
    </style>
</head>
<body>

<h2>Data Rating User</h2>

<table>
    <tr>
        <th>ID Rating</th>
        <th>Nilai Rating</th>
        <th>Tanggal Rating</th>
    </tr>
    <?php
    $result = $conn->query("SELECT * FROM rating ORDER BY id_rating ASC");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id_rating']}</td>
                <td>{$row['nilai_rating']}</td>
                <td>{$row['tanggal_rating']}</td>
              </tr>";
    }
    ?>
</table>

<br>
<a href="../crud/index.php" class="btn back-btn">← Kembali</a>

</body>
</html>