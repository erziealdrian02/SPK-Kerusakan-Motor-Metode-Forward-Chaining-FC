<?php
session_start();
include 'koneksi.php';

if (isset($_GET['kerusakan_id'])) {
    $kerusakan_id = $_GET['kerusakan_id'];
    $result = mysqli_query($connect, "DELETE FROM kerusakan WHERE kerusakan_id = '$kerusakan_id'");

    if ($result) {
        echo "<script>alert('Berhasil Menghapus');</script>";
    } else {
        echo "<script>alert('Gagal Menghapus');</script>";
    }

    header("Location: ../kerusakan-page.php");
    exit();
} else {
    echo "<h1>NGAPAIN WOI</h1>";
}
