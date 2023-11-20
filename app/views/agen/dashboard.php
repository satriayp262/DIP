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
    <style>
        .navbar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background-color: blue; /* Ganti dengan warna latar belakang navbar Anda */
        color: white; /* Ganti dengan warna teks navbar Anda */
        padding: 10px;
        z-index: 1000; /* Pastikan nilai z-index cukup tinggi untuk menempatkan navbar di atas elemen lain */
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

        .sidebar {
            height: 100%;
            width: 150px;
            position: fixed;
            background-color: whitesmoke;
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
            padding: 16px;
        }

        body {
        padding-top: 60px; /* Sesuaikan dengan tinggi navbar Anda */
        }

        .footer {
            background-color: blue;
            color: white;
            text-align: center;
            padding: 10px;
        }
</style>
    </style>
</head
>
<body>
<div class="container">
<div>
    <nav class="navbar bg-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand">
                <img src="../../../public/asset/logo.png" alt="Bootstrap" width="30" height="24">
                Terminal Bus Cilacap
            </a>
        </div>
    </nav>
</div>

<div class="sidebar">
    <a href="dashboard.php" style="background-color:cornflowerblue">Dashboard</a>
    <a href="tampil_jdwl.php">Jadwal Bus</a>
    <a href="tampil_pnp.php">Penumpang</a>
    <a href="#" style="margin-top: 350px;">Logout</a>
</div>

<div class="content">
<img src="../../../public/asset/terminal.png" alt="" style="background-size:cover;">
</div>

<div class="footer">
    &copy; 2023 Terminal Bus Cilacap
</div>
</div>
</body>
</html>
