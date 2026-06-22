<?php $this->load->view('template/header', ['title' => 'Layanan']); ?>

<div class="container" style="max-width: 700px; margin-top: 80px;">
    <div class="glass-card p-5">
        <h3 class="text-gold text-center fw-bold">Form Saran & Pengaduan</h3>
        <p class="text-secondary text-center">Kritik dan saran Anda sangat berharga bagi kami.</p>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>

        <form method="post" action="<?= base_url('layanan/kirim') ?>">
            <div class="mb-3">
                <label class="form-label text-white">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control bg-dark text-white" required>
            </div>
            <div class="mb-3">
                <label class="form-label text-white">Email</label>
                <input type="email" name="email" class="form-control bg-dark text-white" required>
            </div>
            <div class="mb-3">
                <label class="form-label text-white">Pesan</label>
                <textarea name="pesan" class="form-control bg-dark text-white" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-gold w-100 py-2">Kirim</button>
        </form>
    </div>
</div>

<?php $this->load->view('template/footer'); ?>