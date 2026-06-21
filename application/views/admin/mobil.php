<?php $this->load->view('admin/template/header', ['title' => 'Data Mobil']); ?>
<div class="d-flex justify-content-between mb-3">
    <span class="text-secondary"><?= count($mobil) ?> unit terdaftar</span>
    <a href="<?= base_url('admin/tambah_mobil') ?>" class="btn btn-gold"><i class="bi bi-plus-circle"></i> Tambah Mobil Baru</a>
</div>
<div class="bg-card-dark p-3">
    <table class="table table-dark-custom">
        <thead><tr><th>MOBIL</th><th>TRANSMISI</th><th>TAHUN</th><th>HARGA / HARI</th><th>STATUS</th><th>AKSI</th></tr></thead>
        <tbody>
        <?php foreach($mobil as $m): ?>
        <tr>
            <td><strong><?= $m->nama_mobil ?></strong><br><span class="text-secondary small"><?= $m->merk ?></span></td>
            <td><?= $m->transmisi ?></td>
            <td><?= $m->tahun ?></td>
            <td>Rp <?= number_format($m->harga_per_hari,0,',','.') ?></td>
            <td><span class="badge badge-status badge-<?= strtolower(str_replace(' ', '', $m->status)) ?>"><?= $m->status ?></span></td>
            <td>
                <a href="<?= base_url('admin/edit_mobil/'.$m->id_mobil) ?>" class="text-primary me-2"><i class="bi bi-pencil-square"></i></a>
                <a href="<?= base_url('admin/hapus_mobil/'.$m->id_mobil) ?>" class="text-danger" onclick="return confirm('Hapus mobil ini?')"><i class="bi bi-trash"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php $this->load->view('admin/template/footer'); ?>