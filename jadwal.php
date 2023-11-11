<?php
require_once('koneksi.php');

// Query SQL dengan INNER JOIN antara tabel jadwal dan bus
$query = "SELECT jadwal.*, bus.nama_bus
          FROM jadwal
          INNER JOIN bus ON jadwal.id_bus = bus.id_bus";

$result = $conn->query($query);

// Periksa apakah query berhasil dieksekusi
if (!$result) {
    die("Query tidak berhasil: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Jadwal Bus</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Daftar Jadwal Bus</h2>

<table>
    <tr>
        <th>No</th>
        <th>Nama Bus</th>
        <th>Tujuan</th>
        <th>Jam Kedatangan</th>
        <th>Jam Keberangkatan</th>
    </tr>

    <?php
    // Ambil data dan tampilkan
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
		echo "<td>" . $no++ . "</td>";
        echo "<td>" . $row['nama_bus'] . "</td>";
        echo "<td>" . $row['tujuan'] . "</td>";
        echo "<td>" . $row['jam_datang'] . "</td>";
        echo "<td>" . $row['jam_berangkat'] . "</td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>

<?php
// Tutup koneksi setelah selesai
$conn->close();
?>
