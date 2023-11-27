<?php
include '../classes/databases.php';
include '../../public/script.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TERMINAL BUS CILACAP</title>
</head>

<style>
    .navbar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background-color: blue;
        color: white;
        padding: 10px;
        z-index: 1000;
    }

    .navbar-brand {
        display: flex;
        align-items: center;
        color: white;
    }

    .navbar-brand img {
        margin-right: 10px;
    }

    .px-5 {
        margin: 0 auto;
        text-align: center;
    }

    table {
        width: 70%;
        margin: 20px auto;
    }

    .sidebar {
        height: 100%;
        width: 150px;
        position: fixed;
        background-color: lightgray;
        padding-top: 5px;
    }

    .sidebar a {
        padding: 5px 15px;
        text-align: left;
        text-decoration: none;
        font-size: 18px;
        color: black;
        display: block;
    }

    .sidebar a:hover {
        background-color: blue;
        color: white;
    }

    .content {
        margin-left: 150px;
    }

    body {
        padding-top: 60px;
    }

    th,
    td {
        padding: 8px;
        text-align: center;
    }

    .footer {
        background-color: blue;
        color: white;
        text-align: center;
        padding: 10px;
    }

    .sidebar a {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: black;
        padding: 10px;
    }

    .sidebar a svg {
        margin-right: 10px;
        vertical-align: middle;
    }

    .container {
        width: 95%;
        /* Sesuaikan lebar container sesuai kebutuhan */
        margin: 0 auto;
        /* Membuat container berada di tengah */
        text-align: justify;
        /* Mengatur rata kanan-kiri */
    }

    .container h4 {
        text-align: center;
    }

    .garis {
        border: none;
        height: 30px;
        /* Tinggi garis footer */
        background-color: blue;
        /* Warna garis footer */
        margin: 0;
        /* Menghapus margin default */
    }
</style>

<body>
    <div>
        <nav class="navbar bg-tertiary">
            <div class="container-fluid">
                <div class="navbar-brand">
                    <img src="../../../public/asset/logo.png" alt="Bootstrap" width="30" height="24">
                    Terminal Bus Cilacap
                </div>
                <div>
                    <a href="login.php"  class="btn btn-primary" style="background-color:blue; color:white;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
            </svg> Login</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="sidebar">
        <a href="index.php" style="background-color:cornflowerblue; color:white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5" />
            </svg> Dashboard</a>
        <a href="jadwal_view.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm15 2h-4v3h4zm0 4h-4v3h4zm0 4h-4v3h3a1 1 0 0 0 1-1zm-5 3v-3H6v3zm-5 0v-3H1v2a1 1 0 0 0 1 1zm-4-4h4V8H1zm0-4h4V4H1zm5-3v3h4V4zm4 4H6v3h4z" />
            </svg> Jadwal Bus</a>
        <a href="penumpang_view.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
            </svg> Penumpang</a>
    </div>

    <div class="content">
        <img src="../../public/asset/Frame 1.png" alt="" style="width: 100%; max-width: 100%; height: auto;">
        <div class="garis"></div>
        <div class="container">
            <h4>Selamat Datang di Website Terminal Bus Cilacap</h4>
            <h6>Terminal Bus Cilacap adalah pusat transportasi yang sibuk dan vital di Kota Cilacap, Jawa Tengah, Indonesia. Terletak strategis di tengah kota, terminal ini merupakan simpul utama bagi perjalanan bus antar kota dan antar provinsi, menjadi pusat aktivitas bagi ribuan penumpang setiap hari.</h6>
            <h6>Dengan desain yang luas dan teratur, terminal ini memiliki beragam fasilitas yang memadai untuk memenuhi kebutuhan para penumpang. Area tunggu yang nyaman dilengkapi dengan bangku-bangku yang tersusun rapi, memberikan kenyamanan bagi para pengguna jasa transportasi yang menunggu keberangkatan. Terdapat juga berbagai warung makan, kios, dan toko-toko kecil yang menjual berbagai keperluan, mulai dari makanan dan minuman hingga barang-barang sehari-hari.</h6>
            <h6>Sistem informasi yang canggih memberikan panduan kepada penumpang mengenai jadwal keberangkatan, rute bus, dan informasi penting lainnya.</h6>
            <h6>Terminal Bus Cilacap juga menampilkan kebersihan dan keteraturan yang terjaga dengan baik, menjadikannya lingkungan yang menyenangkan bagi pengguna jasa transportasi. Dikelilingi oleh kegiatan bervariasi, dari kegiatan pedagang hingga keramaian penumpang yang berdatangan, terminal ini menjadi cerminan kehidupan sehari-hari masyarakat Cilacap.</h6>
            <h6>Dengan fungsi pentingnya sebagai pusat transportasi, Terminal Bus Cilacap tidak hanya menjadi tempat transit tetapi juga merupakan jendela yang menghubungkan Kota Cilacap dengan berbagai daerah lain di Indonesia, menguatkan peranannya sebagai titik penting dalam mobilitas penduduk dan perekonomian lokal.</h6>
        </div>
        <div class="footer">
            &copy; 2023 Terminal Bus Cilacap
        </div>
    </div>

</body>

</html>