<?php
include('koneksi.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $gejala_id = $_POST['gejala_id'];
    $isi_gejala = mysqli_real_escape_string($connect, $_POST['isi_gejala']);

    // Update the database with the new data
    $query = "UPDATE gejala SET isi_gejala = '$isi_gejala' WHERE gejala_id = '$gejala_id'";
    $result = mysqli_query($connect, $query);

    if ($result) {
        echo "Berhasil Mengedit Data";
    } else {
        echo "<script>alert('Gagal mengedit data: " . mysqli_error($connect) . "'); window.location.href = 'form_page.php';</script>";
    }
} else {
    echo "<script>alert('Form Tidak disubmit dengan benar'); window.location.href = '../category.php';</script>";
}
