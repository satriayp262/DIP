<?php
include '../classes/databases.php';
include '../../public/script.php';

// Instansiasi class database
$db = new Database();
?>

<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="../../public/css/search.css">

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
            /* Ganti dengan warna latar belakang navbar Anda */
            color: white;
            /* Ganti dengan warna teks navbar Anda */
            padding: 10px;
            z-index: 1000;
            /* Pastikan nilai z-index cukup tinggi untuk menempatkan navbar di atas elemen lain */
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
            /* Sesuaikan dengan tinggi navbar Anda */
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
    </style>
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
        <a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5" />
            </svg> Dashboard</a>
        <a href="jadwal_view.php" style="background-color:cornflowerblue"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm15 2h-4v3h4zm0 4h-4v3h4zm0 4h-4v3h3a1 1 0 0 0 1-1zm-5 3v-3H6v3zm-5 0v-3H1v2a1 1 0 0 0 1 1zm-4-4h4V8H1zm0-4h4V4H1zm5-3v3h4V4zm4 4H6v3h4z" />
            </svg> Jadwal Bus</a>
        <a href="penumpang_view.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
            </svg> Penumpang</a>
        <a href="login.php" style="margin-top: 305px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z" />
                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
            </svg> login</a>
    </div>

    <div class="content">
        <div class="px-5 py-2">
            <h3>JADWAL PERJALANAN BUS</h3>

                    <div class="row height d-flex justify-content-center align-items-center">
                      <div class="col-md-8">
                        <div class="search">
                          <i class="fa fa-search"></i>
                          <input type="text" class="form-control" placeholder="Cari Tujuan Anda">
                          <button class="btn btn-primary">Search</button>
                        </div>                       
                      </div>
                    </div>

            <table class="table table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama Bus</th>
                        <th>Tujuan</th>
                        <th>Kelas</th>
                        <th>Jam Kedatangan</th>
                        <th>Jam Keberangkatan</th>
                    </tr>
                </thead>
                <tbody class="table-light">
                    <?php
                    $no = 1;
                    foreach ($db->tampil_jadwal() as $x) {
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $x['nama_bus'] ?></td>
                            <td><?php echo $x['tujuan'] ?></td>
                            <td><?php echo $x['kelas'] ?></td>
                            <td><?php echo $x['jam_datang'] ?></td>
                            <td><?php echo $x['jam_berangkat'] ?></td>
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