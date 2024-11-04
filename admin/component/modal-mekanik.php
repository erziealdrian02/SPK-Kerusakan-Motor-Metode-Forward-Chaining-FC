<!-- Modal Add -->
<div id="modal-add-mekanik" class="modal-window">
    <div>
        <a href="#" title="Close" class="modal-close">Close</a>
        <h1>Isi Data Mekanik</h1>
        <form id="diagnosa-form" action="process/input-mekanik.php" method="POST" enctype="multipart/form-data" role="form">
            <div>
                <label for="Nama">Nama:</label>
                <input type="text" id="Nama" name="Nama" required />
            </div>
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required />
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required />
            </div>
            <div>
                <label for="notlp">No Telephone:</label>
                <input type="text" id="notlp" name="notlp" required />
            </div>
            <div>
                <label for="alamat">Alamat:</label>
                <input type="text" id="alamat" name="alamat" required />
            </div>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="modal-edit-mekanik<?php echo $data['mekanik_id']; ?>" class="modal-window">
    <div>
        <a href="#" title="Close" class="modal-close">Close</a>
        <h1>Edit Data Mekanik</h1>
        <form id="diagnosa-form-edit-<?php echo $data['mekanik_id']; ?>" action="process/edit-mekanik.php" method="post" enctype="multipart/form-data" role="form">
            <div>
                <label for="Nama">Mekanik:</label>
                <input type="text" id="Nama" name="Nama" value="<?php echo $data['Nama']; ?>" required />
                <input type="hidden" name="mekanik_id" value="<?php echo $data['mekanik_id']; ?>" />
            </div>
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo $data['username']; ?>" required />
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="<?php echo $data['password']; ?>" required />
            </div>
            <div>
                <label for="notlp">No Telephone:</label>
                <input type="text" id="notlp" name="notlp" value="<?php echo $data['notlp']; ?>" required />
            </div>
            <div>
                <label for="alamat">Alamat:</label>
                <input type="text" id="alamat" name="alamat" value="<?php echo $data['alamat']; ?>" required />
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
                window.location.href = './mekanik-page.php';
            }).catch(error => {
                console.error('Error:', error);
            });
        });
    });
</script>