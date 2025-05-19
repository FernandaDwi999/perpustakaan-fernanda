<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<!-- Dashboard Heading -->
<div class="mb-4">
    <h2 class="fw-bold"><i class="bi bi-speedometer2 me-2"></i>Dashboard</h2>
    <p class="text-muted">Pantau data koleksi buku Anda secara menyeluruh.</p>
</div>

<!-- Statistik Ringkas -->
<div class="row g-4 mb-4">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm rounded-4 bg-light h-100 hover-shadow transition">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <h6 class="text-muted">Total Buku</h6>
                    <h3 class="fw-bold counter text-primary"><?= $totalBooks ?></h3>
                </div>
                <div class="text-primary fs-1">
                    <i class="bi bi-journal-bookmark-fill"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card border-0 shadow-sm rounded-4 bg-light h-100 hover-shadow transition">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <h6 class="text-muted">Total Kategori</h6>
                    <h3 class="fw-bold counter text-success"><?= $totalCategories ?></h3>
                </div>
                <div class="text-success fs-1">
                    <i class="bi bi-tags-fill"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Grafik Buku per Kategori -->
<div class="card shadow-sm border-0 rounded-4">
    <div class="card-header bg-white border-bottom-0 fw-semibold d-flex justify-content-between align-items-center">
        <span><i class="bi bi-bar-chart-fill me-2 text-info"></i>Distribusi Buku Berdasarkan Kategori</span>
    </div>
    <div class="card-body">
        <canvas id="chartKategori" height="100"></canvas>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Counter Animation
    document.querySelectorAll('.counter').forEach(counter => {
        const updateCount = () => {
            const target = +counter.innerText;
            let count = 0;
            const increment = Math.max(1, Math.ceil(target / 60));
            const interval = setInterval(() => {
                count += increment;
                if (count >= target) {
                    counter.innerText = target;
                    clearInterval(interval);
                } else {
                    counter.innerText = count;
                }
            }, 15);
        };
        updateCount();
    });

    // Chart Data
    const ctxKategori = document.getElementById('chartKategori');
    new Chart(ctxKategori, {
        type: 'bar',
        data: {
            labels: <?= json_encode(array_column($categories, 'name')) ?>,
            datasets: [{
                label: 'Jumlah Buku',
                data: <?= json_encode(array_map(function ($category) use ($books) {
                            return count(array_filter($books, fn($b) => $b['category_name'] === $category['name']));
                        }, $categories)) ?>,
                backgroundColor: 'rgba(13, 110, 253, 0.7)',
                borderRadius: 8,
                barPercentage: 0.5
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: ctx => `${ctx.dataset.label}: ${ctx.raw} buku`
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>

<!-- Style -->
<style>
    .hover-shadow:hover {
        box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.12) !important;
        transform: translateY(-5px);
    }

    .transition {
        transition: all 0.3s ease-in-out;
    }

    canvas {
        max-height: 400px;
    }
</style>

<?= $this->endSection() ?>