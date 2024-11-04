<?php
include("koneksi.php");

if (isset($_POST['submit'])) {
    echo "Form submitted<br>"; // Debugging message

    $kerusakan_id = $_POST['kerusakan_id'];
    $rule_1 = $_POST['rule_1'];
    $rule_2 = $_POST['rule_2'];
    $rule_3 = $_POST['rule_3'];

    $random_number = mt_rand(10, 50); // Generate a random number between 10 and 50
    $rule_id  = 'R' . $random_number;

    $sql = "INSERT INTO rule (rule_id , kerusakan_id, rule_1 , rule_2, rule_3) VALUES ('$rule_id', '$kerusakan_id', '$rule_1', '$rule_2', '$rule_3')";
    echo "SQL: " . $sql . "<br>"; // Debugging message

    $query = mysqli_query($connect, $sql);

    if ($query) {
        echo "Data successfully inserted<br>"; // Debugging message
        header('location:../rule-page.php');
    } else {
        echo "Gagal memasukkan data: " . mysqli_error($connect) . "<br>"; // Debugging message
        echo "<script>alert('Gagal memasukkan data: " . mysqli_error($connect) . "'); window.location.href = 'form_page.php';</script>";
    }

    mysqli_close($connect);
} else {
    echo "Form tidak disubmit dengan benar<br>"; // Debugging message
    echo "<script>alert('Form tidak disubmit dengan benar'); window.location.href = '../list_rule.php';</script>";
}
