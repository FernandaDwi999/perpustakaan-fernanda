<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h2>Tambah Kategori</h2>

<form action="/categories/store" method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Nama Kategori</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="/categories" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>