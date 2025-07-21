<?= $this->extend('layouts/user_header') ?>
<?= $this->section('content') ?>
<h3>Checkout</h3>
<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">Detail Pesanan</div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <?php $total = 0; ?>
                        <?php foreach($keranjang as $item): ?>
                        <?php $subtotal = $item['harga'] * $item['jumlah']; $total += $subtotal; ?>
                        <tr>
                            <td><?= $item['nama'] ?> x <?= $item['jumlah'] ?></td>
                            <td class="text-end"><?= number_to_currency($subtotal, 'IDR') ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Total Pembayaran</th>
                            <th class="text-end"><?= number_to_currency($total, 'IDR') ?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">Alamat Pengiriman</div>
            <div class="card-body">
                <form action="/pesanan/buat" method="post">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Penerima</label>
                        <input type="text" class="form-control" value="<?= esc($user['nama_lengkap']) ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" value="<?= esc($user['email']) ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat Lengkap</label>
                        <textarea name="alamat" id="alamat" rows="4" class="form-control" required><?= esc($user['alamat']) ?></textarea>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Buat Pesanan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>