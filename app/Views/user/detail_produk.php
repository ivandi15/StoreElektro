<?= $this->extend('layouts/user_header') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="/uploads/produk/<?= esc($produk['gambar']) ?>" class="img-fluid rounded-start" alt="<?= esc($produk['nama_produk']) ?>">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h2 class="card-title"><?= esc($produk['nama_produk']) ?></h2>
                <p class="text-muted"><?= esc($produk['kategori']) ?></p>
                <h3 class="text-danger my-3"><?= number_to_currency($produk['harga'], 'IDR') ?></h3>
                <p class="card-text"><?= nl2br(esc($produk['deskripsi'])) ?></p>
                <p>Stok: <?= $produk['stok'] > 0 ? $produk['stok'] : 'Habis' ?></p>
                
                <hr>

                <?php if($produk['stok'] > 0): ?>
                <form action="/keranjang/tambah" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="id_produk" value="<?= $produk['id'] ?>">
                    <div class="row align-items-center">
                        <div class="col-md-3">
                            <label for="jumlah">Jumlah:</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control" value="1" min="1" max="<?= $produk['stok'] ?>">
                        </div>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-primary mt-3"><i class="bi bi-cart-plus"></i> Tambah ke Keranjang</button>
                        </div>
                    </div>
                </form>
                <?php else: ?>
                <button class="btn btn-secondary" disabled>Stok Habis</button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>