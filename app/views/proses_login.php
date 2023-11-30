<?php
session_start(); // Start the session if you haven't already

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Prevent SQL injection using prepared statements
    $query = $koneksi->prepare("SELECT * FROM user WHERE username=? AND password=?");
    $query->bind_param("ss", $input_username, $input_password);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();

        if ($data['level'] == "admin") {
            $_SESSION['username'] = $input_username;
            $_SESSION['level'] = "admin";
            header('Location: ../views/dishub/dashboard_admin.php');
            exit();
        } elseif ($data['level'] == "user") {
            $_SESSION['username'] = $input_username;
            $_SESSION['level'] = "user";
            header('Location: ../views/agen/dashboard.php');
            exit();
        }
    } else {
        // JavaScript alert for incorrect username or password
        echo "<script>alert('Username atau password salah');</script>";
        exit();
    }
}
?>
