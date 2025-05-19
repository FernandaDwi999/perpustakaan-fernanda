<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Lebih lebar dari sebelumnya -->
            <div class="card border-0 shadow rounded-4">
                <div class="card-header bg-gradient bg-success text-white rounded-top-4">
                    <h4 class="mb-0 d-flex align-items-center">
                        <i class="bi bi-book-plus me-2"></i> Tambah Buku Baru
                    </h4>
                </div>
                <div class="card-body p-4">
                    <form action="/books/store" method="post">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="title" class="form-label fw-semibold">Judul <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" class="form-control form-control-lg"
                                    placeholder="Masukkan judul buku" required>
                            </div>
                            <div class="col-md-6">
                                <label for="author" class="form-label fw-semibold">Penulis <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="author" id="author" class="form-control form-control-lg"
                                    placeholder="Masukkan nama penulis" required>
                            </div>
                            <div class="col-md-6">
                                <label for="category_id" class="form-label fw-semibold">Kategori</label>
                                <select name="category_id" id="category_id" class="form-select form-select-lg">
                                    <option value="">-- Pilih Kategori --</option>
                                    <?php foreach ($categories as $category): ?>
                                    <option value="<?= $category['id'] ?>"><?= esc($category['name']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="published_year" class="form-label fw-semibold">Tahun Terbit <span
                                        class="text-danger">*</span></label>
                                <input type="number" name="published_year" id="published_year"
                                    class="form-control form-control-lg" placeholder="Contoh: 2020" required>
                            </div>
                            <div class="col-md-6">
                                <label for="pages" class="form-label fw-semibold">Jumlah Halaman</label>
                                <input type="number" name="pages" id="pages" class="form-control form-control-lg"
                                    placeholder="Contoh: 250" min="1">
                            </div>
                            <div class="col-12">
                                <label for="synopsis" class="form-label fw-semibold">Sinopsis</label>
                                <textarea name="synopsis" id="synopsis" rows="4" class="form-control"
                                    placeholder="Tuliskan sinopsis buku..."></textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center pt-4">
                            <a href="/books" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-success px-4">
                                <i class="bi bi-save"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Optional: Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<?= $this->endSection() ?>