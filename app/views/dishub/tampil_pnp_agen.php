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
    </style>
</head>

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
        <a href="dashboard_admin.php" style="background-color:cornflowerblue">Dashboard</a>
        <a href="tampil_jdwl_admin.php">Jadwal Bus</a>
        <a href="tampil_pnp_agen.php">Penumpang 1</a>
        <a href="tampil_pnp_dishub.php">Penumpang 2</a>
        <a href="../index.php" style="margin-top: 350px;">Logout</a>
    </div>

    <div class="content">
        <div class="px-5 py-2">
            <h3>DAFTAR JUMLAH PENUMPANG BULANAN</h3>
            <div>
                <table class="table table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody class="table-light">
                        <?php
                        $no = 1;
                        foreach ($db->tampil_pnp() as $x) {
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $x['bulan'] ?></td>
                                <td><?php echo $x['tahun'] ?></td>
                                <td><?php echo $x['jumlah'] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="footer">
        &copy; 2023 Terminal Bus Cilacap
    </div>
</body>

</html>