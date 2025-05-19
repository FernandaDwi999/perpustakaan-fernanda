<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h2>Edit Kategori</h2>

<form action="/categories/update/<?= $category['id'] ?>" method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Nama Kategori</label>
        <input type="text" name="name" id="name" class="form-control" value="<?= esc($category['name']) ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="/categories" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>