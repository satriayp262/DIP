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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query ke database untuk mencocokkan data login
    $query = mysqli_query($koneksi, "SELECT * FROM user where username='$username' && password ='$password'");
    $cek = mysqli_num_rows($query);

    if ($cek>0) {

        // Set sesi untuk user yang sudah login
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;

        // Redirect ke halaman sesuai level user
        if ($user['level'] === 'admin') {
            header('Location: ../views/dishub/dashboard_admin.php');
        } else {
            header('Location: ../views/agen/dashboard.php');
        }
    } else {
        echo 'Username atau password salah.';
        header('Location: login.php'); 
    }
} else {
    header('Location: login.php'); 
}
?>
