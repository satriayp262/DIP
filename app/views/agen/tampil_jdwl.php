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

        table {
            width: 70%;
            margin: 20px auto;
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
        <nav class="navbar">
            <div class="logo">
                <img src="../../../public/asset/logo.png" alt="Logo">
                <span>Terminal Bus Cilacap</span>
            </div>
            <div class="user">
                <span id="username"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                    </svg> agenbus</span>
                <div class="dropdown">
                    <button onclick="toggleDropdown()" class="dropbtn">▼</button>
                    <div id="dropdownContent" class="dropdown-content">
                        <a href="../index.php" onclick="logout()">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <div class="sidebar">
        <a href="dashboard.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5" />
            </svg> Dashboard</a>
        <a href="tampil_jdwl.php" style="background-color:cornflowerblue; color:white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm15 2h-4v3h4zm0 4h-4v3h4zm0 4h-4v3h3a1 1 0 0 0 1-1zm-5 3v-3H6v3zm-5 0v-3H1v2a1 1 0 0 0 1 1zm-4-4h4V8H1zm0-4h4V4H1zm5-3v3h4V4zm4 4H6v3h4z" />
            </svg> Jadwal Bus</a>
        <a href="tampil_pnp.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
            </svg> Penumpang</a>
    </div>

    <div class="content">
        <div class="px-5 py-2">
            <h3>JADWAL PERJALANAN BUS</h3>
            <div>
                <a href="tambah_jdwl.php" class="btn btn-primary mb-3 float-start"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                    </svg> Tambah Jadwal</a>
            </div>
            <div class="mt-5">
                <?php
                if (isset($_GET['success']) && $_GET['success'] == "tambah") {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Jadwal Bus Berhasil Ditambahkan!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                } elseif (isset($_GET['success']) && $_GET['success'] == "update") {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Jadwal Bus Berhasil Diedit!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                } elseif (isset($_GET['success']) && $_GET['success'] == "hapus") {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data Jadwal Bus Berhasil Dihapus!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                }
                ?>
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
                        <th>Opsi</th>
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
                            <td>
                                <a href="edit_jdwl_admin.php?id_jadwal=<?php echo $x['id_jadwal']; ?>&aksi=edit" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg></a>
                                <a href="proses_jdwl_admin.php?id_jadwal=<?php echo $x['id_jadwal']; ?>&aksi=hapus" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                    </svg></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="footer">
            &copy; 2023 Terminal Bus Cilacap
        </div>
    </div>


</body>

</html>