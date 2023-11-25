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

<h3 class="text-center mt-5">Edit Data Dosen</h3>
<div class="card px-3 py-3" style="margin: 25px auto; padding: 20px; max-width:400px">
    <form action="proses_pnp.php?aksi=update" method="post">
        <?php
        foreach ($db->edit_penumpang($_GET['id_pa']) as $d) {
        ?>
            <table>
                <div class="mb-3">
                    <label class="form-label">Nama PO</label>
                    <input type="hidden" name="id_pa" value="<?php echo $d['id_pa'] ?>" class="form-control">
                    <input type="text" name="nama_po" value="<?php echo $d['nama_po'] ?>" class="form-control">
                </div>
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
                    <a href="tampil_pnp.php" class="btn btn-secondary w-100 mx-2">Kembali</a>
                    <button type="submit" class="btn btn-primary w-100 mx-2">Submit</button>
                </div>
            </table>
        <?php
        }
        ?>
    </form>
</div>