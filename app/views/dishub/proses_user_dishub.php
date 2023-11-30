<?php
include '../../classes/databases.php';
include '../../../public/script.php';
$db = new database();

$aksi = $_GET['aksi'];
if ($aksi == "tambah") {
    $db->tambah_user($_POST['username'], $_POST['password'], $_POST['level']);
    header("location:tampil_user_dishub.php?success=tambah");
} elseif ($aksi == "update") {
    $db->update_user($_POST['id_user'], $_POST['username'], $_POST['password'], $_POST['level']);
    header("location:tampil_user_dishub.php?success=update");
} elseif ($aksi == "hapus") {
    $db->hapus_user($_GET['id_user']);
    header("location:tampil_user_dishub.php?success=hapus");
}
