<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold mb-0"><i class="bi bi-tags me-2 text-primary"></i>Daftar Kategori</h2>
                    <p class="text-muted mb-0">Kelola kategori buku dengan mudah.</p>
                </div>
                <a href="/categories/create" class="btn btn-primary shadow-sm">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Kategori
                </a>
            </div>

            <div class="mb-3">
                <input type="text" id="searchCategory" class="form-control form-control-lg rounded-3 shadow-sm"
                    placeholder="🔍 Cari nama kategori..." style="max-width: 350px;">
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle shadow-sm rounded-3 overflow-hidden"
                    id="categoryTable">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>Nama Kategori</th>
                            <th style="width: 160px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($categories)): ?>
                        <tr>
                            <td colspan="2" class="text-center text-muted py-4">Belum ada kategori yang tersedia.</td>
                        </tr>
                        <?php else: ?>
                        <?php foreach ($categories as $category): ?>
                        <tr>
                            <td><?= esc($category['name']) ?></td>
                            <td class="text-center">
                                <a href="/categories/edit/<?= $category['id'] ?>"
                                    class="btn btn-sm btn-warning me-1 shadow-sm" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Edit kategori">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <a href="/categories/delete/<?= $category['id'] ?>"
                                    class="btn btn-sm btn-danger shadow-sm"
                                    onclick="return confirm('Yakin ingin menghapus kategori ini?')"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus kategori">
                                    <i class="bi bi-trash-fill"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<!-- Tooltip & Pencarian Script -->
<script>
// Tooltip bootstrap
document.addEventListener('DOMContentLoaded', () => {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(el => new bootstrap.Tooltip(el));
});

// Pencarian
const searchInput = document.getElementById('searchCategory');
const tableRows = document.querySelectorAll('#categoryTable tbody tr');

searchInput.addEventListener('input', function() {
    const query = this.value.toLowerCase();

    let anyVisible = false;
    tableRows.forEach(row => {
        const isMatch = row.innerText.toLowerCase().includes(query);
        row.style.display = isMatch ? '' : 'none';
        if (isMatch) anyVisible = true;
    });

    // Jika tidak ada hasil yang cocok
    const noDataRow = document.getElementById('noDataRow');
    if (!anyVisible) {
        if (!noDataRow) {
            const tbody = document.querySelector('#categoryTable tbody');
            const row = document.createElement('tr');
            row.id = 'noDataRow';
            row.innerHTML = `
                    <td colspan="2" class="text-center text-muted py-4">Kategori tidak ditemukan.</td>
                `;
            tbody.appendChild(row);
        }
    } else {
        const existing = document.getElementById('noDataRow');
        if (existing) existing.remove();
    }
});
</script>

<!-- Optional Styling -->
<style>
.table td,
.table th {
    vertical-align: middle;
}

.btn-sm i {
    vertical-align: middle;
}
</style>

<?= $this->endSection() ?>