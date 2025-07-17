<?= $this->extend('layouts/admin_header') ?>
<?= $this->section('content') ?>
<h3>Detail Pesanan #<?= $pesanan['id'] ?></h3>
<div class="row">
    <div class="col-md-6">
        <h4>Informasi Pelanggan</h4>
        <p><strong>Nama:</strong> <?= esc($pesanan['nama_lengkap']) ?></p>
        <p><strong>Alamat Pengiriman:</strong><br><?= nl2br(esc($pesanan['alamat_pengiriman'])) ?></p>
    </div>
    <div class="col-md-6">
        <h4>Update Status Pesanan</h4>
        <form action="/admin/pesanan/update_status/<?= $pesanan['id'] ?>" method="post">
            <?= csrf_field() ?>
            <div class="input-group">
                <select name="status_pesanan" class="form-select">
                    <option value="menunggu_pembayaran" <?= $pesanan['status_pesanan'] == 'menunggu_pembayaran' ? 'selected' : '' ?>>Menunggu Pembayaran</option>
                    <option value="diproses" <?= $pesanan['status_pesanan'] == 'diproses' ? 'selected' : '' ?>>Diproses</option>
                    <option value="dikirim" <?= $pesanan['status_pesanan'] == 'dikirim' ? 'selected' : '' ?>>Dikirim</option>
                    <option value="selesai" <?= $pesanan['status_pesanan'] == 'selesai' ? 'selected' : '' ?>>Selesai</option>
                    <option value="dibatalkan" <?= $pesanan['status_pesanan'] == 'dibatalkan' ? 'selected' : '' ?>>Dibatalkan</option>
                </select>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
<hr>
<h4>Item Pesanan</h4>
<table class="table">
    <thead>
        <tr>
            <th>Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($detail_pesanan as $item): ?>
        <tr>
            <td>
                <img src="/uploads/produk/<?= $item['gambar'] ?>" width="50" class="me-2">
                <?= esc($item['nama_produk']) ?>
            </td>
            <td><?= number_to_currency($item['subtotal_harga'] / $item['jumlah'], 'IDR') ?></td>
            <td><?= $item['jumlah'] ?></td>
            <td><?= number_to_currency($item['subtotal_harga'], 'IDR') ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3" class="text-end">Total</th>
            <th><?= number_to_currency($pesanan['total_harga'], 'IDR') ?></th>
        </tr>
    </tfoot>
</table>
<?= $this->endSection() ?>