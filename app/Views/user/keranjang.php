<?= $this->extend('layouts/user_header') ?>

<?= $this->section('content') ?>
<h3>Keranjang Belanja Anda</h3>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<?php if (!empty($keranjang)): ?>
<form action="/keranjang/update" method="post">
    <?= csrf_field() ?>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>
                <?php foreach ($keranjang as $id => $item): ?>
                <?php $subtotal = $item['harga'] * $item['jumlah']; $total += $subtotal; ?>
                <tr>
                    <td>
                        <img src="/uploads/produk/<?= $item['gambar'] ?>" width="50" class="me-2">
                        <?= $item['nama'] ?>
                    </td>
                    <td><?= number_to_currency($item['harga'], 'IDR') ?></td>
                    <td>
                        <input type="number" name="items[<?= $id ?>][jumlah]" value="<?= $item['jumlah'] ?>" min="1" class="form-control" style="width: 80px;">
                    </td>
                    <td><?= number_to_currency($subtotal, 'IDR') ?></td>
                    <td>
                        <a href="/keranjang/hapus/<?= $id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus item ini?')"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" class="text-end">Total</th>
                    <th><?= number_to_currency($total, 'IDR') ?></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-secondary">Update Keranjang</button>
        <a href="/checkout" class="btn btn-primary">Lanjutkan ke Checkout</a>
    </div>
</form>
<?php else: ?>
<div class="alert alert-info">Keranjang belanja Anda masih kosong.</div>
<a href="/" class="btn btn-primary">Mulai Belanja</a>
<?php endif; ?>
<?= $this->endSection() ?>