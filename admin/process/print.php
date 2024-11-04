<?php
include('koneksi.php');
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
$html = '
<center>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
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
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        font-size: 10px; /* Mengubah ukuran font pada tabel */
    }

    .table-header {
        border: none;
    }

    .table-header td {
        border: none;
    }

    th, td {
        padding: 8px;
        text-align: center;
        vertical-align: middle;
    }

    .signature {
        width: 100%;
        display: flex;
        justify-content: flex-end;
        margin-top: 40px;
        margin-left: 250px;
    }

    .signature div {
        left:20px;
    }

    .table-data tr, th, td {
        border: 1px solid black;
    }
</style>
</head>
<body>
    <div class="header">
    <table class="table-header">
        <tr>
            <td><img src="data:image/png;base64,' . $logo1 . '" alt="Logo 1"></td>
            <td class="info">
                <h1>WIDARAMOTOR</h1>
                <p>Jl. Metland Cileungsi BBI No.5, Cileungsi, Kec. Cileungsi, Kab. Bogor, 16820</p>
                <p>+62 851-7159-2604</p>
            </td>
            <td><img src="data:image/png;base64,' . $logo1 . '" style="visibility: hidden;" alt="Logo 2"></td>
        </tr>
    </table>
</div>

    <div class="table-container">
        <table class="table" style="margin-right=30px">
            <thead>
                <tr class="bg-light">
                     <th>No</th>
                     <th>Nama</th>
                     <th>No Telephone</th>
                     <th>Alamat</th>
                     <th>Merek Motor</th>
                     <th>Tipe Motor</th>
                     <th>Nama Mekanik</th>
                     <th>Kerusakan</th>
                     <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
';
$no = 1;
$select = mysqli_query($connect, "SELECT * FROM hasil");
while ($data = mysqli_fetch_array($select)) {

    $html .= '
                <tr class="table-data">
                    <td>' . $no . '</td>
                    <td>' . $data['Nama'] . '</td>
                    <td>' . $data['notlp'] . '</td>
                    <td>' . $data['alamat'] . '</td>
                    <td>' . $data['merek'] . '</td>
                    <td>' . $data['tipe'] . '</td>
                    <td>' . $data['nama_mekanik'] . '</td>
                    <td>' . $data['kerusakan'] . '</td>
                    <td>' . $data['tanggal'] . '</td>
                </tr>
            ';
    $no++;
}

$html .= '
        </tbody>
    </table>
</div>
    <div class="signature">
        <div style="margin-right: 100px; text-align: right;">
            <p style="text-align:center;">' . $formattedDate . '</p>
            <p style="text-align:center;">Owner</p>
            <br><br><br><br>
            <hr width="25%">
            <p style="text-align:center;">Ahnad Fauzi</p>
        </div>
    </div>

</body>
</html>
</center>
';

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'potrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("Laporan_Penilaian.pdf", array("Attachment" => false));
exit(0);
