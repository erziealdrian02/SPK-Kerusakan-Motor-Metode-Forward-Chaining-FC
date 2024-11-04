<?php
include('koneksi.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rule_id = $_POST['rule_id'];
    $kerusakan_id = mysqli_real_escape_string($connect, $_POST['kerusakan_id']);
    $rule_1 = mysqli_real_escape_string($connect, $_POST['rule_1']);
    $rule_2 = mysqli_real_escape_string($connect, $_POST['rule_2']);
    $rule_3 = mysqli_real_escape_string($connect, $_POST['rule_3']);

    // Update the database with the new data
    $query = "UPDATE rule SET kerusakan_id = '$kerusakan_id', rule_1 = '$rule_1', rule_2 = '$rule_2', rule_3 = '$rule_3' WHERE rule_id = '$rule_id'";
    $result = mysqli_query($connect, $query);

    if ($result) {
        echo "Berhasil Mengedit Data";
    } else {
        echo "<script>alert('Gagal mengedit data: " . mysqli_error($connect) . "'); window.location.href = '../form_page.php';</script>";
    }
} else {
    echo "<script>alert('Form Tidak disubmit dengan benar'); window.location.href = '../category.php';</script>";
}
