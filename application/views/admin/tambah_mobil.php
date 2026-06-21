<?php $this->load->view('admin/template/header', ['title' => 'Tambah Mobil']); ?>
<div class="bg-card-dark p-4" style="max-width: 700px;">
    <h4 class="text-gold">Tambah Mobil Baru</h4>
    <form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6 mb-3"><label class="form-label">Nama Mobil</label><input name="nama_mobil" class="form-control bg-dark text-white" required></div>
            <div class="col-md-6 mb-3"><label class="form-label">Merk</label><input name="merk" class="form-control bg-dark text-white" required></div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3"><label class="form-label">Transmisi</label>
                <select name="transmisi" class="form-select bg-dark text-white"><option>Manual</option><option>Matic</option></select>
            </div>
            <div class="col-md-4 mb-3"><label class="form-label">Tahun</label><input type="number" name="tahun" class="form-control bg-dark text-white" required></div>
            <div class="col-md-4 mb-3"><label class="form-label">Harga / Hari</label><input type="text" name="harga_per_hari" class="form-control bg-dark text-white" required></div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3"><label class="form-label">Status</label>
                <select name="status" class="form-select bg-dark text-white"><option>Tersedia</option><option>Sedang Disewa</option><option>Service</option></select>
            </div>
            <div class="col-md-6 mb-3"><label class="form-label">Gambar</label><input type="file" name="gambar" class="form-control bg-dark text-white"></div>
        </div>
        <button class="btn btn-gold w-100">Simpan</button>
    </form>
</div>
<?php $this->load->view('admin/template/footer'); ?>