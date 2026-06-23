<?php $this->load->view('template/header', ['title' => 'Login']); ?>

<div class="container" style="max-width: 500px; margin-top: 100px;">
    <div class="glass-card p-5">
        <h3 class="text-gold text-center fw-bold">Selamat Datang Kembali</h3>
        <p class="text-secondary text-center">Masuk ke akun PremiumRental Anda</p>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>
        
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
        <?php endif; ?>

        <form method="post">
            <div class="mb-3">
                <label class="form-label text-white">Email</label>
                <input type="email" name="email" class="form-control bg-dark text-white" placeholder="email@example.com" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label text-white">Password</label>
                <input type="password" name="password" class="form-control bg-dark text-white" placeholder="******" required>
            </div>
            
            <button type="submit" class="btn btn-gold w-100 py-2">Masuk</button>
        </form>

        <p class="text-center text-secondary mt-3">
            Belum punya akun? <a href="<?= base_url('auth/register') ?>" class="text-gold">Daftar di sini</a>
        </p>
    </div>
</div>

<?php $this->load->view('template/footer'); ?>