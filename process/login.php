<?php
include("koneksi.php");

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa keberadaan mekanik dengan username dan password yang sesuai
    $query = "SELECT * FROM mekanik WHERE Username='$username' AND Password='$password'";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) == 1) {
        // Jika pengguna ditemukan, mulai sesi dan arahkan ke halaman utama
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['stat'] = 'masuk';
        header('Location: ../admin/landing-page.php'); // Ganti dengan halaman tujuan setelah login
        exit;
    } else {
        // Jika pengguna tidak ditemukan, kembalikan ke halaman login dengan pesan error
        header('Location: index.php?error=1');
        exit;
    }
}

mysqli_close($connect);
