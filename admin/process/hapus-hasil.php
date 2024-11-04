<?php
session_start();
include 'koneksi.php';

if (isset($_GET['hasil_id'])) {
    $hasil_id = $_GET['hasil_id'];
    $result = mysqli_query($connect, "DELETE FROM hasil WHERE hasil_id = '$hasil_id'");

    if ($result) {
        echo "<script>alert('Berhasil Menghapus');</script>";
    } else {
        echo "<script>alert('Gagal Menghapus');</script>";
    }

    header("Location: ../hasil-page.php");
    exit();
} else {
    echo "<h1>NGAPAIN WOI</h1>";
}
