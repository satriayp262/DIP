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
    <title>TERMINAL BUS CILACAP</title>
</head>

<style>
    .navbar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background-color: blue;
        color: white;
        padding: 10px;
        z-index: 1000;
    }

    .navbar-brand {
        display: flex;
        align-items: center;
        color: white;
    }

    .navbar-brand img {
        margin-right: 10px;
    }

    .px-5 {
        margin: 0 auto;
        text-align: center;
    }

    table {
        width: 70%;
        margin: 20px auto;
    }

    .sidebar {
        height: 100%;
        width: 150px;
        position: fixed;
        background-color: whitesmoke;
        padding-top: 5px;
    }

    .sidebar a {
        padding: 5px 15px;
        text-align: left;
        text-decoration: none;
        font-size: 18px;
        color: black;
        display: block;
    }

    .sidebar a:hover {
        background-color: blue;
        color: white;
    }

    .content {
        margin-left: 150px;
        padding: 16px;
    }

    body {
        padding-top: 60px;
    }

    th,
    td {
        padding: 8px;
        text-align: center;
    }

    .footer {
        background-color: blue;
        color: white;
        text-align: center;
        padding: 10px;
    }
</style>

<body>
    <div>
        <nav class="navbar bg-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand">
                    <img src="../../../public/asset/logo.png" alt="Bootstrap" width="30" height="24">
                    Terminal Bus Cilacap
                </a>
            </div>
        </nav>
    </div>

    <div class="sidebar">
        <a href="dashboard.php">Dashboard</a>
        <a href="tampil_jdwl.php" style="background-color:cornflowerblue">Jadwal Bus</a>
        <a href="tampil_pnp.php">Penumpang</a>
        <a href="#" style="margin-top: 350px;">Logout</a>
    </div>
    <div class="content">
        <h3 class="text-center">TAMBAH JADWAL BUS</h3>
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
                    <button type="submit" class="btn btn-success w-100 mx-2">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <div class="footer">
        &copy; 2023 Terminal Bus Cilacap
    </div>

</body>

</html>

<?php
// Menutup koneksi database
mysqli_close($koneksi);
?>