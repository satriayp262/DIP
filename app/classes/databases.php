<?php

class database {
    var $host = "localhost";
    var $username = "root";
    var $password = "";
    var $db = "penjadwalan";
    var $koneksi;

    function __construct() {
        $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->db);
    }

    // Operasi terkait jadwal
    function tampil_jadwal() {
        $hasil = array();
        $data = mysqli_query($this->koneksi, "SELECT jadwal.*, bus.nama_bus FROM jadwal INNER JOIN bus ON jadwal.id_bus = bus.id_bus");
        while ($d = mysqli_fetch_array($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }

    function tambah_jadwal($idBus, $tujuan, $kelas, $jamDatang, $jamBerangkat) {
        mysqli_query($this->koneksi, "INSERT INTO jadwal (id_bus, tujuan, kelas, jam_datang, jam_berangkat) VALUES ('$idBus', '$tujuan', '$kelas', '$jamDatang', '$jamBerangkat')");
    }
    

    function edit_jadwal($idJadwal) {
        $hasil = array();
        $data = mysqli_query($this->koneksi, "SELECT * FROM jadwal WHERE id_jadwal='$idJadwal'");
        while ($d = mysqli_fetch_array($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }

    function update_jadwal($idJadwal, $idBus, $tujuan, $kelas, $jamDatang, $jamBerangkat) {
        mysqli_query($this->koneksi, "UPDATE jadwal SET id_bus='$idBus', tujuan='$tujuan', kelas='$kelas', jam_datang='$jamDatang', jam_berangkat='$jamBerangkat' WHERE id_jadwal='$idJadwal'");
    }

    function hapus_jadwal($idJadwal) {
        mysqli_query($this->koneksi, "DELETE FROM jadwal WHERE id_jadwal='$idJadwal'");
    }

    // Operasi terkait penumpang
    function tampil_penumpang() {
        $hasil = array();
        $data = mysqli_query($this->koneksi, "SELECT * FROM penumpang");
        while ($d = mysqli_fetch_array($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }
}
