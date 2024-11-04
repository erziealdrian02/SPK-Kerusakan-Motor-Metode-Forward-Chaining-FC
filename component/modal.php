<div id="open-modal" class="modal-window">
    <div>
        <a href="#" title="Close" class="modal-close">Close</a>
        <h1>Isi Data Konsultasi</h1>
        <form id="diagnosa-form" action="process/input-motor.php" method="post" enctype="multipart/form-data" role="form">
            <div>
                <label for="Nama">Nama :</label>
                <input type="text" id="Nama" name="Nama" required />
            </div>
            <div>
                <label for="notlp">No. Tlp:</label>
                <input type="text" id="notlp" name="notlp" required />
            </div>
            <div>
                <label for="alamat">Alamat:</label>
                <input type="text" id="alamat" name="alamat" required />
            </div>
            <div>
                <label for="tipe">Jenis Motor:</label>
                <input type="text" id="tipe" name="tipe" required />
            </div>
            <div>
                <label for="merek">Merek Motor:</label>
                <input type="text" id="merek" name="merek" required />
            </div>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</div>


<div id="open-mekanik" class="modal-window">
    <div>
        <a href="#" title="Close" class="modal-close">Close</a>
        <h1>Login Mekanik</h1>
        <form id="login-form" action="process/data-mekanik.php" method="post">
            <div>
                <label for="username">Username :</label>
                <input type="text" id="username" name="username" required />
            </div>
            <div>
                <label for="password">Password :</label>
                <input type="password" id="password" name="password" required />
            </div>
            <?php if (isset($error)) { ?>
                <p class="error-message"><?php echo $error; ?></p>
            <?php } ?>
            <button type="submit" name="submit">Login</button>
            <input type="hidden" name="merek" value="<?php echo $_SESSION['merek']; ?>" />
            <input type="hidden" name="tipe" value="<?php echo $_SESSION['tipe']; ?>" />
            <input type="hidden" name="nama" value="<?php echo $_SESSION['Nama']; ?>" />
            <input type="hidden" name="notlp" value="<?php echo $_SESSION['notlp']; ?>" />
            <input type="hidden" name="alamat" value="<?php echo $_SESSION['alamat']; ?>" />
            <input type="hidden" name="tanggal" value="<?php echo $_SESSION['tanggal']; ?>" />
            <input type="hidden" name="kerusakan" value="<?php echo $row['Nama']; ?>" />
            <input type="hidden" name="gejala_1" value="<?php echo $gejala_1; ?>" />
            <input type="hidden" name="gejala_2" value="<?php echo $gejala_2; ?>" />
            <input type="hidden" name="gejala_3" value="<?php echo $gejala_3; ?>" />
        </form>
    </div>
</div>

<div id="open-print" class="modal-window">
    <div>
        <a href="#" title="Close" class="modal-close">Close</a>
        <h1>Login Mekanik</h1>
        <form id="login-form" action="process/data-mekanik-print.php" method="post" target="_blank" onsubmit="return closeModalAndRedirect()">
            <div>
                <label for="username">Username :</label>
                <input type="text" id="username" name="username" required />
            </div>
            <div>
                <label for="password">Password :</label>
                <input type="password" id="password" name="password" required />
            </div>
            <?php if (isset($error)) { ?>
                <p class="error-message"><?php echo $error; ?></p>
            <?php } ?>
            <button type="submit" name="submit" formtarget="_blank" id="login-button">Login</button>
            <input type="hidden" name="merek" value="<?php echo $_SESSION['merek']; ?>" />
            <input type="hidden" name="tipe" value="<?php echo $_SESSION['tipe']; ?>" />
            <input type="hidden" name="nama" value="<?php echo $_SESSION['Nama']; ?>" />
            <input type="hidden" name="notlp" value="<?php echo $_SESSION['notlp']; ?>" />
            <input type="hidden" name="alamat" value="<?php echo $_SESSION['alamat']; ?>" />
            <input type="hidden" name="tanggal" value="<?php echo $_SESSION['tanggal']; ?>" />
            <input type="hidden" name="kerusakan" value="<?php echo $row['Nama']; ?>" />
            <input type="hidden" name="gejala_1" value="<?php echo $gejala_1; ?>" />
            <input type="hidden" name="gejala_2" value="<?php echo $gejala_2; ?>" />
            <input type="hidden" name="gejala_3" value="<?php echo $gejala_3; ?>" />
        </form>
    </div>
</div>

<script>
    function closeModalAndRedirect() {
        // Menutup modal dengan menghapus class 'modal-window'
        document.getElementById('open-print').style.display = 'none';
        // Mengarahkan ke #
        window.location.href = '#';
        return true; // Lanjutkan pengiriman form
    }
</script>