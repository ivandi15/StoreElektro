<?= $this->extend('layouts/user_header') ?>

<?= $this->section('content') ?>
<div class="text-center mb-4">
    <h1>Katalog Produk</h1>
    <p>Temukan produk elektronik terbaik dengan harga terjangkau.</p>
</div>
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
    <?php foreach ($produk as $p): ?>
    <div class="col">
        <div class="card h-100">
            <img src="/uploads/produk/<?= esc($p['gambar']) ?>" class="card-img-top" alt="<?= esc($p['nama_produk']) ?>" style="height: 200px; object-fit: cover;">
            <div class="card-body">
                <h5 class="card-title"><?= esc($p['nama_produk']) ?></h5>
                <p class="card-text text-muted"><?= esc($p['kategori']) ?></p>
                <h6 class="card-subtitle mb-2 text-danger"><?= number_to_currency($p['harga'], 'IDR') ?></h6>
            </div>
            <div class="card-footer bg-transparent border-0">
                <a href="/produk/<?= $p['id'] ?>" class="btn btn-outline-primary w-100">Lihat Detail</a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection() ?>