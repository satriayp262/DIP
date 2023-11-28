<?php
// File databases.php
$host = "localhost";
$user = "root";
$password = "";
$database = "penjadwalan";

$koneksi = new mysqli($host, $user, $password, $database);

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
}

if (isset($_GET['keyword'])) {
    // Proses kata kunci pencarian
    $keyword = $_GET['keyword'];
    $sql = "SELECT * FROM jadwal WHERE tujuan LIKE '%$keyword%'";

    $result = $koneksi->query($sql);

    // Tampilkan hasil pencarian dalam tabel
    if ($result->num_rows > 0) {
        echo "<div style='text-align: center;'>";
        echo "<h2>Hasil Pencarian</h2>";
        echo "<table border='1'>";
        echo "<tr><th>No</th><th>Nama Bus</th><th>Tujuan</th><th>Kelas</th><th>Jam Datang</th><th>Jam Berangkat</th></tr>";

        $no = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . $row['id_bus'] . "</td>";
            echo "<td>" . $row['tujuan'] . "</td>";
            echo "<td>" . $row['kelas'] . "</td>";
            echo "<td>" . $row['jam_datang'] . "</td>";
            echo "<td>" . $row['jam_berangkat'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</div>";
    } else {
        $pesan = "Maaf, data yang Anda cari tidak ditemukan!";
        echo '<script type="text/javascript">';
        echo 'alert("' . $pesan . '");';
        echo 'window.location.href = "jadwal_view.php";';
        echo '</script>';
    }
    // Tutup koneksi
    $koneksi->close();
} else {
    echo "Jadwal tidak ditemukan.";
}
?>
