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
        width: 170px;
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
        margin-left: 170px;
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
</style>

<body>
    <div>
        <nav class="navbar bg-tertiary">
            <div class="container-fluid">
                <div class="navbar-brand">
                    <img src="../../../public/asset/logo.png" alt="Bootstrap" width="30" height="24">
                    Terminal Bus Cilacap
                </div>
            </div>
        </nav>
    </div>

    <div class="sidebar">
        <a href="dashboard_admin.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5" />
            </svg> Dashboard</a>
        <a href="tampil_jdwl_admin.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm15 2h-4v3h4zm0 4h-4v3h4zm0 4h-4v3h3a1 1 0 0 0 1-1zm-5 3v-3H6v3zm-5 0v-3H1v2a1 1 0 0 0 1 1zm-4-4h4V8H1zm0-4h4V4H1zm5-3v3h4V4zm4 4H6v3h4z" />
            </svg> Jadwal Bus</a>
        <a href="tampil_pnp_agen.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
            </svg> Penumpang 1</a>
        <a href="tampil_pnp_dishub.php" style="background-color:cornflowerblue; color:white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
            </svg> Penumpang 2</a>
        <a href="../index.php" style="margin-top: 255px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z" />
                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
            </svg> Logout</a>
    </div>

    <div class="content">
        <div class="px-5 py-2">
            <h3>DAFTAR JUMLAH PENUMPANG BULANAN</h3>
            <div>
                <a href="tambah_pnp_dishub.php" class="btn btn-primary mb-3 float-start"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                    </svg> Tambah Data Jumlah</a>
            </div>
            <div>
                <?php
                if (isset($_GET['success']) && $_GET['success'] == "tambah") {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Jumlah Penumpang Berhasil Ditambahkan!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                } elseif (isset($_GET['success']) && $_GET['success'] == "update") {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Jumlah Penumpang Berhasil Diedit!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                } elseif (isset($_GET['success']) && $_GET['success'] == "hapus") {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data Jumlah Penumpang Berhasil Dihapus!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
                ?>
            </div>
            <div>
                <table class="table table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Jumlah</th>
                            <th>Opsi</th>
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
                                <td>
                                    <a href="edit_pnp_dishub.php?id_pnp2=<?php echo $x['id_pnp2']; ?>&aksi=edit" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg></a>
                                    <a href="proses_pnp_dishub.php?id_pnp2=<?php echo $x['id_pnp2']; ?>&aksi=hapus" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
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
        </div>
        <div class="footer">
            &copy; 2023 Terminal Bus Cilacap
        </div>
    </div>
</body>

</html>