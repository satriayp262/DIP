<?php
include '../../classes/databases.php';
include '../../../public/script.php';
$db = new database();
?>

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

    .content {
        margin-left: 150px;
        padding: 16px;
    }

    body {
        padding-top: 60px;
    }

    .footer {
        background-color: blue;
        color: white;
        text-align: center;
        padding: 10px;
    }
</style>

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

    <div class="content">
        <div class="card px-3 py-3" style="margin: 25px auto; padding: 20px; max-width:400px">
            <h4 class="text-center mt-3">Form Edit Data Jumlah Penumpang</h4>
            <form action="proses_pnp_dishub.php?aksi=update" method="post">
                <?php
                foreach ($db->edit_pnp($_GET['id_pnp2']) as $d) {
                ?>
                    <table>
                        <div class="mb-3">
                            <label class="form-label">Bulan</label>
                            <input type="text" name="bulan" value="<?php echo $d['bulan'] ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tahun</label>
                            <input type="text" name="tahun" value="<?php echo $d['tahun'] ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">jumlah</label>
                            <input type="text" name="jumlah" value="<?php echo $d['jumlah'] ?>" class="form-control">
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="tampil_pnp_agen.php" class="btn btn-secondary w-100 mx-2">Kembali</a>
                            <button type="submit" class="btn btn-primary w-100 mx-2">Submit</button>
                        </div>
                    </table>
                <?php
                }
                ?>
            </form>
        </div>
    </div>

    <div class="footer">
        &copy; 2023 Terminal Bus Cilacap
    </div>

</body>