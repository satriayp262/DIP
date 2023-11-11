<!-- process_login.php -->
<?php
session_start();
require_once('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lakukan validasi atau keamanan tambahan di sini jika diperlukan

    // Query ke database untuk memeriksa kecocokan username dan password
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Login berhasil
        $_SESSION['username'] = $username;
        header('Location: jadwal.php'); // Ganti dengan halaman setelah login
    } else {
        // Login gagal
        echo 'Username atau password salah.';
    }
} else {
    header('Location: login.html'); // Redirect jika bukan POST request
}
?>
