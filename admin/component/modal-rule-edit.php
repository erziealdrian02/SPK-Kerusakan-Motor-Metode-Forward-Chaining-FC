<!-- Modal Edit -->
<div id="modal-edit-rule<?php echo isset($data['rule_id']) ? $data['rule_id'] : ''; ?>" class="modal-window">
    <div>
        <a href="#" title="Close" class="modal-close">Close</a>
        <h1>Edit Data Rule</h1>
        <form id="diagnosa-form-edit-<?php echo isset($data['rule_id']) ? $data['rule_id'] : ''; ?>" action="process/edit-rule.php" method="post" enctype="multipart/form-data" role="form">
            <div>
                <label for="kerusakan_id">Kerusakan:</label>
                <select id="kerusakan_id" name="kerusakan_id" required>
                    <option value="">Pilih Kerusakan</option>
                    <?php
                    $query = "SELECT * FROM kerusakan";
                    $result = mysqli_query($connect, $query);
                    while ($kerusakanData = mysqli_fetch_array($result)) {
                        $selected = (isset($data['kerusakan_id']) && $kerusakanData['kerusakan_id'] == $data['kerusakan_id']) ? 'selected' : '';
                        echo '<option value="' . $kerusakanData['kerusakan_id'] . '" ' . $selected . '>' . $kerusakanData['kerusakan_id'] . ' - ' . $kerusakanData['Nama'] . '</option>';
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
                    while ($gejalaData = mysqli_fetch_array($result)) {
                        $selected = (isset($data['rule_1']) && $gejalaData['gejala_id'] == $data['rule_1']) ? 'selected' : '';
                        echo '<option value="' . $gejalaData['gejala_id'] . '" ' . $selected . '>' . $gejalaData['gejala_id'] . ' - ' . $gejalaData['isi_gejala'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div>
                <label for="rule_2">Rule 2:</label>
                <select id="rule_2" name="rule_2" required>
                    <option value="">Pilih Rule 2</option>
                    <?php
                    $query = "SELECT * FROM gejala";  // Query harus diulang atau dipanggil ulang karena resultset sebelumnya sudah digunakan.
                    $result = mysqli_query($connect, $query);
                    while ($gejalaData = mysqli_fetch_array($result)) {
                        $selected = (isset($data['rule_2']) && $gejalaData['gejala_id'] == $data['rule_2']) ? 'selected' : '';
                        echo '<option value="' . $gejalaData['gejala_id'] . '" ' . $selected . '>' . $gejalaData['gejala_id'] . ' - ' . $gejalaData['isi_gejala'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div>
                <label for="rule_3">Rule 3:</label>
                <select id="rule_3" name="rule_3" required>
                    <option value="">Pilih Rule 3</option>
                    <?php
                    $query = "SELECT * FROM gejala";  // Query harus diulang atau dipanggil ulang karena resultset sebelumnya sudah digunakan.
                    $result = mysqli_query($connect, $query);
                    while ($gejalaData = mysqli_fetch_array($result)) {
                        $selected = (isset($data['rule_3']) && $gejalaData['gejala_id'] == $data['rule_3']) ? 'selected' : '';
                        echo '<option value="' . $gejalaData['gejala_id'] . '" ' . $selected . '>' . $gejalaData['gejala_id'] . ' - ' . $gejalaData['isi_gejala'] . '</option>';
                    }
                    ?>
                </select>
            </div>

            <input type="hidden" name="rule_id" value="<?php echo isset($data['rule_id']) ? $data['rule_id'] : ''; ?>" />
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</div>


<script>
    document.querySelectorAll('form[id^="diagnosa-form-edit-"]').forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah pengiriman form default
            const formData = new FormData(this);
            fetch(this.action, {
                method: this.method,
                body: formData
            }).then(response => response.text()).then(data => {
                alert(data);
                window.location.href = './rule-page.php';
            }).catch(error => {
                console.error('Error:', error);
            });
        });
    });
</script>

<!-- Modal Add -->