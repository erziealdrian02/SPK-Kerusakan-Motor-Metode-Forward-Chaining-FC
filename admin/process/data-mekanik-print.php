<?php
include("koneksi.php");

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa keberadaan mekanik dengan username dan password yang sesuai
    $query = "SELECT * FROM mekanik WHERE Username='$username' AND Password='$password'";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) == 1) {
        // Jika ditemukan mekanik dengan username dan password yang sesuai
        session_start();
        $data = mysqli_fetch_assoc($result);
        $_SESSION['mekanik_id'] = $data['mekanik_id'];
        $_SESSION['nama_mekanik'] = $data['Nama'];

        // Mengambil data dari form login
        $_SESSION['merek'] = $_POST['merek'];
        $_SESSION['tipe'] = $_POST['tipe'];
        $_SESSION['Nama'] = $_POST['nama'];
        $_SESSION['notlp'] = $_POST['notlp'];
        $_SESSION['alamat'] = $_POST['alamat'];
        $_SESSION['tanggal'] = $_POST['tanggal'];
        $_SESSION['kerusakan'] = $_POST['kerusakan'];
        $_SESSION['gejala_1'] = $_POST['gejala_1'];
        $_SESSION['gejala_2'] = $_POST['gejala_2'];
        $_SESSION['gejala_3'] = $_POST['gejala_3'];

        // Redirect ke halaman atau aksi selanjutnya setelah login sukses
        header('location: download-laporan.php');
    } else {
        // Jika tidak ditemukan mekanik dengan username dan password yang sesuai
        $error = "Username atau password salah";
    }

    mysqli_close($connect);
}
