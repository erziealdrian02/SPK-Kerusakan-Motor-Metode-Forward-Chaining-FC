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
    <div class="question-page">
        <div class="content">
            <div class="container">
                <?php
                include('process/koneksi.php');
                $kode = 'G01';
                session_start();
                ?>
                <div class="info">
                    <h1>Konsultasi</h1>
                    <hr />
                    <?php
                    echo "<h2>Motor " . $_SESSION['merek'] . " " . $_SESSION['tipe'] . ", " . $_SESSION['Nama'] . "</h2>";

                    if (isset($_GET['kode'])) {
                        $kode = $_GET['kode'];
                    }

                    $sql = "SELECT * from gejala WHERE gejala_id ='$kode'";
                    $data = mysqli_query($connect, $sql);
                    $row = mysqli_fetch_assoc($data);
                    ?>
                    <p><?php echo $row['isi_gejala']; ?></p>
                    <div class="question-button">
                        <?php
                        include "process/fungsi.php";
                        answer($kode);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Landing Page -->
    <!-- partial -->

    <?php
    include("./component/footer.php");
    include("./component/modal.php");
    ?>
</body>

</html>