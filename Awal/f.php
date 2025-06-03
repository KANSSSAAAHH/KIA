<?php

    A[Mulai] --> B[User Mengakses Sistem]
    B --> C{Sudah Terdaftar?}
    
    C -->|Tidak| D[Registrasi/Pendaftaran]
    D --> E[Input Data Lengkap:<br/>- Username & Password<br/>- Nama Lengkap Anak<br/>- Nama Orang Tua<br/>- Alamat<br/>- Role User/Admin]
    E --> F[Data Tersimpan di Tabel Pendaftaran]
    F --> G[Login ke Sistem]
    
    C -->|Ya| G[Login ke Sistem]
    G --> H{Login Berhasil?}
    H -->|Tidak| I[Tampilkan Error]
    I --> G
    
    H -->|Ya| J{Role User?}
    
    J -->|Admin| K[Dashboard Admin]
    K --> L[Kelola Jadwal Pelayanan:<br/>- Set Tanggal & Jam<br/>- Set Kuota Pelayanan]
    L --> M[Lihat Data Pengguna]
    M --> N[Lihat Keluhan & Rating]
    
    J -->|User| O[Dashboard User]
    O --> P[Input Data Pengguna Lengkap:<br/>- NIK, Nama, Jenis Kelamin<br/>- Tempat/Tanggal Lahir<br/>- No KK, Akta Kelahiran<br/>- Data Orang Tua<br/>- Upload Dokumen]
    P --> Q[Data Tersimpan di Tabel Pengguna]
    Q --> R[Pilih Lokasi Pengambilan:<br/>- Kelurahan<br/>- Kecamatan<br/>- Dispendukcapil]
    R --> S[Input Data Pengambilan:<br/>- Nama Kepala Keluarga<br/>- Nama Pemohon<br/>- Alamat Lengkap]
    S --> T[Data Tersimpan di Tabel Pengambilan]
    T --> U[Tunggu Proses Administrasi]
    U --> V{Ada Keluhan?}
    
    V -->|Ya| W[Input Keluhan:<br/>- Nama, Email, No Telp<br/>- Pesan Keluhan]
    W --> X[Data Tersimpan di Tabel Keluhan]
    X --> Y[Admin Proses Keluhan]
    
    V -->|Tidak| Z[Proses Selesai]
    Y --> Z
    Z --> AA[User Memberikan Rating]
    AA --> BB[Data Rating Tersimpan]
    BB --> CC[Selesai]
    
    N --> DD[Respon Keluhan]
    DD --> CC
    
    style A fill:#e1f5fe
    style CC fill:#c8e6c9
    style K fill:#fff3e0
    style O fill:#f3e5f5
    style V fill:#fff9c4
    style J fill:#fff9c4