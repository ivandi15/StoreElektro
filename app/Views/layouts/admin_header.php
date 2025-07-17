<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title); ?> | Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { display: flex; min-height: 100vh; flex-direction: column; }
        .wrapper { display: flex; flex: 1; }
        .sidebar { width: 250px; background: #343a40; color: white; }
        .content { flex-grow: 1; padding: 20px; }
        .sidebar .nav-link { color: rgba(255,255,255,.75); }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { color: white; }
    </style>
</head>
<body>
    <div class="wrapper">
        <nav class="sidebar p-3">
            <h4 class="text-center">Admin Panel</h4>
            <hr>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link <?= (uri_string() == 'admin/dashboard') ? 'active' : '' ?>" href="/admin/dashboard">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (strpos(uri_string(), 'admin/produk') !== false) ? 'active' : '' ?>" href="/admin/produk">
                        <i class="bi bi-box-seam"></i> Manajemen Produk
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (strpos(uri_string(), 'admin/pesanan') !== false) ? 'active' : '' ?>" href="/admin/pesanan">
                        <i class="bi bi-receipt"></i> Manajemen Pesanan
                    </a>
                </li>
                <li class="nav-item mt-auto">
                    <hr>
                    <a class="nav-link" href="/" target="_blank"><i class="bi bi-globe"></i> Lihat Website</a>
                    <a class="nav-link" href="/logout"><i class="bi bi-box-arrow-right"></i> Logout</a>
                </li>
            </ul>
        </nav>
        <main class="content bg-light">
            <div class="container-fluid">
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?= $this->renderSection('content') ?>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>