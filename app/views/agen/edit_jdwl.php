<?php
include '../../classes/databases.php';
include '../../../public/script.php';
$db = new database();
?>

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
    </style>
</head>

<div>
    <nav class="navbar bg-primary">
        <div class="container">
            <a class="navbar-brand">
                <img src="../../../public/asset/logo.png" alt="Bootstrap" width="30" height="24">
                Terminal Bus Cilacap
            </a>
        </div>
    </nav>
</div>

<h3 class="text-center mt-5">Edit Jadwal Perjalanan Bus</h3>
<div class="card px-3 py-3" style="margin: 25px auto; padding: 20px; max-width:400px">
<form action="proses_jdwl.php?aksi=update" method="post">
    <?php
    foreach ($db -> edit($_GET['id_jadwal']) as $d){
    ?>
    <table>
    <div class="mb-3">
        <label class="form-label">Nama Bus</label>
        <input type="hidden" name="id" value="<?php echo $d['id'] ?>" class="form-control">
        <input type="text" name="nama_bus" value="<?php echo $d['nama_bus'] ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Tujuan</label>
        <input type="text" name="tujuan" value="<?php echo $d['tujuan'] ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Kelas</label>
        <input type="text" name="kelas" value="<?php echo $d['kelas'] ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Jam Kedatangan</label>
        <input type="text" name="jam_datang" value="<?php echo $d['jam_datang'] ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Jam Keberangkatan</label>
        <input type="text" name="jam_berangkat" value="<?php echo $d['jam_berangkat'] ?>" class="form-control">
    </div>
    <div class="d-flex justify-content-between">
    <a href="tampil_mhs.php" class="btn btn-secondary w-100 mx-2">Kembali</a>
    <button type="submit" class="btn btn-primary w-100 mx-2">Submit</button>
    </div>
    </table>
    <?php
    }
    ?>
</form>
</div>