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
        <div class="content">
            <div class="container">
                <div class="info">
                    <h1>Wirada Motor</h1>
                    <p>
                        Di Wiranda Motor, kami memahami pentingnya menjaga performa
                        sepeda motor matic Anda tetap optimal. Dengan sistem pakar
                        yang dirancang khusus menggunakan metode Forward Chaining,
                        kami mampu mendiagnosa berbagai kerusakan pada mesin sepeda
                        motor matic dengan cepat dan akurat. Teknologi canggih dan
                        tim ahli berpengalaman kami siap memberikan solusi tepat,
                        efisien, dan hemat biaya. Percayakan sepeda motor matic
                        Anda pada Wiranda Motor dan rasakan layanan terbaik kami!
                    </p>
                    <a href="#open-modal">Mulai Diagnosa</a>
                </div>
                <div class="image">
                    <img src="./images/illustration-landing.png" />
                </div>
            </div>
            <section id="about">
                <div class="wrapper">
                    <h1>About Me</h1>
                    <div class="container">
                        <div class="image">
                            <img src="./images/about-image.jpg" />
                        </div>
                        <div class="info">
                            <h1>Nama User</h1>
                            <h2>12312312312</h2>
                            <p>
                                Saya adalah mahasiswa Teknik Informatika semester akhir
                                yang berkelahiran di .....(Lanjutin ae ada di
                                index.php line 60-63)
                            </p>
                        </div>
                    </div>
                </div>
            </section>
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