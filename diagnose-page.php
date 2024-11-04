<?php
include("./component/header.php");
?>

<body>
    <!-- partial:index.partial.html -->
    <!-- Start Landing Page -->
    <div class="landing-page">
        <?php
        include("./component/navbar.php");
        ?>
    </div>
    <div class="diagnose-page">
        <div class="content">
            <div class="container">
                <div class="info">
                    <h1>Hasil konsultasi</h1>
                </div>
                <!-- Contoh tabel -->
                <div class="table-container">
                    <?php
                    include('process/koneksi.php');
                    session_start();

                    if (isset($_GET['kode'])) {
                        $kode = $_GET['kode'];
                    } else {
                        die("Kode solusi tidak ditemukan.");
                    }
                    $sql = "SELECT * FROM kerusakan WHERE kerusakan_id='$kode'";
                    $data = mysqli_query($connect, $sql);
                    $row = mysqli_fetch_assoc($data);

                    if (!$row) {
                        die("Solusi tidak ditemukan.");
                    }

                    // Set session variables if not set
                    if (!isset($_SESSION['merek'])) $_SESSION['merek'] = '';
                    if (!isset($_SESSION['tipe'])) $_SESSION['tipe'] = '';
                    if (!isset($_SESSION['Nama'])) $_SESSION['Nama'] = '';
                    if (!isset($_SESSION['notlp'])) $_SESSION['notlp'] = '';
                    if (!isset($_SESSION['alamat'])) $_SESSION['alamat'] = '';
                    if (!isset($_SESSION['tanggal'])) $_SESSION['tanggal'] = '';
                    ?>
                    <div>
                        <h3>Pemilik</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>No. Telephone</th>
                                    <th>Alamat</th>
                                    <th>Tipe Motor</th>
                                    <th>Merek Motor</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><?php echo $_SESSION['Nama']; ?></td>
                                    <td><?php echo $_SESSION['notlp']; ?></td>
                                    <td><?php echo $_SESSION['alamat']; ?></td>
                                    <td><?php echo $_SESSION['tipe']; ?></td>
                                    <td><?php echo $_SESSION['merek']; ?></td>
                                    <td><?php echo $_SESSION['tanggal']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <h3>Gejala yang terpilih</h3>
                        <?php
                        include "process/koneksi.php";
                        $no = 1;
                        $kode = $_GET['kode']; // Pastikan $kode diambil dari parameter GET atau POST

                        $select = mysqli_query($connect, "SELECT * FROM rule WHERE kerusakan_id='$kode'");

                        if (!$select) {
                            echo "Error executing query: " . mysqli_error($connect);
                        } else {
                            if (mysqli_num_rows($select) > 0) {
                                echo '<table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Gejala Satu</th>
                                            <th>Gejala Dua</th>
                                            <th>Gejala Tiga</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                while ($data = mysqli_fetch_array($select)) {
                                    // Mengambil gejala berdasarkan rule
                                    $rule_1 = $data['rule_1'];
                                    $rule_2 = $data['rule_2'];
                                    $rule_3 = $data['rule_3'];

                                    // Query untuk mendapatkan isi_gejala gejala
                                    $gejala_1_result = mysqli_query($connect, "SELECT isi_gejala FROM gejala WHERE gejala_id='$rule_1'");
                                    $gejala_1 = mysqli_fetch_assoc($gejala_1_result)['isi_gejala'] ?? 'Gejala tidak ditemukan';

                                    $gejala_2_result = mysqli_query($connect, "SELECT isi_gejala FROM gejala WHERE gejala_id='$rule_2'");
                                    $gejala_2 = mysqli_fetch_assoc($gejala_2_result)['isi_gejala'] ?? 'Gejala tidak ditemukan';

                                    $gejala_3_result = mysqli_query($connect, "SELECT isi_gejala FROM gejala WHERE gejala_id='$rule_3'");
                                    $gejala_3 = mysqli_fetch_assoc($gejala_3_result)['isi_gejala'] ?? 'Gejala tidak ditemukan';

                        ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $gejala_1; ?></td>
                                        <td><?php echo $gejala_2; ?></td>
                                        <td><?php echo $gejala_3; ?></td>
                                    </tr>
                        <?php
                                    $_SESSION['gejala_1'] = $gejala_1;
                                }
                                echo '</tbody>
                                </table>';
                            } else {
                                echo "<p>Tidak ada gejala yang terpilih.</p>";
                            }
                        }
                        ?>
                    </div>

                    <div>
                        <h3>Hasil Kerusakan</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><?php echo $row['Nama']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Akhir contoh tabel -->
                <div class="action-button">
                    <a href='#open-mekanik'>Selesai</a>
                    <a href='#open-print'>Print</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Landing Page -->
    <!-- partial -->

    <?php
    include("./component/modal.php");
    include("./component/footer.php");
    include("./component/modal.php");
    ?>
</body>

</html>