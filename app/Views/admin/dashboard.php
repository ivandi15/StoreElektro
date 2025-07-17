<?= $this->extend('layouts/admin_header') ?>
<?= $this->section('content') ?>
<h1 class="mb-4">Dashboard</h1>
<div class="row">
    <div class="col-md-3">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5 class="card-title"><?= $total_produk ?></h5>
                <p class="card-text">Total Produk</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title"><?= $total_pesanan ?></h5>
                <p class="card-text">Total Pesanan</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-info mb-3">
            <div class="card-body">
                <h5 class="card-title"><?= $total_user ?></h5>
                <p class="card-text">Total Pelanggan</p>
            </div>
        </div>
    </div>
</div>
<hr>
<h4>Pesanan Terbaru</h4>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID Pesanan</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($pesanan_terbaru as $p): ?>
        <tr>
            <td>#<?= $p['id'] ?></td>
            <td><?= date('d M Y', strtotime($p['created_at'])) ?></td>
            <td><?= number_to_currency($p['total_harga'], 'IDR') ?></td>
            <td><span class="badge bg-warning"><?= $p['status_pesanan'] ?></span></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>