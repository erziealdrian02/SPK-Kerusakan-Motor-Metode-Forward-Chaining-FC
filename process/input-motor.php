<?php
include("koneksi.php");

if (isset($_POST['submit'])) {
    echo "Form submitted<br>"; // Debugging message

    $Nama = $_POST['Nama'];
    $notlp = $_POST['notlp'];
    $alamat = $_POST['alamat'];
    $tipe = $_POST['tipe'];
    $merek = $_POST['merek'];
    $tanggal = date('Y-m-d H:i:s'); // Menangkap waktu saat ini

    $random_number = mt_rand(1, 200); // Generate a random number between 1 and 200
    $motor_id = 'MOT' . $random_number;

    $sql = "INSERT INTO motor (motor_id, Nama, notlp, alamat, merek, jenis, tanggal) VALUES ('$motor_id', '$Nama', '$notlp', '$alamat', '$merek', '$tipe', '$tanggal')";
    echo "SQL: " . $sql . "<br>"; // Debugging message

    $query = mysqli_query($connect, $sql);

    if ($query) {
        echo "Data inserted successfully<br>"; // Debugging message
        session_start();
        $_SESSION['merek'] = $merek; // Simpan session merek
        $_SESSION['tipe'] = $tipe; // Simpan session tipe
        $_SESSION['Nama'] = $Nama;
        $_SESSION['notlp'] = $notlp; // Simpan session notlp
        $_SESSION['alamat'] = $alamat; // Simpan session alamat
        $_SESSION['tanggal'] = $tanggal; // Simpan session tanggal
        header('location:../question-page.php');
    } else {
        echo "Gagal memasukkan data: " . mysqli_error($connect) . "<br>"; // Debugging message
        echo "<script>alert('Gagal memasukkan data: " . mysqli_error($connect) . "'); window.location.href = 'form_page.php';</script>";
    }

    mysqli_close($connect);
} else {
    echo "Form tidak disubmit dengan benar<br>"; // Debugging message
    echo "<script>alert('Form tidak disubmit dengan benar'); window.location.href = '../list_kerusakan.php';</script>";
}
