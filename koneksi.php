<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "ukl_2025";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("koneksi gagal: " . mysqli_connect_error());
}
?>