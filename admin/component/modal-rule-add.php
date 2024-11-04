<!-- Modal Add -->
<div id="modal-add-rule" class="modal-window">
    <div>
        <a href="#" title="Close" class="modal-close">Close</a>
        <h1>Isi Data Rule</h1>
        <form id="diagnosa-form" action="process/input-rule.php" method="POST" enctype="multipart/form-data" role="form">
            <div>
                <label for="kerusakan_id">Kerusakan:</label>
                <select id="kerusakan_id" name="kerusakan_id" required>
                    <option value="">Pilih Kerusakan</option>
                    <?php
                    $query = "SELECT * FROM kerusakan";
                    $result = mysqli_query($connect, $query);
                    while ($data = mysqli_fetch_array($result)) {
                        echo '<option value="' . $data['kerusakan_id'] . '">' . $data['kerusakan_id'] . ' - ' . $data['Nama'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div>
                <label for="rule_1">Rule 1:</label>
                <select id="rule_1" name="rule_1" required>
                    <option value="">Pilih Rule 1</option>
                    <?php
                    $query = "SELECT * FROM gejala";
                    $result = mysqli_query($connect, $query);
                    while ($data = mysqli_fetch_array($result)) {
                        echo '<option value="' . $data['gejala_id'] . '">' . $data['gejala_id'] . ' - '  . $data['isi_gejala'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div>
                <label for="rule_2">Rule 2:</label>
                <select id="rule_2" name="rule_2" required>
                    <option value="">Pilih Rule 2</option>
                    <?php
                    $query = "SELECT * FROM gejala";
                    $result = mysqli_query($connect, $query);
                    while ($data = mysqli_fetch_array($result)) {
                        echo '<option value="' . $data['gejala_id'] . '">' . $data['gejala_id'] . ' - '  . $data['isi_gejala'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div>
                <label for="rule_3">Rule 3:</label>
                <select id="rule_3" name="rule_3" required>
                    <option value="">Pilih Rule 3</option>
                    <?php

                    $query = "SELECT * FROM gejala";
                    $result = mysqli_query($connect, $query);
                    while ($data = mysqli_fetch_array($result)) {
                        echo '<option value="' . $data['gejala_id'] . '">' . $data['gejala_id'] . ' - '  . $data['isi_gejala'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</div>