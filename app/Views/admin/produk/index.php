<?= $this->extend('layouts/admin_header') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Manajemen Produk</h1>
    <a href="/admin/produk/baru" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Tambah Produk</a>
</div>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach($produk as $p): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><img src="/uploads/produk/<?= $p['gambar'] ?>" width="100"></td>
                <td><?= esc($p['nama_produk']) ?></td>
                <td><?= esc($p['kategori']) ?></td>
                <td><?= number_to_currency($p['harga'], 'IDR') ?></td>
                <td><?= $p['stok'] ?></td>
                <td>
                    <a href="/admin/produk/edit/<?= $p['id'] ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                    <a href="/admin/produk/hapus/<?= $p['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')"><i class="bi bi-trash"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>