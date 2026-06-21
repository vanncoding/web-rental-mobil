<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PremiumRental - <?= $title ?? 'Sewa Mobil' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root { --gold: #D4AF37; --dark: #0B1A33; --dark-card: #1A2A4A; }
        body { background-color: #0A0A0A; color: #fff; font-family: 'Segoe UI', sans-serif; }
        .navbar-dark { background: rgba(11, 26, 51, 0.8) !important; backdrop-filter: blur(12px); border-bottom: 1px solid rgba(212, 175, 55, 0.2); }
        .navbar-brand { color: var(--gold) !important; font-weight: 800; font-size: 1.8rem; letter-spacing: -1px; }
        .nav-link { color: #ccc !important; font-weight: 500; margin: 0 12px; }
        .nav-link:hover { color: var(--gold) !important; }
        .btn-gold { background: var(--gold); color: #000; font-weight: 700; border: none; padding: 8px 25px; border-radius: 30px; }
        .btn-gold:hover { background: #C09C2E; color: #000; transform: translateY(-2px); box-shadow: 0 10px 20px rgba(212,175,55,0.3); }
        .btn-outline-gold { border: 2px solid var(--gold); color: var(--gold); background: transparent; border-radius: 30px; padding: 6px 20px; font-weight: 600; }
        .btn-outline-gold:hover { background: var(--gold); color: #000; }
        .text-gold { color: var(--gold); }
        .bg-dark-custom { background-color: var(--dark); }
        .bg-card-dark { background-color: var(--dark-card); }
        .footer-dark { background: #0A0A0A; border-top: 1px solid rgba(212,175,55,0.1); }
        .glass-card { background: rgba(255,255,255,0.03); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.05); border-radius: 16px; transition: all 0.3s; }
        .glass-card:hover { transform: translateY(-8px); box-shadow: 0 20px 40px rgba(0,0,0,0.5); border-color: rgba(212,175,55,0.3); }
        .badge-status { padding: 6px 14px; border-radius: 30px; font-weight: 600; font-size: 0.75rem; }
        .badge-tersedia { background: #10B981; color: #fff; }
        .badge-disewa { background: #EF4444; color: #fff; }
        .badge-service { background: #F59E0B; color: #000; }
        .btn-wa { background: #25D366; color: #fff; font-weight: 700; border: none; padding: 12px; border-radius: 50px; transition: 0.3s; }
        .btn-wa:hover { background: #128C7E; color: #fff; box-shadow: 0 0 30px rgba(37,211,102,0.3); }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('home') ?>"><i class="bi bi-star-fill text-gold"></i> PremiumRental</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="<?= base_url('home') ?>">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('home#armada') ?>">Armada</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Layanan</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
            </ul>
            <div class="d-flex gap-2">
                <?php if($this->session->userdata('user')): ?>
                    <span class="text-white d-flex align-items-center me-2">
                        <i class="bi bi-person-circle me-1"></i> <?= $this->session->userdata('user')->nama ?>
                    </span>
                    <a href="<?= base_url('auth/logout') ?>" class="btn btn-outline-gold btn-sm">Logout</a>
                <?php else: ?>
                    <a href="<?= base_url('auth/login') ?>" class="btn btn-outline-gold btn-sm">Masuk</a>
                    <a href="<?= base_url('auth/register') ?>" class="btn btn-gold btn-sm">Daftar</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>
<div style="height: 76px;"></div> <!-- Spacer fixed navbar -->