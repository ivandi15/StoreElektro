<?= $this->extend('layouts/admin_header') ?>
<?= $this->section('content') ?>
<h1>Manajemen Pesanan</h1>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID Pesanan</th>
                <th>Pelanggan</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($pesanan as $p): ?>
            <tr>
                <td>#<?= $p['id'] ?></td>
                <td><?= esc($p['nama_lengkap']) ?></td>
                <td><?= date('d M Y H:i', strtotime($p['created_at'])) ?></td>
                <td><?= number_to_currency($p['total_harga'], 'IDR') ?></td>
                <td><?= esc($p['status_pesanan']) ?></td>
                <td>
                    <a href="/admin/pesanan/<?= $p['id'] ?>" class="btn btn-info btn-sm">Detail</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>