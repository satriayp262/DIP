<?php
include '../../classes/databases.php';
include '../../../public/script.php';
$db = new database();

$aksi = $_GET['aksi'];
if ($aksi == "tambah") {
    $db->tambah_penumpang($_POST['nama_po'], $_POST['bulan'], $_POST['jumlah']);
    header("location:tampil_pnp.php?success=tambah");
} elseif ($aksi == "update") {
    $db->update_penumpang($_POST['id_pa'], $_POST['nama_po'], $_POST['bulan'], $_POST['jumlah']);
    header("location:tampil_pnp.php?success=update");
} elseif ($aksi == "hapus") {
    $db->hapus_penumpang($_GET['id_pa']);
    header("location:tampil_pnp.php?success=hapus");
}
