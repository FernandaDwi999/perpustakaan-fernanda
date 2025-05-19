<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><i class="bi bi-pencil-square"></i> Edit Buku</h4>
        </div>
        <div class="card-body">
            <form action="/books/update/<?= $book['id'] ?>" method="post">
                <div class="mb-3">
                    <label for="title" class="form-label">Judul <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title" class="form-control" value="<?= esc($book['title']) ?>"
                        required>
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Penulis <span class="text-danger">*</span></label>
                    <input type="text" name="author" id="author" class="form-control"
                        value="<?= esc($book['author']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Kategori</label>
                    <select name="category_id" id="category_id" class="form-select">
                        <option value="">-- Pilih Kategori --</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category['id'] ?>"
                                <?= $category['id'] == $book['category_id'] ? 'selected' : '' ?>>
                                <?= esc($category['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="published_year" class="form-label">Tahun Terbit <span
                            class="text-danger">*</span></label>
                    <input type="number" name="published_year" id="published_year" class="form-control"
                        value="<?= esc($book['published_year']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="pages" class="form-label">Jumlah Halaman</label>
                    <input type="number" name="pages" id="pages" class="form-control" min="1"
                        value="<?= esc($book['pages'] ?? '') ?>">
                </div>
                <div class="mb-3">
                    <label for="synopsis" class="form-label">Sinopsis</label>
                    <textarea name="synopsis" id="synopsis" rows="4"
                        class="form-control"><?= esc($book['synopsis'] ?? '') ?></textarea>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="/books" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Optional: Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<?= $this->endSection() ?>