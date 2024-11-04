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
      </div>

      <div class="dash-content">
         <div class="activity">
            <div class="title">
               <i class="uil uil-wheelchair-alt"></i>
               <span class="text">Data Motor</span>
               <i class="uil uil-wheelchair-alt"></i>
            </div>
            <table class="data-table">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Nama</th>
                     <th>No. Tlp</th>
                     <th>Alamat</th>
                     <th>Merek Motor</th>
                     <th>Jenis Motor</th>
                     <th>Tanggal Konsultasi</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  $no = 1;
                  $select = mysqli_query($connect, "SELECT * FROM motor");
                  while ($data = mysqli_fetch_array($select)) {
                  ?>
                     <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['Nama']; ?></td>
                        <td><?php echo $data['notlp']; ?></td>
                        <td><?php echo $data['alamat']; ?></td>
                        <td><?php echo $data['merek']; ?></td>
                        <td><?php echo $data['jenis']; ?></td>
                        <td><?php echo $data['tanggal']; ?></td>
                        <td>
                           <a href="./process/hapus-motor.php?motor_id=<?php echo $data['motor_id']; ?>">Delete</a>
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