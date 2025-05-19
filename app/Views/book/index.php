<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<!-- Header Section (Theme-aware) -->
<div class="custom-header text-white mb-4">
    <div class="container py-3">
        <h1 class="h3 fw-bold mb-1"><i class="bi bi-book-half me-2"></i>Manajemen Buku</h1>
        <p class="mb-0">Kelola data buku dengan cepat dan efisien.</p>
    </div>
</div>

<!-- Main Content -->
<div class="container">
    <div class="card shadow-sm border-0 rounded-4 card-theme">
        <div class="card-body">
            <h2 class="mb-4 text-primary fw-bold">📚 Daftar Buku</h2>

            <div class="mb-3">
                <input type="text" id="searchInput" class="form-control form-control-lg rounded-3 shadow-sm input-theme"
                    placeholder="🔍 Cari judul, penulis, kategori, atau tahun..." oninput="searchBooks()">
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle table-theme" id="booksTable">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Kategori</th>
                            <th>Tahun Terbit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($books as $book): ?>
                            <tr>
                                <td><?= esc($book['title']) ?></td>
                                <td><?= esc($book['author']) ?></td>
                                <td><?= esc($book['category_name'] ?? '-') ?></td>
                                <td><?= esc($book['published_year']) ?></td>
                                <td>
                                    <button class="btn btn-sm btn-info text-white mb-1 shadow-sm"
                                        onclick='showDetails(<?= json_encode($book) ?>)' data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Lihat detail buku">
                                        <i class="bi bi-eye-fill me-1"></i> Detail
                                    </button>
                                    <a href="/books/edit/<?= $book['id'] ?>" class="btn btn-sm btn-warning mb-1 shadow-sm"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit buku">
                                        <i class="bi bi-pencil-square me-1"></i> Edit
                                    </a>
                                    <a href="/books/delete/<?= $book['id'] ?>" class="btn btn-sm btn-danger mb-1 shadow-sm"
                                        onclick="return confirm('Yakin ingin menghapus?')" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Hapus buku">
                                        <i class="bi bi-trash-fill me-1"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Buku -->
<div class="modal fade" id="bookDetailModal" tabindex="-1" aria-labelledby="bookDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow rounded-4">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="bookDetailModalLabel"><i class="bi bi-book"></i> Detail Buku</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Tutup"></button>
            </div>
            <div class="modal-body bg-light bg-opacity-10 text-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-transparent"><strong>Judul:</strong> <span id="detailTitle"></span>
                    </li>
                    <li class="list-group-item bg-transparent"><strong>Penulis:</strong> <span id="detailAuthor"></span>
                    </li>
                    <li class="list-group-item bg-transparent"><strong>Kategori:</strong> <span
                            id="detailCategory"></span></li>
                    <li class="list-group-item bg-transparent"><strong>Tahun Terbit:</strong> <span
                            id="detailYear"></span></li>
                    <li class="list-group-item bg-transparent"><strong>Jumlah Halaman:</strong> <span
                            id="detailPages"></span></li>
                    <li class="list-group-item bg-transparent">
                        <strong>Sinopsis:</strong>
                        <p id="detailSynopsis" class="mt-2 mb-0"></p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Tambahan Style -->
<style>
    .custom-header {
        background: var(--header-bg, linear-gradient(135deg, #0d6efd, #0a58ca));
        border-bottom-left-radius: 30px;
        border-bottom-right-radius: 30px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        color: var(--header-text, #fff);
    }

    .card-theme {
        background-color: var(--card-bg);
        color: var(--text-color);
    }

    .input-theme {
        background-color: var(--card-bg);
        color: var(--text-color);
        border: 1px solid #ccc;
    }

    .input-theme::placeholder {
        color: #6c757d;
    }

    .table-theme {
        color: var(--text-color);
        background-color: var(--card-bg);
    }

    .table-theme thead {
        background-color: #cfe2ff !important;
    }

    .btn:hover {
        opacity: 0.9;
        transform: scale(1.02);
        transition: all 0.2s ease-in-out;
    }

    table td,
    table th {
        vertical-align: middle;
    }
</style>

<script>
    function showDetails(book) {
        document.getElementById('detailTitle').textContent = book.title;
        document.getElementById('detailAuthor').textContent = book.author;
        document.getElementById('detailCategory').textContent = book.category_name ?? '-';
        document.getElementById('detailYear').textContent = book.published_year;
        document.getElementById('detailPages').textContent = book.pages ?? 'Tidak tersedia';
        document.getElementById('detailSynopsis').textContent = book.synopsis ?? 'Tidak tersedia';

        const modal = new bootstrap.Modal(document.getElementById('bookDetailModal'));
        modal.show();
    }

    function searchBooks() {
        const searchInput = document.getElementById('searchInput').value.toLowerCase();
        const rows = document.querySelectorAll('#booksTable tbody tr');
        rows.forEach(row => {
            const title = row.cells[0].textContent.toLowerCase();
            const author = row.cells[1].textContent.toLowerCase();
            const category = row.cells[2].textContent.toLowerCase();
            const year = row.cells[3].textContent.toLowerCase();
            row.style.display = (title.includes(searchInput) || author.includes(searchInput) || category.includes(
                searchInput) || year.includes(searchInput)) ? '' : 'none';
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(el => new bootstrap.Tooltip(el));
    });
</script>

<?= $this->endSection() ?>