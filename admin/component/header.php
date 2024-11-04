<?php
session_start();
if (!isset($_SESSION['stat']) || $_SESSION['stat'] != 'masuk') {
    echo "<script>alert('Anda belum login');</script>";
    header("Location: ../index.php?error=1");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <title>Admin Wirada Motor</title>
    <link rel="stylesheet" href="./css/style.css" />
    <style>
        /* Menambahkan gaya untuk tabel */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .data-table th,
        .data-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .data-table th {
            background-color: var(--primary-color);
            color: white;
        }

        .data-table td a {
            text-decoration: none;
            color: var(--text-color);
        }

        .data-table td a:hover {
            text-decoration: underline;
            color: var(--primary-color);
        }

        /* Menambahkan gaya untuk baris ganjil */
        .data-table tr:nth-child(odd) {
            background-color: #f2f2f2;
        }
    </style>
</head>