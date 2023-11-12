<?php
include '../../classes/databases.php';
include '../../../public/script.php';
$db = new database();

$aksi= $_GET['aksi'];
if($aksi=="tambah"){
    $db->tambah_jdwl($_POST['nama'], $_POST['nidn'], $_POST['alamat']);
    header("location:tampil_jdwl.php?success=tambah");
}elseif($aksi=="update"){
    $db->update($_POST['id'],$_POST['id_bus'], $_POST['tujuan'], $_POST['kelas'], $_POST['jam_datang'], $_POST['jam_berangkat']);
    header("location:tampil_jdwl.php?success=update");
}elseif($aksi=="hapus"){
    $db->hapus($_GET['id']);
    header("location:tampil_jdwl.php?success=hapus");
}
   