<?= $this->extend('layouts/user_header') ?>
<?= $this->section('content') ?>

<!-- Bagian Hero Section -->
<style>
    .hero-section {
        /* Menggunakan gambar dari Unsplash sebagai latar belakang */
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1496171367470-9ed9a91ea931?q=80&w=1920&auto=format&fit=crop');
        background-size: cover;
        background-position: center;
        color: white;
        padding: 6rem 1rem; /* Padding atas-bawah lebih besar */
        margin-bottom: 2rem;
        border-radius: .75rem; /* Sudut lebih tumpul */
        text-align: center;
    }
    .hero-section h1 {
        font-weight: 700; /* Membuat font lebih tebal */
    }
</style>

<div class="hero-section">
    <div class="container">
        <h1 class="display-4">SELAMAT DATANG</h1>
        <p class="lead">Di Toko Elektronik kami, kami menyediakan barang-barang elektronik seperti mouse, monitor, keyboard, dan lainnya.</p>
    </div>
</div>
<!-- Akhir Hero Section -->


<div class="mb-4">
    <h1>Katalog Produk</h1>
    <p>Temukan produk elektronik terbaik dengan harga terjangkau.</p>
</div>
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
    <?php foreach ($produk as $p): ?>
    <div class="col">
        <div class="card h-100 shadow-sm">
            <img src="/uploads/produk/<?= esc($p['gambar']) ?>" class="card-img-top" alt="<?= esc($p['nama_produk']) ?>" style="height: 200px; object-fit: cover;">
            <div class="card-body">
                <h5 class="card-title"><?= esc($p['nama_produk']) ?></h5>
                <p class="card-text text-muted"><?= esc($p['kategori']) ?></p>
                <h6 class="card-subtitle mb-2 text-danger fw-bold"><?= number_to_currency($p['harga'], 'IDR') ?></h6>
            </div>
            <div class="card-footer bg-transparent border-0 p-3">
                <a href="/produk/<?= $p['id'] ?>" class="btn btn-outline-primary w-100">Lihat Detail</a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection() ?>
