<?php

class database{
    var $host="localhost";
    var $username="root";
    var $password="";
    var $db="penjadwalan";
    var $koneksi;

    function __construct()
    {
        $this->koneksi = mysqli_connect($this->host,$this->username,$this->password,$this->db);
    }

    //USER
    public function tampil_jadwal()
    {
        $query = "SELECT jadwal.*, bus.nama_bus
                  FROM jadwal
                  INNER JOIN bus ON jadwal.id_bus = bus.id_bus";

        $result = $this->koneksi->query($query);

        if (!$result) {
            die("Query tidak berhasil: " . $this->koneksi->error);
        }

        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }


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

    public function tampil_penumpang() {
    try {
        $query = "SELECT * FROM tabel_penumpang";
        $result = $this->koneksi($query); // Anggap Anda memiliki metode seperti executeQuery

        // Ambil hasil sebagai array asosiatif
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    } catch (mysqli_sql_exception $e) {
        // Tangani pengecualian, misalnya, log error
        die("Error: " . $e->getMessage());
    }
}

}