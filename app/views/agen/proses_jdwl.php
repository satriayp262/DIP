<?php
include '../../../public/script.php';

$koneksi = mysqli_connect("localhost", "root", "", "penjadwalan");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$data = array();

function tambahJadwal($koneksi, $idBus, $tujuan, $kelas, $jamDatang, $jamBerangkat){
    $idBus = mysqli_real_escape_string($koneksi, $idBus);
    $tujuan = mysqli_real_escape_string($koneksi, $tujuan);
    $kelas = mysqli_real_escape_string($koneksi, $kelas);
    $jamDatang = mysqli_real_escape_string($koneksi, $jamDatang);
    $jamBerangkat = mysqli_real_escape_string($koneksi, $jamBerangkat);

    $query = "INSERT INTO jadwal (id_bus, tujuan, kelas, jam_datang, jam_berangkat) VALUES ('$idBus', '$tujuan', '$kelas', '$jamDatang', '$jamBerangkat')";

    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query gagal: " . mysqli_error($koneksi));
    } else {
        header("Location: tampil_jdwl.php");
        exit();
    }
}

function editJadwal($koneksi, $idJadwal, $idBus, $tujuan, $kelas, $jamDatang, $jamBerangkat){
    $idBus = mysqli_real_escape_string($koneksi, $idBus);
    $tujuan = mysqli_real_escape_string($koneksi, $tujuan);
    $kelas = mysqli_real_escape_string($koneksi, $kelas);
    $jamDatang = mysqli_real_escape_string($koneksi, $jamDatang);
    $jamBerangkat = mysqli_real_escape_string($koneksi, $jamBerangkat);

    $query = "UPDATE jadwal SET id_bus='$idBus', tujuan='$tujuan', kelas='$kelas', jam_datang='$jamDatang', jam_berangkat='$jamBerangkat' WHERE id_jadwal='$idJadwal'";
    
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query gagal: " . mysqli_error($koneksi));
    } else {
        header("Location: tampil_jdwl.php");
        exit();
    }
}

function hapusJadwal($koneksi, $idJadwal){
    $query = "DELETE FROM jadwal WHERE id_jadwal='$idJadwal'";
    
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query gagal: " . mysqli_error($koneksi));
    } else {
        header("Location: tampil_jdwl.php");
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['aksi'])) {
    $idJadwal = isset($_POST['id_jadwal']) ? $_POST['id_jadwal'] : '';
    $idBus = $_POST['bus'];
    $tujuan = $_POST['tujuan'];
    $kelas = $_POST['kelas'];
    $jamDatang = $_POST['jam_datang'];
    $jamBerangkat = $_POST['jam_berangkat'];

    if ($_GET['aksi'] == 'tambah') {
        tambahJadwal($koneksi, $idBus, $tujuan, $kelas, $jamDatang, $jamBerangkat);
    } elseif ($_GET['aksi'] == 'edit' && !empty($idJadwal)) {
        editJadwal($koneksi, $idJadwal, $idBus, $tujuan, $kelas, $jamDatang, $jamBerangkat);
    } elseif ($_GET['aksi'] == 'hapus' && !empty($idJadwal)) {
        hapusJadwal($koneksi, $idJadwal);
    }
}

mysqli_close($koneksi);
?>
