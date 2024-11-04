<?php
session_start();
include 'koneksi.php';

if (isset($_GET['gejala_id'])) {
    $gejala_id = $_GET['gejala_id'];
    $result = mysqli_query($connect, "DELETE FROM gejala WHERE gejala_id = '$gejala_id'");

    if ($result) {
        echo "<script>alert('Berhasil Menghapus');</script>";
    } else {
        echo "<script>alert('Gagal Menghapus');</script>";
    }

    header("Location: ../gejala-page.php");
    exit();
} else {
    echo "<h1>NGAPAIN WOI</h1>";
}
