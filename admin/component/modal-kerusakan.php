<!-- Modal Add -->
<div id="modal-add-kerusakan" class="modal-window">
    <div>
        <a href="#" title="Close" class="modal-close">Close</a>
        <h1>Isi Data Kerusakan</h1>
        <form id="diagnosa-form" action="process/input-kerusakan.php" method="POST" enctype="multipart/form-data" role="form">
            <div>
                <label for="Nama">Kerusakan:</label>
                <input type="text" id="Nama" name="Nama" required />
            </div>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="modal-edit-kerusakan<?php echo $data['kerusakan_id']; ?>" class="modal-window">
    <div>
        <a href="#" title="Close" class="modal-close">Close</a>
        <h1>Edit Data Kerusakan</h1>
        <form id="diagnosa-form-edit-<?php echo $data['kerusakan_id']; ?>" action="process/edit-kerusakan.php" method="post" enctype="multipart/form-data" role="form">
            <div>
                <label for="Nama">Kerusakan:</label>
                <input type="text" id="Nama" name="Nama" value="<?php echo $data['Nama']; ?>" required />
                <input type="hidden" name="kerusakan_id" value="<?php echo $data['kerusakan_id']; ?>" />
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
                window.location.href = './kerusakan-page.php';
            }).catch(error => {
                console.error('Error:', error);
            });
        });
    });
</script>