<?php
include("koneksi.php");

if (isset($_POST['submit'])) {
    echo "Form submitted<br>"; // Debugging message

    $isi_gejala = $_POST['isi_gejala'];

    $random_number = mt_rand(10, 50); // Generate a random number between 10 and 50
    $gejala_id  = 'G' . $random_number;

    $sql = "INSERT INTO gejala (gejala_id , isi_gejala) VALUES ('$gejala_id', '$isi_gejala')";
    echo "SQL: " . $sql . "<br>"; // Debugging message

    $query = mysqli_query($connect, $sql);

    if ($query) {
        echo "Data successfully inserted<br>"; // Debugging message
        header('location:../gejala-page.php');
    } else {
        echo "Gagal memasukkan data: " . mysqli_error($connect) . "<br>"; // Debugging message
        echo "<script>alert('Gagal memasukkan data: " . mysqli_error($connect) . "'); window.location.href = 'form_page.php';</script>";
    }

    mysqli_close($connect);
} else {
    echo "Form tidak disubmit dengan benar<br>"; // Debugging message
    echo "<script>alert('Form tidak disubmit dengan benar'); window.location.href = '../list_gejala.php';</script>";
}
