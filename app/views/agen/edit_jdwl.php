<?php
include '../../../public/script.php';

$koneksi = mysqli_connect("localhost", "root", "", "penjadwalan");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_GET['id_jadwal'])) {
    $idJadwal = $_GET['id_jadwal'];

    // Query untuk mengambil data jadwal berdasarkan id_jadwal
    $query = "SELECT * FROM jadwal WHERE id_jadwal = $idJadwal";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query gagal: " . mysqli_error($koneksi));
    }

    $data = mysqli_fetch_assoc($result);
} else {
    die("ID Jadwal tidak valid.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TERMINAL BUS CILACAP</title>
</head>
<body>
    <h3 class="text-center mt-5">EDIT JADWAL BUS</h3>
    <div class="card px-3 py-3" style="margin: 25px auto; padding: 20px; max-width:400px">
        <form action="proses_edit_jdwl.php" method="post">
            <input type="hidden" name="id_jadwal" value="<?php echo $data['id_jadwal']; ?>">

            <table class="table">
                <tr>
                    <td><label for="bus">Nama Bus:</label></td>
                    <td>
                        <select name="bus" id="bus">
                            <?php
                            // Query untuk mengambil nama-nama bus dari tabel bus
                            $queryBus = "SELECT id_bus, nama_bus FROM bus";
                            $resultBus = mysqli_query($koneksi, $queryBus);

                            if (!$resultBus) {
                                die("Query gagal: " . mysqli_error($koneksi));
                            }

                            // Loop untuk menampilkan nama-nama bus dalam dropdown
                            while ($rowBus = mysqli_fetch_assoc($resultBus)) {
                                $selected = ($rowBus['id_bus'] == $data['id_bus']) ? 'selected' : '';
                                echo "<option value='{$rowBus['id_bus']}' $selected>{$rowBus['nama_bus']}</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label class="form-label">Tujuan</label></td>
                    <td><input type="text" name="tujuan" class="form-control" value="<?php echo $data['tujuan']; ?>"></td>
                </tr>
                <tr>
                    <td><label class="form-label">Kelas</label></td>
                    <td><input type="text" name="kelas" class="form-control" value="<?php echo $data['kelas']; ?>"></td>
                </tr>
                <tr>
                    <td><label class="form-label">Jam Kedatangan</label></td>
                    <td><input type="text" name="jam_datang" class="form-control" value="<?php echo $data['jam_datang']; ?>"></td>
                </tr>
                <tr>
                    <td><label class="form-label">Jam Keberangkatan</label></td>
                    <td><input type="text" name="jam_berangkat" class="form-control" value="<?php echo $data['jam_berangkat']; ?>"></td>
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
mysqli_close($koneksi);
?>
