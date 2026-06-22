<?php $this->load->view('template/header', ['title' => 'Home']); ?>

<!-- HERO -->
<section class="py-5" style="background: linear-gradient(135deg, #0A0A0A 60%, #a9acb3);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <span class="badge bg-gold text-dark fw-bold mb-3" style="background: #D4AF37;">✦ Exclusive Collection</span>
                <h1 class="display-3 fw-bold">Rental Mobil<br><span class="text-gold">Solusi Kebutuhan untuk mobilitas anda</span></h1>
                <p class="text-secondary lead">Armada premium pilihan terbaik. Proses mudah, pengalaman mewah, setiap perjalanan jadi istimewa.</p>
                <div class="d-flex flex-wrap gap-3 mt-3">
                    <span class="badge bg-dark border border-secondary px-3 py-2"><i class="bi bi-check-circle-fill text-success"></i> Armada Terawat</span>
                    <span class="badge bg-dark border border-secondary px-3 py-2"><i class="bi bi-clock-fill text-gold"></i> Layanan 24/7</span>
                    <span class="badge bg-dark border border-secondary px-3 py-2"><i class="bi bi-star-fill text-warning"></i> Rating 4.9</span>
                </div>
                <div class="mt-4 d-flex gap-2">
                    <input type="text" class="form-control bg-dark text-white border-secondary" style="max-width: 300px;" placeholder="Cari mobil favorit Anda...">
                    <button class="btn btn-gold px-4">Cari</button>
                </div>
            </div>
            <div class="col-lg-5 d-none d-lg-block text-center">
                <img src="<?= base_url('uploads/Depan.png') ?>"
                    alt="Fleet Premium"
                    class="img-fluid"
                    style="max-height: 400px; object-fit: contain; filter: drop-shadow(0 10px 30px (212,175,55,0.2));">
            </div>
        </div>
    </div>
</section>

<!-- ARMADA / LIST MOBIL -->
<section id="armada" class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <span class="badge bg-gold text-dark fw-bold" style="background: #D4AF37;">+ FLEET PREMIUM</span>
                <h2 class="fw-bold text-white mt-2">Pilih Armada Anda <span class="text-gold"><?= $available_count ?> unit tersedia</span></h2>
            </div>
        </div>
        <div class="row g-4">
            <?php foreach ($mobil as $mbl): ?>
                <div class="col-md-4 col-lg-4">
                    <div class="glass-card p-0 overflow-hidden h-100">
                        <div class="position-relative" style="height: 220px; background: #111;">
                            <?php if ($mbl->gambar && file_exists('./uploads/' . $mbl->gambar)): ?>
                                <img src="<?= base_url('uploads/' . $mbl->gambar) ?>" class="w-100 h-100 object-fit-cover" style="object-fit: cover;">
                            <?php else: ?>
                                <div class="d-flex justify-content-center align-items-center h-100 text-secondary">
                                    <i class="bi bi-image" style="font-size: 60px;"></i>
                                </div>
                            <?php endif; ?>
                            <!-- BADGE DIHAPUS DARI SINI -->
                        </div>
                        <div class="p-4">
                            <!-- BADGE DIPINDAHKAN KE SINI (di atas nama mobil) -->
                            <span class="badge badge-<?= strtolower(str_replace(' ', '', $mbl->status)) ?> badge-status mb-2">
                                <?= $mbl->status ?>
                            </span>
                            <h5 class="text-white fw-bold"><?= $mbl->nama_mobil ?></h5>
                            <p class="text-gold small"><?= $mbl->merk ?></p>
                            <div class="d-flex gap-3 text-secondary small mb-3">
                                <span><i class="bi bi-gear"></i> <?= $mbl->transmisi ?></span>
                                <span><i class="bi bi-calendar3"></i> <?= $mbl->tahun ?></span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-white fw-bold fs-5">Rp <?= number_format($mbl->harga_per_hari, 0, ',', '.') ?> <small class="text-secondary fw-normal">/ hari</small></span>
                                <?php if ($mbl->status == 'Tersedia'): ?>
                                    <?php
                                    $user = $this->session->userdata('user');
                                    $link_wa = wa_sewa($mbl, $user);
                                    ?>
                                    <a href="<?= $link_wa ?>" target="_blank" class="btn btn-wa btn-sm px-4">Sewa Sekarang</a>
                                <?php else: ?>
                                    <button class="btn btn-secondary btn-sm px-4" disabled>Tidak Tersedia</button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php $this->load->view('template/footer'); ?>