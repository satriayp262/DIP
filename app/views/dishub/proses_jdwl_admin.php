<?php
include '../../classes/databases.php';
include '../../../public/script.php';
$db = new database();

$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : '';
if ($aksi == "tambah") {
    $db->tambah_jadwal($_POST['id_bus'], $_POST['tujuan'], $_POST['kelas'], $_POST['jam_datang'], $_POST['jam_berangkat']);
    header("location:tampil_jdwl_admin.php?success=tambah");
}elseif($aksi=="update"){
    $db->update_jadwal($_POST['id_jadwal'],$_POST['id_bus'], $_POST['tujuan'], $_POST['kelas'], $_POST['jam_datang'], $_POST['jam_berangkat']);
    header("location:tampil_jdwl_admin.php?success=update");
}elseif($aksi=="hapus"){
    $db->hapus_jadwal($_GET['id_jadwal']);
    header("location:tampil_jdwl_admin.php?success=hapus");
}