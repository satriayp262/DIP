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


    function tampil_penumpang(){
        $hasil=array();
        $data=mysqli_query($this->koneksi,"select * from penumpang");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
         }
         return $hasil;
    }
}