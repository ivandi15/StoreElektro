<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-g">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title); ?> | Toko Elektronik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/">Toko Elektronik</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/beranda">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#produk">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/keranjang">
                            <i class="bi bi-cart"></i> Keranjang
                            <?php 
                                $keranjang = session()->get('keranjang');
                                $jumlah_item = $keranjang ? count($keranjang) : 0;
                            ?>
                            <?php if($jumlah_item > 0): ?>
                                <span class="badge bg-danger"><?= $jumlah_item ?></span>
                            <?php endif; ?>
                        </a>
                    </li>
                    <?php if (session()->get('isLoggedIn')): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle"></i> <?= session()->get('nama') ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <?php if(session()->get('role') == 'admin'): ?>
                                <li><a class="dropdown-item" href="/admin/dashboard">Dashboard Admin</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <?php endif; ?>
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-4">
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="bg-dark text-white text-center p-3 mt-5">
        <p>&copy; <?= date('Y') ?> Toko Elektronik. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>