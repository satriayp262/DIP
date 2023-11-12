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

        table {
            width: 70%;
            margin: 20px auto;
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

        th, td {
            padding: 8px;
            text-align: center; 
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
        <div class="container">
            <a class="navbar-brand">
                <img src="../../../public/asset/logo.png" alt="Bootstrap" width="30" height="24">
                Terminal Bus Cilacap
            </a>
        </div>
    </nav>
</div>

<div class="sidebar">
    <a href="#">Dashboard</a>
    <a href="tampil_jdwl.php">Jadwal Bus</a>
    <a href="#">Penumpang</a>
    <a href="#" style="margin-top: 350px;">Logout</a>
</div>

<div class="content">
<div class="px-5 py-2">
    <h3>JADWAL PERJALANAN BUS</h3>

    <a href="input_jdwl.php" class="btn btn-primary mb-3 float-start">Tambah Jadwal</a>

    <table class="table table-striped">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Nama Bus</th>
                <th>Tujuan</th>
                <th>Kelas</th>
                <th>Jam Kedatangan</th>
                <th>Jam Keberangkatan</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody class="table-light">
            <?php 
            $no = 1;
            foreach($db->tampil_jadwal() as $x){
            ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $x['nama_bus'] ?></td>
                    <td><?php echo $x['tujuan'] ?></td>
                    <td><?php echo $x['kelas'] ?></td>
                    <td><?php echo $x['jam_datang'] ?></td>
                    <td><?php echo $x['jam_berangkat'] ?></td>
                    <td>
                        <a href="edit_jdwl.php" class="btn btn-warning">edit</a>
                        <a href="proses_jdwl.php" class="btn btn-danger">hapus</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
</div>

<div class="footer">
    &copy; 2023 Terminal Bus Cilacap
</div>

</body>
</html>
