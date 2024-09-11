<?php
session_start();

// Tangkap input dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Kredensial statis (ganti dengan validasi database dalam aplikasi nyata)
$valid_username = 'admin';
$valid_password = 'admin123';

// Validasi kredensial
if ($username === $valid_username && $password === $valid_password) {
    // Set session dan arahkan ke halaman daftar pelanggan
    $_SESSION['loggedin'] = true;
    header('Location: /Customer/src/views/customer/index.php');
    exit();
} else {
    // Jika gagal, arahkan kembali ke halaman login dengan pesan kesalahan
    header('Location: login.php?error=1');
    exit();
}
?>
