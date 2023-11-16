<?php
include '../../classes/databases.php';
include '../../../public/script.php';

$db = new database(); // Membuat objek dari kelas database
$koneksi = $db->koneksi; // Mengambil koneksi dari objek database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data yang dikirimkan dari formulir
    $idBus = $_POST['bus'];
    $tujuan = $_POST['tujuan'];
    $kelas = $_POST['kelas'];
    $jamDatang = $_POST['jam_datang'];
    $jamBerangkat = $_POST['jam_berangkat'];

    // Lakukan pengecekan data
    if (!empty($idBus) && !empty($tujuan) && !empty($kelas) && !empty($jamDatang) && !empty($jamBerangkat)) {
        // Insert data ke database
        $db->tambah_jadwal($idBus, $tujuan, $kelas, $jamDatang, $jamBerangkat);
        header("Location: tampil_jdwl.php?success=tambah");
        exit();
    } else {
        echo "Harap lengkapi semua isian.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD</title>
</head>
<body>
    <h3 class="text-center mt-5">TAMBAH JADWAL BUS</h3>
    <div class="card px-3 py-3" style="margin: 25px auto; padding: 20px; max-width:400px">
        <form action="proses_jdwl.php?aksi=tambah" method="post">
            <table class="table">
                <tr>
                    <td><label for="id_bus">Nama Bus:</label></td>
                    <td>
                        <select name="id_bus" id="id_bus">
                            <?php
                            // Query untuk mengambil nama-nama bus dari tabel bus
                            $query = "SELECT id_bus, nama_bus FROM bus";
                            $result = mysqli_query($koneksi, $query);

                            // Loop untuk menampilkan nama-nama bus dalam dropdown
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='{$row['id_bus']}'>{$row['nama_bus']}</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label class="form-label">Tujuan</label></td>
                    <td><input type="text" name="tujuan" class="form-control"></td>
                </tr>
                <tr>
                    <td><label class="form-label">Kelas</label></td>
                    <td><input type="text" name="kelas" class="form-control"></td>
                </tr>
                <tr>
                    <td><label class="form-label">Jam Kedatangan</label></td>
                    <td><input type="text" name="jam_datang" class="form-control"></td>
                </tr>
                <tr>
                    <td><label class="form-label">Jam Keberangkatan</label></td>
                    <td><input type="text" name="jam_berangkat" class="form-control"></td>
                </tr>
            </table>
            <div class="d-flex justify-content-between">
                <a href="tampil_jdwl.php" class="btn btn-secondary w-100 mx-2">Kembali</a>
                <button type="submit" class="btn btn-primary w-100 mx-2">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>

<?php
// Menutup koneksi database
mysqli_close($koneksi);
?>
