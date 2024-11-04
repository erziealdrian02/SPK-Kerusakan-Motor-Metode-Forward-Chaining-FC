<?php
session_start();
include 'koneksi.php';

if (isset($_GET['motor_id'])) {
    $motor_id = $_GET['motor_id'];
    $result = mysqli_query($connect, "DELETE FROM motor WHERE motor_id = '$motor_id'");

    if ($result) {
        echo "<script>alert('Berhasil Menghapus');</script>";
    } else {
        echo "<script>alert('Gagal Menghapus');</script>";
    }

    header("Location: ../motor-page.php");
    exit();
} else {
    echo "<h1>NGAPAIN WOI</h1>";
}
