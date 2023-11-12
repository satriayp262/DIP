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

    function tambah_jdwl($nim,$nama,$alamat){
        mysqli_query($this->koneksi,"insert into mahasiswa (nim,nama,alamat) values('$nim','$nama','$alamat')");
    }

    function edit($id){
        $hasil=array();
        $data = mysqli_query($this->koneksi,"select * from jadwal where id='$id'");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }

    function update($id, $id_bus, $tujuan, $kelas, $jam_datang, $jam_berangkat){
        mysqli_query($this->koneksi,"update jadwal set id_bus='$id_bus',tujuan='$tujuan' ,kelas='$kelas ,jam_datang='$jam_datang',jam_berangkat='$jam_berangkat' where id='$id'");
    }  

    function hapus($id){
        mysqli_query($this->koneksi,"delete from mahasiswa where id='$id'");
    }    
}