<?php
include('koneksi.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kerusakan_id = $_POST['kerusakan_id'];
    $Nama = mysqli_real_escape_string($connect, $_POST['Nama']);

    // Update the database with the new data
    $query = "UPDATE kerusakan SET Nama = '$Nama' WHERE kerusakan_id = '$kerusakan_id'";
    $result = mysqli_query($connect, $query);

    if ($result) {
        echo "Berhasil Mengedit Data";
    } else {
        echo "<script>alert('Gagal mengedit data: " . mysqli_error($connect) . "'); window.location.href = 'form_page.php';</script>";
    }
} else {
    echo "<script>alert('Form Tidak disubmit dengan benar'); window.location.href = '../category.php';</script>";
}
