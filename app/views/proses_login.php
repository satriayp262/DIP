<?php
$servername = "localhost"; // Ganti dengan nama server Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "penjadwalan"; // Ganti dengan nama database Anda

// Membuat koneksi
$koneksi = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query ke database untuk mencocokkan data login
    $query = "SELECT * FROM user WHERE username = $username AND password = $password";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Set sesi untuk user yang sudah login
        $_SESSION['username'] = $user['username'];
        $_SESSION['level'] = $user['level'];

        // Redirect ke halaman sesuai level user
        if ($user['level'] === 'admin') {
            header('Location: admin.php');
        } else {
            header('Location: /agen/dashboard.php');
        }
    } else {
        echo 'Username atau password salah.';
    }
} else {
    header('Location: login.php'); // Redirect jika bukan POST request
}
?>
