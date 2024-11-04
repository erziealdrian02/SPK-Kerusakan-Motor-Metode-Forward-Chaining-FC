<!-- Modal Add -->
<div id="modal-add-gejala" class="modal-window">
    <div>
        <a href="#" title="Close" class="modal-close">Close</a>
        <h1>Isi Data Gejala</h1>
        <form id="diagnosa-form" action="process/input-gejala.php" method="POST" enctype="multipart/form-data" role="form">
            <div>
                <label for="isi_gejala">Gejala:</label>
                <input type="text" id="isi_gejala" name="isi_gejala" required />
            </div>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="modal-edit-gejala<?php echo $data['gejala_id']; ?>" class="modal-window">
    <div>
        <a href="#" title="Close" class="modal-close">Close</a>
        <h1>Edit Data Gejala</h1>
        <form id="diagnosa-form-edit-<?php echo $data['gejala_id']; ?>" action="process/edit-gejala.php" method="post" enctype="multipart/form-data" role="form">
            <div>
                <label for="gejala_id">Gejala:</label>
                <input type="text" id="isi_gejala" name="isi_gejala" value="<?php echo $data['isi_gejala']; ?>" required />
                <input type="hidden" name="gejala_id" value="<?php echo $data['gejala_id']; ?>" />
            </div>
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
                window.location.href = './gejala-page.php';
            }).catch(error => {
                console.error('Error:', error);
            });
        });
    });
</script>