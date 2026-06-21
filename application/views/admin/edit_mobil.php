<?php $this->load->view('admin/template/header', ['title' => 'Edit Mobil']); ?>
<div class="bg-card-dark p-4" style="max-width: 700px;">
    <h4 class="text-gold">Edit Mobil</h4>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="old_gambar" value="<?= $mobil->gambar ?>">
        <div class="row">
            <div class="col-md-6 mb-3"><label class="form-label">Nama Mobil</label><input name="nama_mobil" class="form-control bg-dark text-white" value="<?= $mobil->nama_mobil ?>" required></div>
            <div class="col-md-6 mb-3"><label class="form-label">Merk</label><input name="merk" class="form-control bg-dark text-white" value="<?= $mobil->merk ?>" required></div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3"><label class="form-label">Transmisi</label>
                <select name="transmisi" class="form-select bg-dark text-white"><option <?= $mobil->transmisi=='Manual'?'selected':'' ?>>Manual</option><option <?= $mobil->transmisi=='Matic'?'selected':'' ?>>Matic</option></select>
            </div>
            <div class="col-md-4 mb-3"><label class="form-label">Tahun</label><input type="number" name="tahun" class="form-control bg-dark text-white" value="<?= $mobil->tahun ?>" required></div>
            <div class="col-md-4 mb-3"><label class="form-label">Harga / Hari</label><input type="text" name="harga_per_hari" class="form-control bg-dark text-white" value="<?= $mobil->harga_per_hari ?>" required></div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3"><label class="form-label">Status</label>
                <select name="status" class="form-select bg-dark text-white">
                    <option <?= $mobil->status=='Tersedia'?'selected':'' ?>>Tersedia</option>
                    <option <?= $mobil->status=='Sedang Disewa'?'selected':'' ?>>Sedang Disewa</option>
                    <option <?= $mobil->status=='Service'?'selected':'' ?>>Service</option>
                </select>
            </div>
            <div class="col-md-6 mb-3"><label class="form-label">Ganti Gambar</label><input type="file" name="gambar" class="form-control bg-dark text-white"></div>
        </div>
        <button class="btn btn-gold w-100">Update</button>
    </form>
</div>
<?php $this->load->view('admin/template/footer'); ?>