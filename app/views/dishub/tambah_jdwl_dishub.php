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
       /* Style the navbar */
       .navbar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: blue;
        /* Warna biru */
        color: white;
        padding: 10px 20px;
        /* Padding atas dan bawah disesuaikan */
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        /* Tambahkan shadow untuk efek visual */
        z-index: 1000;
    }

    /* Style the logo and website name */
    .logo img {
        width: 40px;
        /* Ukuran logo dikurangi */
        height: 40px;
        /* Ukuran logo dikurangi */
        margin-right: 10px;
    }

    /* Style the user section */
    .user {
        display: flex;
        align-items: center;
    }

    /* Style the dropdown button */
    .dropbtn {
        background-color: transparent;
        border: none;
        color: white;
        font-size: 16px;
        cursor: pointer;
        margin-left: 10px;
        /* Tambahkan margin antara dropdown dan username */
    }

    /* Dropdown content (hidden by default) */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 100px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        right: 0;
        /* Dropdown akan muncul di sebelah kanan */
    }

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
        display: block;
    }

    /* Style dropdown links */
    .dropdown-content a {
        color: black;
        padding: 8px 12px;
        /* Padding link dropdown disesuaikan */
        text-decoration: none;
        display: block;
    }

    /* Change dropdown link color on hover */
    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }
    .content {
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
        <nav class="navbar">
            <div class="logo">
                <img src="../../../public/asset/logo.png" alt="Logo">
                <span>Terminal Bus Cilacap</span>
            </div>
            <div class="user">
            <span id="username"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                </svg> admin123</span>
            <div class="dropdown">
                <button onclick="toggleDropdown()" class="dropbtn">▼</button>
                <div id="dropdownContent" class="dropdown-content">
                    <a href="../index.php" onclick="logout()">Logout</a>
                </div>
            </div>
        </div>
        </nav>
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
                                <option value="">Pilih Bus</option>
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