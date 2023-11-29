<?php
include '../../classes/databases.php';
include '../../../public/script.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TERMINAL BUS CILACAP</title>
</head>

<style>
    /* Style the navbar */
    .navbar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: blue;
        /* Warna biru */
        color: white;
        padding: 10px 20px;
        /* Padding atas dan bawah disesuaikan */
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        /* Tambahkan shadow untuk efek visual */
        z-index: 1000;
    }

    /* Style the logo and website name */
    .logo img {
        width: 40px;
        /* Ukuran logo dikurangi */
        height: 40px;
        /* Ukuran logo dikurangi */
        margin-right: 10px;
    }

    /* Style the user section */
    .user {
        display: flex;
        align-items: center;
    }

    /* Style the dropdown button */
    .dropbtn {
        background-color: transparent;
        border: none;
        color: white;
        font-size: 16px;
        cursor: pointer;
        margin-left: 10px;
        /* Tambahkan margin antara dropdown dan username */
    }

    /* Dropdown content (hidden by default) */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 100px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        right: 0;
        /* Dropdown akan muncul di sebelah kanan */
    }

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
        display: block;
    }

    /* Style dropdown links */
    .dropdown-content a {
        color: black;
        padding: 8px 12px;
        /* Padding link dropdown disesuaikan */
        text-decoration: none;
        display: block;
    }

    /* Change dropdown link color on hover */
    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }


    .px-5 {
        margin: 0 auto;
        text-align: center;
    }

    .sidebar {
        height: 100%;
        width: 170px;
        position: fixed;
        background-color: lightgray;
        padding-top: 5px;
    }

    .sidebar a {
        padding: 5px 15px;
        text-align: left;
        text-decoration: none;
        font-size: 15px;
        color: black;
        display: block;
    }

    .sidebar a:hover {
        background-color: blue;
        color: white;
    }

    .content {
        margin-left: 170px;
    }

    body {
        padding-top: 60px;
        /* Sesuaikan dengan tinggi navbar Anda */
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
        margin-top: 10px;
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
    <nav class="navbar">
        <div class="logo">
            <img src="../../../public/asset/logo.png" alt="Logo">
            <span>Terminal Bus Cilacap</span>
        </div>
        <div class="user">
            <span id="username"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                </svg> admin123</span>
            <div class="dropdown">
                <button onclick="toggleDropdown()" class="dropbtn">▼</button>
                <div id="dropdownContent" class="dropdown-content">
                    <a href="../index.php" onclick="logout()">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="sidebar">
        <a href="dashboard_admin.php" style="background-color:cornflowerblue; color:white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5" />
            </svg> Dashboard</a>
        <a href="tampil_jdwl_admin.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm15 2h-4v3h4zm0 4h-4v3h4zm0 4h-4v3h3a1 1 0 0 0 1-1zm-5 3v-3H6v3zm-5 0v-3H1v2a1 1 0 0 0 1 1zm-4-4h4V8H1zm0-4h4V4H1zm5-3v3h4V4zm4 4H6v3h4z" />
            </svg> Jadwal Bus</a>
        <a href="tampil_pnp_agen.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
            </svg> Penumpang 1</a>
        <a href="tampil_pnp_dishub.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
            </svg> Penumpang 2</a>
    </div>

    <div class="content">
        <img src="../../../public/asset/Frame 1.png" alt="" style="width: 100%; max-width: 100%; height: auto;">
        <div class="garis"></div>
        <div class="container">
            <h4>Selamat Datang Di Halaman Admin!</h4>
            <h6>Dashboard admin Terminal Bus Cilacap menjadi kendali utama bagi pengelola untuk memantau dan mengelola operasional terminal dengan efisien. Dengan informasi yang terkini tentang jadwal keberangkatan dan kedatangan bus dapat diperoleh dengan cepat dan mudah, dan koordinasi tim yang efektif memastikan operasional yang aman dan efisien.</h6><br>
        </div>
        <div class="footer">
            &copy; 2023 Terminal Bus Cilacap
        </div>
    </div>


</body>

</html>