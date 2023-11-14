<?php
include '../../classes/databases.php';
include '../../../public/script.php';

// Instansiasi class database
$db = new Database();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TERMINAL BUS CILACAP</title>
    <style>
        .navbar {
            background-color: blue;
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
    <a href="dashboard.php">Dashboard</a>
    <a href="tampil_jdwl.php">Jadwal Bus</a>
    <a href="#">Penumpang</a>
    <a href="#" style="margin-top: 350px;">Logout</a>
</div>

<div class="content">
<div class="px-5 py-2">
    <img src="" alt="">
</div>
</div>

<div class="footer">
    &copy; 2023 Terminal Bus Cilacap
</div>

</body>
</html>
