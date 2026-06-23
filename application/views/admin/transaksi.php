<?php $this->load->view('admin/template/header', ['title' => 'Data Transaksi']); ?>
<div class="d-flex justify-content-between mb-3">
    <span class="text-secondary"><?= count($transaksi) ?> transaksi</span>
    <button class="btn btn-gold" data-bs-toggle="modal" data-bs-target="#modalTambahTransaksi"><i class="bi bi-plus-circle"></i> Tambah Transaksi</button>
</div>
<div class="bg-card-dark p-3">
    <table class="table table-dark-custom">
        <thead><tr><th>PENYEWA</th><th>MOBIL</th><th>TGL SEWA</th><th>TGL KEMBALI</th><th>TOTAL BIAYA</th><th>STATUS</th><th>AKSI</th></tr></thead>
        <tbody>
        <?php foreach($transaksi as $t): ?>
        <tr>
            <td><strong><?= $t->nama_penyewa ?></strong><br><span class="text-secondary small"><?= $t->no_hp ?></span></td>
            <td><?= $t->nama_mobil ?></td>
            <td><?= $t->tgl_sewa ?></td>
            <td><?= $t->tgl_kembali ?></td>
            <td>Rp <?= number_format($t->total_biaya,0,',','.') ?></td>
            <td><span class="badge badge-status badge-<?= strtolower($t->status_transaksi) ?>"><?= $t->status_transaksi ?></span></td>
            <td>
                <a href="<?= base_url('admin/edit_transaksi/'.$t->id_transaksi) ?>" class="text-primary me-2"><i class="bi bi-pencil-square"></i></a>
                <a href="<?= base_url('admin/hapus_transaksi/'.$t->id_transaksi) ?>" class="text-danger" onclick="return confirm('Hapus transaksi ini?')"><i class="bi bi-trash"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="modalTambahTransaksi" tabindex="-1">
<div class="modal-dialog modal-lg"><div class="modal-content bg-dark text-white">
<div class="modal-header border-secondary"><h5 class="text-gold">Tambah Transaksi Baru</h5><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button></div>
<form method="post" action="<?= base_url('admin/tambah_transaksi') ?>">
<div class="modal-body">
    <div class="mb-3"><label>Nama Penyewa</label>
        <select name="id_pelanggan" class="form-select bg-dark text-white" required>
            <option value="">-- Pilih Pelanggan --</option>
            <?php foreach($pelanggan as $p): ?>
            <option value="<?= $p->id_pelanggan ?>"><?= $p->nama ?> - <?= $p->no_hp ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3"><label>Pilih Mobil</label>
        <select name="id_mobil" class="form-select bg-dark text-white" required>
            <option value="">-- Pilih Mobil --</option>
            <?php foreach($mobil as $m): ?>
            <option value="<?= $m->id_mobil ?>"><?= $m->nama_mobil ?> – Rp <?= number_format($m->harga_per_hari,0,',','.') ?>/hari</option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="row">
        <div class="col-md-6"><label>Tanggal Sewa</label><input type="date" name="tgl_sewa" class="form-control bg-dark text-white" required></div>
        <div class="col-md-6"><label>Tanggal Kembali</label><input type="date" name="tgl_kembali" class="form-control bg-dark text-white" required></div>
    </div>
    <div class="mb-3"><label>Status Awal</label>
        <select name="status_transaksi" class="form-select bg-dark text-white">
            <option value="Menunggu">Menunggu</option>
            <option value="Disewa">Disewa</option>
            <option value="Selesai">Selesai</option>
            <option value="Batal">Batal</option>
        </select>
    </div>
</div>
<div class="modal-footer border-secondary">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
    <button type="submit" class="btn btn-gold">Simpan Transaksi</button>
</div>
</form>
</div></div></div>
<?php $this->load->view('admin/template/footer'); ?>