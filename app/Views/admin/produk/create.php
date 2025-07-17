<?= $this->extend('layouts/admin_header') ?>

<?= $this->section('content') ?>
<h1>Tambah Produk Baru</h1>
<form action="/admin/produk/create" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label for="nama_produk" class="form-label">Nama Produk</label>
        <input type="text" name="nama_produk" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="4"></textarea>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" name="stok" class="form-control" required>
        </div>
    </div>
    <div class="mb-3">
        <label for="kategori" class="form-label">Kategori</label>
        <input type="text" name="kategori" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="gambar" class="form-label">Gambar Produk</label>
        <input type="file" name="gambar" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="/admin/produk" class="btn btn-secondary">Batal</a>
</form>
<?= $this->endSection() ?>