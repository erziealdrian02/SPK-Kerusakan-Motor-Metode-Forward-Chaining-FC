<?php
include("koneksi.php");

if (isset($_POST['submit'])) {
    echo "Form submitted<br>"; // Debugging message

    $Nama = $_POST['Nama'];

    $random_number = mt_rand(10, 50); // Generate a random number between 10 and 50
    $kerusakan_id  = 'K' . $random_number;

    $sql = "INSERT INTO kerusakan (kerusakan_id , Nama) VALUES ('$kerusakan_id', '$Nama')";
    echo "SQL: " . $sql . "<br>"; // Debugging message

    $query = mysqli_query($connect, $sql);

    if ($query) {
        echo "Data successfully inserted<br>"; // Debugging message
        header('location:../kerusakan-page.php');
    } else {
        echo "Gagal memasukkan data: " . mysqli_error($connect) . "<br>"; // Debugging message
        echo "<script>alert('Gagal memasukkan data: " . mysqli_error($connect) . "'); window.location.href = 'form_page.php';</script>";
    }

    mysqli_close($connect);
} else {
    echo "Form tidak disubmit dengan benar<br>"; // Debugging message
    echo "<script>alert('Form tidak disubmit dengan benar'); window.location.href = '../list_kerusakan.php';</script>";
}
