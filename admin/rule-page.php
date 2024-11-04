<?php
include('./component/header.php');
?>

<body>
   <?php
   include('./component/sidebar.php');
   include './process/koneksi.php';
   include('./component/modal-rule-add.php'); ?>
   ?>
   <section class="dashboard">
      <div class="top">
         <i class="uil uil-bars sidebar-toggle"></i>
         <img src="https://media.licdn.com/dms/image/D4D03AQErMVn1QOZnrA/profile-displayphoto-shrink_200_200/0/1673033097079?e=2147483647&v=beta&t=5O7Km8JY2dxZu7cTVZfoxC1f2zgtyp5OB7saf_5mHcA" alt="" />
      </div>

      <div class="dash-content">
         <div class="activity">
            <div class="title">
               <a href="./process/print-rule.php" class="uil uil-print" target="_blank"></a>
               <span class="text">Data Rule</span>
               <a href="#modal-add-rule" class="uil uil-plus"></a>
            </div>
            <table class="data-table">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Kerusakan</th>
                     <th>Rule Satu</th>
                     <th>Rule Dua</th>
                     <th>Rule Tiga</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  $no = 1;
                  $select = mysqli_query($connect, "SELECT * FROM rule");
                  while ($data = mysqli_fetch_array($select)) {
                     // Pengecekan null untuk setiap query
                     $kerusakanQuery = mysqli_query($connect, "SELECT Nama FROM kerusakan WHERE kerusakan_id='" . $data['kerusakan_id'] . "'");
                     $rule1Query = mysqli_query($connect, "SELECT isi_gejala FROM gejala WHERE gejala_id='" . $data['rule_1'] . "'");
                     $rule2Query = mysqli_query($connect, "SELECT isi_gejala FROM gejala WHERE gejala_id='" . $data['rule_2'] . "'");
                     $rule3Query = mysqli_query($connect, "SELECT isi_gejala FROM gejala WHERE gejala_id='" . $data['rule_3'] . "'");

                     $kerusakan = mysqli_fetch_assoc($kerusakanQuery);
                     $rule_1 = mysqli_fetch_assoc($rule1Query);
                     $rule_2 = mysqli_fetch_assoc($rule2Query);
                     $rule_3 = mysqli_fetch_assoc($rule3Query);

                     // Memastikan bahwa hasil query tidak null
                     $kerusakanNama = $kerusakan ? $kerusakan['Nama'] : 'Unknown';
                     $rule1Nama = $rule_1 ? $rule_1['isi_gejala'] : 'Unknown';
                     $rule2Nama = $rule_2 ? $rule_2['isi_gejala'] : 'Unknown';
                     $rule3Nama = $rule_3 ? $rule_3['isi_gejala'] : 'Unknown';
                  ?>
                     <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['kerusakan_id'] ?> (<?php echo $kerusakanNama; ?>)</td>
                        <td><?php echo $data['rule_1'] ?> (<?php echo $rule1Nama; ?>)</td>
                        <td><?php echo $data['rule_2'] ?> (<?php echo $rule2Nama; ?>)</td>
                        <td><?php echo $data['rule_3'] ?> (<?php echo $rule3Nama; ?>)</td>
                        <td>
                           <?php $data = $data;
                           include('./component/modal-rule-edit.php'); ?>
                           <a href="./process/hapus-rule.php?rule_id=<?php echo $data['rule_id']; ?>">Delete</a> |
                           <a href="#modal-edit-rule<?php echo $data['rule_id']; ?>">Edit</a>
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