<?php $this->load->view('admin/template/header', ['title' => 'Dashboard']); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="bg-card-dark p-4 rounded-4 border-0 h-100">
                <i class="bi bi-car-front fs-1 text-gold"></i>
                <h5 class="text-secondary">Total Armada</h5>
                <h2 class="text-white fw-bold"><?= $total_mobil ?></h2>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="bg-card-dark p-4 rounded-4 border-0 h-100">
                <i class="bi bi-check-circle fs-1 text-success"></i>
                <h5 class="text-secondary">Tersedia</h5>
                <h2 class="text-white fw-bold"><?= $tersedia ?></h2>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="bg-card-dark p-4 rounded-4 border-0 h-100">
                <i class="bi bi-clock fs-1 text-danger"></i>
                <h5 class="text-secondary">Sedang Disewa</h5>
                <h2 class="text-white fw-bold"><?= $disewa ?></h2>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="bg-card-dark p-4 rounded-4 border-0 h-100">
                <i class="bi bi-cash-stack fs-1 text-warning"></i>
                <h5 class="text-secondary">Total Pendapatan</h5>
                <h2 class="text-white fw-bold">Rp <?= number_format($pendapatan,0,',','.') ?></h2>
            </div>
        </div>
    </div>
    <div class="bg-card-dark p-4 rounded-4">
        <h5 class="text-white">Distribusi Status Armada</h5>
        <div class="d-flex flex-wrap gap-4 mt-2">
            <?php foreach($mobil_list as $m): ?>
                <span class="badge bg-dark px-3 py-2 border border-secondary">
                    <?= $m->nama_mobil ?> <span class="badge badge-status badge-<?= strtolower(str_replace(' ', '', $m->status)) ?> ms-1"><?= $m->status ?></span>
                </span>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php $this->load->view('admin/template/footer'); ?>