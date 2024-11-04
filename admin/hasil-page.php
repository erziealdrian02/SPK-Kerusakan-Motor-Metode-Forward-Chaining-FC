<?php
include('./component/header.php');
?>

<body>
   <?php
   include('./component/sidebar.php');
   include './process/koneksi.php';
   ?>

   <section class="dashboard">
      <div class="top">
         <i class="uil uil-bars sidebar-toggle"></i>
         <img src="https://media.licdn.com/dms/image/D4D03AQErMVn1QOZnrA/profile-displayphoto-shrink_200_200/0/1673033097079?e=2147483647&v=beta&t=5O7Km8JY2dxZu7cTVZfoxC1f2zgtyp5OB7saf_5mHcA" alt="" />
      </div>

      <div class="dash-content">
         <div class="activity">
            <div class="title">
               <i class="uil uil-comments"></i>
               <span class="text">Data Hasil Diagnosa</span>
               <a href="./process/print.php" class="uil uil-print" target="_blank"></a>
            </div>
            <table class="data-table">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Nama</th>
                     <th>No Telephone</th>
                     <th>Alamat</th>
                     <th>Merek Motor</th>
                     <th>Tipe Motor</th>
                     <th>Nama Mekanik</th>
                     <th>Kerusakan</th>
                     <th>Tanggal</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  $no = 1;
                  $select = mysqli_query($connect, "SELECT * FROM hasil");
                  while ($data = mysqli_fetch_array($select)) {
                  ?>
                     <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['Nama']; ?></td>
                        <td><?php echo $data['notlp']; ?></td>
                        <td><?php echo $data['alamat']; ?></td>
                        <td><?php echo $data['merek']; ?></td>
                        <td><?php echo $data['tipe']; ?></td>
                        <td><?php echo $data['nama_mekanik']; ?></td>
                        <td><?php echo $data['kerusakan']; ?></td>
                        <!-- <td><?php echo $data['gejala_1']; ?>, <?php echo $data['gejala_2']; ?>, <?php echo $data['gejala_3']; ?></td> -->
                        <td><?php echo $data['tanggal']; ?></td>
                        <td>
                           <a href="./process/hapus-hasil.php?hasil_id=<?php echo $data['hasil_id']; ?>">Delete</a>
                        </td>
                     </tr>
                  <?php
                     $no++;
                  }
                  ?>
               </tbody>
            </table>
         </div>
      </div>
   </section>
</body>

</html>
<!-- partial -->
<script src="./js/script.js"></script>
</body>

</html>