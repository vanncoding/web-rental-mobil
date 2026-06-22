<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin - <?= $title ?? 'Panel' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --gold: #D4AF37;
            --dark: #0B1A33;
            --dark-side: #0A0A0A;
        }

        body {
            background: #0F0F0F;
            color: #fff;
            font-family: 'Segoe UI', sans-serif;
        }

        .sidebar {
            min-height: 100vh;
            background: var(--dark-side);
            border-right: 1px solid rgba(212, 175, 55, 0.1);
            width: 260px;
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px 15px;
        }

        .sidebar a {
            color: #aaa;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
            border-radius: 10px;
            transition: 0.2s;
            margin-bottom: 4px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: rgba(212, 175, 55, 0.1);
            color: var(--gold);
            border-left: 3px solid var(--gold);
        }

        .sidebar i {
            width: 24px;
        }

        .main-content {
            margin-left: 260px;
            padding: 30px 25px;
            min-height: 100vh;
        }

        .bg-card-dark {
            background: #1A1A2E;
            border: 1px solid rgba(255, 255, 255, 0.03);
            border-radius: 16px;
            padding: 20px;
        }

        .btn-gold {
            background: var(--gold);
            color: #000;
            font-weight: 700;
            border: none;
            padding: 8px 20px;
            border-radius: 30px;
        }

        .btn-gold:hover {
            background: #C09C2E;
            color: #000;
        }

        .badge-status {
            padding: 5px 12px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 0.7rem;
        }

        .badge-tersedia {
            background: #10B981;
            color: #fff;
        }

        .badge-sedangdisewa {
            background: #EF4444;
            color: #fff;
        }

        .badge-service {
            background: #F59E0B;
            color: #ffffff;
        }

        .badge-menunggu {
            background: #6B7280;
            color: #fff;
        }

        .badge-selesai {
            background: #3B82F6;
            color: #fff;
        }

        .badge-batal {
            background: #DC2626;
            color: #fff;
        }

        .badge-disewa {
            background: #F59E0B;
            color: #ffffff;
        }

        .table-dark-custom {
            background: transparent;
        }

        .table-dark-custom th {
            border-bottom: 2px solid var(--gold);
            color: var(--gold);
        }

        .table-dark-custom td {
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            vertical-align: middle;
            color: #ddd;
        }

        .table-dark-custom tr:hover {
            background: rgba(255, 255, 255, 0.02);
        }

        .table :not(caption)>*>* {
            background-color: transparent !important;
        }

        .text-gold {
            color: var(--gold);
        }

        .text-secondary {
            color: #aaa !important;
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar p-3">
        <h4 class="text-gold fw-bold mb-4"><i class="bi bi-star-fill"></i> PremiumRental</h4>
        <p class="text-secondary small">Admin Dashboard</p>
        <hr class="border-secondary">
        <div class="mt-3">
            <?php
            $segment = $this->uri->segment(2);
            if (empty($segment)) $segment = 'dashboard';
            ?>
            <a href="<?= base_url('admin/dashboard') ?>" class="<?= ($segment == 'dashboard') ? 'active' : '' ?>">
                <i class="bi bi-grid"></i> Dashboard
            </a>
            <a href="<?= base_url('admin/mobil') ?>" class="<?= ($segment == 'mobil') ? 'active' : '' ?>">
                <i class="bi bi-car-front"></i> Data Mobil
            </a>
            <a href="<?= base_url('admin/transaksi') ?>" class="<?= ($segment == 'transaksi') ? 'active' : '' ?>">
                <i class="bi bi-receipt"></i> Data Transaksi
            </a>
        </div>
        <hr class="border-secondary">
        <a href="<?= base_url('admin/logout') ?>" class="text-danger"><i class="bi bi-box-arrow-right"></i> Logout</a>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- Header halaman -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="text-white"><?= $title ?? 'Dashboard' ?></h3>
                <a href="<?= base_url('home') ?>" class="text-secondary"><i class="bi bi-arrow-left"></i> Kembali ke Beranda</a>
            </div>

            <!-- ISI KONTEN VIEW AKAN MASUK DI SINI -->
            <!-- JANGAN TAMBAHKAN closing div di sini, karena akan ditutup di footer -->