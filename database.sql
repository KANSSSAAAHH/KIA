CREATE DATABASE mydatabase;
USE mydatabase;

CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    NamaUser VARCHAR(100) NOT NULL,
    NomorTelp VARCHAR(50) UNIQUE NOT NULL,
    Email VARCHAR(50) UNIQUE NOT NULL,
    Password VARCHAR(50) NOT NULL,
    JenisKelamin VARCHAR(10) NOT NULL,
    TanggalRegistrasi DATETIME(6) NOT NULL
);

CREATE TABLE rating (
    id_rating INT AUTO_INCREMENT PRIMARY KEY,
    nilai_rating INT NOT NULL,
    komentar TEXT NOT NULL,
    tanggal_rating DATETIME NOT NULL,
);

CREATE TABLE pendaftaran (
    id_pendaftaran INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(100) NOT NULL,
);

CREATE TABLE kartu (
    id_kartu INT AUTO_INCREMENT PRIMARY KEY,
    nik VARCHAR(100) UNIQUE NOT NULL,
    nama_anak VARCHAR(100) NOT NULL,
    umur INT NOT NULL,
    jenis_kelamin VARCHAR(10) NOT NULL,
    nama_orangtua VARCHAR(100) NOT NULL,
    alamat VARCHAR(255) NOT NULL
);

CREATE TABLE dokumen (
    id_dokumen INT AUTO_INCREMENT PRIMARY KEY,
    type_dokumen ENUM('kartu keluarga', 'akte kelahiran') NOT NULL,
    upload_pada_tanggal DATE NOT NULL
);
