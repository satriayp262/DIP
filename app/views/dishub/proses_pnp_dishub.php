<?php
include '../../classes/databases.php';
include '../../../public/script.php';
$db = new database();

$aksi = $_GET['aksi'];
if ($aksi == "tambah") {
    $db->tambah_pnp($_POST['bulan'], $_POST['tahun'], $_POST['jumlah']);
    header("location:tampil_pnp_dishub.php?success=tambah");
} elseif ($aksi == "update") {
    $db->update_pnp($_POST['id_pnp2'], $_POST['bulan'], $_POST['tahun'], $_POST['jumlah']);
    header("location:tampil_pnp_dishub.php?success=update");
} elseif ($aksi == "hapus") {
    $db->hapus_pnp($_GET['id_pnp2']);
    header("location:tampil_pnp_dishub.php?success=hapus");
}
