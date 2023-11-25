<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "penjadwalan";

// Membuat koneksi
$koneksi = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

// Query ke database untuk mencocokkan data login
$query = mysqli_query($koneksi, "SELECT * FROM user where username='$username' && password ='$password'");
$cek = mysqli_num_rows($query);

if ($cek > 0) {

    $data = mysqli_fetch_assoc($query);

    // Redirect ke halaman sesuai level user
    if ($data['level'] == "admin") {

        $_SESSION['username'] = $username;
        $_SESSION['level'] = "admin";
        header('Location: ../views/dishub/dashboard_admin.php');
    } else if ($data['level'] == "user") {

        $_SESSION['username'] = $username;
        $_SESSION['level'] = "user";
        header('Location: ../views/agen/dashboard.php');
    } else {
        echo 'Username atau password salah.';
        header('Location: login.php');
    }
} else {
    header('Location: login.php');
}
