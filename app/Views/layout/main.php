<!DOCTYPE html>
<html lang="id" data-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perpustakaan Digital</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">

    <style>
        html,
        body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }

        [data-theme='light'] {
            --bg-color: #f8fafc;
            --text-color: #212529;
            --navbar-bg: rgba(30, 42, 56, 0.95);
            --navbar-hover: #31475e;
            --card-bg: #ffffff;
            --card-hover: #f1f5f9;
            --hero-bg: linear-gradient(135deg, #e9f1fb, #cfdff4);
        }

        [data-theme='dark'] {
            --bg-color: #121212;
            --text-color: #e0e0e0;
            --navbar-bg: rgba(28, 28, 28, 0.95);
            --navbar-hover: #2a2a2a;
            --card-bg: #1e1e1e;
            --card-hover: #2c2c2c;
            --hero-bg: linear-gradient(135deg, #1c1c1c, #2a2a2a);
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
        }

        .navbar {
            background-color: var(--navbar-bg) !important;
            transition: background-color 0.3s;
            margin-bottom: 1.5rem;
        }

        .navbar-nav .nav-link:hover {
            background-color: var(--navbar-hover);
            border-radius: .375rem;
        }

        .hero {
            background: var(--hero-bg);
            padding: 5rem 1rem 3rem;
            text-align: center;
            animation: heroAppear 1s ease-out;
            margin-bottom: 2rem;
        }

        .card-custom {
            background-color: var(--card-bg);
            transition: 0.3s ease;
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .card-custom:hover {
            background-color: var(--card-hover);
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        main.container {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
            margin-bottom: 1.5rem;
        }

        th,
        td {
            padding: 0.75rem 1rem;
            border: 1px solid #dee2e6;
            text-align: left;
        }

        #themeToggle {
            border: none;
            background: none;
            color: white;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
        }

        @keyframes heroAppear {
            from {
                opacity: 0;
                transform: translateY(40px) scale(0.95);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow">
        <div class="container">
            <a class="navbar-brand fw-semibold d-flex align-items-center" href="#">
                <i class="bi bi-book-half me-2 fs-4"></i> Perpustakaan Digital
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="/books">Daftar Buku</a></li>
                    <li class="nav-item"><a class="nav-link" href="/books/create">Tambah Buku</a></li>
                    <li class="nav-item"><a class="nav-link" href="/categories">Kategori</a></li>
                    <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
                </ul>
                <button id="themeToggle" title="Ganti Tema">
                    <i id="themeIcon" class="bi bi-moon"></i>
                    <span id="themeLabel">Mode Gelap</span>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <div class="hero">
        <h1 class="display-5 fw-bold">Selamat Datang di Perpustakaan</h1>
        <p class="lead">Kelola koleksi buku dan kategori</p>
    </div>

    <!-- Main -->
    <main class="container py-5">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        <?php endif; ?>

        <div class="card card-custom">
            <?= $this->renderSection('content') ?>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <small>© 2025 Aplikasi Perpustakaan. Dibuat oleh</small>
        <a href="https://www.instagram.com/frnann6?igsh=ejF1MnBteThxdWRi" target="_blank">Fernanda</a>
    </footer>

    <!-- Script Tema -->
    <script>
        const toggleBtn = document.getElementById('themeToggle');
        const html = document.documentElement;
        const icon = document.getElementById('themeIcon');
        const label = document.getElementById('themeLabel');

        function setTheme(theme) {
            html.setAttribute('data-theme', theme);
            localStorage.setItem('theme', theme);
            icon.className = theme === 'dark' ? 'bi bi-sun' : 'bi bi-moon';
            label.textContent = theme === 'dark' ? 'Mode Terang' : 'Mode Gelap';
        }

        if (localStorage.getItem('theme') === 'dark') {
            setTheme('dark');
        }

        toggleBtn.addEventListener('click', () => {
            const newTheme = html.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
            setTheme(newTheme);
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>