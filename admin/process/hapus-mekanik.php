<?php
session_start();
include 'koneksi.php';

if (isset($_GET['mekanik_id'])) {
    $mekanik_id = $_GET['mekanik_id'];
    $result = mysqli_query($connect, "DELETE FROM mekanik WHERE mekanik_id = '$mekanik_id'");

    if ($result) {
        echo "<script>alert('Berhasil Menghapus');</script>";
    } else {
        echo "<script>alert('Gagal Menghapus');</script>";
    }

    header("Location: ../mekanik-page.php");
    exit();
} else {
    echo "<h1>NGAPAIN WOI</h1>";
}
