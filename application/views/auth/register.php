<?php $this->load->view('template/header', ['title' => 'Daftar']); ?>
<div class="container" style="max-width: 550px; margin-top: 80px;">
    <div class="glass-card p-5">
        <h3 class="text-gold text-center fw-bold">Daftar Akun</h3>
        <p class="text-secondary text-center">Bergabunglah untuk menyewa mobil premium</p>
        <?php if (validation_errors()): ?>
            <div class="alert alert-danger"><?= validation_errors() ?></div>
        <?php endif; ?>
        <form method="post">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control bg-dark text-white" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white">Email</label>
                    <input type="email" name="email" class="form-control bg-dark text-white" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label text-white">No. HP / WhatsApp</label>
                <input type="text" name="no_hp" class="form-control bg-dark text-white" required>
            </div>
            <div class="mb-3">
                <label class="form-label text-white">Alamat</label>
                <textarea name="alamat" class="form-control bg-dark text-white" rows="2"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label text-white">Password</label>
                <input type="password" name="password" class="form-control bg-dark text-white" minlength="5" required>
            </div>
            <button type="submit" class="btn btn-gold w-100 py-2">Daftar</button>
        </form>
        <p class="text-center text-secondary mt-3">Sudah punya akun? <a href="<?= base_url('auth/login') ?>" class="text-gold">Login</a></p>
    </div>
</div>
<?php $this->load->view('template/footer'); ?>