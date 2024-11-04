<?php
include('./component/header.php');
?>

<body>
   <?php
   include('./component/sidebar.php');
   include './process/koneksi.php';

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
   ?>

   <section class="dashboard">
      <div class="top">
         <i class="uil uil-bars sidebar-toggle"></i>
      </div>

      <div class="dash-content">
         <div class="overview">
            <div class="title">
               <i class="uil uil-tachometer-fast-alt"></i>
               <span class="text">Dashboard</span>
               <a href="./process/print-dash.php" class="uil uil-print" target="_blank"></a>
            </div>

            <div class="boxes">
               <div class="box box1">
                  <i class="uil uil-comments"></i>
                  <span class="text">Total Hasil</span>
                  <span class="number"><?php echo $total_hasil ?></span>
               </div>
               <div class="box box2">
                  <i class="uil uil-wheelchair-alt"></i>
                  <span class="text">Total Data Motor</span>
                  <span class="number"><?php echo $total_motor ?></span>
               </div>
               <div class="box box3">
                  <i class="uil uil-image-broken"></i>
                  <span class="text">Total Data Kerusakan</span>
                  <span class="number"><?php echo $total_kerusakan ?></span>
               </div>
               <div class="box box1">
                  <i class="uil uil-search-alt"></i>
                  <span class="text">Total Data Gejala</span>
                  <span class="number"><?php echo $total_gejala ?></span>
               </div>
               <div class="box box2">
                  <i class="uil uil-wrench"></i>
                  <span class="text">Total Data Mekanik</span>
                  <span class="number"><?php echo $total_mekanik ?></span>
               </div>
               <div class="box box3">
                  <i class="uil uil-ruler"></i>
                  <span class="text">Total Data Rule</span>
                  <span class="number"><?php echo $total_rule ?></span>
               </div>
            </div>
         </div>
         <div class="overview">
            <div class="title" style="justify-content: center;">
               <span class="text">Denah Pertanyaan</span>
            </div>

            <div class="boxes">
               <img style="width: 1000px;" src="./images/Maps.drawio.jpg" alt="Maps">
            </div>
         </div>
      </div>
   </section>
   <script src="./js/script.js"></script>
</body>

</html>