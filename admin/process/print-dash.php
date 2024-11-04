<?php
include('koneksi.php');

// Fetch total gejala
$result = mysqli_query($connect, "SELECT COUNT(*) AS count FROM gejala");
$row = mysqli_fetch_assoc($result);
$total_gejala = $row['count'];

// Fetch total hasil
$result = mysqli_query($connect, "SELECT COUNT(*) AS count FROM hasil");
$row = mysqli_fetch_assoc($result);
$total_hasil = $row['count'];

// Fetch total kerusakan
$result = mysqli_query($connect, "SELECT COUNT(*) AS count FROM kerusakan");
$row = mysqli_fetch_assoc($result);
$total_kerusakan = $row['count'];

// Fetch total mekanik
$result = mysqli_query($connect, "SELECT COUNT(*) AS count FROM mekanik");
$row = mysqli_fetch_assoc($result);
$total_mekanik = $row['count'];

// Fetch total motor
$result = mysqli_query($connect, "SELECT COUNT(*) AS count FROM motor");
$row = mysqli_fetch_assoc($result);
$total_motor = $row['count'];

// Fetch total rule
$result = mysqli_query($connect, "SELECT COUNT(*) AS count FROM rule");
$row = mysqli_fetch_assoc($result);
$total_rule = $row['count'];

require '../../vendor/autoload.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;
// instantiate and use the dompdf class
$dompdf = new Dompdf();

// Encode images to base64
$logo1_path = '../../images/logo-print.jpg'; // Ubah path ini sesuai lokasi gambar

if (file_exists($logo1_path)) {
    $logo1 = base64_encode(file_get_contents($logo1_path));
} else {
    die('Gambar tidak ditemukan. Pastikan path gambar benar.');
}

$days = [
    'Sunday' => 'Minggu',
    'Monday' => 'Senin',
    'Tuesday' => 'Selasa',
    'Wednesday' => 'Rabu',
    'Thursday' => 'Kamis',
    'Friday' => 'Jumat',
    'Saturday' => 'Sabtu'
];

// Array untuk nama bulan dalam bahasa Indonesia
$months = [
    'January' => 'Januari',
    'February' => 'Februari',
    'March' => 'Maret',
    'April' => 'April',
    'May' => 'Mei',
    'June' => 'Juni',
    'July' => 'Juli',
    'August' => 'Agustus',
    'September' => 'September',
    'October' => 'Oktober',
    'November' => 'November',
    'December' => 'Desember'
];

// Mendapatkan tanggal saat ini
$date = new DateTime();

// Mendapatkan hari, bulan, dan tahun dalam bahasa Inggris
$day = $days[$date->format('l')]; // Mengambil nama hari dan konversi ke bahasa Indonesia
$dayNumber = $date->format('d'); // Mengambil nomor hari
$month = $months[$date->format('F')]; // Mengambil nama bulan dan konversi ke bahasa Indonesia
$year = $date->format('Y'); // Mengambil tahun

// Menggabungkan semua menjadi satu string
$formattedDate = "Cileungsi, $day $dayNumber $month $year";

// Generate HTML content
$html = "
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8' />
    <title>WiradaMotor</title>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css' />
    <link rel='stylesheet' href='../css/style.css' />
    <style>
        .header {
            width: 100%;
            margin-bottom: 20px;
            border-bottom: 1px solid black;
            padding-bottom: 10px;
            text-align: center;
        }

        .header img {
            width: 100px;
        }

        .info {
            text-align: center;
        }

        .info h1 {
            font-size: 20px;
        }

        .info h2 {
            font-size: 19px;
        }

        .info p {
            margin: 5px 0;
            font-size: 13px;
        }

        .table-container {
            margin-top: 20px;
            width: 100%;
        }

        table {
            align-text: center:
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table-header {
            border: none;
        }

        .table-header td {
            border: none;
        }

        th, td {
            padding: 8px;
            text-align: center; /* Pusatkan teks dalam tabel */
            vertical-align: middle; /* Pusatkan vertikal */
        }

        .signature {
            width: 100%;
            display: flex;
            justify-content: flex-end;
            margin-top: 40px;
            margin-left: 300px;
        }

        .signature div {
            left:20px;
        }

        .table-data tr, th, td {
            border: 1px solid black;
        }

        .diagnose-page .content .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
        min-height: calc(100vh - 80px);
        }

        .diagnose-page .content .info h1 {
        color: #5d5d5d;
        font-size: 44px;
        text-align: center;
        margin: 1px;
        }
        .diagnose-page .action-button a {
        border: 1px solid #ccc;
        border-radius: 20px;
        padding: 12px 30px;
        margin: 30px;
        cursor: pointer;
        color: #fff;
        background-color: #6c63ff;
        transition: all 0.3s ease;
        width: 200px;
        text-align: center;
        }

        .table-container {
        width: 100%; /* Tabel mengisi lebar penuh */
        margin-top: 20px;
        overflow-x: auto;
        }

        .table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #ddd;
        }

        .table th,
        .table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
        }

        .table th {
        background-color: #f2f2f2;
        color: #333;
        }

        .table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
        }

        .table tbody tr:hover {
        background-color: #f1f1f1;
        }

    </style>
</head>
<body>
    <div class='header'>
        <table class='table-header'>
            <tr>
                <td><img src='data:image/png;base64," . $logo1 . "' alt='Logo 1'></td>
                <td class='info'>
                    <h1>WIDARAMOTOR</h1>
                    <p>Jl. Metland Cileungsi BBI No.5, Cileungsi, Kec. Cileungsi, Kab. Bogor, 16820</p>
                    <p>+62 851-7159-2604</p>
                </td>
                <td><img src='data:image/png;base64," . $logo1 . "' style='visibility: hidden;' alt='Logo 2'></td>
            </tr>
        </table>
    </div>

    <div class='diagnose-page'>
        <div class='content'>
            <div class='container'>
                <div class='info'>
                    
                </div>
                <!-- Contoh tabel -->
                <div class='table-container'>
                    <div>
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th style='text-align: center;' colspan='2'>Total Hasil</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style='width: 60%; border-right: none;'>Banyak Hasil</td>
                                    <td>" . $total_hasil . "</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th style='text-align: center;' colspan='2'>Total Data Gejala</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style='width: 60%'>Banyak Data Gejala</td>
                                    <td>" . $total_gejala . "</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th style='text-align: center;' colspan='2'>Total Data Motor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style='width: 60%'>Banyak Data Motor</td>
                                    <td>" . $total_motor . "</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th style='text-align: center;' colspan='2'>Total Data Mekanik</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style='width: 60%'>Banyak Data Mekanik</td>
                                    <td>" . $total_mekanik . "</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th style='text-align: center;' colspan='2'>Total Data Kerusakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style='width: 60%'>Banyak Data Kerusakan</td>
                                    <td>" . $total_kerusakan . "</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th style='text-align: center;' colspan='2'>Total Data Rule</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style='width: 60%'>Banyak Data Rule</td>
                                    <td>" . $total_rule . "</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class='signature'>
        <div style='margin-right: 100px; text-align: right;'>
            <p style='text-align:center;'>" . $formattedDate . "</p>
            <p style='text-align:center;'>Owner</p>
            <br><br><br><br>
            <hr width='25%'>
            <p style='text-align:center;'>Ahnad Fauzi</p>
        </div>
    </div>
</body>
";

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'potrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('Hasil_Angka.pdf', ['Attachment' => false]);
