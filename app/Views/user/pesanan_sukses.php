<?= $this->extend('layouts/user_header') ?>
<?= $this->section('content') ?>
<div class="text-center py-5">
    <i class="bi bi-check-circle-fill text-success" style="font-size: 5rem;"></i>
    <h2 class="mt-3">Pesanan Berhasil Dibuat!</h2>
    <p>Terima kasih telah berbelanja. Kami akan segera memproses pesanan Anda.</p>
    <p>Informasi selanjutnya akan kami kirimkan melalui email.</p>
    <a href="/" class="btn btn-primary mt-3">Kembali ke Beranda</a>
</div>
<?= $this->endSection() ?>