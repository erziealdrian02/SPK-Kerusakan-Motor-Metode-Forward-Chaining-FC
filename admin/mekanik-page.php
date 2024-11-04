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
               <i class="uil uil-wrench"></i>
               <span class="text">Data Mekanik</span>
               <a href="#modal-add-mekanik" class="uil uil-plus"></a>
            </div>
            <table class="data-table">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Nama</th>
                     <th>Username</th>
                     <th>Password</th>
                     <th>No Telephone</th>
                     <th>Alamat</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  $no = 1;
                  $select = mysqli_query($connect, "SELECT * FROM mekanik");
                  while ($data = mysqli_fetch_array($select)) {
                  ?>
                     <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['Nama']; ?></td>
                        <td><?php echo $data['username']; ?></td>
                        <td><?php echo $data['password']; ?></td>
                        <td><?php echo $data['notlp']; ?></td>
                        <td><?php echo $data['alamat']; ?></td>
                        <td>
                           <a href="./process/hapus-mekanik.php?mekanik_id=<?php echo $data['mekanik_id']; ?>">Delete</a> |
                           <a href="#modal-edit-mekanik<?php echo $data['mekanik_id']; ?>">Edit</a>
                           <?php include('./component/modal-mekanik.php'); ?>
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