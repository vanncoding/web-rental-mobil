<?php
if (!function_exists('wa_sewa')) {
    function wa_sewa($mobil, $pelanggan = null) {
        $phone = ADMIN_PHONE;
        $nama_mobil = $mobil->nama_mobil;
        $harga = number_format($mobil->harga_per_hari, 0, ',', '.');
        
        if ($pelanggan) {
            $pesan = "Halo admin,
            saya user dengan nomor {$pelanggan->no_hp}, 
            nama : {$pelanggan->nama}
            ingin menyewa mobil {$nama_mobil} 
            dengan harga Rp {$harga} /hari. 
            Saya ingin sewa pada tanggal [isi tanggal] 
            dan kembali [isi tanggal]. Mohon konfirmasinya.";
        } else {
            $pesan = "Halo admin, 
            saya ingin menyewa mobil {$nama_mobil} 
            dengan harga Rp {$harga} /hari. 
            Data diri saya: 
            Nama: [ ], 
            No HP: [ ], 
            Tanggal Sewa: [ ], 
            Tanggal Kembali: [ ].
            *PESAN DARI ADMIN*
            /JIKA NAMA TIDAK MUNCUL, WAJIB DAFTAR DAN LOGIN TERLEBIH DAHULU!!/";
            
        }
        
        return "https://wa.me/{$phone}?text=" . urlencode($pesan);
    }
}