<?php
include('koneksi.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mekanik_id = $_POST['mekanik_id'];
    $Nama = mysqli_real_escape_string($connect, $_POST['Nama']);
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $notlp = mysqli_real_escape_string($connect, $_POST['notlp']);
    $alamat = mysqli_real_escape_string($connect, $_POST['alamat']);

    // Update the database with the new data
    $query = "UPDATE mekanik SET Nama = '$Nama', username = '$username', password = '$password', notlp = '$notlp', alamat = '$alamat' WHERE mekanik_id = '$mekanik_id'";
    $result = mysqli_query($connect, $query);

    if ($result) {
        echo "Berhasil Mengedit Data";
    } else {
        echo "<script>alert('Gagal mengedit data: " . mysqli_error($connect) . "'); window.location.href = '../form_page.php';</script>";
    }
} else {
    echo "<script>alert('Form Tidak disubmit dengan benar'); window.location.href = '../category.php';</script>";
}
