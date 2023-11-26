<?php
include '../../classes/databases.php';
include '../../../public/script.php';
$db = new database();
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

    .content {
        margin-left: 150px;
        padding: 16px;
    }

    body {
        padding-top: 60px;
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
    <div class="content">
        <h3 class="text-center mt-5">EDIT JADWAL BUS</h3>
        <div class="card px-3 py-3" style="margin: 25px auto; padding: 20px; max-width:400px">
            <form action="proses_jdwl.php?aksi=update" method="post">
                <?php
                $editData = $db->edit_jadwal($_GET['id_jadwal']);
                foreach ($editData as $data) {
                ?>
                    <input type="hidden" name="id_jadwal" value="<?php echo isset($data['id_jadwal']) ? $data['id_jadwal'] : ''; ?>">

                    <table class="table">
                        <tr>
                            <td><label for="id_bus">Nama Bus:</label></td>
                            <td>
                                <select name="id_bus" id="id_bus">
                                    <?php
                                    // Menampilkan nama-nama bus dari tabel bus
                                    $daftarBus = $db->tampil_jadwal(); // Mengambil daftar bus dari database
                                    foreach ($daftarBus as $bus) {
                                        $selected = ($bus['id_bus'] == $data['id_bus']) ? 'selected' : '';
                                        echo "<option value='{$bus['id_bus']}' $selected>{$bus['nama_bus']}</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label class="form-label">Tujuan</label></td>
                            <td><input type="text" name="tujuan" class="form-control" value="<?php echo isset($data['tujuan']) ? $data['tujuan'] : ''; ?>"></td>
                        </tr>
                        <tr>
                            <td><label class="form-label">Kelas</label></td>
                            <td><input type="text" name="kelas" class="form-control" value="<?php echo isset($data['kelas']) ? $data['kelas'] : ''; ?>"></td>
                        </tr>
                        <tr>
                            <td><label class="form-label">Jam Kedatangan</label></td>
                            <td><input type="text" name="jam_datang" class="form-control" value="<?php echo isset($data['jam_datang']) ? $data['jam_datang'] : ''; ?>"></td>
                        </tr>
                        <tr>
                            <td><label class="form-label">Jam Keberangkatan</label></td>
                            <td><input type="text" name="jam_berangkat" class="form-control" value="<?php echo isset($data['jam_berangkat']) ? $data['jam_berangkat'] : ''; ?>"></td>
                        </tr>
                    </table>
                    <div class="d-flex justify-content-between">
                        <a href="tampil_jdwl.php" class="btn btn-secondary w-100 mx-2">Kembali</a>
                        <button type="submit" class="btn btn-primary w-100 mx-2">Submit</button>
                    </div>
                <?php
                }
                ?>
            </form>
        </div>
    </div>

    <div class="footer">
        &copy; 2023 Terminal Bus Cilacap
    </div>

</body>

</html>