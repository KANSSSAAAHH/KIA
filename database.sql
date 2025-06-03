CREATE DATABASE mydatabase;
USE mydatabase;

CREATE TABLE pengguna (
    id_user INT(250) AUTO_INCREMENT PRIMARY KEY,
    nik VARCHAR(100) NOT NULL,
    nama_lengkap VARCHAR(100) NOT NULL,
    jenis_kelamin set('Laki-laki','Perempuan') NOT NULL,
    golongan_darah set('A','B','AB','O') NOT NULL,
    tempat_lahir VARCHAR(100) NOT NULL,
    tanggal_lahir date NOT NULL,
    no_kk VARCHAR(150) NOT NULL,
    no_akta_keluarga INT(150) NOT NULL,
    agama set('islam','kristen','katolik','budha','hindu') NOT NULL,
    kewarganegaraan set ('wni','wna') NOT NULL,
    alamat text NOT NULL,
    pendidikan VARCHAR(100) NOT NULL,
    nama_ayah VARCHAR(100) NOT NULL,
    nama_ibu VARCHAR(100) NOT NULL,
    kebangsaan VARCHAR(100) NOT NULL,
    hubungan_keluarga set('orang tua','wali','anak','lain-lain') NOT NULL,
    cacat_menurut_jenis set('tidak ada','cacat badan','cacat mental','tuna wicara','cacat jiwa') NOT NULL,
    tanggal_pendaftaran date NOT NULL,
    nama_kepala_keluarga VARCHAR(150) NOT NULL,
    file_kk VARCHAR(240) NOT NULL,
    file_ktp_ayah VARCHAR(240) NOT NULL,
    file_ktp_ibu VARCHAR(240) NOT NULL,
    pas_foto_anak VARCHAR(240) NOT NULL,
);

CREATE TABLE rating (
    id_rating INT(50) AUTO_INCREMENT PRIMARY KEY,
    nilai_rating INT(50) NOT NULL,
    tanggal_rating timestamp NOT NULL,
);

CREATE TABLE keluhan (
    id INT(150) AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(200) NOT NULL,
    email VARCHAR(200) NOT NULL,
    no_telp VARCHAR(200) NOT NULL,
    pesan text NOT NULL,
);

CREATE TABLE pendaftaran (
    id_pendaftaran INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(10001) NOT NULL,
    password VARCHAR(100) NOT NULL,
    role enum('admin','user') NOT NULL,
    nama_lengkap_anak VARCHAR(1000) NOT NULL,
    nama_orang_tua VARCHAR(1000) NOT NULL,
    alamat VARCHAR(255) NOT NULL,
);

CREATE TABLE pengambilan (
    id INT(240) AUTO_INCREMENT PRIMARY KEY,
    pilihan_pengambilan ENUM('Di Kecamatan', 'Di Kelurahan', 'Di Dispendukcapil') NOT NULL,
    nama_kepala_keluarga VARCHAR(200) NOT NULL,
    nama_pemohon VARCHAR(200) NOT NULL,
    email_pemohon VARCHAR(100) NOT NULL,
    desa VARCHAR(200) NOT NULL,
    kelurahan VARCHAR(200) NOT NULL,
    kecamatan VARCHAR(200) NOT NULL,
    kabupaten_kota VARCHAR(200) NOT NULL,
    provinsi ENUM('Jawa Timur') DEFAULT NOT NULL,
);

