<?php
include('koneksi.php');
session_start();

// Akses data dari session
$merek = $_SESSION['merek'];
$tipe = $_SESSION['tipe'];
$nama = $_SESSION['Nama'];
$notlp = $_SESSION['notlp'];
$alamat = $_SESSION['alamat'];
$tanggal = $_SESSION['tanggal'];
$kerusakan = $_SESSION['kerusakan'];
$gejala_1 = $_SESSION['gejala_1'];
$gejala_2 = $_SESSION['gejala_2'];
$gejala_3 = $_SESSION['gejala_3'];
$nama_mekanik = $_SESSION['nama_mekanik'];

$random_number = mt_rand(1, 200); // Generate a random number between 1 and 200
$hasil_id = 'HAS' . $random_number;

// Query untuk memasukkan data ke tabel hasil
$query = "INSERT INTO hasil (hasil_id, merek, tipe, nama, notlp, alamat, tanggal, kerusakan, gejala_1, gejala_2, gejala_3, nama_mekanik) 
          VALUES ('$hasil_id', '$merek', '$tipe', '$nama', '$notlp', '$alamat', '$tanggal', '$kerusakan', '$gejala_1', '$gejala_2', '$gejala_3', '$nama_mekanik')";

if (mysqli_query($connect, $query)) {
    // Menghapus session setelah data berhasil disimpan
    unset($_SESSION['merek']);
    unset($_SESSION['tipe']);
    unset($_SESSION['Nama']);
    unset($_SESSION['notlp']);
    unset($_SESSION['alamat']);
    unset($_SESSION['tanggal']);
    unset($_SESSION['kerusakan']);
    unset($_SESSION['gejala_1']);
    unset($_SESSION['gejala_2']);
    unset($_SESSION['gejala_3']);
    unset($_SESSION['nama_mekanik']);

    // Redirect ke halaman lain jika perlu, misalnya ke halaman sukses
    header('Location:../index.php');
    exit;
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($connect);
}

mysqli_close($connect);
