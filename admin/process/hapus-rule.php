<?php
session_start();
include 'koneksi.php';

if (isset($_GET['rule_id'])) {
    $rule_id = $_GET['rule_id'];
    $result = mysqli_query($connect, "DELETE FROM rule WHERE rule_id = '$rule_id'");

    if ($result) {
        echo "<script>alert('Berhasil Menghapus');</script>";
    } else {
        echo "<script>alert('Gagal Menghapus');</script>";
    }

    header("Location: ../rule-page.php");
    exit();
} else {
    echo "<h1>NGAPAIN WOI</h1>";
}
