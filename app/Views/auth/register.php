<?= $this->extend('layouts/user_header') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Registrasi Akun Baru</h3>
            </div>
            <div class="card-body">
                <form action="/register" method="post">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center">
                <p>Sudah punya akun? <a href="/login">Login di sini</a></p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
